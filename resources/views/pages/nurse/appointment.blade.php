@extends('layouts.app')

@section('content')
<div class="wrapper">
    @include('pages.admin.include.sidebar')
    <div class="main-panel">
        @include('pages.admin.include.navbar')
        <div class="content mt-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <div class="d-flex justify-content-between">
                                    <div></div>
                                    <div>APPROVED APPOINTMENTS</div>
                                    <div><a href="#" data-toggle="modal" data-target="#AppModal"><i class="fa fa-calendar text-white" aria-hidden="true"></i></a></div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h4>Current : <strong>Wilmar Zaragosa</strong></h4>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Patient</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Wilmar Zaragosa</td>
                                            <td>
                                                <a href="#"><i class="fas fa-edit text-warning mx-1"></i></a>
                                                <a href="#"><i class="fa fa-check-circle text-success mx-1" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Joshua Silao</td>
                                            <td>
                                                <a href="#"><i class="fas fa-edit text-warning mx-1"></i></a>                                               
                                                <a href="#"><i class="fa fa-check-circle text-success mx-1" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header card-header-warning text-center">
                                APPOINTMENT REQUESTS
                            </div>
                            <div class="card-body">
                                <div class="input-group no-border">
                                    <input type="text" value="" class="form-control" placeholder="Search...">
                                    <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                        <i class="material-icons">search</i>
                                        <div class="ripple-container"></div>
                                    </button>
                                </div>
                                <div class="table-responsive">
                                    <table id="patient_app_table" class="table patient-table">
                                        <thead>
                                            <th>#</th>
                                            <th>Patient Name</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Minerva Hooper</td>
                                                <td>
                                                    
                                                    <a href="#"><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Dakota Rice</td>
                                                <td>                                                   
                                                    <a href="#"><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Sage Rodriguez</td>
                                                <td>                                                    
                                                    <a href="#"><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Philip Chaney</td>
                                                <td>                                                    
                                                    <a href="#"><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Jami Reyes</td>
                                                <td>                                                   
                                                    <a href="#"><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Wilmar Zaragosa</td>
                                                <td>                                                    
                                                    <a href="#"><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Joshua Silao</td>
                                                <td>                                                   
                                                    <a href="#"><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>RJ Villafranca</td>
                                                <td>
                                                    <a href="#"><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></a>
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
                                <option>Jami Brent John E. Reyes</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
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
                    <div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                </span>
                            </div>
                            <input id="Select_Date_Input" type="date" class="form-control">
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
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </span>
                            </div>
                            <select id="Select_Patient_Input" class="form-control">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
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
                    <div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                </span>
                            </div>
                            <input id="Select_Date_Input" type="date" class="form-control">
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
