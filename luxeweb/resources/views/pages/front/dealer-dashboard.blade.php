{{-- Extends layout --}}
@extends('layouts.front')

{{-- Style Section --}}
@section('styles')

@endsection

{{-- Content --}}
@section('content')
@php
$colors=$home['colors']['meta_value'];
@endphp
<div class="d-flex align-items-baseline mb-10">
    <h1 class="custom-title">Dealer Dashboard</h1>
</div>
<div class="row d-flex justify-content-center mt-20">
    <div class="col-lg-6">
        <div class="px-15">
            <a href="{{ route('new-business') }}" id="btn_new" class="btn btn-pill px-15 py-5 w-100 custom-button">New Business</a>
        </div>
        <div class="error-alert text-center text-danger" id="error_new"></div>
    </div>    
</div>
<div class="row d-flex justify-content-center mt-10">
    <div class="col-lg-6">
        <div class="px-15">
            <a href="{{ url('edit-business/'.$business_id) }}" id="btn_edit" class="btn btn-pill px-15 py-5 w-100 custom-button">Edit Business</a>
        </div>
        <div class="error-alert text-center text-danger" id="error_edit"></div>
    </div>
</div>
<div class="row d-flex justify-content-center mt-10">
    <div class="col-lg-6">
        <div class="px-15">
            <a href="{{ url('delete-business/'.$business_id) }}" id="btn_delete" class="btn btn-pill px-15 py-5 w-100 custom-button">Delete Business</a>
        </div>
        <div class="error-alert text-center text-danger" id="error_delete"></div>
    </div>
</div>
@endsection

{{-- Scripts Section --}}
@section('scripts')
<script>
var business_id={{ $business_id }};
jQuery(document).ready(function() {
    $('#btn_new').on('click', function(e){
        e.preventDefault();
        $('.error-alert').text('');
        if(business_id==0) location.href=$(this).attr('href');
        else $('#error_new').text('You have already created a business.');
    });

    $('#btn_edit').on('click', function(e){
        e.preventDefault();
        $('.error-alert').text('');
        if(business_id!=0) location.href=$(this).attr('href');
        else $('#error_edit').text('You have not created a business yet.');
    });

    $('#btn_delete').on('click', function(e){
        e.preventDefault();
        $('.error-alert').text('');
        if(business_id!=0) location.href=$(this).attr('href');
        else $('#error_delete').text('You have not created a business yet.');
    });
});
</script>
@endsection