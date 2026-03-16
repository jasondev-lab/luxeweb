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
</style>
@endsection

{{-- Content --}}
@section('content')
<div class="d-flex align-items-baseline mb-10">
    <h1 class="custom-title">{{ $description['meta_value']['title'] }}</h1>
</div>
<div class="row">
    <div class="col-12 col-sm-6">
        @php
            $images=$business['images'];
            if(count($images)==0) $img_url=asset('assets/media/no_image.jpg');
            else $img_url=asset('uploads/businesses').'/'.$images[0];
            $idx=0
        @endphp
        <div class="col-12">
            <img src="{{ $img_url }}" class="product-image" alt="Business Image">
        </div>
        <div class="col-12 product-image-thumbs">
            @foreach($images as $img)
                <div class="product-image-thumb {{ $idx==0?'active':'' }}"><img src="{{ asset('uploads/businesses').'/'.$img }}" alt="Business Image"></div>
                @php
                    $idx++;
                @endphp
            @endforeach            
        </div>
    </div>
    <div class="col-12 col-sm-6">
        <div class="d-flex align-items-center row">
            <label class="col-xl-4 col-lg-4 col-form-label text-dark-75 font-weight-bolder font-size-h5">Business Name:</label>
            <div class="col-lg-8 col-xl-8 text-muted font-size-h5">
            {{ $business['name'] }}
            </div>
        </div>
        <div class="d-flex align-items-center row">
            <label class="col-xl-4 col-lg-4 col-form-label text-dark-75 font-weight-bolder font-size-h5">Brick and Mortar Address:</label>
            <div class="col-lg-8 col-xl-8 text-muted font-size-h5">
            {{ $business['address'] }}
            </div>
        </div>
        <div class="d-flex align-items-center row">
            <label class="col-xl-4 col-lg-4 col-form-label text-dark-75 font-weight-bolder font-size-h5">Website Address:</label>
            <div class="col-lg-8 col-xl-8 text-muted font-size-h5">
            {{ $business['web_address'] }}
            </div>
        </div>
        <div class="d-flex align-items-center row">
            <label class="col-xl-4 col-lg-4 col-form-label text-dark-75 font-weight-bolder font-size-h5">Phone Number:</label>
            <div class="col-lg-8 col-xl-8 text-muted font-size-h5">
            {{ $business['phone_number'] }}
            </div>
        </div>
        <div class="d-flex align-items-center row">
            <label class="col-xl-4 col-lg-4 col-form-label text-dark-75 font-weight-bolder font-size-h5">Facebook:</label>
            <div class="col-lg-8 col-xl-8 text-muted font-size-h5">
            {{ $business['facebook'] }}
            </div>
        </div>
        <div class="d-flex align-items-center row">
            <label class="col-xl-4 col-lg-4 col-form-label text-dark-75 font-weight-bolder font-size-h5">Twitter:</label>
            <div class="col-lg-8 col-xl-8 text-muted font-size-h5">
            {{ $business['twitter'] }}
            </div>
        </div>
        <div class="d-flex align-items-center row">
            <label class="col-xl-4 col-lg-4 col-form-label text-dark-75 font-weight-bolder font-size-h5">Instagram:</label>
            <div class="col-lg-8 col-xl-8 text-muted font-size-h5">
            {{ $business['instagram'] }}
            </div>
        </div>
        <div class="d-flex align-items-center row">
            <label class="col-xl-4 col-lg-4 col-form-label text-dark-75 font-weight-bolder font-size-h5">Business Card:</label>
            <div class="col-lg-8 col-xl-8 text-muted font-size-h5">
                <div class="p-2 border rounded" style="width: 80%;">
                    @php
                        if(empty($business['card'])) $img_url=asset('assets/media/no_image.jpg');
                        else $img_url=asset('uploads/businesses').'/'.$business['card'];
                    @endphp
                    <img src="{{ $img_url }}" alt="Product Image" width="100%">
                </div>
            </div>
        </div>
        <div class="d-flex align-items-center row">
            <label class="col-xl-4 col-lg-4 col-form-label text-dark-75 font-weight-bolder font-size-h5">Business Hours:</label>
            <div class="col-lg-8 col-xl-8 text-muted font-size-h5">
            {{ $business['hours'] }}
            </div>
        </div>
        <div class="d-flex align-items-center row">
            <label class="col-xl-4 col-lg-4 col-form-label text-dark-75 font-weight-bolder font-size-h5">Description:</label>
            <div class="col-lg-8 col-xl-8 text-muted font-size-h5">
            {{ $business['description'] }}
            </div>
        </div>
        <div class="d-flex align-items-center row">
            <label class="col-xl-4 col-lg-4 col-form-label text-dark-75 font-weight-bolder font-size-h5">Keywords:</label>
            <div class="col-lg-8 col-xl-8 text-muted font-size-h5">
            @php
                $keywords='';
                foreach($business['keywords'] as $keyword){
                    $keywords.=$keyword.', ';
                }
            @endphp
            {{ $keywords }}
            </div>
        </div>
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