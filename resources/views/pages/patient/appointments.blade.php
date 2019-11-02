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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <div class="d-flex justify-content-between">
                                    <div>APPOINTMENTS</div>
                                    <div>
                                        <a href="#" data-toggle="modal" data-target="#RequestApp"><i class="fas fa-calendar-plus text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5">
                                        <div class="card bg-primary">
                                            <div class="card-body">
                                                <table>
                                                    <tbody>
                                                        <tr><td><h4>Dr. Juan Santos Dela Cruz</h4></td></tr>
                                                        <tr><td>Date:&nbsp;&nbsp;&nbsp;&nbsp;Auguest 30, 2019</td></tr>
                                                        <tr><td>Time:&nbsp;&nbsp;&nbsp;&nbsp;11:00 AM</td></tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-7">
                                        <div class="card">
                                            <div class="card-header">Appointment History</div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table id="AppHistory" class="table display nowrap">
                                                        <thead class=" text-primary">
                                                            <th></th>
                                                            <th>Date & Time</th>
                                                            <th>Doctor</th>
                                                            <th>Status</th>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>08/30/2019 11:00 AM</td>
                                                                <td>Dr. Juan Santos Dela Cruz</td>
                                                                <td class="text-primary">
                                                                    <span class="badge badge-pill badge-success">Done</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>09/4/2019 2:00 PM</td>
                                                                <td>Dr. Fernando Concepcion Villaflores</td>
                                                                <td class="text-primary">
                                                                    <span class="badge badge-pill badge-warning">Pending</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>08/24/2019 10:00 AM</td>
                                                                <td>Dr. Maria Napoles Josefina</td>
                                                                <td class="text-primary">
                                                                    <span class="badge badge-pill badge-danger">Cancelled</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>08/24/2019 10:00 AM</td>
                                                                <td>Dr. Juan Santos Dela Cruz</td>
                                                                <td class="text-primary">
                                                                    <span class="badge badge-pill badge-primary">Approved</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>08/24/2019 10:00 AM</td>
                                                                <td>Dr. Maria Napoles Josefina</td>
                                                                <td class="text-primary">
                                                                    <span class="badge badge-pill badge-secondary">Ongoing</span>
                                                                </td>
                                                            </tr>
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
            </div>
        </div>
    </div>
</div>

<!--modals-->
<div class="modal fade" id="RequestApp" tabindex="-1" role="dialog" aria-labelledby="RequestAppLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Request Appointment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Select Doctor</label>
                    <select class="form-control " data-style="btn btn-link" id="exampleFormControlSelect1">
                        <option>Juan Santos Dela Cruz</option>
                        <option>Fernando Concepcion Villaflores</option>
                        <option>Maria Napoles Josefina</option>
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <label for="MedicalServices">Choose Services</label>
                    <form action="" method="post">
                    <div class="row">
                        <div class="column1">
                        <input type="checkbox" name="MedServ1" value="Checkup"> Medical Check-Up <br>
                        <input type="checkbox" name="MedServ2" value="MedCert"> Medical Certificate <br>
                        <input type="checkbox" name="MedServ3" value="DrugTest"> Drug Testing <br>
                        <input type="checkbox" name="MedServ4" value="ChestXray"> Chest X-Ray <br>
                        <input type="checkbox" name="MedServ5" value="BloodTyping"> Blood Typing <br>
                        <input type="checkbox" name="MedServ6" value="PregnancyTest"> Pregnancy Test <br>
                        </div>
                        <div class="column2">
                        <input type="checkbox" name="MedServ7" value="BloodSugarTest"> Blood Sugar Test <br>
                        <input type="checkbox" name="MedServ8" value="HepAtest"> Hepatitis A Test <br>
                        <input type="checkbox" name="MedServ9" value="HepBtest"> Hepatitis B Test <br>
                        <input type="checkbox" name="MedServ10" value="CBCtest"> CBC Test <br>
                        <input type="checkbox" name="MedServ11" value="Urinalysis"> Urinalysis <br>
                        <input type="checkbox" name="MedServ12" value="StoolExam"> Stool Exam <br>
                        </div>
                    </div>  
                    </form>
                </div>
                <br>
                <div class="form-group">
                    <label class="label-control">Select Date</label>
                    <input type="date" class="form-control" >
                </div>
                <br>
                <div class="form-group">
                    <label for="exampleFormControlSelect3">Time</label>
                    <select class="form-control " data-style="btn btn-link" id="exampleFormControlSelect3">
                        <option>10:00-11:00 AM</option>
                        <option>11:00-12:00 AM</option>
                        <option>1:00-2:00 PM</option>
                        <option>2:00-3:00 PM</option>
                        <option>3:00-4:00 PM</option>
                        <option>4:00-5:00 PM</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Done</button>
            </div>
        </div>
    </div>
</div>
<!--end modals-->

@endsection

@section('script')
    <script>
        $( document ).ready(function() {
            const AppHistory = $('#AppHistory').DataTable({
                
            });
        });
    </script>
@endsection