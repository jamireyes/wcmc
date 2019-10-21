@extends('layouts.app')

@section('content')
<div class="wrapper">
    @include('pages.admin.include.sidebar')
    <div class="main-panel">
        @include('pages.admin.include.navbar')
        <div class="content mt-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <form id="AppointmentDetails" >
                                @csrf
                                <div class="card-header card-header-primary">
                                    <div class="d-flex w-100">
                                        <div class="mr-auto">ENTER APPOINTMENT DETAILS</div>
                                        <div class="pr-2"><button type="button" data-toggle='modal' data-target='#AddAppointment' class="btn btn-secondary btn-sm m-0">ADD APPOINTMENT</button></div>
                                        <div><button type="submit" id="submit_app_details" class="btn btn-secondary btn-sm m-0">SUBMIT</button></div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label><i class="fa fa-user pr-2" aria-hidden="true"></i>Doctor's Name</label>
                                                <select id="doctor_id" name="doctor_id" class="form-control dynamic">
                                                    <option value="" disabled selected>Select a doctor...</option>
                                                        @foreach ($doctors as $doctor)
                                                            <option value="{{ $doctor->id }}">{{ $doctor->first_name }} {{ $doctor->middle_name }} {{ $doctor->last_name }}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label style="position: static !important; margin-bottom: 0.9rem;"><i class="fa fa-calendar pr-2" aria-hidden="true"></i>Appointment Date</label>
                                                <input id="appointment_date" name="appointment_date" type="date" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" max="{{ Carbon\Carbon::now()->addYear(1)->format('Y-m-d') }}" class="form-control dynamic">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label><i class="fas fa-clock pr-2" aria-hidden="true"></i>Appointment Time</label>
                                                <select id="doctor_schedule_id" class="form-control" name="appointment_time">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header card-header-primary">APPROVED APPOINTMENTS</div>
                            <div class="card-body">
                                <table id="app_approved_table" class="table display w-100">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header card-header-warning">APPOINTMENT REQUESTS</div>
                            <div class="card-body">
                                <table id="app_request_table" class="table display w-100">
                                    <thead>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Time</th>
                                        <th>Action</th>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Appointment Modal -->
