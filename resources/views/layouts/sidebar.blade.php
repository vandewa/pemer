<!--start sidebar -->
<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('snacked/ltr/assets/images/favicon/android-chrome-512x512.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text" style="color:black;">LAKON</h4>
        </div>
        <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li class="{{ Request::segment(1) == 'dashboard' ? 'mm-active' : '' }}">
            <a href="{{ route('dashboard') }}">
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        <li class="{{ Request::segment(1) == 'user' ? 'mm-active' : '' }}">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="lni lni-archive"></i>
                </div>
                <div class="menu-title">Master</div>
            </a>
            <ul>
                <li class="{{ Request::segment(1) == 'user' ? 'mm-active' : '' }}">
                    <a href="{{ route('user.index') }}"><i class="bi bi-circle"></i>User</a>
                </li>
                <li class="{{ Request::segment(2) == 'instansi' ? 'mm-active' : '' }}">
                    <a href="{{ route('master.instansi') }}"><i class="bi bi-circle"></i>Instansi</a>
                </li>
                <li class="{{ Request::segment(2) == 'tipe-perjanjian' ? 'mm-active' : '' }}">
                    <a href="{{ route('tipe.perijinan') }}"><i class="bi bi-circle"></i>Tipe Perjanjian</a>
                </li>
                <li class="{{ Request::segment(2) == 'jenis-perjanjian' ? 'mm-active' : '' }}">
                    <a href="{{ route('jenis.perijinan') }}"><i class="bi bi-circle"></i>Jenis Perjanjian</a>
                </li>

            </ul>
        </li>

    </ul>
    <!--end navigation-->
</aside>
<!--end sidebar -->
