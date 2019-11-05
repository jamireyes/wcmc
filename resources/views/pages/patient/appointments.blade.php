@extends('layouts.app')

@section('content')
<div class="wrapper ">
    @include('pages.patient.include.sidebar')
    <div class="main-panel">
        <!-- Navbar -->
        @include('pages.patient.include.navbar')
        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-5 col-md-5">
                        <div id="ApprovedList" style="overflow:auto; height:450px;">
                        
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <div class="d-flex justify-content-between">
                                    <div>APPOINTMENT HISTORY</div>
                                    <div>
                                        <a href="#" class="btn btn-secondary btn-sm m-0" data-toggle="modal" data-target="#RequestApp">REQUEST APPOINTMENT</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="AppHistory" class="table display nowrap">
                                        <thead class="text-primary">
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Doctor</th>
                                            <th>Status</th>
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
</div>

@endsection

@section('script')
    <script>
        $( document ).ready(function() {
            
            // $.fn.dataTable.ext.errMode = 'none';

            var AppHistory = $('#AppHistory').DataTable({
                processing: false,
                serverSide: true,
                ajax: {
                    type: "GET",
                    url: "{{ route('patient.getPatientAppointments') }}",
                },
                columns: [
                    { data: "date", name: "date"},
                    { data: "time", name: "time"},
                    { data: "doctor", name: "doctor"},
                    { data: "Status", name: "Status"}
                ]
            });

            function getApprovedAppointments(){
                $.ajax({
                    type: "GET",
                    url: "{{ route('patient.getPatientApproved') }}",
                    success: function(response){
                        
                        $('#ApprovedList').empty();
                        
                        for(var x = 0; response.appointments.length > 0; x++){
                            var html = "<div class='card bg-primary'>";
                            html += "<div class='card-body'><table><tbody>";
                            html += "<tr><td><h4>"+response.appointments[x].doctor+"</h4></td></tr>";
                            html += "<tr><td>Date:&nbsp;&nbsp;&nbsp;&nbsp;"+response.appointments[x].date+"</td></tr>";
                            html += "<tr><td>Time:&nbsp;&nbsp;&nbsp;&nbsp;"+response.appointments[x].time+"</td></tr>";
                            $('#ApprovedList').prepend(html);
                        }

                    },
                    error: function(){
                        toastr.error('Something went wrong :/', 'Error!');
                    }
                });
            }

            setInterval(function(){
                AppHistory.ajax.reload(null, false);
                getApprovedAppointments();
            }, 1000);
            
        });
    </script>
@endsection