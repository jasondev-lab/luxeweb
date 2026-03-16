{{-- Extends layout --}}
@extends('layouts.front')

{{-- Style Section --}}
@section('styles')

@endsection

{{-- Content --}}
@section('content')
@php
$colors=$home['colors']['meta_value'];
$signup=$home['signup']['meta_value'];
@endphp
<div class="d-flex align-items-baseline mb-10">
    <h1 class="custom-title">{{ $description['meta_value']['title'] }}</h1>
</div>
<div class="row d-flex justify-content-center">
    <div class="col-lg-9">
        <!--begin::Card-->
        <div class="card mb-8">
            <div class="card-body custom-background">
                <div class="p-4">
                    <!--begin::Content-->
                    <div class="custom-description">
                    {!! $description['meta_value']['block1'] !!}
                    </div>
                    <!--end::Content-->
                </div>
            </div>
        </div>
        <!--begin::Card-->
    </div>    
</div>
<div class="row d-flex justify-content-center">
    <div class="col-lg-9">
        <!--begin::Card-->
        <div class="card mb-8">
            <div class="card-body custom-background">
                <div class="p-4">
                    <!--begin::Content-->
                    <div class="custom-description">
                    {!! $description['meta_value']['block2'] !!}
                    </div>
                    <!--end::Content-->
                </div>
            </div>
        </div>
        <!--end::Card-->
    </div>
</div>

<div class="d-flex justify-content-center mt-10">
    <a href="#" id="btn_signup" class="btn btn-pill px-15 py-3 custom-button">Sign Up</a>
</div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
<script>
var signup=@json($signup);
jQuery(document).ready(function() {
    
    $('#btn_signup').on('click', function(e){
        e.preventDefault();
        if(signup.state==1){
            location.href="{{ route('signup') }}";
        }else{
            swal.fire({
                text: signup.message,
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn font-weight-bold btn-light-primary"
                }
            }).then(function() {
                
            });
        }
    })
});
</script>
@endsection