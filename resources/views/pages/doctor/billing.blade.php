@extends('layouts.app')

@section('content')
<div class="wrapper">
    @include('pages.doctor.include.sidebar')
    <div class="main-panel">
        @include('pages.doctor.include.navbar')
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card">
                        <div class="card-header card-header-primary">BILL TRANSACTIONS</div>
                        <div class="card-body">
                            <table id="bill_transactions" class="table">
                                <thead>
                                    <tr>
                                        <th>OR No.</th>
                                    
                                        <th>Patient Name</th>
                                        <th>Total Amount</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(count($bills))
                                    @foreach($bills as $bill)
                                    <tr>
                                        <td>{{ $bill->id }}</td>  
                                        <th>{{ $bill->Patientfname }} {{ $bill->Patientmname }} {{ $bill->Patientlname }}</th>
                                        <td>PHP {{ $bill->total }}</td>
                                        <td class="text-primary">
                                        @if( $bill->status == "PAID" )
                                            <span class="badge badge-pill badge-success">PAID</span>
                                        @elseif( $bill->status = "UNPAID")
                                            <span class="badge badge-pill badge-danger">NOT PAID!</span>
                                        @endif
                                        </td>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#ViewModal"><i class="fa fa-eye text-primary" aria-hidden="true"></i></a>
                                            
                                            <a href="#" data-toggle="modal" data-target="#DeleteModal"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>
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


{{-- Modal --}}

<div class="modal fade" id="ViewModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Bill No. 14106645</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered" style="font-size: 13px;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>DESCRIPTION</th>
                            <th>PRICE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>MEDICAL CHECK-UP</td>
                            <td>PHP 250.00</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>CBC TEST</td>
                            <td>PHP 120.00</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>URINALYSIS</td>
                            <td>PHP 80.00</td>
                        </tr>
                        <tr>
                            <th colspan="2">GRAND TOTAL</th>
                            <th class="text-primary">PHP 450.00</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <i class="fa fa-exclamation-circle fa-3x text-danger pt-4" aria-hidden="true"></i>
                <h3>Are you sure?</h3>
                <p></p>
            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-center w-100">
                    <button type="button" class="btn btn-danger">YES, DELETE IT!</button>
                    <button type="button" class="btn btn-dark" data-dismiss="modal">NO, KEEP IT</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection