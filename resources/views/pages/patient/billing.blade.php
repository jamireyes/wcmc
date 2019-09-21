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
                      <div class="p-0 "><h3 class="card-title ">Billing</h3></div>
                        <div class="md-form mt-2">
                          <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                        </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead class=" text-primary">
                          <th>
                            Bill No. 
                          </th>
                          <th>
                            Doctor Name
                          </th>
                          <th>
                            Date
                          </th>
                          <th>
                            Total Amount
                          </th>
                          <th>
                            View
                          </th>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              15101378
                            </td>
                            <td>
                              Dr. Jose Montesclaros
                            </td>
                            <td>
                              08/30/2019
                            </td>
                            <td class="text-danger">
                                Php 670.00
                          </td>
                          <td class="text-primary">
                              <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">
                                  Receipt
                                </button>
                          </td>
                          </tr>
                          <tr>
                            <td>
                              15101329
                            </td>
                            <td>
                              Dr. Jollibee McAdoo
                            </td>
                            <td>
                              09/8/2019
                              </td>
                              <td class="text-danger">
                                  Php 800.00
                            </td>
                            <td class="text-primary">
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    Receipt
                                  </button>
                            </td>
                          </tr>
                          <tr>
                              <td>
                                14106645
                              </td>
                              <td>
                                Dr. Jose Montesclaros
                              </td>
                              <td>
                                10/30/2019
                                </td>
                                <td class="text-danger">
                                    Php 1,500.00
                              </td>
                              <td class="text-primary">
                                  <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">
                                      Receipt
                                    </button>
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
  <!--Modals-->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ...
          </div>
        </div>
      </div>
    </div>
  <!--End Modals-->

  @endsection
  