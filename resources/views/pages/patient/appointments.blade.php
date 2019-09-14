@extends('layouts.app')

@section('content')
<div class="wrapper ">
    @include('pages.admin.include.sidebar')
    <div class="main-panel">
      <!-- Navbar -->
      @include('pages.admin.include.navbar')
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <div class="d-flex bd-highlight">
                    <div class="p-0 "><h3 class="card-title ">Appointments</h3></div>
                    <div class="ml-auto p-0"><button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">
                      Request Appointment
                    </button>
                  </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          Date & <br>
                          Time
                        </th>
                        <th>
                          Doctor
                        </th>
                        <th>
                          Status
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
                          <td class="text-primary">
                              <i class="fa fa-check text-success" aria-hidden="true"></i>
                          </td>
                        </tr>
                        <tr>
                          <td>
                              09/4/2019 2:00 PM
                          </td>
                          <td>
                            Dr. Jollibee McAdoo
                          </td>
                          <td class="text-primary">
                                <i class="fa fa-clock-o text-warning" aria-hidden="true"></i>
                          </td>
                        </tr>
                        <tr>
                            <td>
                                08/24/2019 10:00 AM
                            </td>
                            <td>
                                Dr. Jose Montesclaros
                            </td>
                            <td class="text-primary">
                                <i class="fa fa-times text-danger" aria-hidden="true"></i>
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

  <!--modals-->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Request Appointment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div class="form-group">
                  <label for="exampleFormControlSelect1">Select Doctor</label>
                  <select class="form-control " data-style="btn btn-link" id="exampleFormControlSelect1">
                    <option>Dr. Jose Montesclaros</option>
                    <option>Dr. Jollibee McAdoo</option>
                  </select>
                </div><br>
                <div class="form-group">
                    <label class="label-control">Select Date</label>
                    <input type="date" class="form-control" >
                </div>
               <br>
                  <div class="form-group">
                      <label for="exampleFormControlSelect3">Time</label>
                      <select class="form-control " data-style="btn btn-link" id="exampleFormControlSelect3">
                        <option>10:00-11:00 AM</option>
                        <option>11:00-12:00 AM</option>
                        <option>1:00-2:00 PM</option>
                        <option>2:00-3:00 PM</option>
                        <option>3:00-4:00 PM</option>
                        <option>4:00-5:00 PM</option>
                      </select>
                    </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  <!--end modals-->

  @endsection