<div>
    <main class="page-content">
        <!--breadcrumb-->
        <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
            <div class="breadcrumb-title pe-3">Data Kategori</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="p-0 mb-0 breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">List Data Kategori</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex align-items-center">
                    <h5 class="mb-0">Tipe Kategori</h5>
                </div>
                <div class="row mb-3">
                    <label for="inputPhoneNo2" class="col-sm-3 col-form-label text-center">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" wire:model.lazy='form.name' placeholder="Nama Kategori">
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary px-5" wire:click='store'>Simpan</button>
                        @if($edit)
                        <button type="submit" class="btn btn-warning px-5" wire:click='clear'>Batal</button>
                        @endif
                    </div>
                </div>
                <br>
                <hr>
                <br>
                <div class="row">
                    <div class="col-md-2 mb-3">
                        <input type="text" name="" class="form-control" wire:model="nama" placeholder="Pencarian">
                    </div>
                </div>
                <table class="table mb-0 table-striped mb-3 table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $a = 1;
                        @endphp
                        @foreach ($kategori as $item)
                        <tr>
                            <th scope="row">{{ $a++ }}</th>
                            <td>{{ $item->name }}</td>
                            <td>
                                <div class="gap-3 table-actions d-flex align-items-center fs-6">
                                    <a href="#" class="text-warning" wire:click='show({{ $item->id }})' data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" type="button"><i class="bi bi-pencil-fill"></i>
                                    </a>
                                    <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete" wire:click="$emit('showModal', {{ $item->id}})" type="button"><i class="bi bi-trash-fill"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <livewire:global.konfirmasi-hapus />
</div>
