{{-- Extends layout --}}
@extends('layouts.front')

{{-- Style Section --}}
@section('styles')
<style>
.message-error {
    color: red;
    font-size: 12px;
    margin-top: 6px;
}
.contact.custom-title {
    font-family: {{ $description['meta_value']['title_font_family'] }};
    font-size: {{ $description['meta_value']['title_font_size'] }}px;
    color: {{ $description['meta_value']['title_color'] }};
    margin: 0 0 14px;
}
.contact.custom-text {
    font-family: {{ $description['meta_value']['formtext_font_family'] }};
    font-size: {{ $description['meta_value']['formtext_font_size'] }}px;
    color: {{ $description['meta_value']['formtext_color'] }};
}
.contact-page {
    /* background: #e9e9e9; */
    border-left: 1px solid #9a9a9a;
    padding: 18px 20px 24px;
    margin-top: 20px;
}
.contact-lead {
    margin-bottom: 18px;
}
.contact-form-row {
    margin-bottom: 16px;
}
.contact-label {
    display: block;
    margin-bottom: 8px;
}
.contact-actions {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    gap: 10px;
    margin-top: 6px;
}
.contact-form-control {
    border-radius: 0;
    min-height: 44px;
}
.contact-message-box {
    min-height: 180px;
    resize: vertical;
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
    .contact-page {
        padding: 14px 14px 18px;
    }
}
</style>
@endsection

{{-- Content --}}
@section('content')
<section class="contact-page">
    <h1 class="contact custom-title">{{ $description['meta_value']['title'] }}</h1>
    <!-- <p class="contact custom-text contact-lead">Contact Details</p> -->

    <form class="form" id="form_contact">
        {{ csrf_field() }}
        <div class="contact-form-row">
            <label class="contact custom-text contact-label" for="contact_name">Your Name</label>
            <input id="contact_name" class="form-control form-control-lg contact custom-text contact-form-control" name="name" type="text" value="" placeholder="Your Name">
            <div class="message-error" id="nameError"></div>
        </div>
        <div class="contact-form-row">
            <label class="contact custom-text contact-label" for="contact_email">Your Email</label>
            <input id="contact_email" type="email" class="form-control form-control-lg contact custom-text contact-form-control" name="email" value="" placeholder="Your Email">
            <div class="message-error" id="emailError"></div>
        </div>
        <div class="contact-form-row">
            <label class="contact custom-text contact-label" for="contact_message">Message</label>
            <textarea id="contact_message" class="form-control contact custom-text contact-form-control contact-message-box" name="message" rows="7"></textarea>
            <div class="message-error" id="messageError"></div>
        </div>
        <div class="contact-form-row">
            {!! NoCaptcha::renderJs() !!}
            {!! NoCaptcha::display() !!}
            <div class="message-error" id="recaptchaError"></div>
        </div>
        <div class="contact-actions">
            <button type="button" id="btn_send" class="btn btn-pill font-weight-bold px-10 py-3 custom-button">Submit</button>
            <button type="button" id="btn_reset" class="btn btn-pill custom-button font-weight-bold px-10 py-3">Reset</button>
        </div>
    </form>
</section>
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