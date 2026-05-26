{{-- Extends layout --}}
@extends('layouts.front')

{{-- Style Section --}}
@section('styles')
<style>
    .policies-page {
        width: 1270px;
        margin: 0 auto;
        border-left: 1px solid #9a9a9a;
        padding: 18px 20px 24px;
        margin-top: 20px;
        box-sizing: border-box;
    }
    .policies-custom-title {
        margin: 0 0 20px;
        /* font-size: 32px; */
        line-height: 1.1;
        font-weight: 500;
        color: #111111;
        text-transform: none;
    }
    .policies-block {
        margin-bottom: 0;
    }
    .policies-block + .policies-block {
        margin-top: 18px;
    }
    .policies-block p {
        margin: 0 0 12px;
        line-height: 1.6;
    }
    .policies-block p:last-child {
        margin-bottom: 0;
    }
    @media (max-width: 1200px) {
        .policies-page {
            padding: 14px 14px 18px;
            width: 100%;
        }
    }
</style>
@endsection

{{-- Content --}}
@section('content')
<section class="policies-page">
    <h1 class="policies-custom-title">{{ data_get($description, 'meta_value.title', 'About') }}</h1>
    <div class="policies-block custom-description">
        {!! data_get($description, 'meta_value.block1', '') !!}
    </div>
    <div class="policies-block custom-description">
        {!! data_get($description, 'meta_value.block2', '') !!}
    </div>
</section>
@endsection

{{-- Scripts Section --}}
@section('scripts')

@endsection
