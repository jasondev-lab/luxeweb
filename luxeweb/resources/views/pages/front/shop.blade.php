{{-- Extends layout --}}
@extends('layouts.front')

{{-- Style Section --}}
@section('styles')
<style>
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
<div class="d-flex align-items-baseline mb-10">
    <h1 class="custom-title">{{ $category['title'] }}</h1>
</div>
<div class="row d-flex justify-content-center">
    <div class="col-lg-9">
        <!--begin::Card-->
        <div class="card mb-8">
            <div class="card-body custom-background">
                <div class="p-4">
                    <!--begin::Content-->
                    <div class="custom-description">
                    {!! $category['description'] !!}
                    </div>
                    <!--end::Content-->
                </div>
            </div>
        </div>
        <!--begin::Card-->
    </div>    
</div>
<!-- <div class="row d-flex justify-content-end mb-10">
    <div>
        <a href="#" id="btn_new" class="btn btn-pill px-10 py-3 w-100 custom-button"><i class="fas fa-arrow-left fa-lg mr-2"></i>Return To Shopping Menu</a>
    </div>
</div> -->
<div class="row">
    @if(isset($products))
    @foreach($products as $product)
    @php
        if(count($product['images'])==0) $img_url=asset('assets/media/no_image.jpg');
        else $img_url=asset('uploads/products').'/'.$product['images'][0];
    @endphp
    <!--begin::Product-->
    <div class="col-md-3 col-lg-12 col-xxl-3">
        <div class="card card-custom gutter-b card-stretch" style="border: 1px solid #E4E6EF; position: relative">
            @if($product['sold']==1)
            <div class="ribbon ribbon-top-right"><span>sold</span></div>
            @endif
            <div class="card-body d-flex flex-column rounded custom-background justify-content-between">
                <div class="text-center rounded mb-7">
                    <a href="{{ url('shop-our-store/product/'.$product['id']) }}"><img src="{{ $img_url }}" class="mw-100 w-200px h-200px"></a>
                </div>
                <div class="text-center">
                    <h4 class="font-size-h5">
                        <a href="{{ url('shop-our-store/product/'.$product['id']) }}" class="text-dark-75 font-weight-bolder">{{ $product['name'] }}</a>
                    </h4>
                    <div class="font-size-h6 text-muted font-weight-bolder">{{ '$'.$product['price'] }}</div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Product-->
    @endforeach
    @endif   
</div>
@endsection

{{-- Scripts Section --}}
@section('scripts')

@endsection