{{-- Extends layout --}}
@extends('layouts.admin')

{{-- Style Section --}}
@section('styles')
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
<style>
.images-preview-div img {
    padding: 10px;
    max-width: 160px;
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
            <!--begin::Header-->
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder font-size-h3 text-dark">Customer Emails</span>
                </h3>
                <div class="card-toolbar">
                    <!--begin::Button-->
                    <a href="#" class="btn btn-primary font-weight-bolder mr-2" id="btn_new">
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
                    </span>Add Email Address</a>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <a href="#" class="btn btn-light-primary font-weight-bolder" id="btn_send_emails">
                    <span class="svg-icon svg-icon-md">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000"/>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>Send Emails</a>
                    <!--end::Button-->
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-head-custom table-checkable" id="kt_datatable">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
                <!--end: Datatable-->
            </div>
            <!--end::Body-->
        </div>
    </div>
    <!--end::Container-->
</div>

<!-- Add/Edit Modal -->
<div class="modal fade" id="modal_address" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content bg-radial-gradient-primary">
			<div class="modal-header">
				<h5 class="modal-title">
					<span class="svg-icon svg-icon-light svg-icon-2x mr-2">
						<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Add-user.svg-->
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"></rect>
                                <path d="M6,2 L18,2 C19.6568542,2 21,3.34314575 21,5 L21,19 C21,20.6568542 19.6568542,22 18,22 L6,22 C4.34314575,22 3,20.6568542 3,19 L3,5 C3,3.34314575 4.34314575,2 6,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z" fill="#000000"></path>
                            </g>
                        </svg>
						<!--end::Svg Icon-->
					</span>
					<span id="modal_title" class="text-white">New Email Address</span>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i aria-hidden="true" class="ki ki-close text-white"></i>
				</button>
			</div>
			<div class="modal-body bg-white">
				<form method="post" class="form pt-9" id="form_address">
					{{ csrf_field() }}
					<input type="hidden" name="method" id="method" value="add">
					<input type="hidden" name="email_id" id="email_id">
					<div class="row">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Email <span class="text-danger">*</span></label>
                                <div class="col-lg-9 col-xl-9">
                                    <input class="form-control form-control-lg form-control-solid" name="email" id="email" type="email" value="" />
                                    <div class="alert-message" id="emailError"></div>
                                </div>
                            </div>
                        </div>						
					</div>
				</form>
			</div>
			<div class="modal-footer bg-white">
				<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cancel</button>
				<button type="button" id="btn_save" class="btn btn-primary font-weight-bold">Submit</button>
			</div>
		</div>
	</div>
</div>
<!--end::Modal-->

<!-- Delete Modal-->
<div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<form method="post" id="form_delete">
		{{ csrf_field() }}
		<input type="hidden" name="delete_id" id="delete_id" value="">    
		<div class="modal-dialog" role="document">
			<div class="modal-content bg-radial-gradient-primary">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">
						<span class="svg-icon svg-icon-light svg-icon-2x mr-2">
							<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Add-user.svg-->
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path d="M6,2 L18,2 C19.6568542,2 21,3.34314575 21,5 L21,19 C21,20.6568542 19.6568542,22 18,22 L6,22 C4.34314575,22 3,20.6568542 3,19 L3,5 C3,3.34314575 4.34314575,2 6,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z" fill="#000000"></path>
                                </g>
                            </svg>
							<!--end::Svg Icon-->
						</span><span class="text-white">Delete Email Address</span></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i aria-hidden="true" class="ki ki-close text-white"></i>
					</button>
				</div>
				<div class="modal-body bg-white">
                    Do you really want to delete this email address?
				</div>
				<div class="modal-footer bg-white">
					<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary font-weight-bold" id="btn_delete">Delete</button>
				</div>
			</div>
		</div>
	</form>
</div>
<!--end::Modal-->

<div class="modal fade" id="modal_email" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content bg-radial-gradient-primary">
			<div class="modal-header">
				<h5 class="modal-title">
					<span class="svg-icon svg-icon-light svg-icon-2x mr-2">
						<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Add-user.svg-->
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"></rect>
                                <path d="M3,13.5 L19,12 L3,10.5 L3,3.7732928 C3,3.70255344 3.01501031,3.63261921 3.04403925,3.56811047 C3.15735832,3.3162903 3.45336217,3.20401298 3.70518234,3.31733205 L21.9867539,11.5440392 C22.098181,11.5941815 22.1873901,11.6833905 22.2375323,11.7948177 C22.3508514,12.0466378 22.2385741,12.3426417 21.9867539,12.4559608 L3.70518234,20.6826679 C3.64067359,20.7116969 3.57073936,20.7267072 3.5,20.7267072 C3.22385763,20.7267072 3,20.5028496 3,20.2267072 L3,13.5 Z" fill="#000000"></path>
                            </g>
                        </svg>
						<!--end::Svg Icon-->
					</span>
					<span class="text-white">Send Email</span>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i aria-hidden="true" class="ki ki-close text-white"></i>
				</button>
			</div>
			<div class="modal-body bg-white">
				<form method="post" class="form pt-9" id="form_email" enctype="multipart/form-data">
					{{ csrf_field() }}
					<input type="hidden" name="emails" id="emails">
					<div class="row">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Subject <span class="text-danger">*</span></label>
                                <div class="col-xl-9 col-lg-9">
                                    <input type="text" class="form-control" placeholder="Enter subject" name="subject" />
                                    <div class="alert-message" id="subjectError"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Title <span class="text-danger">*</span></label>
                                <div class="col-xl-9 col-lg-9">
                                    <input type="text" class="form-control" placeholder="Enter title" name="title" />
                                    <div class="alert-message" id="titleError"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Message <span class="text-danger">*</span></label>
                                <div class="col-xl-9 col-lg-9">
                                    <textarea class="form-control" rows="10" placeholder="Please enter your message" name="message"></textarea>
                                    <div class="alert-message" id="messageError"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Images</label>
                                <div class="col-lg-9 col-xl-9">
                                    <div class="form-group">
                                        <input type="file" name="images[]" id="images" placeholder="Choose images" multiple >
                                    </div>
                                    <div class="form-group">
                                        <div class="images-preview-div"></div>
                                    </div>
                                </div>
                            </div>
                        </div>						
					</div>
				</form>
			</div>
			<div class="modal-footer bg-white">
				<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cancel</button>
				<button type="button" id="btn_send_email" class="btn btn-primary font-weight-bold">Submit</button>
			</div>
		</div>
	</div>
</div>

<!--end::Entry-->
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
                url: HOST_URL+'/admin/get-emails',
                type: 'GET',
                data: {
                        // parameters for custom backend script demo
                        columnsDef: [
                            'id',
                            'email',
                            'id'
                        ],
                    }
            },
            columns: [
                {data: 'id'},
                {data: 'email'},
                {data: 'id', responsivePriority: -1},
            ],
            order: [[2, "desc" ]],
            headerCallback: function(thead, data, start, end, display) {
				thead.getElementsByTagName('th')[0].innerHTML = `
                    <label class="checkbox checkbox-single">
                        <input type="checkbox" value="" class="group-checkable"/>
                        <span></span>
                    </label>`;
			},
            columnDefs: [
                {
					targets: 0,
					width: '50px',
					className: 'dt-left',
					orderable: false,
					render: function(data, type, full, meta) {
						return `
                        <label class="checkbox checkbox-single">
                            <input type="checkbox" value="${full.email}" class="checkable" name="send_email"/>
                            <span></span>
                        </label>`;
					},
				},
                {
                    targets: -1,
                    width: '120px',
                    title: 'Actions',
                    orderable: false,
                    render: function(data, type, full, meta) {
                        return '\
                            <a href="#" class="btn btn-sm btn-clean btn-icon send" title="Send" data-toggle="modal" data-target="modal_email" id="'+data+'" data-email="'+full.email+'">\
                                <i class="la la-envelope"></i>\
                            </a>\
                            <a href="#" class="btn btn-sm btn-clean btn-icon edit" title="Edit" id="'+data+'">\
                                <i class="la la-edit"></i>\
                            </a>\
                            <a href="#" class="btn btn-sm btn-clean btn-icon delete" title="Delete" data-toggle="modal" data-target="modal_delete" id="'+data+'">\
                                <i class="la la-trash"></i>\
                            </a>\
                        ';
                    },
                }
            ],
        });

        datatable.on('change', '.group-checkable', function() {
			var set = $(this).closest('table').find('td:first-child .checkable');
			var checked = $(this).is(':checked');

			$(set).each(function() {
				if (checked) {
					$(this).prop('checked', true);
					$(this).closest('tr').addClass('active');
				}
				else {
					$(this).prop('checked', false);
					$(this).closest('tr').removeClass('active');
				}
			});
		});

		datatable.on('change', 'tbody tr .checkbox', function() {
			$(this).parents('tr').toggleClass('active');
		});
    
        $('#btn_new').on('click', function(e){
            e.preventDefault();
            $('#form_address').trigger("reset");
            $('#modal_title').text('Add Email Address');
            $('.alert-message').text('');
            $('#email_id').val(0);
            $('#modal_address').modal();
        });
    
        $('#btn_save').on('click', function(e) {
            e.preventDefault();
    
            var btn = KTUtil.getById("btn_save");
            KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "");
    
            var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            if (!$('#email').val().match(validRegex)) {
                content.message = 'Invalid email address!';
                showMessage('danger', content);
                KTUtil.btnRelease(btn);
                return;
            }
            
            $.ajax({
                url:"{{ route('save-email') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    customer_email: $('#email').val(),
                    id: $('#email_id').val()
                },
                dataType: 'json',
                success: function(result){
                    KTUtil.btnRelease(btn);
                    $('#modal_address').modal('hide');
                    var datatable = $('#kt_datatable').DataTable();
                    datatable.ajax.reload();
    
                    content.message = 'Your action is success!';
                    showMessage('success', content);
                 },
                error: function (response) {
                    KTUtil.btnRelease(btn);
                    $('#emailError').text(response.responseJSON.errors.email);
                }
                
            });
        });
    
        $(document).on("click", ".edit", function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('get-email') }}",
                type: "GET",
                data: {
                    id: $(this).attr("id"),
                 },
                dataType: 'json',
                success: function(result){
                    $('#modal_address').modal();
                    $('#method').val('edit');
                    $('#email_id').val(result.id);
                    $('#modal_title').text('Edit Email Address');
                    $('#email').val(result.email);										
                }
            });
        });    
    
        $(document).on("click", ".delete", function() {
            $("#modal_delete").modal();
            $("#delete_id").val($(this).attr("id"));
        });
    
        $("#btn_delete").on("click", function(e) {
            e.preventDefault();
    
            var btnDelete = KTUtil.getById("btn_delete");
            KTUtil.btnWait(btnDelete, "spinner spinner-right spinner-white pr-15", "");
    
            var form = document.getElementById('form_delete');
            var form_data = new FormData(form);
            $.ajax({
                url:"{{ route('delete-email') }}",
                type: "POST",
                data: form_data,
                processData: false,
                contentType: false,
                success: function(result){
                    KTUtil.btnRelease(btnDelete);
                    $('#modal_delete').modal('hide');
                    var datatable = $('#kt_datatable').DataTable();
                    datatable.ajax.reload();
    
                    content.message = 'Your action is success!';
                    showMessage('success', content);
                 },
                error: function (response) {
                    KTUtil.btnRelease(btnDelete);
                    content.message = 'Your action is failed!';
                    showMessage('danger', content);
                }
                
            });
        });

        $(document).on("click", ".send", function() {
            $('#form_email').trigger("reset");
            $('.images-preview-div').empty();
            $('.alert-message').text('');

            let emails=[];
            emails.push($(this).attr("data-email"));
            $("#emails").val(JSON.stringify(emails));
            $("#modal_email").modal();
        });

        $("#btn_send_emails").on("click", function(e) {
            $('#form_email').trigger("reset");
            $('.images-preview-div').empty();
            $('.alert-message').text('');

            let emails=[];
            $('input[name="send_email"]:checked').each(function() {
                emails.push(this.value);
            });
            $("#emails").val(JSON.stringify(emails));
            $("#modal_email").modal();
        });

        var previewImages = function(input, imgPreviewPlaceholder) {
            if (input.files) {
                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };

        $('#images').on('change', function() {
            previewImages(this, 'div.images-preview-div');
        });

        $('#btn_send_email').on('click', function(e) {
            e.preventDefault();

            var btn = KTUtil.getById("btn_send_email");
            KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "");

            var form = document.getElementById('form_email');
            var form_data = new FormData(form);

            form_data.set('emails', $("#emails").val());

            $.ajax({
                url:"{{ route('send-email') }}",
                type: "POST",
                data: form_data,
                processData: false,
                contentType: false,
                success: function(result){
                    KTUtil.btnRelease(btn);
                    $('#modal_email').modal('hide');

                    content.message = 'Your action is success!';
                    showMessage('success', content);
                },
                error: function (response) {
                    KTUtil.btnRelease(btn);
                    $('#subjectError').text(response.responseJSON.errors.subject);
                    $('#titleError').text(response.responseJSON.errors.title);
                    $('#messageError').text(response.responseJSON.errors.message);				
                }
                
            });
        });
    });
    </script>
@endsection