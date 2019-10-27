@extends('layouts.app')

@section('content')
<div class="wrapper">
    @include('pages.admin.include.sidebar')
    <div class="main-panel">
        @include('pages.admin.include.navbar')
        <div class="content mt-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <div class="d-flex justify-content-between">
                                    <div></div>
                                    <div>MEDICAL SERVICE</div>
                                    <div><a data-toggle="modal" id="Add_Button" data-target="#AddModal"><i class="fas fa-user-plus text-white"></i></a></div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="user_mgt_table" class="table display">
                                        <thead>
                                            <!-- <th></th> -->
                                            <th>Description</th>
                                            <th>Rate</th>
                                            <th>Actions</th>
                                        </thead>
                                        <tbody>
                                        @if(count($services))
                                            @foreach($services as $service)
                                            <tr>
                                                <!-- <td>{{ $service->medical_service_id }}</td> -->
                                                <td>{{ $service->description }}</td>
                                                <td>{{ $service->rate }}</td>
                                                <td>
                                                    <!-- <a href="#" id="View_Button" data-user="{{ $service }}" data-toggle="modal" data-target="#ViewModal"><i class="fa fa-eye text-primary" aria-hidden="true"></i></a> -->
                                                    <a href="#" id="Edit_Button" data-service="{{ $service }}" data-toggle="modal" data-target="#EditModal"><i class="fas fa-edit text-warning mx-1"></i></a>
                                                    <a href="#" id="Delete_Button" data-id="{{ $service->medical_service_id }}" data-toggle="modal" data-target="#DeleteModal"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>
                                                    <!-- <a href="#" id="Restore_Button" data-id="{{ $service->id }}" data-toggle="modal" data-target="#RestoreModal"><i class="fas fa-trash-restore primary"></i></a>   -->
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Medical Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="AddForm" method="POST" action="{{route('admin_service.store')}}">
                @csrf
                <div class="modal-body">
                    <div class="form-group col-12">
                        <label for="description">Description</label>
                        <input type="text" name="description" id="description" class="form-control" value="">
                    </div>
                    <div class="form-group col-12">
                        <label for="rate">Rate</label>
                        <input type="number" name="rate" id="rate" class="form-control" value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            *</form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Medical Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="EditForm" method="POST">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <div class="form-group col-12">
                        <label for="description">Description</label>
                        <input type="text" name="description" id="Edit_description" class="form-control" value="">
                    </div>
                    <div class="form-group col-12">
                        <label for="rate">Rate</label>
                        <input type="number" name="rate" id="Edit_rate" class="form-control" value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            *</form>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <i class="fa fa-exclamation-circle fa-3x text-danger pt-4" aria-hidden="true"></i>
                <h3>Are you sure?</h3>
                <p></p>
            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-center w-100">
                    <form id="DeleteForm" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">YES, DELETE IT!</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">NO, KEEP IT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Restore Modal -->
<div class="modal fade" id="RestoreModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <i class="fa fa-exclamation-circle fa-3x text-primary pt-4" aria-hidden="true"></i>
                <h3>Are you sure?</h3>
                <p></p>
            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-center w-100">
                    <form id="RestoreUserForm" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">YES, RESTORE IT!</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">NO, LEAVE IT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- View Modal -->

<div class="modal fade" id="ViewModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body p-5">
                <div class="text-center w-100 mb-5">
                    <i class="fas fa-user-circle fa-5x text-primary" aria-hidden="true"></i>
                </div>
                <table id="ViewProfile">
                    <tbody>
                        <tr>
                            <td>Username&nbsp&nbsp&nbsp&nbsp</td>
                            <td class="username"></td>
                        </tr>
                        <tr>
                            <td>Full Name&nbsp&nbsp&nbsp&nbsp</td>
                            <td class="fullname"></td>
                        </tr>
                        <tr>
                            <td>Email&nbsp&nbsp&nbsp&nbsp</td>
                            <td class="email"></td>
                        </tr>
                        <tr>
                            <td>Contact No.&nbsp&nbsp&nbsp&nbsp</td>
                            <td class="contact_no"></td>
                        </tr>
                        <tr>
                            <td>Sex&nbsp&nbsp&nbsp&nbsp</td>
                            <td class="sex"></td>
                        </tr>
                        <tr>
                            <td>Birthday&nbsp&nbsp&nbsp&nbsp</td>
                            <td class="birthday"></td>
                        </tr>
                        <tr>
                            <td>Citizenship&nbsp&nbsp&nbsp&nbsp</td>
                            <td class="citizenship"></td>
                        </tr>
                        <tr>
                            <td>Civil Status&nbsp&nbsp&nbsp&nbsp</td>
                            <td class="civil_status"></td>
                        </tr>
                        <tr>
                            <td>Address&nbsp&nbsp&nbsp&nbsp</td>
                            <td class="address_line_1"></td>
                        </tr>
                        <tr>
                            <td>&nbsp&nbsp&nbsp&nbsp</td>
                            <td class="address_line_2"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-center w-100">
                    <div>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')
<script src="{{ asset('vendor/material/js/material-dashboard.js') }}"></script>
<script>
    $( document ).ready(function() {
        $(document).on('click', '#Add_Button', function(){
            // var service = $(this).data('service');
            // var route = "{{route('admin_service.update', '')}}/"+service.medical_service_id;
            // $('#EditForm').attr('action', route);
            // $('#description').val(service.description);
            // $('#rate').val(service.rate);
        });

        $(document).on('click', '#Edit_Button', function(){
            var service = $(this).data('service');
            var route = "{{route('admin_service.update', '')}}/"+service.medical_service_id;
            $('#EditForm').attr('action', route);
            $('#Edit_decription').val(service.description);
            $('#Edit_rate').val(service.rate);
        });

        $(document).on('click', '#Delete_Button', function(){
            var service = $(this).data('id');
            var route = "{{route('admin_service.destroy', '')}}/"+service;
            $('#DeleteForm').attr('action', route);
        });

        // user_mgt_table.on('click', '#Restore_Button', function(){
        //     var id = $(this).data('id');
        //     var route = "{{ route('admin_usermgt.restore', '')}}/"+id;
        //     $('#RestoreUserForm').attr('action', route);
        // });

        // user_mgt_table.on('click', '#View_Button', function(){
        //     var user = $(this).data('user');
        //     $('.username').html(user.username);
        //     $('.email').html(user.email);
        //     $('.fullname').html(user.first_name+' '+user.middle_name+' '+user.last_name);
        //     $('.contact_no').html('0'+user.contact_no);
        //     $('.sex').html(user.sex);
        //     $('.birthday').html(user.birthday);
        //     $('.citizenship').html(user.citizenship);
        //     $('.civil_status').html(user.civil_status);
        //     $('.address_line_1').html(user.address_line_1);
        //     $('.address_line_2').html(user.address_line_2);
        // });
        
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });

        Pusher.logToConsole = true;

        var pusher = new Pusher('89973cf8f98acc38053a', {
            cluster: 'ap1',
            'useTLS': false,
        });
        
        var channel = pusher.subscribe('AppointmentStatus.2');
        channel.bind('AppointmentStatus', function(data) {
            toastr.info(data.message, 'Notification');
        });
    });
</script>
@endsection