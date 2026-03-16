{{-- Extends layout --}}
@extends('layouts.front')

{{-- Style Section --}}
@section('styles')
<style>
.bottom-img-container{
    border: 1px solid #E4E6EF;
    padding: 5px;
    border-radius: 0.42rem;
    width: {{ $image_sizes['home_bottom_image_width']+10 }}px;
    height: {{ $image_sizes['home_bottom_image_height']+10 }}px;
    background: white;
}
.carousel {
    border: 1px solid #E4E6EF;
    padding: 5px;
    border-radius: 0.42rem;
    width: {{ $image_sizes['home_slide_image_width']+10 }}px;
    height: {{ $image_sizes['home_slide_image_height']+10 }}px;
    background: white;
}
.carousel-item {
    text-align: center
}
</style>
@endsection

{{-- Content --}}
@section('content')
<div class="row mb-20">
    <div class="col-lg-7">
        <!--begin::Card-->
        <div class="card mb-8 border-0">
            <div class="card-body">
                <div class="p-4">
                    <div class="d-flex justify-content-between align-items-center mb-8">
                        <!--begin::Heading-->
                        <h2 class="text-dark custom-title">{{ $home['description']['meta_value']['title'] }}</h2>
                        <!--end::Heading-->                        
                    </div>
                    <!--begin::Content-->
                    <div class="custom-description">
                        {!! isset($home['description']['meta_value']['block1']) ? $home['description']['meta_value']['block1'] : '' !!}                        
                    </div>
                    <!--end::Content-->
                </div>
            </div>
        </div>
        <!--begin::Card-->
    </div>
    <div class="col-lg-5 d-flex flex-row-reverse">
        <div id="demo" class="carousel slide img-thumbnail" data-ride="carousel">
            <!-- Indicators -->
            <ul class="carousel-indicators">
                @php
                    $idx=0;
                @endphp
                @if(count($slide_images)>0)
                @foreach($slide_images as $img)
                    <li data-target="#demo" data-slide-to="{{ $idx }}" class="{{ $idx==0 ? 'active' : '' }}"></li>
                    @php
                        $idx++;
                    @endphp
                @endforeach
                @endif
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">
                @if(count($slide_images)>0)
                @foreach($slide_images as $img)
                <div class="carousel-item {{ $img['id']==1 ? 'active' : '' }}">
                    <img src="{{ asset('uploads/home/thumb').'/'.$img['thumb'] }}" alt="{{ $img['name'] }}">
                </div>
                @endforeach
                @endif
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>
</div>
<div class="row d-flex justify-content-between">
    @if(count($bottom_images)>0)
    @foreach($bottom_images as $img)
        <div class="bottom-img-container d-flex justify-content-center align-items-center">
            <img src="{{ asset('uploads/home/thumb').'/'.$img['thumb'] }}" alt="">
        </div>
    @endforeach
    @endif   
</div>
@endsection

{{-- Scripts Section --}}
@section('scripts')

@endsection