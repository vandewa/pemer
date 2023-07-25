<!--start sidebar -->
<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('chain/assets/images/logo2.png') }}" class="logo-icon" alt="logo icon" style="width:200px;">
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
                <div class="parent-icon">
                    <i class="lni lni-database"></i>
                </div>
                <div class="menu-title">Kesepakatan Bersama</div>
            </a>
            <ul>
                <ul>
                    <li>
                        <a href="{{ route('publish', ['jenis_id' => '1']) }}"><i class="bi bi-circle"></i>Antar
                            Daerah</a>
                    </li>
                    <li>
                        <a href="{{ route('publish', ['jenis_id' => '2']) }}"><i class="bi bi-circle"></i>Luar
                            Negri</a>
                    </li>
                    <li>
                        <a href="{{ route('publish', ['jenis_id' => '3']) }}"><i class="bi bi-circle"></i>Pihak
                            Ketiga</a>
                    </li>
                    <li>
                        <a href="{{ route('publish', ['jenis_id' => '4']) }}"><i class="bi bi-circle"></i>Sinergi</a>
                    </li>
                </ul>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="lni lni-database"></i>
                </div>
                <div class="menu-title">Perjanjian Kerja Sama</div>
            </a>
            <ul>
                <ul>
                    <li>
                        <a href="{{ route('publish', ['jenis_id' => '5']) }}"><i class="bi bi-circle"></i>Antar
                            Daerah</a>
                    </li>
                    <li>
                        <a href="{{ route('publish', ['jenis_id' => '6']) }}"><i class="bi bi-circle"></i>Luar
                            Negri</a>
                    </li>
                    <li>
                        <a href="{{ route('publish', ['jenis_id' => '7']) }}"><i class="bi bi-circle"></i>Pihak
                            Ketiga</a>
                    </li>
                </ul>
            </ul>
        </li>
        @can('pengajuan')
        <li>
            <a href="{{ route('pengajuan') }}">
                <div class="parent-icon"><i class="lni lni-upload"></i>
                </div>
                <div class="menu-title">Pengajuan</div>
            </a>
        </li>
        <li>
            <a href="{{ route('pengajuan.daftar') }}">
                <div class="parent-icon"><i class="lni lni-indent-increase"></i>
                </div>
                <div class="menu-title">List Pengajuan
                    @if(!auth()->user()->hasRole('admin'))
                    @else
                    <span class="badge bg-blue-400 align-self-center ml-auto">
                        {{ App\Models\Pengajuan::whereNotIn('status', ['Selesai', 'Ditolak'])->count() }}</span>
                    @endif
                </div>
            </a>
        </li>
        @endcan
        @can('master data')
        <li>
            <a href="{{ route('manual.publish') }}">
                <div class="parent-icon"><i class="lni lni-archive"></i>
                </div>
                <div class="menu-title">Manual Publish</div>
            </a>
        </li>
        <li>
            <a href="{{ route('master.post') }}">
                <div class="parent-icon"><i class="lni lni-library"></i>
                </div>
                <div class="menu-title">Informasi</div>
            </a>
        </li>
        <li>
            <a class="has-arrow">
                <div class="parent-icon"><i class="lni lni-archive"></i>
                </div>
                <div class="menu-title">Master</div>
            </a>
            <ul>
                <li>
                    <a href="{{ route('master.kategori') }}"><i class="bi bi-circle"></i>Kategori</a>
                </li>
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