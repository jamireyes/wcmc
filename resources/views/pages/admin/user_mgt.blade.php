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
                                    <div>USER MANAGEMENT</div>
                                    <div><a href="{{ route('register') }}"><i class="fas fa-user-plus text-white"></i></a></div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="user_mgt_table" class="table display">
                                        <thead>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Contact No.</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{$user->id}}</td>
                                                    <td>{{$user->username}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->contact_no}}</td>
                                                    <td>{{$user->role->description}}</td>
                                                    <td>
                                                        <a href="#" data-toggle="modal" data-target="#ViewModal"><i class="fa fa-eye text-primary" aria-hidden="true"></i></a>
                                                        <a href="#" id="Edit_Button" data-user="{{ $user }}" data-toggle="modal" data-target="#EditModal"><i class="fas fa-edit text-warning mx-1"></i></a>
                                                        @if(Auth::user()->id != $user->id)
                                                            @if ($user->deleted_at == NULL)
                                                                <a href="#" id="Delete_Button" data-id="{{ $user->id }}" data-toggle="modal" data-target="#DeleteModal"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>
                                                            @else
                                                                <a href="#" id="Restore_Button" data-id="{{ $user->id }}" data-toggle="modal" data-target="#RestoreModal"><i class="fas fa-trash-restore primary"></i></a>
                                                            @endif
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
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

<!-- Edit Modal -->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="EditUserForm" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="form-group col-12">
                        <label for="role_id">Role</label>
                        <select name="role_id" id="role_id" class="form-control">
                            @foreach ($roles as $role)
                                @if($user->role_id == $role->role_id)
                                    <option value="{{ $role->role_id }}" selected>{{ $role->description }}</option>
                                @else
                                    <option value="{{ $role->role_id }}">{{ $role->description }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-12">
                        <label for="email">E-Mail</label>
                        <input type="email" name="email" id="email" class="form-control" value="">
                    </div>
                    <div class="form-group col-12">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" value="">
                    </div>
                    <div class="form-group col-12">
                        <label for="contact_no">Contact No.</label>
                        <input type="text" name="contact_no" id="contact_no" class="form-control" value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
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
                    <form id="DeleteUserForm" method="POST">
                        @method('DELETE')
                        @csrf
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
                            <td></td>
                        </tr>
                        <tr>
                            <td>Full Name&nbsp&nbsp&nbsp&nbsp</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Email&nbsp&nbsp&nbsp&nbsp</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Contact No.&nbsp&nbsp&nbsp&nbsp</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Sex&nbsp&nbsp&nbsp&nbsp</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Birthday&nbsp&nbsp&nbsp&nbsp</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Citizenship&nbsp&nbsp&nbsp&nbsp</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Civil Status&nbsp&nbsp&nbsp&nbsp</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Address&nbsp&nbsp&nbsp&nbsp</td>
                            <td></td>
                            <td></td>
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
        
        const user_mgt_table = $('#user_mgt_table').DataTable();

        user_mgt_table.on('click', '#Edit_Button', function(){
            var user = $(this).data('user');
            var route = "{{route('admin_usermgt.update', '')}}/"+user.id;
            $('#EditUserForm').attr('action', route);
            $('#role_id').val(user.role_id);
            $('#contact_no').val(user.contact_no);
            $('#email').val(user.email);
            $('#username').val(user.username);
        });

        user_mgt_table.on('click', '#Delete_Button', function(){
            var id = $(this).data('id');
            var route = "{{ route('admin_usermgt.destroy', '')}}/"+id;
            $('#DeleteUserForm').attr('action', route);
        });

        user_mgt_table.on('click', '#Restore_Button', function(){
            var id = $(this).data('id');
            var route = "{{ route('admin_usermgt.restore', '')}}/"+id;
            $('#RestoreUserForm').attr('action', route);
        });

        user_mgt_table.on('click', '#View_Button', function(){
            var user = $(this).data('user');
            $('#ViewProfile').append();
        });
        
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