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
                                    <div>DOCTOR'S SCHEDULE</div>
                                    <div><a href="#" data-target="#AddModal" data-toggle="modal"><i class="fa fa-plus-square text-white" aria-hidden="true"></i></a></div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="schedule_table" class="table display">
                                        <thead>
                                            <th></th>
                                            <th>Doctor</th>
                                            <th>Day</th>
                                            <th>Time</th>
                                            <th>Date Added</th>
                                            <th>Last Update</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($schedules as $sched)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $sched->doctor->first_name }} {{ $sched->doctor->middle_name }} {{ $sched->doctor->last_name }} </td>
                                                <td>{{ $sched->day }}</td>
                                                <td>{{ $sched->start_time }} - {{ $sched->end_time }}</td>
                                                <td>{{ $sched->created_at }}</td>
                                                <td>{{ $sched->updated_at }}</td>
                                                <td>
                                                    @if($sched->deleted_at == NULL)
                                                    <span class="badge badge-success">Available</span>
                                                    @else
                                                    <span class="badge badge-danger">Unavailable</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="#" id="Edit_Button" data-sched="{{ $sched }}" data-toggle="modal" data-target="#EditModal"><i class="fas fa-edit text-warning mx-1"></i></a>
                                                    @if ($sched->deleted_at == NULL)
                                                        <a href="#" id="Delete_Button" data-id="{{ $sched->doctor_schedule_id }}" data-toggle="modal" data-target="#DeleteModal"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>
                                                    @else
                                                        <a href="#" id="Restore_Button" data-id="{{ $sched->doctor_schedule_id }}" data-toggle="modal" data-target="#RestoreModal"><i class="fas fa-trash-restore primary"></i></a>
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

<!-- Add Modal -->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Schedule</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="AddForm" action="{{ route('doctor_schedule.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group col-12 pt-4">
                        <label for="doctor_id">1. Choose a Doctor</label>
                        <select name="doctor_id" class="form-control">
                            <option value="" disabled selected></option>
                            @foreach ($doctors as $doctor)
                                <option value="{{$doctor->id}}">{{$doctor->first_name}} {{$doctor->middle_name}} {{$doctor->last_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-12 pt-4">
                        <label for="day">2. Choose the Day/s</label>
                        <div class="p-1 pt-2">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input name="day[]" class="form-check-input" type="checkbox" value="MON">M
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input name="day[]" class="form-check-input" type="checkbox" value="TUES">T
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input name="day[]" class="form-check-input" type="checkbox" value="WED">W
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input name="day[]" class="form-check-input" type="checkbox" value="THUR">TH
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input name="day[]" class="form-check-input" type="checkbox" value="FRI">F
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row py-4">
                        <div class="col-12">
                            <div class="form-group">
                                <label>3. Time Schedule</label>
                                <select name="time_schedule" id="time_schedule" class="form-control">
                                    <option value="1">9:00 AM - 12:00 NN</option>
                                    <option value="2">1:00 PM - 5:00 PM</option>
                                </select>
                            </div>
                        </div>
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

<!-- Edit Modal -->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Schedule</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="EditForm" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="form-group col-12 pt-4">
                        <label for="doctor_id">1. Choose a Doctor</label>
                        <select id="doctor_id_edit" name="doctor_id" class="form-control">
                            @foreach ($doctors as $doctor)
                                <option value="{{$doctor->id}}">{{$doctor->first_name}} {{$doctor->middle_name}} {{$doctor->last_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-12 pt-4">
                        <label for="day">2. Choose the Day/s</label>
                        <div class="p-1 pt-2">
                            <div class="form-check form-check-radio form-check-inline">
                                <label class="form-check-label">
                                    <input id="MON_edit" name="day" class="form-check-input" type="radio" value="MON">M
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check form-check-radio form-check-inline">
                                <label class="form-check-label">
                                    <input id="TUES_edit" name="day" class="form-check-input" type="radio" value="TUES">T
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check form-check-radio form-check-inline">
                                <label class="form-check-label">
                                    <input id="WED_edit" name="day" class="form-check-input" type="radio" value="WED">W
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check form-check-radio form-check-inline">
                                <label class="form-check-label">
                                    <input id="THUR_edit" name="day" class="form-check-input" type="radio" value="THUR">TH
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check form-check-radio form-check-inline">
                                <label class="form-check-label">
                                    <input id="FRI_edit" name="day" class="form-check-input" type="radio" value="FRI">F
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row py-4">
                        <div class="col-12">
                            <div class="form-group">
                                <label>3. Time Schedule</label>
                                <select name="time_schedule_edit" id="time_schedule_edit" class="form-control">
                                    <option value="1">9:00 AM - 12:00 NN</option>
                                    <option value="2">1:00 PM - 5:00 PM</option>
                                </select>
                            </div>
                        </div>
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
            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-center w-100">
                    <form id="DeleteForm" method="POST">
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
            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-center w-100">
                    <form id="RestoreForm" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">YES, RESTORE IT!</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">NO, LEAVE IT</button>
                    </form>
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

        const schedule_table = $('#schedule_table').DataTable({
            "columnDefs": [
                {
                    "targets": 7,
                    "orderable": false
                }
            ]
        });

        $('#EditModal').on('hidden.bs.modal', function(){
            $(':radio').prop("checked", false);
        });
        
        schedule_table.on('click', '#Edit_Button', function(){
            var sched = $(this).data('sched');
            console.log(sched);
            var route = "{{route('doctor_schedule.update', '')}}/"+sched.doctor_schedule_id;
            $('#EditForm').attr('action', route);
            $('#doctor_id_edit').val(sched.doctor_id);
            $('#'+sched.day+'_edit').prop("checked", true);
            if(sched.start_time == '09:00:00'){
                
            }
            $('#start_time_edit').val(sched.start_time);
            $('#end_time_edit').val(sched.end_time);
        });
        
        schedule_table.on('click', '#Delete_Button', function(){
            var id = $(this).data('id');
            var route = "{{ route('doctor_schedule.destroy', '')}}/"+id;
            console.log(id);
            $('#DeleteForm').attr('action', route);
        });
        
        schedule_table.on('click', '#Restore_Button', function(){
            var id = $(this).data('id');
            var route = "{{ route('doctor_schedule.restore', '')}}/"+id;
            $('#RestoreForm').attr('action', route);
        });

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });

        // Pusher.logToConsole = true;

        // var pusher = new Pusher('89973cf8f98acc38053a', {
        //     cluster: 'ap1',
        //     'useTLS': false,
        // });
        
        // var channel = pusher.subscribe('AppointmentStatus.2');
        // channel.bind('AppointmentStatus', function(data) {
        //     toastr.info(data.message, 'Notification');
        // });
    });
</script>
@endsection