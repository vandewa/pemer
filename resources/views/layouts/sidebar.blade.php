<!--start sidebar -->
<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('snacked/ltr/assets/images/favicon/android-chrome-512x512.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">ASIK SOBO</h4>
        </div>
        <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('home') }}">
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="lni lni-archive"></i>
                </div>
                <div class="menu-title">Kesepakatan Bersama</div>
            </a>
            <ul>
                <ul>
                    <li>
                        <a href="{{ route('pengajuan.daftar', ['id' => '1']) }}"><i class="bi bi-circle"></i>Antar
                            Daerah</a>
                    </li>
                    <li>
                        <a href="{{ route('pengajuan.daftar', ['id' => '2']) }}"><i class="bi bi-circle"></i>Luar
                            Negri</a>
                    </li>
                    <li>
                        <a href="{{ route('pengajuan.daftar', ['id' => '3']) }}"><i class="bi bi-circle"></i>Pihak
                            Ketiga</a>
                    </li>
                </ul>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="lni lni-archive"></i>
                </div>
                <div class="menu-title">Perjanjian Kerja Sama</div>
            </a>
            <ul>
                <ul>
                    <li>
                        <a href="{{ route('pengajuan.daftar', ['id' => '4']) }}"><i class="bi bi-circle"></i>Antar
                            Daerah</a>
                    </li>
                    <li>
                        <a href="{{ route('pengajuan.daftar', ['id' => '5']) }}"><i class="bi bi-circle"></i>Luar
                            Negri</a>
                    </li>
                    <li>
                        <a href="{{ route('pengajuan.daftar', ['id' => '6']) }}"><i class="bi bi-circle"></i>Pihak
                            Ketiga</a>
                    </li>
                </ul>
            </ul>
        </li>
        <li>
            <a href="{{ route('pengajuan') }}">
                <div class="parent-icon"><i class="lni lni-archive"></i>
                </div>
                <div class="menu-title">Pengajuan</div>
            </a>
        </li>
        <li>
            <a href="{{ route('pengajuan.daftar') }}">
                <div class="parent-icon"><i class="lni lni-archive"></i>
                </div>
                <div class="menu-title">List Pengajuan</div>
            </a>
        </li>
        @can('master data')
        <li>
            <a class="has-arrow">
                <div class="parent-icon"><i class="lni lni-archive"></i>
                </div>
                <div class="menu-title">Master</div>
            </a>
            <ul>
                <li>
                    <a href="{{ route('master.instansi') }}"><i class="bi bi-circle"></i>Instansi</a>
                </li>
                <li>
                    <a href="{{ route('tipe.perijinan') }}"><i class="bi bi-circle"></i>Tipe Perjanjian</a>
                </li>
                <li>
                    <a href="{{ route('jenis.perijinan') }}"><i class="bi bi-circle"></i>Jenis Perjanjian</a>
                </li>
                <li>
                    <a href="{{ route('user.index') }}"><i class="bi bi-circle"></i>User</a>
                </li>
                <li>
                    <a href="{{ route('permission.role') }}"><i class="bi bi-circle"></i>Permission Role</a>
                </li>
            </ul>
        </li>
        @endcan
    </ul>
    <!--end navigation-->
</aside>
<!--end sidebar -->