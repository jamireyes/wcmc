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
                                <div class="p-0 "><h3 class="card-title ">Results</h3></div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                     <table class="table" id="Results_Patient">
                                        <thead class="text-primary">
                                            <tr>
                                                <th>Date</th>
                                                <th>Doctor</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            <td>08/30/2019</td>
                                            <td>Dr. Jose Montesclaros</td>   
                                            <td>Urinalysis</td>   
                                            <td class="text-primary">        
                                                <span class="badge badge-warning"><b>Pending</b></span>   
                                            </td>    
                                            <td class="text-primary">
                                                <a href="#" data-toggle="modal" data-target="#Results_P_Modal"><i class="fa fa-eye text-primary" aria-hidden="true"></i></a> 
                                            </td>        
                                            </tr>    
                                            <tr>
                                            <td>09/21/2019</td>
                                            <td>Dr. Jollibee McAdoo</td>   
                                            <td>Chest X-ray</td>   
                                            <td class="text-primary">        
                                                <span class="badge badge-success"><b>Claimed</b></span>   
                                            </td>    
                                            <td class="text-primary">
                                                <a href="#" data-toggle="modal" data-target="#Results_P_Modal"><i class="fa fa-eye text-primary" aria-hidden="true"></i></a> 
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

<!-- Modals -->

<div class="modal fade" id="Results_P_Modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Results</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
</div>         
<!-- End Modals -->
@endsection


@section('script')
<script>
        $( document ).ready(function() {
            const ResultPatient = $('#Results_Patient').DataTable({
                
            });
        });
</script>
@endsection