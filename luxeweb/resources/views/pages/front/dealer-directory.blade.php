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
<div class="row mb-10">
    <div class="col-lg-12 col-xl-4">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <span class="svg-icon svg-icon-lg">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"></rect>
                                <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"></path>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                </span>
            </div>
            <input type="text" class="form-control py-4 h-auto custom-text" id="search" name="search" placeholder="Search..." value="{{ isset($keyword)?$keyword:'' }}">
        </div>
    </div>
    <div class="col-lg-12 col-xl-4"></div>
    <div class="col-lg-12 col-xl-4">
        <select class="form-control custom-text" id="state" name="state">
            <option value="">Select a state</option>
            <option value="Alabama">Alabama</option>
            <option value="Alaska">Alaska</option>            
            <option value="Arizona">Arizona</option>
            <option value="Arkansas">Arkansas</option>
            <option value="California">California</option>
            <option value="Colorado">Colorado</option>            
            <option value="Connecticut">Connecticut</option>
            <option value="Delaware">Delaware</option>
            <option value="Florida">Florida</option>
            <option value="Georgia">Georgia</option>
            <option value="Hawaii">Hawaii</option>
            <option value="Idaho">Idaho</option>
            <option value="Illinois">Illinois</option>
            <option value="Indiana">Indiana</option>
            <option value="Iowa">Iowa</option>            
            <option value="Kansas">Kansas</option>
            <option value="Kentucky">Kentucky</option>
            <option value="Louisiana">Louisiana</option>
            <option value="Maine">Maine</option>
            <option value="Maryland">Maryland</option>
            <option value="Massachusetts">Massachusetts</option>
            <option value="Michigan">Michigan</option>
            <option value="Minnesota">Minnesota</option>
            <option value="Mississippi">Mississippi</option>
            <option value="Missouri">Missouri</option>
            <option value="Montana">Oklahoma</option>
            <option value="Nebraska">South Dakota</option>
            <option value="Nevada">Texas</option>
            <option value="New Hampshire">Tennessee</option>
            <option value="New Jersey">Wisconsin</option>            
            <option value="New Mexico">New Mexico</option>
            <option value="New York">New York</option>
            <option value="North Carolina">North Carolina</option>
            <option value="North Dakota">North Dakota</option>
            <option value="Ohio">Ohio</option>
            <option value="Oklahoma">Oklahoma</option>
            <option value="Oregon">Oregon</option>
            <option value="Pennsylvania">Pennsylvania</option>
            <option value="Rhode Island">Rhode Island</option>
            <option value="South Carolina">South Carolina</option>
            <option value="South Dakota">South Dakota</option>
            <option value="Tennessee">Tennessee</option>
            <option value="Texas">Texas</option>
            <option value="Utah">Utah</option>
            <option value="Vermont">Vermont</option>
            <option value="Virginia">Virginia</option>
            <option value="Washington">Washington</option>
            <option value="West Virginia">West Virginia</option>
            <option value="Wisconsin">Wisconsin</option>
            <option value="Wyoming">Wyoming</option>
        </select>
    </div>
</div>
<div class="row">
    @if(isset($businesses))
    @foreach($businesses as $business)
    @php
        $images=json_decode($business->images, true);
        if(count($images)==0) $img_url=asset('assets/media/no_image.jpg');
        else $img_url=asset('uploads/businesses').'/'.$images[0];
    @endphp
    <!--begin::Product-->
    <div class="col-md-3 col-lg-12 col-xxl-3">
        <div class="card card-custom gutter-b card-stretch">
            <div class="card-body d-flex flex-column rounded custom-background justify-content-between">
                <div class="text-center rounded mb-7">
                    <a href="{{ url('dealer-directory/'.$business->id) }}"><img src="{{ $img_url }}" class="mw-100 w-200px"></a>
                </div>
                <div class="text-center">
                    <h4 class="font-size-h5">
                        <a href="{{ url('dealer-directory/'.$business->id) }}" class="text-dark-75 font-weight-bolder">{{ $business->name }}</a>
                    </h4>
                    <div class="font-size-h6 text-muted font-weight-bolder">{{ $business->state }}</div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Product-->
    @endforeach
    @endif    
</div>
@if(!isset($businesses) || count($businesses)==0)
<div class="text-center">
    No matching dealers found.
</div>
@endif
@endsection

{{-- Scripts Section --}}
@section('scripts')
<script type="text/javascript">
var state='';
var keyword='';
jQuery(document).ready(function() {
    /*$('#state').select2({
        placeholder: 'Select a state'
    });*/

    state="{{ $state }}";
    $('#state').val(state).trigger('change');

    $('#state').on('change', function(){
        var url="{{ route('dealer-directory') }}"+"?state="+$(this).val();
        location.href=url;
    });

    keyword="{{ $keyword }}"
    $('#search').keypress(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
            keyword=$(this).val();
            var url="{{ route('dealer-directory') }}"+"?state="+state+'&keyword='+keyword;
            location.href=url;  
        }
    });
});
</script>
@endsection