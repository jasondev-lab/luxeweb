{{-- Extends layout --}}
@extends('layouts.front')

{{-- Style Section --}}
@section('styles')
<style>
.border-b {
    border-bottom: 1px solid #d3e2f9;
}

.border-r {
    border-right: 1px solid #d3e2f9;
}
</style>
@endsection

{{-- Content --}}
@section('content')
<div class="d-flex align-items-baseline mb-10">
    <h1 class="custom-title">{{ $description['meta_value']['title'] }}</h1>
</div>
<div class="row p-5">
    @php
        $pos='';
    @endphp
    @foreach($links as $link)
    @php
        $pos = $pos=='left' ? 'right' : 'left';
    @endphp
    <div class="col-md-6 col-lg-12 col-xxl-6 py-5 {{ $pos=='left' ? 'border-b border-r' : 'border-b' }}">
        <a href="{{ $link['link'] }}" target="_blank" class="text-info text-hover-primary font-weight-bold font-size-h5 mb-2" style="text-decoration: underline;">
            {{ $link['title'] }}
        </a>
        <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5">
            {{ $link['description'] }}
        </div>
        @if(!empty($link['ebay_link']))
        <a href="{{ $link['ebay_link'] }}" target="_blank">
            <img alt="Logo" src="{{ asset('assets/media/logos/ebay-logo.png') }}" height="25">            
        </a>
        @endif
    </div>
    @endforeach
</div>

<!--<div class="d-flex justify-content-center align-items-center flex-wrap mt-10">
    <div class="d-flex flex-wrap py-2">
        <a href="#" class="btn btn-icon btn-circle btn-lg btn-light-primary mr-2 my-1">
            <i class="ki ki-bold-double-arrow-back icon-xs"></i>
        </a>
        <a href="#" class="btn btn-icon btn-circle btn-lg btn-light-primary mr-2 my-1">
            <i class="ki ki-bold-arrow-back icon-xs"></i>
        </a>
        <a href="#" class="btn btn-icon btn-circle btn-lg border-0 btn-hover-primary mr-2 my-1">...</a>
        <a href="#" class="btn btn-icon btn-circle btn-lg border-0 btn-hover-primary mr-2 my-1">23</a>
        <a href="#" class="btn btn-icon btn-circle btn-lg border-0 btn-hover-primary active mr-2 my-1">24</a>
        <a href="#" class="btn btn-icon btn-circle btn-lg border-0 btn-hover-primary mr-2 my-1">25</a>
        <a href="#" class="btn btn-icon btn-circle btn-lg border-0 btn-hover-primary mr-2 my-1">26</a>
        <a href="#" class="btn btn-icon btn-circle btn-lg border-0 btn-hover-primary mr-2 my-1">27</a>
        <a href="#" class="btn btn-icon btn-circle btn-lg border-0 btn-hover-primary mr-2 my-1">28</a>
        <a href="#" class="btn btn-icon btn-circle btn-lg border-0 btn-hover-primary mr-2 my-1">...</a>
        <a href="#" class="btn btn-icon btn-circle btn-lg btn-light-primary mr-2 my-1">
            <i class="ki ki-bold-arrow-next icon-xs"></i>
        </a>
        <a href="#" class="btn btn-icon btn-circle btn-lg btn-light-primary mr-2 my-1">
            <i class="ki ki-bold-double-arrow-next icon-xs"></i>
        </a>
    </div>															
</div>-->
@endsection

{{-- Scripts Section --}}
@section('scripts')
<script>
jQuery(document).ready(function() {
    
});
</script>
@endsection