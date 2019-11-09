<div class="modal fade" id="Profile" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body p-5">
                <div class="text-center w-100 mb-2">
                    <i class="fas fa-user-circle fa-5x text-primary" aria-hidden="true"></i>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label>Username</label>
                            <input id="view_username" type="text" class="form-control disabled" value="{{Auth::user()->username}}" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label>First Name</label>
                            <input id="view_first_name" type="text" class="form-control disabled" value="{{Auth::user()->first_name}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label>Middle Name</label>
                            <input id="view_middle_name" type="text" class="form-control disabled" value="{{Auth::user()->middle_name}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input id="view_last_name" type="text" class="form-control disabled" value="{{Auth::user()->last_name}}" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label>Email Address</label>
                            <input id="view_email" type="email" class="form-control disabled" value="{{Auth::user()->email}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label>Contact No.</label>
                            <input id="view_contact_no" type="text" class="form-control disabled" value="{{Auth::user()->contact_no}}" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label>Sex</label>
                            <input id="view_sex" type="text" class="form-control disabled" value="{{Auth::user()->sex}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label>Civil Status</label>
                            <input id="view_civil_status" type="text" class="form-control disabled" value="{{Auth::user()->civil_status}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label>Bloodtype</label>
                            <input id="view_bloodtype" type="text" class="form-control disabled" value="{{Auth::user()->bloodtype->description}}" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label>Birthday</label>
                            <input id="view_birthday" type="date" class="form-control disabled" value="{{Auth::user()->birthday}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label>Citizenship</label>
                            <input id="view_citizenship" type="text" class="form-control disabled" value="{{Auth::user()->citizenship}}" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label >Adress Line 1</label>
                            <input id="view_address_line_1" type="text" class="form-control disabled" value="{{Auth::user()->address_line_1}}" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label>Adress Line 2</label>
                            <input id="view_address_line_2" type="text" class="form-control disabled" value="{{Auth::user()->address_line_2}}" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-center w-100">
                    <div>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>