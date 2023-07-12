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
                            Aplikasi Sistem Informasi Kerjasama Wonosobo
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
        <div class="row row-cols-1 row-cols-lg-3 row-cols-xl-3">
            @foreach ($data as $row)
            <div class="col">
                <div class="card rounded-2">
                    <div class="card-body">
                        <a href="{{ route('publish', ['jenis_id' => $row->id]) }}">
                            <div class="d-flex align-items-center">

                                <img src="https://asik.kemenpora.go.id/assets/backendtheme/assets/css/2.png" style="width: 20%;padding-bottom: 0;">

                                <div class="ms-auto menu-title">
                                    <h4 class="mb-0">{{ $row->perjanjianTipe->name }}</h4>
                                    <p class="mb-1">{{ $row->name }}</p>
                                </div>

                                <div class="ms-auto widget-icon bg-primary text-white">
                                    <p class="mb-0 mt-1 font-13">
                                        {{ App\Models\Publish::where('jenis_dokumen_id', $row->id)->count() }}</>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
        <!--end row-->
        <div class="card">
            <div class="card-body">
                <livewire:pages.table-publish :jenis_id=null>
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
