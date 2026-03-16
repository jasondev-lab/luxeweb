{{-- Extends layout --}}
@extends('layouts.front')

{{-- Style Section --}}
@section('styles')

@endsection

{{-- Content --}}
@section('content')
<div class="d-flex align-items-baseline mb-10">
    <h1 class="custom-title">{{ $description['meta_value']['title'] }}</h1>
</div>
<div class="row d-flex justify-content-center">
    <div class="col-lg-9">
        <!--begin::Card-->
        <div class="card mb-8">
            <div class="card-body custom-background">
                <div class="p-4">
                    <!--begin::Content-->
                    <div class="custom-description">
                        {!! $description['meta_value']['block1'] !!}
                    </div>
                    <!--end::Content-->
                </div>
            </div>
        </div>
        <!--begin::Card-->
    </div>    
</div>
<div class="row d-flex justify-content-center">
    <div class="col-lg-9">
        <!--begin::Card-->
        <div class="card mb-8">
            <div class="card-body custom-background">
                <div class="p-4">
                    <!--begin::Content-->
                    <div class="custom-description">
                    {!! $description['meta_value']['block2'] !!}
                    </div>
                    <!--end::Content-->
                </div>
            </div>
        </div>
        <!--end::Card-->
    </div>
</div>
<div class="row d-flex justify-content-center">
    <div class="col-lg-9">
        <!--begin::Card-->
        <div class="card mb-8">
            <div class="card-body custom-background">
                <div class="p-4">
                    <!--begin::Content-->
                    <div class="custom-description">
                    {!! $description['meta_value']['block3'] !!}
                    </div>
                    <!--end::Content-->
                </div>
            </div>
        </div>
        <!--end::Card-->
    </div>
</div>

@endsection

{{-- Scripts Section --}}
@section('scripts')

@endsection