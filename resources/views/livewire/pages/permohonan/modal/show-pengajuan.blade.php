<div wire:ignore.self class="modal fade" id="show_pengajuan" tabindex="-1" aria-labelledby="show_pengajuan" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $jenis }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-4">
                                    Judul
                                </div>
                                <div class="col-8">
                                    : {{ $judul}}
                                </div>
                                <div class="col-4">
                                    Nomor Surat
                                </div>
                                <div class="col-8">
                                    : {{ $judul}}
                                </div>
                                <div class="col-4">
                                    Tanggal Permohonan
                                </div>
                                <div class="col-8">
                                    : {{ $judul}}
                                </div>
                                <div class="col-4">
                                    Obyek
                                </div>
                                <div class="col-8">
                                    : {{ $judul}}
                                </div>
                                <div class="col-4">
                                    Ruang Lingkup
                                </div>
                                <div class="col-8">
                                    : {{ $judul}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
@push('script')
<script>
    window.addEventListener('kirim_id', event => {
        var terima_id = event.detail.kirim_id;
        Livewire.emitTo('pages.permohonan.modal.show-pengajuan', 'triggerEvent', {
            tampung_id: terima_id
        });
    });

</script>
@endpush
