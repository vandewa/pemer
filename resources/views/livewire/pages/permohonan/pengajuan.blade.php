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
                <h6 class="mb-0 text-uppercase">Pengajuan</h6>
                <hr />
                <div class="card">
                    <div class="card-body">
                        <div class="p-4 border rounded">
                            <form class="row g-3 needs-validation" wire:submit.prevent="simpan" method="POST">
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Jenis Pengajuan</label>
                                    <select class="form-select" wire:model.lazy="jenis_dokumen_id">
                                        <option value>Pilih Jenis Perizinan</option>
                                        @foreach($tipePerjanjian as $row)
                                        <option value={{ $row->id }}> {{$row->perjanjianTipe->name. ' - ' . $row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom02" class="form-label">No. Dokumen Pemkot</label>
                                    <input type="text" class="form-control" wire:model="no_pemkot" placeholder="Masukan Nomor" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom02" class="form-label">No. Dokumen Penyedia</label>
                                    <input type="text" class="form-control" wire:model="no_penyedia" placeholder="Masukan Nomor" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationCustom02" class="form-label">Judul Perjanjian Kerjasama</label>
                                    <input type="text" class="form-control" wire:model="judul" placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom02" class="form-label">Pihak Pertama</label>
                                    <input type="text" class="form-control" wire:model="pihak_1" placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom02" class="form-label">Pihak Kedua</label>
                                    <input type="text" class="form-control" wire:model="pihak_2" placeholder="" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationCustom02" class="form-label">Tentang</label>
                                    <input type="text" class="form-control" wire:model="tentang" placeholder="" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationCustom02" class="form-label">Ruang Lingkup</label>
                                    <textarea class="form-control" wire:model="ruang_lingkup"> </textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom02" class="form-label">Tanggal Mulai</label>
                                    <input type="date" class="form-control" wire:model="tanggal_mulai" placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom02" class="form-label">Tanggal Selesai</label>
                                    <input type="date" class="form-control" wire:model="tanggal_selesai" placeholder="" required>
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
