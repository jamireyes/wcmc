
<div class="modal fade" id="Profile" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body p-5">
                <div class="text-center w-100 mb-5">
                    <i class="fas fa-user-circle fa-5x text-primary" aria-hidden="true"></i>
                </div>
                <table>
                    <tbody>
                        <tr>
                            <td>Username&nbsp&nbsp&nbsp&nbsp</td>
                            <td>{{ Auth::user()->username }}</td>
                        </tr>
                        <tr>
                            <td>Full Name&nbsp&nbsp&nbsp&nbsp</td>
                            <td>{{ Auth::user()->first_name }} {{ Auth::user()->middle_name }} {{ Auth::user()->last_name }}</td>
                        </tr>
                        <tr>
                            <td>Email&nbsp&nbsp&nbsp&nbsp</td>
                            <td>{{ Auth::user()->email }}</td>
                        </tr>
                        <tr>
                            <td>Contact No.&nbsp&nbsp&nbsp&nbsp</td>
                            <td>{{ '0'.Auth::user()->contact_no }}</td>
                        </tr>
                        <tr>
                            <td>Sex&nbsp&nbsp&nbsp&nbsp</td>
                            <td>{{ Auth::user()->sex }}</td>
                        </tr>
                        <tr>
                            <td>Birthday&nbsp&nbsp&nbsp&nbsp</td>
                            <td>{{ Auth::user()->birthday }}</td>
                        </tr>
                        <tr>
                            <td>Citizenship&nbsp&nbsp&nbsp&nbsp</td>
                            <td>{{ Auth::user()->citizenship }}</td>
                        </tr>
                        <tr>
                            <td>Civil Status&nbsp&nbsp&nbsp&nbsp</td>
                            <td>{{ Auth::user()->civil_status }}</td>
                        </tr>
                        <tr>
                            <td>Address&nbsp&nbsp&nbsp&nbsp</td>
                            <td>{{ Auth::user()->address_line_1 }}</td>
                            <td>{{ Auth::user()->address_line_2 }}</td>
                        </tr>
                    </tbody>
                </table>
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