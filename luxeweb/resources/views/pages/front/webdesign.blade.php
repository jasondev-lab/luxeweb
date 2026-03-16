{{-- Extends layout --}}
@extends('layouts.front')

{{-- Style Section --}}
@section('styles')
<style>
.web-img-container{
    border: 1px solid #E4E6EF;
    padding: 5px;
    border-radius: 0.42rem;
    width: {{ $image_sizes['web_image_width']+10 }}px;
    height: {{ $image_sizes['web_image_height']+10 }}px;
    background: white;
}
</style>
@endsection

{{-- Content --}}
@section('content')
<div class="d-flex align-items-baseline mb-10">
    <h1 class="custom-title">{{ $web['description']['meta_value']['title'] }}</h1>
</div>
<div class="row d-flex justify-content-center">
    <div class="col-lg-9">
        <!--begin::Card-->
        <div class="card mb-8">
            <div class="card-body custom-background">
                <div class="p-4">
                    <!--begin::Content-->
                    <div class="custom-description">
                        {!! $web['description']['meta_value']['block1'] !!}
                    </div>
                    <!--end::Content-->
                </div>
            </div>
        </div>
        <!--begin::Card-->
    </div>    
</div>
<div class="d-flex flex-wrap mt-10">
    @foreach($web_images as $img)
    <!--begin::Product-->
    <div class="web-img-container custom-background mx-5 d-flex justify-content-center align-items-center">
        <a href="{{ isset($img['link'])?$img['link']:'#' }}" target="_blank"><img src="{{ asset('uploads/home/thumb').'/'.$img['thumb'] }}" alt="{{ $img['name'] }}"></a>   
    </div>
    <!--end::Product-->
    @endforeach    
</div>

@endsection

{{-- Scripts Section --}}
@section('scripts')

@endsection