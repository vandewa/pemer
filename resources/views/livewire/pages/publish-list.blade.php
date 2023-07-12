<div>
    <main class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Home</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page" style="color:white">
                            {{ $a . ' ' . $b }}
                        </li>
                    </ol>
                </nav>
            </div>
            @if (Auth::check())
            <div class="ms-auto">
                <div class="btn-group">
                    <a href={{ route('pengajuan') }} type="button" class="btn btn-primary">Pengajuan</a>

                </div>
            </div>
            @endif
        </div>
        <div class="tri-cover bg-ligth"></div>
        <div class="card">
            <div class="card-body">
                <livewire:pages.table-publish :jenis_id=$kode>
            </div>
        </div>
        <livewire:global.modal-surat-perjanjian>
    </main>
</div>
@push('script')
<script>
    window.addEventListener('show-view-modal-path-surat-perjanjian', event => {
        $('#show-view-modal-path-surat-permohonan').modal('show');
    })

</script>
@endpush
