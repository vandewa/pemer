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
        @if (!auth()->user()->hasRole("admin"))
        <div class="mt-4 mb-3">
            <a href="{{ route('pengajuan') }}"><button class="px-5 btn btn-primary radius-30"><i class="mr-1 bx bx-plus-circle"></i>Tambah Pengajuan</button></a>
        </div>
        @else
        @endif
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-body">
                <livewire:pages.permohonan.table-pengajuan />
            </div>
        </div>
        <livewire:pages.permohonan.modal.show-pengajuan>
            <livewire:pages.permohonan.modal.show-surat-permohonan>
                <livewire:pages.permohonan.modal.show-surat-studi-kelayakan>
    </main>
</div>
@push('script')
<script>
    window.addEventListener('show-modal-pengajuan', event => {
        $('#show_pengajuan').modal('show');
    })
    window.addEventListener('show-view-modal-path-surat-permohonan', event => {
        $('#viewModalSuratPermohonan').modal('show');
    });
    window.addEventListener('show-view-modal-path-surat-studi-kelayakan', event => {
        $('#viewModalSuratStudiKelayakan').modal('show');
    });

</script>
@endpush
