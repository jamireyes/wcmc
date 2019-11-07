@extends('layouts.app')

@section('content')
<div class="wrapper ">
    @include('pages.patient.include.sidebar')
    <div class="main-panel">
        @include('pages.patient.include.navbar')
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <div class="p-0 "><h3 class="card-title ">Billing</h3></div>
                            </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table" id="Billing_Patients">
                                            <thead>
                                                <tr>
                                                    <th>Bill No.</th>
                                                    <th>Date</th>
                                                    <th>Doctor</th>
                                                    <th>Description</th>
                                                    <th>Total</th>
                                                    <th>View</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($bills))         
                                                    @foreach($bills as $bill)
                                                    <tr>
                                                        <td>{{ $bill->id}}</td>
                                                        <td>{{ $bill->date }}</td>
                                                        <td>{{ $bill->doctor }}</td>
                                                        <td>{{ $bill->description }}</td>
                                                        <td>Php 230.00</td>
                                                        <td>
                                                            <a href="#" data-toggle="modal" data-target="#BillingModal"><i class="fa fa-eye text-primary" aria-hidden="true"></i></a> 
                                                        </td>
                                                    </tr> 
                                                    @endforeach
                                                @endif
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

<!--Modals-->
<div class="modal fade" id="BillingModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Receipt</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                        <table>
                            <tbody>
                                <tr>
                                    <td>Username</td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
        </div>
    </div>
</div>         
<!--End Modals-->

@endsection

@section('script')
<script>
        $( document ).ready(function() {
            const ResultPatient = $('#Billing_Patients').DataTable({
                
            });
        });
</script>
@endsection