<div class="modal fade" id="AddAppointment" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Appointment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <form id="AddAppointmentForm">
                <div class="modal-body p-5">
                    <div class="form-group">
                        <label><i class="fa fa-user pr-2" aria-hidden="true"></i>Doctor's Name</label>
                        <select id="mdl_doctor_id" class="form-control dynamic-modal">
                            <option value="" disabled selected>Select a doctor...</option>
                                @foreach ($doctors as $doctor)
                                    <option value="{{ $doctor->id }}">{{ $doctor->first_name }} {{ $doctor->middle_name }} {{ $doctor->last_name }}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label style="position: static !important; margin-bottom: 0.9rem;"><i class="fa fa-calendar pr-2" aria-hidden="true"></i>Appointment Date</label>
                        <input id="mdl_appointment_date" type="date" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" max="{{ Carbon\Carbon::now()->addYear(1)->format('Y-m-d') }}" class="form-control dynamic-modal">
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-clock pr-2" aria-hidden="true"></i>Appointment Time</label>
                        <select id="mdl_doctor_schedule_id" class="form-control">
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Approve Modal -->
<div class="modal fade" id="ApproveModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <i class="fas fa-question-circle fa-3x text-success pt-4" aria-hidden="true"></i>
                <h3>Approve Appointment Request?</h3>
            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-center w-100">
                    <form id="ApproveForm">
                        <button type="submit" class="btn btn-success">YES!</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">NO</button>
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
        
        // PusherListener();
        $.fn.dataTable.ext.errMode = 'none';

        function PusherListener() {
            Pusher.logToConsole = true;

            var pusher = new Pusher('89973cf8f98acc38053a', {
                cluster: 'ap1',
                'useTLS': false,
            });
            
            var channel = pusher.subscribe('AppointmentStatus.2');
            channel.bind('AppointmentStatus', function(data) {
                toastr.warning(data.message, data.title);
            });
        }

        const request_dataTable = $('#app_request_table').DataTable();
        const approved_dataTable = $('#app_approved_table').DataTable();

        function request_dt(doctor_id = '', appointment_date = '', appointment_time = ''){
            $('#app_request_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    type: "POST",
                    url: "{{ route('appointment.getAppointments') }}",
                    data: {
                        '_token' : "{{csrf_token() }}",
                        doctor_id: doctor_id, 
                        appointment_date: appointment_date, 
                        appointment_time: appointment_time
                    }
                },
                columns: [
                    { data: "appointment_id", name : "appointment_id"},
                    { data: "fullname", name: "fullname" },
                    { data: "appointment_date", name: "appointment_date" },
                    { data: "Action", name: "Action" }
                ]
            });
        }

        function approved_dt(doctor_id = '', appointment_date = '', appointment_time = ''){
            $('#app_approved_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    type: "POST",
                    url: "{{ route('appointment.getApprovedAppointments') }}",
                    data: {
                        '_token' : "{{csrf_token() }}",
                        doctor_id: doctor_id, 
                        appointment_date: appointment_date, 
                        appointment_time: appointment_time
                    }
                },
                columns: [
                    { data: "appointment_id", name : "appointment_id"},
                    { data: "fullname", name: "fullname" },
                    { data: "Action", name: "Action" }
                ]
            });
        }

        $('#submit_app_details').click(function(e){
            
            var doctor_id = $('#doctor_id').val();
            var appointment_date = $('#appointment_date').val();
            var appointment_time = $('#doctor_schedule_id').val();
            console.log(appointment_time);

            e.preventDefault();

            if(doctor_id != '' && appointment_date != '' && appointment_time != ''){
                $('#app_request_table').DataTable().destroy();
                $('#app_approved_table').DataTable().destroy();
                request_dt(doctor_id, appointment_date, appointment_time);
                approved_dt(doctor_id, appointment_date, appointment_time);
            }else{
                toastr.warning('Kindly fill up all input fields!');
            }
        });

        request_dataTable.on('click', '#ApproveBtn', function(){
            var id = $(this).data('id');
            var route = "{{ route('appointment.approve', '')}}/"+id;
            $('#ApproveForm').submit(function(){
                event.preventDefault();
                $.ajax({
                    type: "POST",
                    url: route,
                    data: {'_token' : "{{csrf_token() }}"},
                    success: function(){
                        toastr.success('Appointment Approved!');
                        $('#ApproveModal').modal('hide');
                    },
                    error: function(){
                        toastr.error('Something went wrong :/', 'Error!');
                    }
                });
            })
        });

        $('.dynamic').change(function(){
            if($(this).val() != ''){
                var doctor_id = $('#doctor_id').val();
                var appointment_date = $('#appointment_date').val();

                if( doctor_id != '' && appointment_date != ''){
                    $.ajax({
                        url: "{{ route('appointment.getDocSchedules') }}",
                        method: "POST",
                        data: {
                            doctor_id: doctor_id,
                            appointment_date: appointment_date, 
                            '_token' : "{{csrf_token() }}"
                        },
                        success: function(output){
                            $('#doctor_schedule_id').html(output);
                        }
                    });
                }
            }
        });

        $('.dynamic-modal').change(function(){
            if($(this).val() != ''){
                var doctor_id = $('#mdl_doctor_id').val();
                var appointment_date = $('#mdl_appointment_date').val();

                if( doctor_id != '' && appointment_date != ''){
                    $.ajax({
                        url: "{{ route('appointment.getDocSchedules') }}",
                        method: "POST",
                        data: {
                            doctor_id: doctor_id,
                            appointment_date: appointment_date, 
                            '_token' : "{{csrf_token() }}"
                        },
                        success: function(output){
                            $('#mdl_doctor_schedule_id').html(output);
                        }
                    });
                }
            }
        });

        $('#AddAppointmentForm').submit(function(e){
            // e.preventDefault();
            console.log($('#mdl_doctor_id').val());
        });

        $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html, body').animate({
                    scrollTop: (target.offset().top - 70)
                    }, 1000, "easeInOutExpo");
                    return false;
                }
            }
        });

        $('.js-scroll-trigger').click(function() {
            $('.navbar-collapse').collapse('hide');
        });
        
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });

    });
</script>
@endsection