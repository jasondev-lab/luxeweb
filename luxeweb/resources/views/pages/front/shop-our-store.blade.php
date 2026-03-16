{{-- Extends layout --}}
@extends('layouts.front')

{{-- Style Section --}}
@section('styles')

@endsection

{{-- Content --}}
@section('content')
@php
$colors=$home['colors']['meta_value'];
$shop_toggle=isset($home['shop']) ? $home['shop']['meta_value']['state'] : 1;
$shop_message=isset($home['shop']) ? $home['shop']['meta_value']['message'] : 'Sorry, the store is temporarily closed. Please check back later.';
$buttons=$home['shop_buttons']['meta_value'];
if($buttons['image_color']==1){
    $button_style="background-image:url('".asset('uploads/home')."/".$buttons['image']."');"."font-family:".(isset($buttons['font']) ? $buttons['font'] : 'Verdana').";"."font-size:".(isset($buttons['font_size']) ? $buttons['font_size'].'px' : '14px').";"."color:".(isset($buttons['font_color']) ? $buttons['font_color'] : 'white').";";
}else{
    $button_style='background: '.$buttons['color'].';'."font-family:".(isset($buttons['font']) ? $buttons['font'] : 'Verdana').";"."font-size:".(isset($buttons['font_size']) ? $buttons['font_size'].'px' : '14px').";"."color:".(isset($buttons['font_color']) ? $buttons['font_color'] : 'white').";";
}
@endphp
@if($shop_toggle==1)
<div class="d-flex align-items-baseline mb-10">
    <h1 class="custom-title">Shop</h1>
</div>
@foreach($categories as $category)
<div class="row d-flex justify-content-center mt-10">
    <div class="col-lg-6">
        <div class="px-15">
            <a href="{{ url('shop-our-store/category/'.$category['id']) }}" class="btn btn-pill px-15 py-5 w-100 custom-button" style="{{ $button_style }}">
                <i class="fas fa-cart-plus fa-lg mr-2"></i>{{ $category['title'] }}
            </a>
        </div>
    </div>
</div>
@endforeach
@else
<div class="d-flex justify-content-center">
    <div class="d-flex flex-column" id="store_closed">
        <div class="bg-danger p-4 rounded-xl" style="width: 240px; margin: auto">
            <div class="font-size-h1 text-light text-center px-12 py-8 rounded-xl" style="border: 3px solid white">
                STORE<br>CLOSED
            </div>
        </div>
        <div class="text-center p-8 font-size-h6">{{ $shop_message }}</div>
    </div>    
</div>
@endif
@endsection

{{-- Scripts Section --}}
@section('scripts')

@endsection