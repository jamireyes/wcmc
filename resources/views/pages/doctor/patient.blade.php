@extends('layouts.app')

@section('content')
<div class="wrapper">
    @include('pages.doctor.include.sidebar')
    <div class="main-panel">      
        @include('pages.doctor.include.navbar')  
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">PATIENT LIST</h4>
                        <div class="col-4">
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Search...">
                                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                    <i class="material-icons">search</i>
                                    <div class="ripple-container"></div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>
                                NAME
                            </th>
                            <th>
                                ACTION
                            </th>
                            
                        </thead>
                        <tbody>
                                <tr>
                                    <td>
                                    Dakota Rice
                                    </td>
                                    <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        EDIT
                                    </button>
                                    
                                    <!-- MAO NI ANG MODAL -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">EDIT PATIENT</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                            <form>
                                                <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">First Name</label>
                                                    <input type="text" class="form-control" id="inputEmail4" placeholder="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Last Name</label>
                                                    <input type="text" class="form-control" id="inputPassword4" placeholder="">
                                                </div>
                                                </div>
                                                <div class="form-group">
                                                <label for="inputAddress">Address</label>
                                                <input type="text" class="form-control" id="inputAddress" placeholder="">
                                                </div>
                                                <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label for="inputCity">Gender</label>
                                                    <input type="text" class="form-control" id="inputCity" >
                                                </div>
                                                </div>
                                                <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputCity">Birthday</label>
                                                    <input type="date" class="form-control" id="inputCity">
                                                </div>
                                                </div>
                                                <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputCity">Mobile No.</label>
                                                    <input type="number" class="form-control" id="inputCity">
                                                </div>
                                                </div>
                                                <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputCity">E-Mail</label>
                                                    <input type="email" class="form-control" id="inputCity">
                                                </div>
                                                </div>
                                                <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputCity">Civil Status</label>
                                                    <input type="text" class="form-control" id="inputCity">
                                                </div>
                                                </div>
                                                <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputCity">Allergies</label>
                                                    <input type="text" class="form-control" id="inputCity">
                                                </div>
                                                </div>
                                                <div>
                                                <button type="submit" class="btn btn-primary">SAVE CHANGES</button>
                                                <button type="submit" class="btn btn-primary">CANCEL</button>
                                                </div>
                                                </div>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
        
                                        <button type="button" class="btn btn-danger">DELETE</button>
                                    </td>
        
                                </tr>
                                <tr>
                                    <td>
                                    Minerva Hooper
                                    </td>
                                    <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        EDIT
                                    </button>
                                    
                                    <!-- Modal -->
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
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                        <button type="button" class="btn btn-danger">DELETE</button>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td>
                                    Sage Rodriguez
                                    </td>
                                    <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        EDIT
                                    </button>
                                    
                                    <!-- Modal -->
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
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                        <button type="button" class="btn btn-danger">DELETE</button>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td>
                                    Philip Chaney
                                    </td>
                                    <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        EDIT
                                    </button>
                                    
                                    <!-- Modal -->
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
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                        <button type="button" class="btn btn-danger">DELETE</button>
                                    </td>
                        
                                </tr>
                                <tr>
                                    <td>
                                    Doris Greene
                                    </td>
                                    <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        EDIT
                                    </button>
                                    
                                    <!-- Modal -->
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
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                        <button type="button" class="btn btn-danger">DELETE</button>
                                    </td>
        
                                </tr>
                            <tr>
                                <td>
                                    Mason Porter
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        EDIT
                                    </button>
                                    
                                    <!-- Modal -->
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
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-danger">DELETE</button>
                                </td>
                            </tr>        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 


