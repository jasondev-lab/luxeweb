{{-- Extends layout --}}
@extends('layouts.front')

{{-- Style Section --}}
@section('styles')
<style>
    .shop-gallery {
        /* background: #e9e9e9; */
        width: 1270px; 
        margin: 0 auto;
        border-left: 1px solid #9a9a9a;
        padding: 20px;
        margin-top: 20px;
    }
    .shop-gallery-title {
        margin: 0 0 20px;
        /* font-size: 32px; */
        line-height: 1.1;
        font-weight: 500;
        color: #111111;
        text-transform: none;
    }
    .shop-gallery-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 20px;
    }
    .shop-gallery-item {
        position: relative;
        overflow: hidden;
        background: #d7d7d7;
        aspect-ratio: 5 / 4;
    }
    .shop-gallery-item a {
        display: block;
        width: 100%;
        height: 100%;
    }
    .shop-gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }
    .shop-gallery-item.is-sold::after {
        content: "Sold";
        position: absolute;
        right: 10px;
        top: 10px;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        background: rgba(17, 17, 17, 0.8);
        color: #ffffff;
        padding: 4px 8px;
    }
    @media (max-width: 1200px) {
        .shop-gallery-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }
    }
    @media (max-width: 992px) {
        .shop-gallery-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }
    @media (max-width: 576px) {
        .shop-gallery-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

{{-- Content --}}
@section('content')
<div class="shop-gallery">
    <h1 class="shop-gallery-title">{{ $title }}</h1>
    <div class="shop-gallery-grid">
        @if(isset($products))
        @foreach($products as $product)
        @php
            if(count($product['images'])==0) $img_url=asset('assets/media/no_image.jpg');
            else $img_url=asset('uploads/products').'/'.$product['images'][0];
        @endphp
        <article class="shop-gallery-item {{ $product['sold']==1 ? 'is-sold' : '' }}">
            <a href="{{ url('shop-our-store/product/'.$product['id']) }}" aria-label="{{ $product['name'] }}">
                <img src="{{ $img_url }}" alt="{{ $product['name'] }}">
            </a>
        </article>
        @endforeach
        @endif
    </div>
</div>
@endsection

{{-- Scripts Section --}}
@section('scripts')

@endsection