<div class="sidebar" data-color="blue" data-background-color="white">
    <div class="sidebar-background" style="background-color: #fff;"></div>
    <div class="logo">
        <a href= "./welcome.blade.php" class="simple-text logo-normal" style="font-size: 15px;">
            White Cross Medical Clinic
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item ">
                <a class="nav-link" href="{{ (Route::current()->getName() == 'patient.appointments') ? 'active' : '' }}">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <p>APPOINTMENTS</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ (Route::current()->getName() == 'patient.billing') ? 'active' : '' }}">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <p>BILLING</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ (Route::current()->getName() == 'patient.results') ? 'active' : '' }}">
                    <i class="fa fa-paper-plane" aria-hidden="true"></i>
                    <p>RESULTS</p>
                </a>
            </li>
            <li class="nav-item ">
            <a class="nav-link" href="{{ (Route::current()->getName() == 'patient.settings') ? 'active' : '' }}">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                    <p>SETTINGS</p>
                </a>
            </li>
        </ul>
    </div>
</div>