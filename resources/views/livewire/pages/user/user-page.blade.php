<div>
    <main class="page-content">
        <div class="row">
            <div class="col-12 col-lg-12 col-xl-12 d-flex">
                <div class="card w-100 rounded-4">
                    <div class="card-body">
                        <div class="p-4 border rounded">
                            <div class="text-center">
                                <h5 class="card-title">User</h5>
                            </div>
                            <hr>
                            <form wire:submit.prevent="simpanData" method="POST">
                                <div class="mb-3 row">
                                    <div class="col-md-6">
                                        <div class="col-12">
                                            <label class="form-label">Nama</label>
                                            <input type="text" class="form-control" wire:model.lazy="name">
                                            @error('name')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-12">
                                            <label class="form-label">Email</label>
                                            <input type="text" class="form-control" wire:model.lazy="email">
                                            @error('email')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-md-6">
                                        <div class="col-12">
                                            <label class="form-label">Lembaga</label>
                                            {!! Form::select('id', get_instansi(), null, ['class'=> 'form-control',
                                            'placeholder' => 'Pilih Lembaga', 'wire:model.lazy' => 'instansi_id']); !!}
                                            @error('intansi_id')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-12">
                                            <label class="form-label">No HP</label>
                                            <div class="form-group form-group-feedback form-group-feedback-right">
                                                <input type="text" class="form-control" wire:model.lazy="no_hp" placeholder="Masukan Nomor Handphone">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-12 text-end">
                                        <button type="submit" class="px-5 btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>