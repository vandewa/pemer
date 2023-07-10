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
                        @if($data->status == 'Pengajuan' || $data->status == 'Diterima')
                        <div class="border p-4 rounded">

                            <div class="row mb-3">
                                <label for="inputAddress4" class="col-sm-3 col-form-label">Keterangan</label>
                                <div class="col-sm-9">
                                    {{ Form::textarea(null, null, [
                            'class' => 'form-control' .
                            ($errors->has('keterangan') ? '
                            border-danger' : null),
                            'rows' => '3',
                            'wire:model.lazy' => 'keterangan',
                            ]) }}
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                @if($data->status == 'Pengajuan')
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary px-5" wire:click="diterima">Di terima</button>
                                </div>
                                @else
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary px-5" wire:click="diproses">Di Proses</button>
                                </div>
                                @endif
                            </div>
                        </div>
                        @elseif($data->status == 'Diproses')
                        <div class="border p-4 rounded">
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Nomor Pemkot</label>
                                <div class="col-sm-9">
                                    {{ Form::text(null, null, [
                            'class' => 'form-control' .
                            ($errors->has('urutan.no_pemkot') ? '
                            border-danger' : null),
                            'placeholder' => 'Masukan No Surat',
                            'wire:model.lazy' => 'urutan.no_pemkot',
                            ]) }}
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary px-5" wire:click="tambahNomor">Tambah Nomor</button>
                                </div>
                                @if($listNoSurat)
                                <hr>
                                <table class="table table-strip text-center">
                                    <thead>
                                        <th>No Surat</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($listNoSurat as $index => $item)
                                        <tr>
                                            <td>{{ $item['no_pemkot'] }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif
                                <label class="col-sm-3 col-form-label"></label>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Tanggal Mulai</label>
                                <div class="col-sm-3">
                                    {{ Form::date(null, null, [
                            'class' => 'form-control' .
                            ($errors->has('tgl_mulai') ? '
                            border-danger' : null),
                            'wire:model.lazy' => 'tgl_mulai',
                            ]) }}
                                </div>
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Tanggal Berakhir</label>
                                <div class="col-sm-3">
                                    {{ Form::date(null, null, [
                            'class' => 'form-control' .
                            ($errors->has('tgl_berakhir') ? '
                            border-danger' : null),
                            'wire:model.lazy' => 'tgl_berakhir',
                            ]) }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputAddress4" class="col-sm-3 col-form-label">Para Pihak Yang Bekerjasama</label>
                                <div class="col-sm-9">
                                    {{ Form::textarea(null, null, [
                            'class' => 'form-control' .
                            ($errors->has('para_pihak') ? '
                            border-danger' : null),
                            'rows' => '3',
                            'wire:model.lazy' => 'para_pihak',
                            ]) }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputAddress4" class="col-sm-3 col-form-label">File Surat Perjanjian Kerja</label>
                                <div class="col-sm-9">
                                    <input class="form" type="file" wire:model="path_perjanjian">
                                    @error('path_perjanjian')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary px-5" wire:click="publish">Publish</button>
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