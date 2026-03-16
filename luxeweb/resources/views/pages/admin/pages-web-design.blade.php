{{-- Extends layout --}}
@extends('layouts.admin')

{{-- Style Section --}}
@section('styles')
<style>
.table td, .table th {
    vertical-align: middle;
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
                            <a class="nav-link active" data-toggle="tab" href="#kt_description">
                                <span class="nav-icon">
                                    <span class="svg-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path d="M3,19 L5,19 L5,21 L3,21 L3,19 Z M8,19 L10,19 L10,21 L8,21 L8,19 Z M13,19 L15,19 L15,21 L13,21 L13,19 Z M18,19 L20,19 L20,21 L18,21 L18,19 Z" fill="#000000" opacity="0.3"></path>
                                                <path d="M10.504,3.256 L12.466,3.256 L17.956,16 L15.364,16 L14.176,13.084 L8.65000004,13.084 L7.49800004,16 L4.96000004,16 L10.504,3.256 Z M13.384,11.14 L11.422,5.956 L9.42400004,11.14 L13.384,11.14 Z" fill="#000000"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="nav-text font-size-lg">Description</span>
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
                                <span class="nav-text font-size-lg">Images</span>
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
                <form class="form" id="kt_form">
                    <div class="tab-content">
                        <!--begin::Tab-->
                        <div class="tab-pane show px-7 active" id="kt_description" role="tabpanel">
                            <!--begin::Row-->
                            <div class="row d-flex justify-content-center">
                                <div class="col-xl-9 my-2">
                                    <!--begin::Group-->
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Title</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="title" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Description</label>
                                        <div class="col-9">
                                            <div class="summernote" id="kt_summernote"></div>
                                        </div>
                                    </div>
                                    <!--end::Group-->                                    
                                </div>
                            </div>
                            <!--end::Row-->
                            <div class="separator separator-solid"></div>
                            <div class="row d-flex justify-content-center py-5">
                                <a href="#" class="btn btn-primary font-weight-bold px-10" id="btn_save_description">Save</a>
                            </div>
                        </div>
                        <!--end::Tab-->
                        <!--begin::Tab-->
                        <div class="tab-pane px-7" id="kt_images" role="tabpanel">
                            <!--begin::Row-->
                            <div class="row d-flex justify-content-center">
                                <div class="col-xl-12">
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
                                                <th scope="col">Link</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($result['images'] as $image)
                                            <tr>
                                                <th scope="row">{{ $image['id'] }}</th>
                                                <td>
                                                    <img src="{{ asset('uploads/home').'/'.$image['name'] }}" class="w-100px h-100px">
                                                </td>
                                                <td>{{ isset($image['link']) ? $image['link'] : '' }}</td>
                                                <td>
                                                    <a href="#" class="btn btn-sm btn-clean btn-icon web-design-image" value="{{ $image['id'] }}" title="Delete">
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
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @if(count($result['images'])==0)
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
                    <input type="hidden" name="meta_key" id="meta_key" value="web-design-images">
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
                    <div class="form-group row">
                        <label class="col-xl-2 col-lg-2 col-form-label">Link</label>
                        <div class="col-10">
                            <input type="text" class="form-control" id="link" name="link" value="">
                        </div>
                    </div>
                    <div class="alert-message" id="imageError" style="text-align: center;"></div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary font-weight-bold" id="btn_save_image">Save</button>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- Scripts Section --}}
@section('scripts')
<script>
var result=@json($result);
jQuery(document).ready(function() {
    $('.summernote').summernote({
        height: 400,
        tabsize: 2
    });

    var avatar = new KTImageInput('kt_image');

    $('#title').val(result.description.title);
    $('#kt_summernote').summernote('code', result.description.block1);

    $('#btn_save_description').on('click', function(e){
        e.preventDefault();
        var btn = KTUtil.getById("btn_save_description");
		KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "");
        $.ajax({
            url:"{{ route('save-description') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                meta_key: 'web-design-description',
                meta_value: JSON.stringify({ title:$('#title').val(), block1:$('#kt_summernote').summernote('code') })
            },
            dataType: 'json',
            success: function(result){
				KTUtil.btnRelease(btn);				
                content.message = 'Your action is success!';
				showMessage('success', content);
 			},
			error: function (response) {
				KTUtil.btnRelease(btn);	
                content.message = 'Your action is failed!';
				showMessage('danger', content);		
			}			
        });
    });

    $('#btn_new_image').on('click', function(e){
        e.preventDefault();
        $('#file_image').val('');
		$('.image-input-wrapper').css('background-image', 'none');
		var url="{{ asset('assets/media/no_image.jpg') }}";
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
            url:"{{ route('save-image') }}",
            type: "POST",
            data: form_data,
            processData: false,
            contentType: false,
            success: function(result){
				KTUtil.btnRelease(btn);
                $('#form_image').trigger("reset");
				$('#modal_new_image').modal('hide');
                
                var images=result.images;
                var html='';
                for(var img of images){
                    html+='<tr>\
                                <th scope="row">'+img.id+'</th>\
                                <td>\
                                    <img src="'+HOST_URL+'/uploads/home/'+img.name+'" class="w-100px h-100px">\
                                </td>\
                                <td>'+img.link+'</td>\
                                <td>\
                                    <a href="#" class="btn btn-sm btn-clean btn-icon web-design-image" value="'+img.id+'" title="Delete">\
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
                if(images.length==0) $('#no_images').show();
                else $('#no_images').hide(); 
				
				content.message = 'Your action is success!';
				showMessage('success', content);
 			},
			error: function (response) {
				KTUtil.btnRelease(btn);
                $('#imageError').text(response.responseJSON.errors.image);
				content.message = 'Your action is failed!';
				showMessage('danger', content);
			}
			
        });
	});

    $(document).on('click', '.web-design-image', function(e){
        e.preventDefault();
        $.ajax({
            url:"{{ route('delete-image') }}",
            type: "GET",
            data: {
                meta_key: 'web-design-images',
                id: $(this).attr('value')
            },
            dataType: 'json',
            success: function(result){
				content.message = 'Your action is success!';
				showMessage('success', content);

                var images=result.images;
                var html='';
                for(var img of images){
                    html+='<tr>\
                                <th scope="row">'+img.id+'</th>\
                                <td>\
                                    <img src="'+HOST_URL+'/uploads/home/'+img.name+'" class="w-100px h-100px">\
                                </td>\
                                <td>'+img.link+'</td>\
                                <td>\
                                    <a href="#" class="btn btn-sm btn-clean btn-icon web-design-image" value="'+img.id+'" title="Delete">\
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
                if(images.length==0) $('#no_images').show();
                else $('#no_images').hide();
 			},
			error: function (response) {
				content.message = 'Your action is failed!';
				showMessage('danger', content);		
			}			
        });
    });
    
});
</script>
@endsection