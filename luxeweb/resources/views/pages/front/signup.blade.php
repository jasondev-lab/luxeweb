{{-- Extends layout --}}
@extends('layouts.front')

{{-- Style Section --}}
@section('styles')
<style>
.error {
    color: red;
    font-size: 11px;
}
</style>
@endsection

{{-- Content --}}
@section('content')
@php
$colors=$home['colors']['meta_value'];
$signup=$home['signup']['meta_value'];
@endphp
<div class="d-flex align-items-baseline mb-10">
    <h1 class="custom-title">SignUp</h1>
</div>
<div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
    <div class="col-xl-12 col-xxl-9">
        <div class="card card-custom card-stretch custom-background">
            <!--begin::Header-->
            <div class="card-header py-3">
                <div class="card-title align-items-start flex-column">
                    <h2 class="font-weight-bolder text-dark">Dealer Details</h2>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Form-->
            <form id="form_signup" class="form" method="POST" action="{{ route('register') }}">
                <!--begin::Body-->
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Your Name</label>
                        <div class="col-lg-9 col-xl-9">
                            <input class="form-control form-control-lg form-control-solid @error('name') is-invalid @enderror" name="name" type="text" value="" placeholder="Your Name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Your Email</label>
                        <div class="col-lg-9 col-xl-9">
                            <div class="input-group input-group-lg input-group-solid">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="la la-at"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" name="email" value="" placeholder="Your Email">
                            </div>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Password</label>
                        <div class="col-lg-9 col-xl-9">
                            <input class="form-control form-control-lg form-control-solid" name="password" type="password" value="" placeholder="">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">Confirm Password</label>
                        <div class="col-lg-9 col-xl-9">
                            <input class="form-control form-control-lg form-control-solid" name="password_confirmation" type="password" value="" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label"></label>
                        <div class="col-lg-9 col-xl-9">
                            <label class="checkbox">
                                <input type="checkbox" id="agree">
                                <span></span>&nbsp; I understand and agree to the &nbsp;<a href="#" id="terms_of_service">terms of service</a>.
                            </label>
                            <!--<div class="error" id="errorAgree"></div>-->
                            <span class="invalid-feedback" role="alert">
                                <strong id="errorAgree"></strong>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="captcha" class="col-md-3 col-form-label">Captcha</label>
                        <div class="col-md-9 captcha">
                            <span>{!! captcha_img() !!}</span>
                            <button type="button" class="btn btn-danger" class="reload" id="reload">
                            &#x21bb;
                            </button>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="captcha" class="col-md-3 col-form-label">Enter Captcha</label>
                        <div class="col-md-9">
                            <input id="captcha" type="text" class="form-control form-control-lg form-control-solid @error('captcha') is-invalid @enderror" placeholder="Enter Captcha" name="captcha">
                            @error('captcha')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <!--end::Body-->
            </form>
            <!--end::Form-->
            <div class="card-footer d-flex justify-content-center">
                <a href="#" class="btn btn-pill font-weight-bold px-10 py-3 mr-5 custom-button" id="btn_submit">Submit</a>
                <a href="{{ route('home') }}" class="btn btn-pill font-weight-bold px-10 py-3 custom-button">Cancel</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_terms" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Terms of service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                {!! $signup['terms_of_service'] !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary font-weight-bold" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
<script>
jQuery(document).ready(function() {
    $('#btn_submit').on('click', function(e){
        e.preventDefault();
        $('.error').text('');
        if(!$('#agree').prop('checked')){
            $('#errorAgree').text('You have to agree the terms of service.');
            $('#errorAgree').parent().show();
            return;
        }
        $('#form_signup').submit();
    });

    $('#terms_of_service').on('click', function(e){
        e.preventDefault();
        $('#modal_terms').modal();
    });

    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });
});
</script>
@endsection