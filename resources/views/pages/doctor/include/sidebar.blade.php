<div class="sidebar" data-color="blue" data-background-color="white">
    <div class="sidebar-background" style="background-color: #fff;"></div>
    <div class="logo">
        <a href="{{ url('/') }}" class="simple-text logo-normal" style="font-size: 15px;">
            White Cross Medical Clinic
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{ (Route::current()->getName() == 'dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard', ['name' => Auth::user()->username]) }}">
                    <i class="material-icons">dashboard</i>
                    <p>DASHBOARD</p>
                </a>
            </li>
            <li class="nav-item {{ (Route::current()->getName() == 'appointment') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('appointment', ['name' => Auth::user()->username]) }}">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <p>APPOINTMENTS</p>
                </a>
            </li>
            <li class="nav-item {{ (Route::current()->getName() == 'user_mgt') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('user_mgt', ['name' => Auth::user()->username]) }}">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <p>USER MANAGEMENT</p>
                </a>
            </li>
            <li class="nav-item {{ (Route::current()->getName() == 'billing') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('billing', ['name' => Auth::user()->username]) }}">
                    <i class="material-icons">library_books</i>
                    <p>BILL PAYMENTS</p>
                </a>
            </li>
            <li class="nav-item {{ (Route::current()->getName() == 'message') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('message', ['name' => Auth::user()->username]) }}">
                    <i class="fa fa-paper-plane" aria-hidden="true"></i>
                    <p>MESSAGES</p>
                </a>
            </li>
            <li class="nav-item {{ (Route::current()->getName() == 'setting') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('setting', ['name' => Auth::user()->username]) }}">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                    <p>SETTINGS</p>
                </a>
            </li>
        </ul>
    </div>
</div>