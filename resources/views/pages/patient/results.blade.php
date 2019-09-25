@extends('layouts.app')

@section('content')
<div class="wrapper ">
    @include('pages.patient.include.sidebar')
    <div class="main-panel">
        <!-- Navbar -->
        @include('pages.patient.include.navbar')
        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <div class="p-0 "><h3 class="card-title ">Results</h3></div>
                                <div class="md-form mt-2">
                                    <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                            <th>
                                                Date 
                                            </th>
                                            <th>
                                                Doctor
                                            </th>
                                            <th>
                                                Description
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                            <th>
                                                View
                                            </th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    08/30/2019 11:00 AM
                                                </td>
                                                <td>
                                                    Dr. Jose Montesclaros
                                                </td>
                                                <td>
                                                    Urinalysis
                                                </td>
                                                <td class="text-primary">
                                                    <span class="badge badge-warning"><b>Pending</b></span>
                                                </td>
                                                <td class="text-primary">
                                                    <a href="#"><i class="fa fa-file-pdf-o text-dark " aria-hidden="true"></i></a> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    09/4/2019 2:00 PM
                                                </td>
                                                <td>
                                                    Dr. Jollibee McAdoo
                                                </td>
                                                <td>
                                                    Urinalysis
                                                </td>
                                                <td class="text-primary">
                                                    <span class="badge badge-success"><b>Claimed</b></span>
                                                </td>
                                                <td class="text-primary">
                                                    <a href="#"><i class="fa fa-file-pdf-o text-dark " aria-hidden="true"></i></a> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    08/24/2019 10:00 AM
                                                </td>
                                                <td>
                                                    Dr. Jose Montesclaros
                                                </td>
                                                <td>
                                                    Urinalysis
                                                </td>
                                                <td class="text-primary">
                                                    <span class="badge badge-primary"><b>Ready</b></span>
                                                </td>
                                                <td class="text-primary">
                                                    <a href="#"><i class="fa fa-file-pdf-o text-dark " aria-hidden="true"></i></a> 
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <nav class="float-left">
                    <ul>
                        <!-- <li>
                            <a href="https://www.creative-tim.com">
                                Creative Tim
                            </a>
                        </li> -->
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
                </nav>
                <!-- <div class="copyright float-right">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, made with <i class="material-icons">favorite</i> by
                    <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
                </div> -->
            </div>
        </footer>
    </div>
</div>

@endsection
