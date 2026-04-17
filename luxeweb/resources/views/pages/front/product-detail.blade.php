{{-- Extends layout --}}
@extends('layouts.front')

{{-- Style Section --}}
@section('styles')
<style>
.product-image {
    max-width: 100%;
    height: auto;
    width: 100%;
}
.product-image-thumbs {
    -ms-flex-align: stretch;
    align-items: stretch;
    display: -ms-flexbox;
    display: flex;
    margin-top: 2rem;
}
.product-image-thumb {
    box-shadow: 0 1px 2px rgb(0 0 0 / 8%);
    border-radius: .25rem;
    background-color: #fff;
    border: 1px solid #dee2e6;
    display: -ms-flexbox;
    display: flex;
    margin-right: 1rem;
    max-width: 10rem;
    padding: .5rem;
}
.product-image-thumbs .active {
    border: 2px solid #3699FF;    
}
.product-image-thumb img {
    max-width: 100%;
    height: auto;
    -ms-flex-item-align: center;
    align-self: center;
}
.product-image-thumb:hover {
    opacity: 0.5;
}

.ribbon {
        width: 150px;
        height: 150px;
        overflow: hidden;
        position: absolute;
    }
    .ribbon::before,
    .ribbon::after {
        position: absolute;
        z-index: -1;
        content: '';
        display: block;
        /*border: 5px solid #2980b9;*/
        border: 5px solid #393a3a
    }
    .ribbon span {
        position: absolute;
        display: block;
        width: 225px;
        padding: 15px 0;
        /*background-color: #3498db;*/
        background-image:url('{{ asset("assets/media/wood1.jpg") }}');
        box-shadow: 0 5px 10px rgba(0,0,0,.1);
        color: #fff;
        font: 700 18px/1 'Lato', sans-serif;
        text-shadow: 0 1px 1px rgba(0,0,0,.2);
        text-transform: uppercase;
        text-align: center;
    }
    .ribbon-top-right {
        top: -10px;
        right: -10px;
    }
    .ribbon-top-right::before,
    .ribbon-top-right::after {
        border-top-color: transparent;
        border-right-color: transparent;
    }
    .ribbon-top-right::before {
        top: 0;
        left: 0;
    }
    .ribbon-top-right::after {
        bottom: 0;
        right: 0;
    }
    .ribbon-top-right span {
        left: -25px;
        top: 30px;
        transform: rotate(45deg);
    }
</style>
@endsection

{{-- Content --}}
@section('content')
@php
$colors=$home['colors']['meta_value'];
$buttons = $shop_buttons['meta_value'];
@endphp
<!-- <div class="d-flex align-items-baseline mb-10">
    <h1 class="custom-title">{{ $category }}</h1>
</div> -->
<div class="row mt-8" style="width: 1270px; margin: 0 auto;">
    <div class="col-12 col-sm-6">
        @php
            if(count($product['images'])==0) $img_url=asset('assets/media/no_image.jpg');
            else $img_url=asset('uploads/products').'/'.$product['images'][0];
            $idx=0;
        @endphp
        <div class="col-12">
            <div style="position: relative">
                @if($product['sold']==1)
                <div class="ribbon ribbon-top-right"><span>sold</span></div>
                @endif
                <img src="{{ $img_url }}" class="product-image" alt="Product Image">
            </div>            
        </div>
        <div class="col-12 product-image-thumbs">
            @if(isset($product['images']))
            @foreach($product['images'] as $image)
            <div class="product-image-thumb {{ $idx==0 ? 'active':'' }}"><img src="{{ asset('uploads/products').'/'.$image }}" alt="Product Image"></div>
            @php
                $idx++;
            @endphp
            @endforeach
            @endif            
        </div>
    </div>
    <div class="col-12 col-sm-6">
        <h2 class="my-10">{{ $product['name'] }}</h2>
        <p>{{ $product['short_description'] }}</p>
        <h2 class="my-5">
        {{ '$'.$product['price'] }}
        </h2>
        @if($product['etsy_button'] == 1)
        <a href="{{ isset($product['etsy_link']) ? $product['etsy_link'] : '#' }}" class="btn btn-pill mt-5 custom-button">
            <i class="fas fa-cart-plus fa-lg mr-2"></i>
            Purchase This Item At Our Etsy Store
        </a>
        @endif
        <br>
        @if($product['email_button'] == 1)
        <a href="{{ route('contact') }}" class="btn btn-pill mt-5 custom-button">
            <i class="fas fa-cart-plus fa-lg mr-2"></i> 
            Email Us For Purchasing Info
        </a>
        @endif
        <p class="mt-10">{{ $product['full_description'] }}</p>
    </div>    
</div>

@endsection

{{-- Scripts Section --}}
@section('scripts')
<script>
jQuery(document).ready(function() {
    $('.product-image-thumb').on('click', function() {
        const image_element = $(this).find('img');
        $('.product-image').prop('src', $(image_element).attr('src'))
        $('.product-image-thumb.active').removeClass('active');
        $(this).addClass('active');
    });
});
</script>
@endsection