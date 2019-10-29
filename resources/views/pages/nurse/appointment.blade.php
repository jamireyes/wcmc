@extends('layouts.app')

@section('content')
<div class="wrapper">
    @include('pages.nurse.include.sidebar')
    <div class="main-panel">
        @include('pages.nurse.include.navbar')
        <div class="content mt-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <form id="AppointmentDetails" >
                                @csrf
                                <div class="card-header card-header-primary">
                                    <div class="d-flex justify-content-between w-100">
                                        <div>ENTER APPOINTMENT DETAILS</div>
                                        <div><button type="submit" class="btn btn-secondary btn-sm m-0">SUBMIT</button></div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-4">
                                            <label><i class="fa fa-user pr-2" aria-hidden="true"></i>Doctor's Name</label>
                                        </div>
                                        <div class="form-group col-4">
                                            <label style="position: static !important; margin-bottom: 0.9rem;"><i class="fa fa-calendar pr-2" aria-hidden="true"></i>Appointment Date</label>
                                            <input id="Select_Date_Input" name="appointment_date" type="date" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" max="{{ Carbon\Carbon::now()->addYear(1)->format('Y-m-d') }}" class="form-control">
                                        </div>
                                        <div class="form-group col-4">
                                            <label><i class="fas fa-clock pr-2" aria-hidden="true"></i>Appointment Time</label>
                                            </select>
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

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Patient</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header card-header-warning">APPOINTMENT REQUESTS</div>
                            <div class="card-body">
                                <table id="app_request_table" class="table display patient-table w-100">
                                    <thead>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Timestamp</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
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

{{-- Appointment Modal --}}
<div class="modal fade" id="AppModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Enter Appointment Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="m-5">
                    <div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </span>
                            </div>
                            <select id="Select_Doctor_Input" class="form-control">
                                <option value="" disabled selected>Select a doctor...</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                </span>
                            </div>
                            <input id="Select_Date_Input" type="date" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" max="{{ Carbon\Carbon::now()->addYear(1)->format('Y-m-d') }}" class="form-control">
                        </div>
                    </div>
                    <div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-clock"></i>
                                </span>
                            </div>
                            <select class="form-control">
                                <option>8:00 AM - 12:00 NN</option>
                                <option>1:00 PM - 5:00 PM</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">SUBMIT</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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

        function populate_datatables(doctor_id = '', appointment_date = '', appointment_time = ''){
            var request_dataTable = $('#app_request_table').DataTable({
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
                    { data: "patient_id", name: "patient_id" },
                    { data: "created_at", name: "created_at" }
                ]
            });
        }

        $('#AppointmentDetails').submit(function(e){
            e.preventDefault();
            var doctor_id = $('#Select_Doctor_Input').val();
            var appointment_date = $('#Select_Date_Input').val();
            var appointment_time = $('#Select_Time_Input').val();

            if(doctor_id != '' && appointment_date != '' && appointment_time != ''){
                $('#app_request_table').DataTable().destroy();
                populate_datatables(doctor_id, appointment_date, appointment_time);
            }else{
                // toastr()->warning('Kindly fill up all input fields!');
                alert('Kindly fill up all input fields!');
            }
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