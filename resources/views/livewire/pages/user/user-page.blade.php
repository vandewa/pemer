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
                            <form  wire:submit.prevent="simpanData" method="POST">
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
                                            <label class="form-label">OPD</label>
                                            <input type="text" class="form-control" wire:model.lazy="opd">
                                            @error('opd')
                                                <span class="form-text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-12">
                                            <label class="form-label">No HP</label>
                                            <input type="text" class="form-control" wire:model.lazy="no_hp">
                                            @error('no_hp')
                                                <span class="form-text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-md-6">
                                        <div class="col-12">
                                            <label class="form-label">Role</label>
                                            <select name="" id="" class="form-control" wire:model.lazy="role_user">
                                                <option value="">Pilih Role</option>
                                                @foreach ($role as $item)
                                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('role')
                                                <span class="form-text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                @if(Request::segment('2') != null)
                                <legend style="font-size: 20px;">Ganti Password</legend><hr>
                                @endif
                                <div class="mb-3 row">
                                    <div class="col-md-6">
                                        <div class="col-12">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control" wire:model.lazy="password">
                                            @error('password')
                                                <span class="form-text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-12">
                                            <label class="form-label">Konfirmasi Password</label>
                                            <input type="password" class="form-control" wire:model.lazy="password_confirmation">
                                            @error('password_confirmation')
                                                <span class="form-text text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-12 text-end">
                                        <a href="{{ route('user.index') }}" class="px-5 btn btn-secondary">Kembali</a>
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