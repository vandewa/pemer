<div>
    <main class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Forms</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Pengajuan</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="p-4 border rounded">
                            <div class="row g-3 needs-validation">
                                @csrf
                                <div class="col-md-12">
                                    <label class="form-label">Jenis Pengajuan</label>
                                    <select class="form-select" wire:model.lazy="jenis_dokumen_id">
                                        <option value>Pilih Jenis Kerjasama</option>
                                        @foreach($tipePerjanjian as $row)
                                        <option value={{ $row->id }}> {{$row->perjanjianTipe->name. ' - ' . $row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">No. Surat Permohonan</label>
                                    {{ Form::text(null, null, [
                            'class' => 'form-control' .
                            ($errors->has('urutan.no_surat') ? '
                            border-danger' : null),
                            'placeholder' => 'Masukan No Surat',
                            'wire:model.lazy' => 'urutan.no_surat',
                            ]) }}
                                    <button class="btn btn-primary" type="button" wire:click="tambahNomor">Tambah No Surat</button>
                                    @if($listNoSurat)
                                    <hr>
                                    <table class="table table-strip text-center">
                                        <thead>
                                            <th>No Surat</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($listNoSurat as $index => $item)
                                            <tr>
                                                <td>{{ $item['no_surat'] }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @endif
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Tanggal Permohonan</label>
                                    {{ Form::date(null, null, [
                            'class' => 'form-control' .
                            ($errors->has('tgl_permohonan') ? '
                            border-danger' : null),
                            'wire:model.lazy' => 'tgl_permohonan',
                            ]) }}
                                </div>
                                <div class="col-md-8">
                                    <label class="form-label">Maksud dan Tujuan Kerjasama</label>
                                    {{ Form::text(null, null, [
                            'class' => 'form-control' .
                            ($errors->has('judul') ? '
                            border-danger' : null),
                            'placeholder' => '',
                            'wire:model.lazy' => 'judul',
                            ]) }}
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Obyek</label>
                                    {{ Form::text(null, null, [
                            'class' => 'form-control' .
                            ($errors->has('obyek') ? '
                            border-danger' : null),
                            'placeholder' => '',
                            'wire:model.lazy' => 'obyek',
                            ]) }}
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Ruang Lingkup</label>
                                    {{ Form::text(null, null, [
                            'class' => 'form-control' .
                            ($errors->has('ruang_lingkup') ? '
                            border-danger' : null),
                            'placeholder' => '',
                            'wire:model.lazy' => 'ruang_lingkup',
                            ]) }}
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label col-md-3">File Surat Permohonan</label>
                                    <input class="form col-md-4" type="file" wire:model="path_surat_permohonan">
                                    <div wire:loading wire:target="path_surat_permohonan">Uploading...<i class="spinner-border spinner-border-sm" role="status"></i></div>
                                    @if ($path_surat_permohonan)
                                    <i class="fadeIn animated bx bx-check"></i>
                                    @else
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label col-md-3">File Surat Studi Kelayakan / KAK</label>
                                    <input class="form col-md-4" type="file" wire:model="path_studi_kak">
                                    <div wire:loading wire:target="path_studi_kak">Uploading...<i class="spinner-border spinner-border-sm" role="status"></i></div>
                                    @if ($path_studi_kak)
                                    <i class="fadeIn animated bx bx-check"></i>
                                    @else
                                    @endif

                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" wire:model.lazy="submit">
                                        <label class="form-check-label" for="invalidCheck">Saya menyatakan bahwa semua data /
                                            informasi yang saya infokan adalah benar.</label>
                                        <div class="invalid-feedback">You must agree before submitting.</div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    @if ($submit)
                                    <button class="btn btn-primary" wire:click="simpan" wire:loading.attr="disabled">
                                        <span wire:loading.remove>Simpan</span>
                                        <span wire:loading.delay wire:target="simpan">
                                            <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-1.647zm10-3.882l3 1.646C19.865 17.825 21 15.043 21 12h-4a7.963 7.963 0 01-2 5.291zM12 20a8 8 0 100-16 8 8 0 000 16z"></path>
                                            </svg>
                                        </span>
                                    </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
</div>
