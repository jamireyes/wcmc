@extends('layouts.app')

@section('content')
<div class="wrapper">
    @include('pages.nurse.include.sidebar')
    <div class="main-panel">
        @include('pages.nurse.include.navbar')
        <div class="content mt-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header card-header-primary text-center">BILL PAYMENTS</div>
                            <div class="card-body">
                                <table id="bill_transactions" class="table">
                                    <thead>
                                        <tr>
                                            <th>OR No.</th>
                                            <th>Payment Date</th>
                                            <th>Total Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>14106645</td>
                                            <td>July 18, 2019</td>
                                            <td>PHP 450.00</td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#ViewModal"><i class="fa fa-eye text-primary" aria-hidden="true"></i></a>
                                                <a href="#" data-toggle="modal" data-target="#EditModal"><i class="fas fa-edit text-warning mx-1"></i></a>
                                                <a href="#" data-toggle="modal" data-target="#DeleteModal"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>15101716</td>
                                            <td>July 19, 2019</td>
                                            <td>PHP 500.00</td>
                                            <td>
                                                <a href="#"><i class="fa fa-eye text-primary" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fas fa-edit text-warning mx-1"></i></a>
                                                <a href="#"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>15107788</td>
                                            <td>July 20, 2019</td>
                                            <td>PHP 1000.00</td>
                                            <td>
                                                <a href="#"><i class="fa fa-eye text-primary" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fas fa-edit text-warning mx-1"></i></a>
                                                <a href="#"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>
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
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div> --}}
        </div>
    </div>
</div>

<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Bill Transactions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
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

@section('script')
<script src="{{ asset('vendor/material/js/material-dashboard.js') }}"></script>
<script>
    $( document ).ready(function() {
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });

        Pusher.logToConsole = true;

        var pusher = new Pusher('89973cf8f98acc38053a', {
            cluster: 'ap1',
            'useTLS': false,
        });
        
        var channel = pusher.subscribe('AppointmentStatus.2');
        channel.bind('AppointmentStatus', function(data) {
            toastr.info(data.message, 'Notification');
        });
    });
</script>
@endsection