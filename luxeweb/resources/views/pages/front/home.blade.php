{{-- Extends layout --}}
@extends('layouts.front')

{{-- Style Section --}}
@section('styles')
<style>
.slider-container {
    position: relative;
    width: {{ $image_sizes['home_slide_image_width'] }}px;
    height: {{ $image_sizes['home_slide_image_height'] }}px;
    overflow: hidden;    
}
.slider {
    position: relative;
    width: 100%;
    height: 100%;
}
.slide {
    position: absolute;
    width: 100%;
    height: 100%;
    opacity: 0;
    transition: opacity 1s ease-in-out;
    display: flex;
    align-items: center;
    justify-content: center;
}
.slide.active {
    opacity: 1;
}
.slide img {
    width: {{ $image_sizes['home_slide_image_width'] }}px;
    height: {{ $image_sizes['home_slide_image_height'] }}px;
    object-fit: cover;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}
.latest-item a {
    width: {{ $image_sizes['home_bottom_image_width'] }}px;
    height: {{ $image_sizes['home_bottom_image_height'] }}px;
}

@keyframes popOut {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
  }
}
.slide.pop-out {
  animation: popOut 1s forwards;
}

@media (max-width: 768px) {
    #top_section {
        flex-direction: column-reverse;
    }				
}

@media (max-width: 576px) {
    .slider-container {
        width: {{ $image_sizes['home_slide_image_width']*0.6 }}px;
        height: {{ $image_sizes['home_slide_image_height']*0.6 }}px;            
    }
    .slide img {
        width: {{ $image_sizes['home_slide_image_width']*0.6 }}px;
        height: {{ $image_sizes['home_slide_image_height']*0.6 }}px;
    }
    .latest-item a {
        width: {{ $image_sizes['home_bottom_image_width']*0.8 }}px;
        height: {{ $image_sizes['home_bottom_image_height']*0.8 }}px;
    }
}
</style>
@endsection
@php
$topleft_images=[];
$topright_images=[];
$bottomleft_images=[];
$bottomright_images=[];
foreach($slide_images as $img){
    if(isset($img['location'])){
        if($img['location']=='top-left') $topleft_images[]=$img;
        if($img['location']=='top-right') $topright_images[]=$img;
        if($img['location']=='bottom-left') $bottomleft_images[]=$img;
        if($img['location']=='bottom-right') $bottomright_images[]=$img;
    } 
}    
@endphp
{{-- Content --}}
@section('content')
<div class="d-flex flex-column" style="width:100%;">
    <div class="mb-8 d-flex" id="top_section">
        <div class="d-flex p-2 w-100">
            <!--begin::Card-->
            <div class="card border-0">
                <div class="card-body custom-background">
                    <div class="p-4">
                        <div class="d-flex justify-content-between align-items-center mb-8">
                            <!--begin::Heading-->
                            <h2 class="custom-title">{{ $home['description']['meta_value']['title'] }}</h2>
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
        <div class="d-flex flex-column">
            <div class="d-flex justify-content-center">
                <div class="d-flex p-2">
                    <div class="slider-container">
                        <div class="slider">
                            @foreach($topleft_images as $img)
                            <div class="slide topleft_slide {{ $loop->index==0 ? 'active' : '' }}">
                                <img src="{{ asset('uploads/home').'/'.$img['name'] }}" alt="{{ $img['name'] }}">
                            </div>
                            @endforeach
                            @if(count($topleft_images)==0)
                            <div class="slide active">
                                <img src="{{ asset('assets/media/no_image.jpg') }}" alt="No Image">
                            </div>
                            @endif                    
                        </div>                
                    </div>
                </div>
                <div class="d-flex p-2">
                    <div class="slider-container">
                        <div class="slider">
                            @foreach($topright_images as $img)
                            <div class="slide topright_slide {{ $loop->index==0 ? 'active' : '' }}">
                                <img src="{{ asset('uploads/home').'/'.$img['name'] }}" alt="{{ $img['name'] }}">
                            </div>
                            @endforeach
                            @if(count($topright_images)==0)
                            <div class="slide active">
                                <img src="{{ asset('assets/media/no_image.jpg') }}" alt="No Image">
                            </div>
                            @endif                    
                        </div>                
                    </div>
                </div>        
            </div>
            <div class="d-flex justify-content-center">
                <div class="d-flex p-2">
                    <div class="slider-container">
                        <div class="slider">
                            @foreach($bottomleft_images as $img)
                            <div class="slide bottomleft_slide {{ $loop->index==0 ? 'active' : '' }}">
                                <img src="{{ asset('uploads/home').'/'.$img['name'] }}" alt="{{ $img['name'] }}">
                            </div>
                            @endforeach
                            @if(count($bottomleft_images)==0)
                            <div class="slide active">
                                <img src="{{ asset('assets/media/no_image.jpg') }}" alt="No Image">
                            </div>
                            @endif                    
                        </div>                
                    </div>
                </div>
                <div class="d-flex p-2">
                    <div class="slider-container">
                        <div class="slider">
                            @foreach($bottomright_images as $img)
                            <div class="slide bottomright_slide {{ $loop->index==0 ? 'active' : '' }}">
                                <img src="{{ asset('uploads/home').'/'.$img['name'] }}" alt="{{ $img['name'] }}">
                            </div>
                            @endforeach
                            @if(count($bottomright_images)==0)
                            <div class="slide active">
                                <img src="{{ asset('assets/media/no_image.jpg') }}" alt="No Image">
                            </div>
                            @endif                    
                        </div>                
                    </div>
                </div>        
            </div>
        </div>
    </div>
    <div class="custom-title">
        Latest Additions
    </div>
    @if(isset($latest_addition_images))
    <div class="row">
        @foreach($latest_addition_images as $img)
        <div class="col-xl-3 col-lg-3 d-flex align-items-center justify-content-center p-4">
            <div class="latest-item d-flex align-items-center justify-content-center p-2" style="background-color: #ffffff;">
                <a href="{{ $img['link'] }}" target="_blank">
                    <img src="{{ asset('uploads/home').'/'.$img['name'] }}" alt="{{ $img['name'] }}" style="width: 100%; height: 100%; object-fit: cover;">
                </a>
            </div>            
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection

{{-- Scripts Section --}}
@section('scripts')
<script>
$(document).ready(function() {
    var home = @json($home);
    const topleft_slides = document.querySelectorAll('.topleft_slide');
    const topright_slides = document.querySelectorAll('.topright_slide');
    const bottomleft_slides = document.querySelectorAll('.bottomleft_slide');
    const bottomright_slides = document.querySelectorAll('.bottomright_slide');
    let currentIndexTopleft = 0;
    let currentIndexTopright = 0;
    let currentIndexBottomleft = 0;
    let currentIndexBottomright = 0;
    
    function goToTopleftSlide(index) {
        if (index < 0) {
          index = topleft_slides.length - 1;
        } else if (index >= topleft_slides.length) {
          index = 0;
        }
        
        // Remove active class and add pop-out animation to current slide
        topleft_slides[currentIndexTopleft].classList.remove('active');
        topleft_slides[currentIndexTopleft].classList.add('pop-out');
        
        // Update current index
        currentIndexTopleft = index;
        
        topleft_slides[currentIndexTopleft].classList.add('active');
        topleft_slides.forEach(slide => {
            slide.classList.remove('pop-out');
        });        
    }

    function goToToprightSlide(index) {
        if (index < 0) {
          index = topright_slides.length - 1;
        } else if (index >= topright_slides.length) {
          index = 0;
        }
        
        // Remove active class and add pop-out animation to current slide
        topright_slides[currentIndexTopright].classList.remove('active');
        topright_slides[currentIndexTopright].classList.add('pop-out');
        
        // Update current index
        currentIndexTopright = index;

        topright_slides[currentIndexTopright].classList.add('active');
        topright_slides.forEach(slide => {
            slide.classList.remove('pop-out');
        });
    }

    function goToBottomleftSlide(index) {
        if (index < 0) {
          index = bottomleft_slides.length - 1;
        } else if (index >= bottomleft_slides.length) {
          index = 0;
        }

        // Remove active class and add pop-out animation to current slide
        bottomleft_slides[currentIndexBottomleft].classList.remove('active');
        bottomleft_slides[currentIndexBottomleft].classList.add('pop-out');
        
        // Update current index
        currentIndexBottomleft = index;

        bottomleft_slides[currentIndexBottomleft].classList.add('active');
        bottomleft_slides.forEach(slide => {
            slide.classList.remove('pop-out');
        });        
    }   

    function goToBottomrightSlide(index) {
        if (index < 0) {
          index = bottomright_slides.length - 1;
        } else if (index >= bottomright_slides.length) {
          index = 0;
        }

        // Remove active class and add pop-out animation to current slide
        bottomright_slides[currentIndexBottomright].classList.remove('active');
        bottomright_slides[currentIndexBottomright].classList.add('pop-out');
        
        // Update current index
        currentIndexBottomright = index;

        bottomright_slides[currentIndexBottomright].classList.add('active');
        bottomright_slides.forEach(slide => {
            slide.classList.remove('pop-out');
        });
    }

    let speed=home.slide_speed.meta_value==null ? 2000 : home.slide_speed.meta_value.speed;
    // Auto slide (optional)
    let intervalTopLeft = setInterval(() => {
        goToTopleftSlide(currentIndexTopleft + 1);
    }, speed);
    
    let intervalTopRight = setInterval(() => {
        goToToprightSlide(currentIndexTopright + 1);
    }, speed);

    let intervalBottomLeft = setInterval(() => {
        goToBottomleftSlide(currentIndexBottomleft + 1);
    }, speed);

    let intervalBottomRight = setInterval(() => {
        goToBottomrightSlide(currentIndexBottomright + 1);
    }, speed);
     
});
</script>
@endsection