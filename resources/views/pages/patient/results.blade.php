@extends('layouts.app')

@section('content')
<div class="wrapper ">
    @include('pages.patient.include.sidebar')
    <div class="main-panel">
        @include('pages.patient.include.navbar')
        <div class="content mt-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header card-header-primary text-center">RESULTS</div>
                            <div class="card-body">
                                <table id="Results_patient" class="table">
                                    <thead>
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
                                            <td>August 20, 2019</td>
                                            <td>Dr. Jose Montesclaros</td>
                                            <td>Urinalysis</td>
                                            <td class="text-primary">
                                                    <span class="badge badge-warning"><b>Pending</b></span>
                                            </td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#ViewModal"><i class="fa fa-eye text-primary" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>September 21, 2019</td>
                                            <td>Dr. Jose Montesclaros</td>
                                            <td>Urinalysis</td>
                                            <td class="text-primary">
                                                <span class="badge badge-success"><b>Claimed</b></span>
                                            </td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#ViewModal"><i class="fa fa-eye text-primary" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>October 1, 2019</td>
                                            <td>Dr. Jose Montesclaros</td>
                                            <td>X-Ray</td>
                                            <td class="text-primary">
                                                <span class="badge badge-primary"><b>Ready</b></span>
                                            </td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#ViewModal"><i class="fa fa-eye text-primary" aria-hidden="true"></i></a>
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

<!-- Modals -->

<div class="modal fade" id="ViewModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Results</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
@endsection

 
        <!-- <footer class="footer">
            <div class="container-fluid">
                <nav class="float-left">
                    <ul>
                        <li>
                            <a href="https://www.creative-tim.com">
                                Creative Tim
                            </a>
                        </li> 
                        <li>
                            <a href="https://creative-tim.com/presentation">
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="https://www.creative-tim.com/license">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav> -->
                <!-- <div class="copyright float-right">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, made with <i class="material-icons">favorite</i> by
                    <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
                </div> -->
            <!-- </div>
        </footer> -->