{{-- 
            <div class="col-md-6">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">PATIENT LIST</h4>
                            <div class="col-4">
                                <div class="input-group no-border">
                                    <input type="text" value="" class="form-control" placeholder="Search...">
                                    <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                        <i class="material-icons">search</i>
                                        <div class="ripple-container"></div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="col-md-6">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>
                                        NAME
                                    </th>
                                    <th>
                                        ACTION
                                    </th>
                                    </thead>
                                <tbody>
                                <tr>
                                    <td>
                                    Dakota Rice
                                    </td>
                                    <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        EDIT
                                    </button>
                                    
                                    <!-- MAO NI ANG MODAL -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">EDIT PATIENT</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                            <form>
                                                <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">First Name</label>
                                                    <input type="text" class="form-control" id="inputEmail4" placeholder="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Last Name</label>
                                                    <input type="text" class="form-control" id="inputPassword4" placeholder="">
                                                </div>
                                                </div>
                                                <div class="form-group">
                                                <label for="inputAddress">Address</label>
                                                <input type="text" class="form-control" id="inputAddress" placeholder="">
                                                </div>
                                                <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label for="inputCity">Gender</label>
                                                    <input type="text" class="form-control" id="inputCity" >
                                                </div>
                                                </div>
                                                <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputCity">Birthday</label>
                                                    <input type="date" class="form-control" id="inputCity">
                                                </div>
                                                </div>
                                                <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputCity">Mobile No.</label>
                                                    <input type="number" class="form-control" id="inputCity">
                                                </div>
                                                </div>
                                                <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputCity">E-Mail</label>
                                                    <input type="email" class="form-control" id="inputCity">
                                                </div>
                                                </div>
                                                <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputCity">Civil Status</label>
                                                    <input type="text" class="form-control" id="inputCity">
                                                </div>
                                                </div>
                                                <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputCity">Allergies</label>
                                                    <input type="text" class="form-control" id="inputCity">
                                                </div>
                                                </div>
                                                <div>
                                                <button type="submit" class="btn btn-primary">SAVE CHANGES</button>
                                                <button type="submit" class="btn btn-primary">CANCEL</button>
                                                </div>
                                                </div>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
        
                                        <button type="button" class="btn btn-danger">DELETE</button>
                                    </td>
        
                                </tr>
                                <tr>
                                    <td>
                                    Minerva Hooper
                                    </td>
                                    <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        EDIT
                                    </button>
                                    
                                    <!-- Modal -->
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
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                        <button type="button" class="btn btn-danger">DELETE</button>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td>
                                    Sage Rodriguez
                                    </td>
                                    <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        EDIT
                                    </button>
                                    
                                    <!-- Modal -->
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
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                        <button type="button" class="btn btn-danger">DELETE</button>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td>
                                    Philip Chaney
                                    </td>
                                    <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        EDIT
                                    </button>
                                    
                                    <!-- Modal -->
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
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                        <button type="button" class="btn btn-danger">DELETE</button>
                                    </td>
                        
                                </tr>
                                <tr>
                                    <td>
                                    Doris Greene
                                    </td>
                                    <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        EDIT
                                    </button>
                                    
                                    <!-- Modal -->
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
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                        <button type="button" class="btn btn-danger">DELETE</button>
                                    </td>
        
                                </tr>
                                <tr>
                                    <td>
                                    Mason Porter
                                    </td>
                                    <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        EDIT
                                    </button>
                                    
                                    <!-- Modal -->
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
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                        <button type="button" class="btn btn-danger">DELETE</button>
                                    </td>
        
                                </tr>
                                
                                </tbody>
                            </table>
                        
                </div>
            </div>
        </div>

        <div class="row">  
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        
                <div class="col-md-6">
                        <div class="card card-plain">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title mt-0"> DAKOTA RICE</h4>
                                <p class="card-category">REGISTRATION DATE: JANUARY 10, 2018</p>
                            </div>
                                        
                            <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                    <td>GENDER: </td>
                                    <td>FEMALE</td>
                                    </tr>
                                                
                                    <tr>
                                    <td>BIRTHDAY:</td>
                                    <td>MAY 21, 1998</td>
                                    </tr>
                                                
                                    <tr>
                                    <td>ADDRESS:</td>
                                    <td>CEBU CITY</td>
                                    </tr>
                                                
                                    <tr>
                                    <td>MOBLIE NO.</td>
                                    <td>09123456789</td>
                                    </tr>
                                                
                                    <tr>
                                    <td>E-MAIL:</td>
                                    <td>dakota_rice@gmail.com</td>
                                    </tr>
                                                
                                    <tr>
                                    <td>CIVIL STATUS:</td>
                                    <td>SINGLE</td>
                                    </tr>
                                                
                                    <tr>
                                    <td>ALLERGIES:</td>
                                    <td>NONE</td>
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
                <div class="copyright float-right">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>, made with <i class="material-icons">favorite</i> by
                <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
                </div>
            </div>
            </footer>
        </div>
        </div>
        <div class="fixed-plugin">
        <div class="dropdown show-dropdown">
            <a href="#" data-toggle="dropdown">
            <i class="fa fa-cog fa-2x"> </i>
            </a>
            <ul class="dropdown-menu">
            <li class="header-title"> Sidebar Filters</li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger active-color">
                <div class="badge-colors ml-auto mr-auto">
                    <span class="badge filter badge-purple" data-color="purple"></span>
                    <span class="badge filter badge-azure" data-color="azure"></span>
                    <span class="badge filter badge-green" data-color="green"></span>
                    <span class="badge filter badge-warning" data-color="orange"></span>
                    <span class="badge filter badge-danger" data-color="danger"></span>
                    <span class="badge filter badge-rose active" data-color="rose"></span>
                </div>
                <div class="clearfix"></div>
                </a>
            </li>
            <li class="header-title">Images</li>
            <li class="active">
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                <img src="../assets/img/sidebar-1.jpg" alt="">
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                <img src="../assets/img/sidebar-2.jpg" alt="">
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                <img src="../assets/img/sidebar-3.jpg" alt="">
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                <img src="../assets/img/sidebar-4.jpg" alt="">
                </a>
            </li>
            <li class="button-container">
                <a href="https://www.creative-tim.com/product/material-dashboard" target="_blank" class="btn btn-primary btn-block">Free Download</a>
            </li>
            <!-- <li class="header-title">Want more components?</li>
                <li class="button-container">
                    <a href="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-warning btn-block">
                        Get the pro version
                    </a>
                </li> -->
            <li class="button-container">
                <a href="https://demos.creative-tim.com/material-dashboard/docs/2.1/getting-started/introduction.html" target="_blank" class="btn btn-default btn-block">
                View Documentation
                </a>
            </li>
            <li class="button-container github-star">
                <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
            </li>
            <li class="header-title">Thank you for 95 shares!</li>
            <li class="button-container text-center">
                <button id="twitter" class="btn btn-round btn-twitter"><i class="fa fa-twitter"></i> &middot; 45</button>
                <button id="facebook" class="btn btn-round btn-facebook"><i class="fa fa-facebook-f"></i> &middot; 50</button>
                <br>
                <br>
            </li>
            </ul>
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
</div> --}}

@endsection