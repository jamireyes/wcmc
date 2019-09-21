@extends('layouts.app')

@section('content')
<div class="wrapper">
    @include('pages.admin.include.sidebar')
    <div class="main-panel">
        @include('pages.admin.include.navbar')
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header card-header-primary">EDIT PROFILE</div>
                            <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input name="username" type="text" class="form-control" value="{{ $user->username }}">

                                                @if(is_null($user->username))
                                                    <small class="text-danger">Missing entry</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Email Address</label>
                                                <input name="email" type="email" class="form-control" value="{{ $user->email }}">

                                                @if(is_null($user->email))
                                                    <small class="text-danger">Missing entry</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Contact No.</label>
                                                <input name="contact_no" type="text" class="form-control" value="{{ $user->contact_no }}">

                                                @if(is_null($user->contact_no))
                                                    <small class="text-danger">Missing entry</small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input name="first_name" type="text" class="form-control" value="{{ $user->first_name }}">
                                                
                                                @if(is_null($user->first_name))
                                                    <small class="text-danger">Missing entry</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Middle Name</label>
                                                <input name="middle_name" type="text" class="form-control" value="{{ $user->middle_name }}">
                                                
                                                @if(is_null($user->middle_name))
                                                    <small class="text-danger">Missing entry</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input name="last_name" type="text" class="form-control" value="{{ $user->last_name }}">
                                                
                                                @if(is_null($user->last_name))
                                                    <small class="text-danger">Missing entry</small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Sex</label>
                                                <select name="sex" class="form-control">
                                                    @foreach ($items_2 as $item_2)
                                                        @if($user->sex == $item_2)
                                                            <option value="{{ $item_2 }}" selected>{{ $item_2 }}</option>
                                                        @elseif($user->sex != $item_2)
                                                            <option value="{{ $item_2 }}">{{ $item_2 }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                
                                                @if(is_null($user->sex))
                                                    <small class="text-danger">Missing entry</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Birthday</label>
                                                <input name="birthday" type="date" class="form-control" value="{{ $user->birthday }}">

                                                @if(is_null($user->birthday))
                                                    <small class="text-danger">Missing entry</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Citizenship</label>
                                                <input name="citizenship" type="text" class="form-control" value="{{ $user->citizenship }}">

                                                @if(is_null($user->citizenship))
                                                    <small class="text-danger">Missing entry</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Civil Status</label>
                                                <select name="civil_status" class="form-control">
                                                    @foreach ($items_1 as $item_1)
                                                        @if($user->civil_status == $item_1)
                                                            <option value="{{ $item_1 }}" selected>{{ $item_1 }}</option>
                                                        @elseif($user->civil_status != $item_1)
                                                            <option value="{{ $item_1 }}">{{ $item_1 }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>

                                                @if(is_null($user->civil_status))
                                                    <small class="text-danger">Missing entry</small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label >Adress Line 1</label>
                                                <input name="address_line_1" type="text" class="form-control" value="{{ $user->address_line_1 }}">

                                                @if(is_null($user->address_line_1))
                                                    <small class="text-danger">Missing entry</small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label >Adress Line 2</label>
                                                <input name="address_line_2" type="text" class="form-control" value="{{ $user->address_line_2 }}">

                                                @if(is_null($user->address_line_2))
                                                    <small class="text-danger">Missing entry</small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header card-header-primary">CHANGE PASSWORD</div>
                            <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label >Old Password</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label >New Password</label>
                                                <input type="email" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label >Confirm Password</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary pull-right">UPDATE PASSWORD</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection