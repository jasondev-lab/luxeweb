{{-- Extends layout --}}
@extends('layouts.admin')

{{-- Style Section --}}
@section('styles')
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
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
        <!--begin::Card-->
        <div class="card card-custom">
            <!--begin::Header-->
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder font-size-h3 text-dark">My Products</span>
                </h3>
                <div class="card-toolbar">
                    <!--begin::Button-->
                    <a href="{{ route('new-product') }}" class="btn btn-primary font-weight-bolder" id="btn_new_product">
                    <span class="svg-icon svg-icon-md">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <circle fill="#000000" cx="9" cy="15" r="6" />
                                <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>New Product</a>
                    <!--end::Button-->
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-head-custom nowrap" id="kt_datatable">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Link</th>
                            <th>Category</th>
                            <th>Show In Sidebar</th>
                            <th>Etsy Button</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
                <!--end: Datatable-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
<!-- Delete Item Modal-->
<div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<form method="post" id="form_delete">
		{{ csrf_field() }}
		<input type="hidden" name="product_id" id="product_id" value="">    
		<div class="modal-dialog" role="document">
			<div class="modal-content bg-radial-gradient-primary">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">
						<span class="svg-icon svg-icon-light svg-icon-2x mr-2">
							<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Add-user.svg-->
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                    <path d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z" fill="#000000"></path>
                                </g>
                            </svg>
							<!--end::Svg Icon-->
						</span><span class="text-white">Delete Product</span></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i aria-hidden="true" class="ki ki-close text-white"></i>
					</button>
				</div>
				<div class="modal-body bg-white">
                    Do you really want to delete this product?
				</div>
				<div class="modal-footer bg-white">
					<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary font-weight-bold" id="btn_delete">Delete</button>
				</div>
			</div>
		</div>
	</form>
</div>
<!--end::Mdal-->
@endsection

{{-- Scripts Section --}}
@section('scripts')
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script>
jQuery(document).ready(function() {
    var datatable = $('#kt_datatable');
    datatable.DataTable({
        responsive: true,
        language: {
            paginate: {
                next: '<i class="ki ki-arrow-next"></i>', // or '>'
                previous: '<i class="ki ki-arrow-back"></i>' // or '<' 
                }
        },
        "dom": 'rt<"d-flex justify-content-between"lpi>',			
        ajax: {
            url: HOST_URL+'/admin/get-products',
            type: 'GET',
            data: {
					// parameters for custom backend script demo
					columnsDef: [
						'image',
                        'name',
						'price',
                        'link',
                        'category',
                        'status',
                        'etsy_button',
						'id'
                    ],
				}
        },
        columns: [
            {data: 'image'},
            {data: 'name'},
            {data: 'price', render: $.fn.dataTable.render.number( ',', '.', 2, '$' )},
            {data: 'link'},
            {data: 'category'},
            {data: 'status'},
            {data: 'etsy_button'},
            {data: 'id', responsivePriority: -1},
        ],
        order: [[7, "desc" ]],
        columnDefs: [
            {
                targets: 0,
                orderable: false,
                render: function(data, type, full, meta) {
                    var url='';
                    if(data=='') url="{{ asset('assets/media/no_image.jpg') }}";
                    else url= "{{ asset('uploads/products') }}" + '/' + data;
                    return '<div class="d-flex align-items-center">\
                                <div class="symbol symbol-40 symbol-sm flex-shrink-0">\
                                    <img class="img-item" src="'+ url +'" alt="photo">\
                                </div>\
                            </div>';
                },
            },
            {
                targets: 4,
                orderable: false,
                render: function(data, type, full, meta) {
                    var html='<span class="label label-lg font-weight-bold  label-light-primary label-inline">'+data+'</span>';                    
                    return html;
                },
            },
            {
                targets: 5,
                orderable: false,
                render: function(data, type, full, meta) {
                    var html='';
                    if(data==2) html='<span class="label label-lg font-weight-bold  label-light-success label-inline">Show</span>';                    
                    return html;
                },
            },
            {
                targets: 6,
                orderable: false,
                render: function(data, type, full, meta) {
                    var html='';
                    if(data==1) html='<span class="label label-lg font-weight-bold  label-light-success label-inline">Show</span>';                    
                    return html;
                },
            },
            {
                targets: -1,
                title: 'Actions',
                orderable: false,
                render: function(data, type, full, meta) {
                    return '\
                        <a href="'+HOST_URL+'/admin/edit-product/'+data+'" class="btn btn-sm btn-clean btn-icon" title="Edit details" id="'+data+'">\
                            <i class="la la-edit"></i>\
                        </a>\
                        <a href="#" class="btn btn-sm btn-clean btn-icon delete-product" title="Delete" data-toggle="modal" data-target="modal_delete" id="'+data+'">\
                            <i class="la la-trash"></i>\
                        </a>\
                    ';
                },
            }
        ],
    });

    $(document).on("click", ".delete-product", function() {
		$("#modal_delete").modal();
		var product_id=$(this).attr("id");
		$("#product_id").val(product_id);
	});

    $("#btn_delete").on("click", function(e) {
		e.preventDefault();

		var btnDelete = KTUtil.getById("btn_delete");
		KTUtil.btnWait(btnDelete, "spinner spinner-right spinner-white pr-15", "");

        var form = document.getElementById('form_delete');
		var form_data = new FormData(form);
		$.ajax({
            url:"{{ route('delete-product') }}",
            type: "POST",
            data: form_data,
            processData: false,
            contentType: false,
            success: function(result){
				KTUtil.btnRelease(btnDelete);
				$('#modal_delete').modal('hide');
				var datatable = $('#kt_datatable').DataTable();
				datatable.ajax.reload();

				content.message = 'Your acrion is success!';
				showMessage('success', content);
 			},
			error: function (response) {
				KTUtil.btnRelease(btnDelete);
                content.message = 'Your acrion is failed!';
				showMessage('danger', content);
			}
			
        });
	});
});
</script>
@endsection