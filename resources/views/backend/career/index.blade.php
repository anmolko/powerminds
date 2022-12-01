@extends('backend.layouts.master')
@section('title', "Career")
@section('css')
    <link rel="stylesheet" href="{{asset('assets/backend/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/custom_css/datatable_style.css')}}">
    <link href="{{asset('assets/backend/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"> Career</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Job</a></li>
                                <li class="breadcrumb-item active">Career</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-5">
                    {!! Form::open(['route' => 'career.store','method'=>'post','class'=>'needs-validation','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
                    <div class="card">

                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label> Title <span class="text-muted text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" required>
                                <div class="invalid-feedback">
                                    Please enter the career title.
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Type <span class="text-muted text-danger">*</span></label>
                                <select class="form-control shadow-none" name="type" required>
                                    <option value disabled selected> Select Career Type</option>
                                    <option value="full_time"> Full Time </option>
                                    <option value="part_time"> Part Time </option>
                                </select>
                                <div class="invalid-feedback">
                                    Please enter the Min Qualification.
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Number of open position <span class="text-muted text-danger">*</span></label>
                                <input type="number" min="0" class="form-control" name="open_position" required>
                                <div class="invalid-feedback">
                                    Please enter the number of positions open.
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Submission Closing Date <span class="text-muted text-danger">*</span></label>
                                <input type="text" class="form-control datetimepicker" name="end_date" required>
                                <div class="invalid-feedback">
                                    Please Select the career application closing date.
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label> Form Link <span class="text-muted text-danger">*</span></label>
                                <input type="url" class="form-control" name="form_link" required>
                                <div class="invalid-feedback">
                                    Please enter the form link.
                                </div>
                                <span class="ctm-text-sm">*Paste the from link from here to use it in the frontend</span>
                            </div>
                            <div class="form-group mb-3">
                                <label>Salary (Optional)</label>
                                <input type="text" class="form-control" name="salary">
                                <div class="invalid-feedback">
                                    Please enter the salary.
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end card -->

                    <!-- end card -->
                    <div class="text-end mb-3">
                        <button type="submit" class="btn btn-success w-sm form-control">Submit</button>
                    </div>
                    {!! Form::close() !!}



                </div>
                <!-- end col -->

                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0"> Career List</h4>
                        </div>
                        <div class="card-body">

                            <div class="row" >

                                <div class="table-responsive  mt-3 mb-1">
                                    <table id="career-index" class="table align-middle table-nowrap table-striped">
                                        <thead class="table-light">
                                        <tr>
                                            <th>Title</th>
                                            <th>Open Position</th>
                                            <th>End Date</th>
                                            <th>Type</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="job-category-list">
{{--                                        {{dd($careers)}}--}}
                                        @if(!empty($careers))
                                            @foreach($careers as  $career)
                                                <tr>
                                                    <td>{{ ucwords(@$career->name) }}</td>
                                                    <td>{{ @$career->open_position }}</td>
                                                    <td>{{\Carbon\Carbon::parse(@$career->end_date )->isoFormat('MMMM Do, YYYY')}}</td>
                                                    <td>{{ ucwords(str_replace('_',' ',@$career->type)) }}</td>
                                                    <td >
                                                        <div class="row">

                                                            <div class="col text-center dropdown">
                                                                <a href="javascript:void(0);" id="dropdownMenuLink2" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ri-more-fill fs-17"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink2">
                                                                    <li><a class="dropdown-item action-edit"  hrm-update-action="{{route('career.update',$career->id)}}" hrm-edit-action="{{route('career.edit',$career->id)}}"><i class="ri-pencil-fill me-2 align-middle"></i>Edit</a></li>
{{--                                                                    @if($career->form_link !== "")--}}
{{--                                                                    <li><a class="dropdown-item" href="{{@$career->form_link}}" target="_blank" ><i class=" ri-eye-line align-middle"></i> View Form Submission </a><li>--}}
{{--                                                                    @endif--}}
                                                                    <li><a class="dropdown-item action-delete" cs-delete-route="{{route('career.destroy',$career->id)}}"><i class="ri-delete-bin-6-line me-2 align-middle"></i>Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div><!--end row-->
                            <form action="#" method="post" id="deleted-form">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="DELETE">
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end row -->

        </div>
        <!-- container-fluid -->
    </div>

    <div class="modal fade" id="editCareer" tabindex="-1" aria-hidden="true">
        <form action="#" method="post" id="deleted-form" >
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
        </form>
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0">
                <div class="modal-header p-3 ps-4 bg-soft-success">
                    <h5 class="modal-title" id="myModalLabel">Edit Career</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-content">
                    {!! Form::open(['method'=>'PUT','class'=>'needs-validation updatecareer','novalidate'=>'','enctype'=>'multipart/form-data']) !!}

                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label> Title <span class="text-muted text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name" required>
                                    <div class="invalid-feedback">
                                        Please enter the career title.
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Type <span class="text-muted text-danger">*</span></label>
                                    <select class="form-control shadow-none" name="type" id="type" required>
                                        <option value disabled selected> Select Career Type</option>
                                        <option value="full_time"> Full Time </option>
                                        <option value="part_time"> Part Time </option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please enter the Min Qualification.
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Number of open position <span class="text-muted text-danger">*</span></label>
                                    <input type="number" min="0" class="form-control" name="open_position" id="open_position"  required>
                                    <div class="invalid-feedback">
                                        Please enter the number of positions open.
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Submission Closing Date <span class="text-muted text-danger">*</span></label>
                                    <input type="text" class="form-control datetimepicker" name="end_date" id="end_date_edit" required>
                                    <div class="invalid-feedback">
                                        Please Select the career application closing date.
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label> Form Link </label>
                                    <input type="url" class="form-control" name="form_link" id="form_link" />
                                    <div class="invalid-feedback">
                                        Please enter the form link.
                                    </div>
                                    <span class="ctm-text-sm">*Paste the from link from here to use it in the frontend</span>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Salary (Optional)</label>
                                    <input type="text" class="form-control" name="salary" id="salary" />
                                    <div class="invalid-feedback">
                                        Please enter the salary.
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="text-center mb-3">
                            <button type="submit" class="btn btn-success w-sm mt-4">Update</button>
                        </div>
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>



@endsection

@section('js')
    <script src="{{asset('assets/backend/js/jquery.dataTables.min.js')}}"></script>

{{--    <script src="{{asset('assets/backend/custom_js/job_category.js')}}"></script>--}}

    <script src="{{asset('assets/backend/js/pages/form-validation.init.js')}}"></script>

    <script src="{{asset('assets/backend/libs/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <script>
        $('#career-index').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        });

        $(function() {
            $('.datetimepicker').datepicker({
                autoclose: "true",
                clearBtn:"true",
                format:"dd/mm/yyyy",
                todayHighlight: "true",
                orientation: 'auto top',


            });
        });

        $(document).on('click', '.action-edit', function (e) {
            e.preventDefault();
            var url = $(this).attr('hrm-edit-action');
            var id = $(this).attr('id');
            var action = $(this).attr('hrm-update-action');

            $.ajax({
                url: $(this).attr('hrm-edit-action'),
                type: "GET",
                cache: false,
                dataType: 'json',
                success: function (dataResult) {
                    // $('#id').val(data.id);
                    $("#editCareer").modal("toggle");
                    $('#name').attr('value',dataResult.edit.name);
                    $('#open_position').attr('value',dataResult.edit.open_position);
                    $('#end_date_edit').attr('value',dataResult.end);
                    $('#form_link').attr('value',dataResult.edit.form_link);
                    $('#salary').attr('value',dataResult.edit.salary);
                    $('#type option[value="'+dataResult.edit.type+'"]').prop('selected', true);
                    $('.updatecareer').attr('action', action);

                },
                error: function (error) {
                    console.log(error)
                }
            });
        });

        $(document).on('click','.action-delete', function (e) {
            e.preventDefault();
            var form = $('#deleted-form');
            var action = $(this).attr('cs-delete-route');
            form.attr('action',action);
            var url = form.attr('action');
            var form_data = form.serialize();
            Swal.fire({
                imageUrl: "/assets/backend/images/canosoft-logo.png",
                imageHeight: 60,
                html: '<div class="mt-2">' +
                    '<lord-icon src="https://cdn.lordicon.com/tdrtiskw.json"' +
                    ' trigger="loop" colors="primary:#f06548,secondary:#f7b84b" ' +
                    'style="width:120px;height:120px"></lord-icon>' +
                    '<div class="mt-4 pt-2 fs-15">' +
                    '<h4>Are your sure? </h4>' +
                    '<p class="text-muted mx-4 mb-0">' +
                    'You want to Remove this Record ?</p>' +
                    '</div>' +
                    '</div>',
                showCancelButton: !0,
                confirmButtonClass: "btn btn-primary w-xs me-2 mt-2",
                cancelButtonClass: "btn btn-danger w-xs mt-2",
                confirmButtonText: "Yes!",
                buttonsStyling: !1,
                showCloseButton: !0
            }).then(function(t)
            {
                t.value
                    ?
                    $.post( url, form_data)
                        .done(function(response) {
                            if(response.status == "success") {
                                Swal.fire({
                                    imageUrl: "/assets/backend/images/canosoft-logo.png",
                                    imageHeight: 60,
                                    html: '<div class="mt-2">' +
                                        '<lord-icon src="https://cdn.lordicon.com/lupuorrc.json"' +
                                        'trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px">' +
                                        '</lord-icon>' +
                                        '<div class="mt-4 pt-2 fs-15">' +
                                        '<h4>Success !</h4>' +
                                        '<p class="text-muted mx-4 mb-0">' + response.message +'</p>' +
                                        '</div>' +
                                        '</div>',
                                    timerProgressBar: !0,
                                    timer: 2e3,
                                    showConfirmButton: !1
                                });
                                setTimeout(function () {
                                    window.location.reload();
                                }, 2500);
                            }else{
                                Swal.fire({
                                    imageUrl: "/assets/backend/images/canosoft-logo.png",
                                    imageHeight: 60,
                                    html: '<div class="mt-2">' +
                                        '<lord-icon src="https://cdn.lordicon.com/tdrtiskw.json"' +
                                        ' trigger="loop" colors="primary:#f06548,secondary:#f7b84b" ' +
                                        'style="width:120px;height:120px"></lord-icon>' +
                                        '<div class="mt-4 pt-2 fs-15">' +
                                        '<h4>Oops...! </h4>' +
                                        '<p class="text-muted mx-4 mb-0">' + response.message +'</p>' +
                                        '</div>' +
                                        '</div>',
                                    timerProgressBar: !0,
                                    timer: 3000,
                                    showConfirmButton: !1
                                });
                            }
                        })
                        .fail(function(response){
                            console.log(response)
                        })

                    :
                    t.dismiss === Swal.DismissReason.cancel &&
                    Swal.fire({
                        title: "Cancelled",
                        text: "Career detail was not removed.",
                        icon: "error",
                        confirmButtonClass: "btn btn-primary mt-2",
                        buttonsStyling: !1
                    });
            });



        });
    </script>

@endsection
