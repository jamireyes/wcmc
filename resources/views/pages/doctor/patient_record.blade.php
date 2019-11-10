@extends('layouts.app')

@section('content')
<div class="wrapper">
    @include('pages.doctor.include.sidebar')
    <div class="main-panel">      
        @include('pages.doctor.include.navbar')  
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <form id="patient_details">
                                @csrf
                                <div class="card-header card-header-primary">
                                    <div class="d-flex w-100">
                                        <div class="mr-auto">ENTER PATIENT NAME</div>
                                        <div></div>
                                        <div><button type="submit" id="submit_patient" class="btn btn-secondary btn-sm m-0">SUBMIT</button></div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label><i class="fa fa-user pr-2" aria-hidden="true"></i>Patient's Name</label>
                                        <select id="patient_id" name="patient_id" class="form-control">
                                            <option value="" disabled selected>Select a patient...</option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <div class="d-flex justify-content-between">
                                    <div></div>
                                    <div>MEDICAL HISTORY</div>
                                    <div></div>
                                </div></div>
                            <div class="card-body">
                                <table id="medical_history_table" class="table display table-striped">
                                    <thead>
                                        <th style="font-size: 1em;">Description</th>
                                        <th style="font-size: 1em;">Created At</th>
                                        <th style="font-size: 1em;">Last Update</th>
                                        <th style="font-size: 1em;">Action</th>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <div class="d-flex justify-content-between">
                                    <div></div>
                                    <div>VITAL SIGNS</div>
                                    <div></div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="vital_signs_table" class="table display table-striped">
                                    <thead>
                                        <th style="font-size: 1em;">Doctor</th>
                                        <th style="font-size: 1em;">Description</th>
                                        <th style="font-size: 1em;">Value</th>
                                        <th style="font-size: 1em;">Created At</th>
                                        <th style="font-size: 1em;">Last Update</th>
                                        <th style="font-size: 1em;">Action</th>
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
@endsection

@section('script')
<script src="{{ asset('vendor/material/js/material-dashboard.js') }}"></script>
<script>
    $( document ).ready(function() {

        $('#medical_history_table').DataTable();
        $('#vital_signs_table').DataTable();

        $('#submit_patient').click(function(e){
            e.preventDefault();
            
            var patient_id = $('#patient_id').val();
            console.log(patient_id);
            
            if( patient_id != '' ){
                $('#medical_history_table').DataTable().destroy();
                $('#vital_signs_table').DataTable().destroy();

                getMedicalHistory(patient_id);
                getVitalSigns(patient_id);
            }else{
                toastr.warning('Missing entries!');
            }
            
        });

        function getMedicalHistory(patient_id) {
            $('#medical_history_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    type: "POST",
                    url: "{{ route('getMedicalHistory') }}",
                    data: {
                        '_token' : "{{csrf_token() }}",
                        patient_id: patient_id
                    }
                },
                columns: [
                    { data: "description", name: "description" },
                    { data: "created_at", name: "created_at" },
                    { data: "updated_at", name: "updated_at" },
                    { data: "Action", name: "Action" }
                ]
            });
        }

        function getVitalSigns(patient_id) {
            $('#vital_signs_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    type: "POST",
                    url: "{{ route('getVitalSigns') }}",
                    data: {
                        '_token' : "{{csrf_token() }}",
                        patient_id: patient_id
                    }
                },
                columns: [
                    { data: "fullname", name: "fullname" },
                    { data: "name", name: "name" },
                    { data: "value", name: "value" },
                    { data: "created_at", name: "created_at" },
                    { data: "updated_at", name: "updated_at" },
                    { data: "Action", name: "Action" }
                ]
            });
        }
    });
</script>
@endsection