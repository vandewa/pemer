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
                            <form class="row g-3 needs-validation" wire:submit.prevent="simpan" method="POST">
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Jenis Pengajuan</label>
                                    <select class="form-select" wire:model.lazy="jenis_dokumen_id">
                                        <option value>Pilih Jenis Kerjasama</option>
                                        @foreach($tipePerjanjian as $row)
                                        <option value={{ $row->id }}> {{$row->perjanjianTipe->name. ' - ' . $row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationCustom02" class="form-label">No. Surat Permohonan</label>
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
                                    <label for="validationCustom02" class="form-label">Tangal Permohonan</label>
                                    {{ Form::date(null, null, [
                            'class' => 'form-control' .
                            ($errors->has('tgl_permohonan') ? '
                            border-danger' : null),
                            'wire:model.lazy' => 'tgl_permohonan',
                            ]) }}
                                </div>
                                <div class="col-md-8">
                                    <label for="validationCustom02" class="form-label">Maksud dan Tujuan Kerjasama</label>
                                    {{ Form::text(null, null, [
                            'class' => 'form-control' .
                            ($errors->has('judul') ? '
                            border-danger' : null),
                            'placeholder' => '',
                            'wire:model.lazy' => 'judul',
                            ]) }}
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom02" class="form-label">Obyek</label>
                                    {{ Form::text(null, null, [
                            'class' => 'form-control' .
                            ($errors->has('obyek') ? '
                            border-danger' : null),
                            'placeholder' => '',
                            'wire:model.lazy' => 'obyek',
                            ]) }}
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom02" class="form-label">Ruang Lingkup</label>
                                    {{ Form::text(null, null, [
                            'class' => 'form-control' .
                            ($errors->has('ruang_lingkup') ? '
                            border-danger' : null),
                            'placeholder' => '',
                            'wire:model.lazy' => 'ruang_lingkup',
                            ]) }}
                                </div>
                                <div class="col-md-12">
                                    <label for="validationCustom02" class="form-label">File Surat Permohonan</label>
                                    {{ Form::text(null, null, [
                            'class' => 'form-control' .
                            ($errors->has('path_surat_permohonan') ? '
                            border-danger' : null),
                            'placeholder' => '',
                            'wire:model.lazy' => 'path_surat_permohonan',
                            ]) }}
                                </div>
                                <div class="col-md-12">
                                    <label for="validationCustom02" class="form-label">File Surat Studi Kelayakan / KAK</label>
                                    {{ Form::text(null, null, [
                            'class' => 'form-control' .
                            ($errors->has('path_studi_kak') ? '
                            border-danger' : null),
                            'placeholder' => '',
                            'wire:model.lazy' => 'path_studi_kak',
                            ]) }}
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Ajukan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
