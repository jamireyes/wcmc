@extends('layouts.app')

@section('content')
<div class="wrapper">
    @include('pages.doctor.include.sidebar')
    <div class="main-panel">      
        @include('pages.doctor.include.navbar')  
        <div class="row mt-5">
            {{-- <div class="col-md-6"> --}}
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">PATIENT LIST</h4>
                        <div class="col-4">
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Search...">
                                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                    <i class="material-icons">search</i>
                                    <div class="ripple-container"></div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>
                                NAME
                            </th>
                            <th>
                                ACTION
                            </th>
                            
                        </thead>
                        <tbody>
                                <tr>
                                    @foreach($patients as $patient)
                                        @if(Auth::user()->id == $patient->doctor_id)
                                            <td>
                                                {{$patient->first_name}} {{$patient->last_name}}
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary" onclick="displayToModal({{ $patient }})" data-toggle="modal" data-target="#exampleModal">
                                                    VIEW
                                                </button>
                                            </td>
                                        @endif
                                    @endforeach
                                    <td>
                                   
                                    <!-- MAO NI ANG MODAL -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Patient Record</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">First Name</label>
                                                        <input id="first_name" type="text" class="form-control" id="inputEmail4" placeholder="" readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputPassword4">Last Name</label>
                                                        <input id="last_name" type="text" class="form-control" id="inputPassword4" placeholder="" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputAddress">Details</label>
                                                    <input id="description" type="text" class="form-control" id="inputAddress" placeholder="" readonly>
                                                </div>
                                                <!-- {{-- <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label for="inputCity">Gender</label>
                                                    <input type="text" class="form-control" id="inputCity" >
                                                </div>
                                                </div>
                                                <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputCity">Birthday</label>
                                                    <input type="date" class="form-control" id="inputCity">
                                                </div>
                                                </div>
                                                <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputCity">Mobile No.</label>
                                                    <input type="number" class="form-control" id="inputCity">
                                                </div>
                                                </div>
                                                <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputCity">E-Mail</label>
                                                    <input type="email" class="form-control" id="inputCity">
                                                </div>
                                                </div>
                                                <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputCity">Civil Status</label>
                                                    <input type="text" class="form-control" id="inputCity">
                                                </div>
                                                </div>
                                                <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputCity">Allergies</label>
                                                    <input type="text" class="form-control" id="inputCity">
                                                </div>
                                                </div>
                                                <div>
                                                <button type="submit" class="btn btn-primary">SAVE CHANGES</button>
                                                <button type="submit" class="btn btn-primary">CANCEL</button>
                                                </div>
                                                </div>
                                                </div> --}} -->
                                            </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                        {{-- <button type="button" class="btn btn-danger">DELETE</button> --}}
                                    </td>
                                </tr>        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 
    
    <script>
        function displayToModal(patient) {
            document.getElementById('first_name').value = patient.first_name;
            document.getElementById('last_name').value = patient.last_name;
            document.getElementById('description').value = patient.description;
        }
    </script>

@endsection