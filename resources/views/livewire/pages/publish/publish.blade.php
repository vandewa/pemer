<div>
    <main class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Forms</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Manual Publish</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="border p-4 rounded">
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Jenis Pengajuan</label>
                                <div class="col-sm-9">
                                    <select class="form-select" wire:model.lazy="jenis_dokumen_id">
                                        <option value>Pilih Jenis Kerjasama</option>
                                        @foreach($tipePerjanjian as $row)
                                        <option value={{ $row->id }}> {{$row->perjanjianTipe->name. ' - ' . $row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Nomor Pemkot</label>
                                <div class="col-sm-9">
                                    {{ Form::text(null, null, [
                            'class' => 'form-control' .
                            ($errors->has('urutan.no_pemkot') ? '
                            border-danger' : null),
                            'placeholder' => 'Masukan No Pemkot',
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
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Tentang</label>
                                <div class="col-sm-9">
                                    {{ Form::text(null, null, [
                            'class' => 'form-control' .
                            ($errors->has('tentang') ? '
                            border-danger' : null),
                            'wire:model.lazy' => 'tentang',
                            ]) }}
                                </div>
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
                                <div class="col-sm-7">

                                    {{ Form::text(null, null, [
                            'class' => 'form-control' .
                            ($errors->has('path_perjanjian') ? '
                            border-danger' : null),
                            'wire:model.lazy' => 'path_perjanjian',
                            'wire:change' => 'checkAvailability()',
                            'placeholder' => 'Masukan Link Google Drive'
                            ]) }}
                                </div>
                                <div class="col-sm-2">
                                    <button class="btn btn-primary" wire:click="checkAvailability" wire:loading.attr="disabled">
                                        <span wire:loading.remove>cek</span>
                                        <span wire:loading.delay wire:target="checkAvailability">
                                            <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-1.647zm10-3.882l3 1.646C19.865 17.825 21 15.043 21 12h-4a7.963 7.963 0 01-2 5.291zM12 20a8 8 0 100-16 8 8 0 000 16z"></path>
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                                <label for="inputAddress4" class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <div wire:loading wire:target="checkAvailability">Checking...<i class="spinner-border spinner-border-sm" role="status"></i></div>
                                    @if ($isAvailable)
                                    <p>The Google Drive link is available.</p>
                                    @elseif (isset($isAvailable))
                                    <p>The Google Drive link is not available.</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputAddress4" class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    @if (session()->has('errors'))
                                    <div class="alert border-0 bg-light-danger alert-dismissible fade show">
                                        <div class="text-danger">Masukan link Google Drive Yang tersedia</div>
                                        <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    @if ($isAvailable)
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
