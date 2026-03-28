{{-- Extends layout --}}
@extends('layouts.admin')

{{-- Style Section --}}
@section('styles')
<style>
    .table td,
    .table th {
        vertical-align: middle;
    }

    .alert-message {
        color: red;
        /*font-size: 0.75em;*/
    }
</style>
@endsection

{{-- Content --}}
@section('content')
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-2">
            <!--begin::Page Title-->
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{ $menu }}</h5>
            <!--end::Page Title-->
            <!--begin::Actions-->
            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
            <span class="text-muted font-weight-bold mr-4">{{ $submenu }}</span>
            <!--<a href="#" class="btn btn-light-warning font-weight-bolder btn-sm">Add New</a>-->
            <!--end::Actions-->
        </div>
        <!--end::Info-->
    </div>
</div>
<!--end::Subheader-->
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <div class="card card-custom">
            <!--begin::Card header-->
            <div class="card-header card-header-tabs-line nav-tabs-line-3x">
                <!--begin::Toolbar-->
                <div class="card-toolbar">
                    <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
                        <!--begin::Item-->
                        <li class="nav-item mr-3">
                            <a class="nav-link active" data-toggle="tab" href="#kt_details">
                                <span class="nav-icon">
                                    <span class="svg-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path d="M4.875,20.75 C4.63541667,20.75 4.39583333,20.6541667 4.20416667,20.4625 L2.2875,18.5458333 C1.90416667,18.1625 1.90416667,17.5875 2.2875,17.2041667 C2.67083333,16.8208333 3.29375,16.8208333 3.62916667,17.2041667 L4.875,18.45 L8.0375,15.2875 C8.42083333,14.9041667 8.99583333,14.9041667 9.37916667,15.2875 C9.7625,15.6708333 9.7625,16.2458333 9.37916667,16.6291667 L5.54583333,20.4625 C5.35416667,20.6541667 5.11458333,20.75 4.875,20.75 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path d="M2,11.8650466 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.23590829,11 3.04485894,11.3127315 2,11.8650466 Z M6,7 C5.44771525,7 5,7.44771525 5,8 C5,8.55228475 5.44771525,9 6,9 L15,9 C15.5522847,9 16,8.55228475 16,8 C16,7.44771525 15.5522847,7 15,7 L6,7 Z" fill="#000000" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="nav-text font-size-lg">Product Details</span>
                            </a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="nav-item mr-3">
                            <a class="nav-link" data-toggle="tab" href="#kt_images">
                                <span class="nav-icon">
                                    <span class="svg-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" fill="#000000" opacity="0.3"></path>
                                                <polygon fill="#000000" opacity="0.3" points="4 19 10 11 16 19"></polygon>
                                                <polygon fill="#000000" points="11 19 15 14 19 19"></polygon>
                                                <path d="M18,12 C18.8284271,12 19.5,11.3284271 19.5,10.5 C19.5,9.67157288 18.8284271,9 18,9 C17.1715729,9 16.5,9.67157288 16.5,10.5 C16.5,11.3284271 17.1715729,12 18,12 Z" fill="#000000" opacity="0.3"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="nav-text font-size-lg">Product Images</span>
                            </a>
                        </li>
                        <!--end::Item-->
                    </ul>
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body">
                <form class="form" id="kt_form" method="POST" action="{{ route('update-product') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $product['id'] }}">
                    <div class="tab-content">
                        <!--begin::Tab-->
                        <div class="tab-pane show px-7 active" id="kt_details" role="tabpanel">
                            <!--begin::Row-->
                            <div class="row d-flex justify-content-center">
                                <div class="col-xl-9 my-2">
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Name <span class="text-danger">*</span></label>
                                        <div class="col-lg-9 col-xl-9">
                                            <input class="form-control form-control-lg form-control-solid" name="name" type="text" value="{{ $product['name'] }}" />
                                            <div class="alert-message" id="nameError"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Price($) <span class="text-danger">*</span></label>
                                        <div class="col-lg-9 col-xl-9">
                                            <input class="form-control form-control-lg form-control-solid" name="price" type="number" value="{{ $product['price'] }}" />
                                            <div class="alert-message" id="priceError"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Inventory <span class="text-danger">*</span></label>
                                        <div class="col-lg-9 col-xl-9">
                                            <input class="form-control form-control-lg form-control-solid" name="inventory" type="number" value="{{ $product['inventory'] }}" />
                                            <div class="alert-message" id="inventoryError"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Short Description <span class="text-danger">*</span></label>
                                        <div class="col-lg-9 col-xl-9">
                                            <div class="input-group input-group-lg input-group-solid">
                                                <textarea class="form-control form-control-solid" name="short_description" rows="3"></textarea>
                                                <div class="alert-message" id="descriptionError"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Full Description</label>
                                        <div class="col-lg-9 col-xl-9">
                                            <div class="input-group input-group-lg input-group-solid">
                                                <textarea class="form-control form-control-solid" name="full_description" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Link</label>
                                        <div class="col-lg-9 col-xl-9">
                                            <input class="form-control form-control-lg form-control-solid" name="link" type="text" value="{{ $product['link'] }}" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Category <span class="text-danger">*</span></label>
                                        <div class="col-lg-9 col-xl-9">
                                            <select class="form-control form-control-solid" name="category_id" id="category_id">
                                                <option value="1" {{ $product['category_id']==1 ? 'selected' : '' }}>Pottery</option>
                                                <option value="2" {{ $product['category_id']==2 ? 'selected' : '' }}>Glass</option>
                                                <option value="3" {{ $product['category_id']==3 ? 'selected' : '' }}>Metals</option>
                                                <option value="4" {{ $product['category_id']==4 ? 'selected' : '' }}>Lighting</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Show in Sidebar</label>
                                        <div class="col-3">
                                            <span class="switch">
                                                <label>
                                                    <input type="checkbox" name="status" id="status" value="1" {{ $product['status']==2?'checked':'' }}>
                                                    <span></span>
                                                </label>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Sold Out</label>
                                        <div class="col-3">
                                            <span class="switch">
                                                <label>
                                                    <input type="checkbox" name="sold" id="sold" value="1" {{ $product['sold']==1?'checked':'' }}>
                                                    <span></span>
                                                </label>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Email Button</label>
                                        <div class="col-3">
                                            <span class="switch">
                                                <label>
                                                    <input type="checkbox" name="email_button" id="email_button" value="1" {{ $product['email_button']==1?'checked':'' }}>
                                                    <span></span>
                                                </label>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Etsy Button</label>
                                        <div class="col-3">
                                            <span class="switch">
                                                <label>
                                                    <input type="checkbox" name="etsy_button" id="etsy_button" value="1" {{ $product['etsy_button']==1?'checked':'' }}>
                                                    <span></span>
                                                </label>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Etsy Link</label>
                                        <div class="col-lg-9 col-xl-9">
                                            <input class="form-control form-control-lg form-control-solid" name="etsy_link" type="text" value="{{ $product['etsy_link'] }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Tab-->
                        <!--begin::Tab-->
                        <div class="tab-pane px-7" id="kt_images" role="tabpanel">
                            <!--begin::Row-->
                            <div class="row d-flex justify-content-center">
                                <input type="hidden" name="images" id="images">
                                <div class="col-xl-7">
                                    <div class="d-flex justify-content-end">
                                        <a href="#" class="btn btn-light-primary font-weight-bolder" id="btn_new_image">
                                            <span class="svg-icon svg-icon-md">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                        <rect fill="#000000" opacity="0.3" x="2" y="4" width="20" height="16" rx="2"></rect>
                                                        <polygon fill="#000000" opacity="0.3" points="4 20 10.5 11 17 20"></polygon>
                                                        <polygon fill="#000000" points="11 20 15.5 14 20 20"></polygon>
                                                        <circle fill="#000000" opacity="0.3" cx="18.5" cy="8.5" r="1.5"></circle>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>New Image</a>
                                    </div>
                                    <table class="table" id="table_images">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $idx=1;
                                            @endphp
                                            @foreach($product['images'] as $image)
                                            <tr id="row{{ $idx }}">
                                                <th scope="row">{{ $idx }}</th>
                                                <td>
                                                    <img src="{{ asset('uploads/products').'/'.$image }}" class="w-100px h-100px">
                                                </td>
                                                <td>
                                                    <a href="#" class="btn btn-sm btn-clean btn-icon delete-image" value="{{ $idx }}" title="Delete">
                                                        <span class="svg-icon svg-icon-md">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                    <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                                                                    <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </td>
                                            </tr>
                                            @php
                                            $idx++;
                                            @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @if(count($product['images'])==0)
                                    <div style="text-align: center;" id="no_images">No images</div>
                                    @endif
                                </div>
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Tab-->
                    </div>
                </form>
            </div>
            <!--begin::Card body-->
            <div class="card-footer d-flex justify-content-center">
                <a href="#" class="btn btn-primary font-weight-bold mr-3" id="btn_save">Save</a>
                <a href="{{ route('products') }}" class="btn btn-light-primary font-weight-bold" id="btn_save">Cancel</a>
            </div>
        </div>
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
<div class="modal fade" id="modal_new_image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" method="post" id="form_image">
                    {{ csrf_field() }}
                    <div class="form-group row d-dlex justify-content-center">
                        <div class="image-input image-input-outline image-input-empty" id="kt_image" style="background-image: url({{ asset('assets/media/no_image.jpg') }})">
                            <div class="image-input-wrapper" style="background-image: none;"></div>
                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change Image">
                                <i class="fa fa-pen icon-sm text-muted"></i>
                                <input type="file" id="file_image" name="image" accept=".png, .jpg, .jpeg">
                                <input type="hidden" name="image_remove" value="1">
                            </label>
                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="Cancel Image">
                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                            </span>
                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="" data-original-title="Remove Image">
                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                            </span>
                        </div>
                    </div>
                    <div class="alert-message" id="imageError" style="text-align: center;"></div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary font-weight-bold" id="btn_save_image">Upload</button>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- Scripts Section --}}
