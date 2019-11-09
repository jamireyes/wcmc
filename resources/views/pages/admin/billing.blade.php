@extends('layouts.app')

@section('content')
<div class="wrapper">
    @include('pages.admin.include.sidebar')
    <div class="main-panel">
        @include('pages.admin.include.navbar')
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
                                            <th></th>
                                            <th>Payment Date</th>
                                            <th>Patient Name</th>
                                            <th>Discount</th>
                                            <th>Total Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($bills as $bill)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $bill->created_at }}</td>
                                                <td>{{ $bill->patientfname }} {{ $bill->patientmname }} {{ $bill->patientlname }}</td>
                                                <td>@if ($bill->discount != NULL) 20% @endif</td>
                                                <td>@if ($bill->discount == NULL) PHP {{ $bill->total }} @else PHP {{ $bill->total - ($bill->total * $bill->discount) }}.00 @endif</td>
                                                <td>
                                                    <a id="ViewBtn" data-id="{{$bill->patient_id}}" data-date="{{$bill->created_at}}" data-total="@if ($bill->discount == NULL){{ $bill->total }} @else {{ $bill->total - ($bill->total * $bill->discount) }}.00 @endif" data-toggle="modal" data-target="#ViewModal"><i class="fa fa-eye text-secondary" aria-hidden="true"></i></a>
                                                    @if($bill->deleted_at == NULL)
                                                        <a id="DeleteBtn" data-id="{{$bill->patient_id}}" data-date="{{$bill->created_at}}" data-toggle="modal" data-target="#DeleteModal"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>
                                                    @else
                                                        <a id="RestoreBtn" data-id="{{$bill->patient_id}}" data-date="{{$bill->created_at}}" data-toggle="modal" data-target="#RestoreModal"><i class="fas fa-trash-restore text-primary"></i></a>
                                                    @endif
                                                </td>
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
</div>

{{-- View Modal --}}
<div class="modal fade" id="ViewModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered" style="font-size: 13px;">
                    <thead>
                        <tr>
                            <th>DESCRIPTION</th>
                            <th>RATE</th>
                        </tr>
                    </thead>
                    <tbody id="View_MS">
                    </tbody>
                </table>
            </div>
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
                    <input type="hidden" id="del_id" value="">
                    <input type="hidden" id="del_date" value="">
                    <button id="DelSubmit" type="button" class="btn btn-danger">YES, DELETE IT!</button>
                    <button type="button" class="btn btn-dark" data-dismiss="modal">NO, KEEP IT</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Restore Modal -->
<div class="modal fade" id="RestoreModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <i class="fa fa-exclamation-circle fa-3x text-primary pt-4" aria-hidden="true"></i>
                <h3>Are you sure?</h3>
                <p></p>
            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-center w-100">
                    @csrf
                    <input type="hidden" id="restore_id" value="">
                    <input type="hidden" id="restore_date" value="">
                    <button id="RestoreSubmit" type="button" class="btn btn-primary">YES, RESTORE IT!</button>
                    <button type="button" class="btn btn-dark" data-dismiss="modal">NO, LEAVE IT</button>
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

        PusherListener();
        $.fn.dataTable.ext.errMode = 'none';

        function PusherListener() {
            Pusher.logToConsole = true;

            var pusher = new Pusher('89973cf8f98acc38053a', {
                cluster: 'ap1',
                'useTLS': false,
            });
            
            var channel = pusher.subscribe('PatientStaff.2');
            channel.bind('PatientStaff', function(data) {
                if (data.type == 'success') {
                    toastr.success(data.message, data.title);
                } else if (data.type == 'info') {
                    toastr.info(data.message, data.title);
                } else if (data.type == 'warning') {
                    toastr.warning(data.message, data.title);
                } else if (data.type == 'error') {
                    toastr.error(data.message, data.title);
                }
            });
        }

        const bill_transactions = $('#bill_transactions').DataTable();
        
        bill_transactions.on('click', '#ViewBtn', function(){
            var id = $(this).data('id');
            var date = $(this).data('date');
            var total = $(this).data('total');
            
            $.ajax({
                type: "POST",
                url: "{{ route('billing.getMedicalService') }}",
                data: {
                    patient_id: id,
                    created_at: date,
                    '_token' : "{{csrf_token() }}"
                },
                success: function(response){
                    var html = "<tr><th class='text-primary text-right'>GRAND TOTAL</th><th class='text-primary'>"+total+"</th></tr>";
                    $('#View_MS').empty();
                    $('#View_MS').append(response);
                    $('#View_MS').append(html);
                },
                error: function() {
                    toastr.error('Error');
                }
            });
        });

        bill_transactions.on('click', '#DeleteBtn', function(){
            var id = $(this).data('id');
            var date = $(this).data('date');

            $('#del_id').val(id);
            $('#del_date').val(date);
        });

        $('#DelSubmit').click(function(){
            var id = $('#del_id').val();
            var date = $('#del_date').val();

            $.ajax({
                type: "POST",
                url: "{{ route('billing.destroy') }}",
                data: {
                    patient_id: id,
                    created_at: date,
                    '_token' : "{{csrf_token() }}"
                },
                success: function(response){
                    toastr.info(response);
                    window.location.reload();
                },
                error: function() {
                    toastr.error('Error');
                }
            });
        })

        bill_transactions.on('click', '#RestoreBtn', function(){
            var id = $(this).data('id');
            var date = $(this).data('date');
            
            $('#restore_id').val(id);
            $('#restore_date').val(date);
        });

        $('#RestoreSubmit').click(function(){
            var id = $('#restore_id').val();
            var date = $('#restore_date').val();
            
            $.ajax({
                type: "POST",
                url: "{{ route('billing.restore') }}",
                data: {
                    patient_id: id,
                    created_at: date,
                    '_token' : "{{csrf_token() }}"
                },
                success: function(response){
                    toastr.info(response);
                    window.location.reload();
                },
                error: function() {
                    toastr.error('Error');
                }
            });
        });

        $('#ViewModal').on('hidden.bs.modal', function () {
            $('#View_MS').empty();
        });
    });
</script>
@endsection