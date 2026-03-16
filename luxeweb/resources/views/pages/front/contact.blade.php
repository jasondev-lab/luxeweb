{{-- Extends layout --}}
@extends('layouts.front')

{{-- Style Section --}}
@section('styles')
<style>
.message-error {
    color: red;
    font-size: 12px;
}
.contact.custom-title {
    font-family: {{ $description['meta_value']['title_font_family'] }};
    font-size: {{ $description['meta_value']['title_font_size'] }}px;
    color: {{ $description['meta_value']['title_color'] }};
}
.contact.custom-text {
    font-family: {{ $description['meta_value']['formtext_font_family'] }};
    font-size: {{ $description['meta_value']['formtext_font_size'] }}px;
    color: {{ $description['meta_value']['formtext_color'] }};
}
@media (max-width: 1200px) {
    .contact.custom-title {
        font-family: {{ $description['meta_value']['title_font_family_mobile'] }};
        font-size: {{ $description['meta_value']['title_font_size_mobile'] }}px;
        color: {{ $description['meta_value']['title_color_mobile'] }};
    }
    .contact.custom-text {
        font-family: {{ $description['meta_value']['formtext_font_family_mobile'] }};
        font-size: {{ $description['meta_value']['formtext_font_size_mobile'] }}px;
        color: {{ $description['meta_value']['formtext_color_mobile'] }};
    }
}
</style>
@endsection

{{-- Content --}}
@section('content')
<div class="d-flex align-items-baseline mb-10">
    <h1 class="contact custom-title">{{ $description['meta_value']['title'] }}</h1>
</div>
<div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
    <div class="col-xl-12 col-xxl-9">
        <div class="card card-custom card-stretch custom-background">
            <!--begin::Header-->
            <div class="card-header py-3">
                <div class="card-title align-items-start flex-column">
                    <h3 class="font-weight-bolder contact custom-text">Contact Details</h3>
                    <!--<span class="text-muted font-weight-bold font-size-sm mt-1">Update your personal informaiton</span>-->
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Form-->
            <form class="form" id="form_contact">
                {{ csrf_field() }}
                <!--begin::Body-->
                <div class="card-body">
                    <div class="alert alert-custom alert-outline-2x alert-outline-primary fade show mb-5" style="padding:5px 20px; display:none" role="alert">
                        <div class="alert-icon">
                            <i class="flaticon-warning"></i>
                        </div>
                        <div class="alert-text">Your message was delivered correctly!</div>
                        <div class="alert-close">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">
                                    <i class="ki ki-close"></i>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="form-group row">
                        <span class="col-xl-3 col-lg-3 col-form-label contact custom-text">Your Name</span>
                        <div class="col-lg-9 col-xl-9">
                            <input class="form-control form-control-lg contact custom-text" name="name" type="text" value="" placeholder="Your Name">
                            <div class="message-error" id="nameError"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <span class="col-xl-3 col-lg-3 col-form-label contact custom-text">Your Email</span>
                        <div class="col-lg-9 col-xl-9">
                            <div class="input-group input-group-lg">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="la la-at"></i>
                                    </span>
                                </div>
                                <input type="email" class="form-control form-control-lg contact custom-text" name="email" value="" placeholder="Your Email">                                
                            </div>
                            <div class="message-error" id="emailError"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <span class="col-xl-3 col-lg-3 col-form-label contact custom-text">Message</span>
                        <div class="col-lg-9 col-xl-9">
                            <div class="input-group input-group-lg">
                                <textarea class="form-control contact custom-text" name="message" rows="10"></textarea>                                
                            </div>
                            <div class="message-error" id="messageError"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <span class="col-md-3 col-xl-3 col-lg-3 col-form-label contact custom-text"></span>
                        <div class="col-md-9">
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}
                            <div class="message-error" id="recaptchaError"></div>
                        </div>
                    </div>
                </div>
                <!--end::Body-->
            </form>
            <!--end::Form-->
            <div class="card-footer d-flex justify-content-center">
                <button type="button" id="btn_send" class="btn btn-pill font-weight-bold px-10 py-3 mr-5 custom-button">Submit</a>
                <button type="button" id="btn_reset" class="btn btn-pill custom-button font-weight-bold px-10 py-3">Reset</a>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- Scripts Section --}}
@section('scripts')
<script>
jQuery(document).ready(function () {
    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });

    $('#btn_send').on('click', function(e) {
		e.preventDefault();
        $('.message-error').text('');
		var btn = KTUtil.getById("btn_send");
		KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "");

        var form = document.getElementById('form_contact');
		var form_data = new FormData(form);
		
        $.ajax({
            url:"{{ route('send-contact') }}",
            type: "POST",
            data: form_data,
            processData: false,
            contentType: false,
            success: function(result){
				KTUtil.btnRelease(btn);
                $('#form_contact').trigger("reset");
                if(result.state == 1){
                    Swal.fire({
                        text: "Thank you! We received your message.",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    }).then(function() {
                        location.href="{{ route('home') }}";
                    });
                } else {
                    Swal.fire({
                        text: result.message,
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    });
                }                
 			},
			error: function (response) {
				KTUtil.btnRelease(btn);
                $('#nameError').text(response.responseJSON.errors.name);
                $('#emailError').text(response.responseJSON.errors.email);
                $('#messageError').text(response.responseJSON.errors.message);
                $('#recaptchaError').text(response.responseJSON.errors['g-recaptcha-response']);
			}
			
        });
	});

    $('#btn_reset').on('click', function(e) {
        $('#form_contact').trigger("reset");
    })
}); 
</script>
@endsection