@section('scripts')
<script>
    var images = @json($product['images']);
    jQuery(document).ready(function() {
        var avatar = new KTImageInput('kt_image');
        $("textarea[name='short_description']").val("{{ $product['short_description'] }}");
        $("textarea[name='full_description']").val("{{ $product['full_description'] }}");

        $('#btn_new_image').on('click', function(e) {
            e.preventDefault();
            $('#file_image').val('');
            $('.image-input-wrapper').css('background-image', 'none');
            var url = "{{ asset('assets/media/no_image.jpg') }}";
            $('#kt_image').css('background-image', "url(" + url + ")");
            $('#modal_new_image').modal('show');
        });

        $('#btn_save_image').on('click', function(e) {
            e.preventDefault();
            var btn = KTUtil.getById("btn_save_image");
            KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "");

            var form = document.getElementById('form_image');
            var form_data = new FormData(form);

            $.ajax({
                url: "{{ route('upload-product-image') }}",
                type: "POST",
                data: form_data,
                processData: false,
                contentType: false,
                success: function(result) {
                    KTUtil.btnRelease(btn);
                    $('#form_image').trigger("reset");
                    $('#modal_new_image').modal('hide');

                    images.push(result.image);
                    console.log(images);
                    var html = '';
                    for (var i = 0; i < images.length; i++) {
                        html += '<tr id="row' + (i + 1) + '">\
                                <th scope="row">' + (i + 1) + '</th>\
                                <td>\
                                    <img src="' + HOST_URL + '/uploads/products/' + images[i] + '" class="w-100px h-100px">\
                                </td>\
                                <td>\
                                    <a href="#" class="btn btn-sm btn-clean btn-icon delete-image" value="' + (i + 1) + '" title="Delete">\
                                        <span class="svg-icon svg-icon-md">\
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                                    <rect x="0" y="0" width="24" height="24"></rect>\
                                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>\
                                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>\
                                                </g>\
                                            </svg>\
                                        </span>\
                                    </a>\
                                </td>\
                            </tr>';
                    }

                    $('#table_images tbody').html(html);
                    if (images.length == 0) {
                        $('#no_images').show();
                    } else {
                        $('#no_images').hide();
                    }
                },
                error: function(response) {
                    KTUtil.btnRelease(btn);
                    $('#imageError').text(response.responseJSON.errors.image);

                }

            });
        });

        $(document).on('click', '.delete-image', function(e) {
            e.preventDefault();
            console.log($(this).attr('value'));
            var idx = $(this).attr('value');
            $('#row' + idx).remove();
            images.splice(idx - 1, 1);
            if (images.length == 0) {
                $('#no_images').show();
            } else {
                $('#no_images').hide();
            }
        });

        $('#btn_save').on('click', function(e) {
            e.preventDefault();
            var btn = KTUtil.getById("btn_save");
            KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "");

            $('#images').val(JSON.stringify(images));
            $('#kt_form').submit();
        });
    });
</script>
@endsection