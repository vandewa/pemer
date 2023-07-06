<div>
    <main class="page-content">
        <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
            <div class="breadcrumb-title pe-3">Data Pengajuan</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="p-0 mb-0 breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Pengajuan</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-togglable table-hover">
                                <tbody>
                                    <tr>
                                        <td>Judul</td>
                                        <td>: {{ $data->judul ?? '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Surat</td>
                                        <td>: {{ $data->no_surat ?? '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tannggal Permohonan</td>
                                        <td>:
                                            {{ $data->tgl_permohonan ?? '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Obyek</td>
                                        <td>: {{ $data->obyek ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Ruang Lingkup</td>
                                        <td>: {{ $data->ruang_lingkup ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Surat Permohonan</td>
                                        <td>: @if($data->path_surat_permohonan)
                                            <button class="btn btn-sm btn-info" wire:click="suratPermohonan('{{ $data->path_surat_permohonan }}')">Lihat File</button>
                                            @else
                                            -
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Surat Studi Kelayakan / KAK</td>
                                        <td>: @if($data->path_studi_kak)
                                            <button class="btn btn-sm btn-info" wire:click="suratStudiKak('{{ $data->path_studi_kak }}')">Lihat File</button>
                                            @else
                                            -
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        @if($data->status == 'Pengajuan' || $data->status == 'Ditinjau')
                        <div class="border p-4 rounded">

                            <div class="row mb-3">
                                <label for="inputAddress4" class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="inputAddress4" rows="3" placeholder="Address"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary px-5">Simpan</button>
                                </div>
                            </div>
                        </div>
                        @elseif($data->status == 'Diproses')
                        <div class="border p-4 rounded">
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Nomor Pemkot</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputEnterYourName" placeholder="Enter Your Name">
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary px-5">Tambah Nomor</button>
                                </div>
                                <label class="col-sm-3 col-form-label"></label>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Phone No</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputPhoneNo2" placeholder="Phone No">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Email Address</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="inputEmailAddress2" placeholder="Email Address">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputChoosePassword2" class="col-sm-3 col-form-label">Choose Password</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="inputChoosePassword2" placeholder="Choose Password">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputConfirmPassword2" class="col-sm-3 col-form-label">Confirm Password</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="inputConfirmPassword2" placeholder="Confirm Password">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputAddress4" class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="inputAddress4" rows="3" placeholder="Address"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary px-5">Simpan</button>
                                </div>
                            </div>
                        </div>
                        @else
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <livewire:pages.permohonan.modal.show-surat-permohonan>
            <livewire:pages.permohonan.modal.show-surat-studi-kelayakan>
    </main>
</div>

@push('script')
<script>
    window.addEventListener('show-view-modal-path-surat-permohonan', event => {
        $('#viewModalSuratPermohonan').modal('show');
    });
    window.addEventListener('show-view-modal-path-surat-studi-kelayakan', event => {
        $('#viewModalSuratStudiKelayakan').modal('show');
    });
</script>
@endpush