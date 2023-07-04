<div>
    <main class="page-content">
        <!--breadcrumb-->
        <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
            <div class="breadcrumb-title pe-3">Data Pengajuan</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="p-0 mb-0 breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">List Data Pengajuan</li>
                    </ol>
                </nav>
            </div>
        </div>
        @if (Auth::check())
            <div class="mt-4 mb-3">
                <a href="{{ route('pengajuan') }}"><button class="px-5 btn btn-primary radius-30"><i
                            class="mr-1 bx bx-plus-circle"></i>Tambah Pengajuan</button></a>
            </div>
        @endif
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-body">
                <livewire:pages.permohonan.pengajuan-list :data_id="$data_id" />
            </div>
        </div>
    </main>
</div>
