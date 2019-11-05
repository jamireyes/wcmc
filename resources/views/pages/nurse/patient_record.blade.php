@extends('layouts.app')

@section('content')
<div class="wrapper">
    @include('pages.nurse.include.sidebar')
    <div class="main-panel">      
        @include('pages.nurse.include.navbar') 
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
                                            <th>Full Name</th>
                                            <th></th>
                                            <th>Action</th>
                                        </thead>
                                            <tbody>
                                                    @foreach($patients as $patient)
                                                    <tr>
                                                    <!-- {{-- @if(Auth::user()->id == $patient->_id) --}} -->
                                                        <td>
                                                            {{$patient->first_name}} {{$patient->last_name}}
                                                        </td>
                                                        <td></td>
                                                        <td>
                                                            <i class="fas fa-eye text-success mx-1" onclick="displayToModal({{ $patient }})" data-toggle="modal" data-target="#exampleModal">                                 
                                                            </i>
                                                            <i class="fas fa-edit text-warning mx-1" onclick="displayToModal({{ $patient }})" data-toggle="modal" data-target="#exampleModal">                                 
                                                            </i>
                                                            <i class="fas fa-plus text-primary mx-1" onclick="addModal({{ $patient }})" data-toggle="modal" data-target="#AddModal">                                 
                                                            </i>                                         
                                                        </td>
                                                    <!-- {{-- @endif --}} -->
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
                                <!-- MODAL FOR THE VIEW-->
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
                                                    <label for="inputAddress">Medical History</label>
                                                    <input id="description" type="text" class="form-control" id="inputAddress" placeholder="" readonly>
                                                </div>
                                                {{-- <div class="form-row">
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
                                                </div> --}}
                                            </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    {{-- MODAL PARA SA ADD --}}
                                    <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add New Record</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                            <form method="post" action="/nurse/patient_records/add_new">
                                                {{ csrf_field() }}
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">Patient ID</label>
                                                        <input id="user_id" type="text" class="form-control" id="inputEmail4" placeholder="" name="user_id" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputAddress">Medical History</label>
                                                    <input id="description" type="text" class="form-control" id="inputAddress" placeholder="" name="description">
                                                </div>
                                                <div class="form-group">
                                                <a href="" type="submit"> <button class="btn btn-primary" > Submit  </button> </a>
                                                </div>
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

        function addModal(patient) {
            document.getElementById('user_id').value = patient.id;
        }

    </script>

@endsection