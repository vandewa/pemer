<div>
    <main class="page-content">
        <!--breadcrumb-->
        <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
            <div class="breadcrumb-title pe-3">Data Post</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="p-0 mb-0 breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">List Data Post</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-body">
                @if($isEdit)
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label text-center">Kategori</label>
                    <div class="col-sm-9">
                        <select class="form-select" wire:model.lazy='kategori_id'>
                            <option value>Pilih Kategori Post</option>
                            @foreach($kategori as $row)
                            <option value={{ $row->id }}>{{ $row->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label text-center">Judul</label>
                    <div class="col-sm-9">
                        {{ Form::text(null, null, [
                            'class' => 'form-control' .
                            ($errors->has('judul') ? '
                            border-danger' : null),
                            'wire:model.lazy' => 'judul',
                            ]) }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label text-center">File</label>
                    <div class="col-sm-9">
                        <input type="file" class="form col-md-4" wire:model='path_file'>
                        <div wire:loading wire:target="path_file">Uploading...<i class="spinner-border spinner-border-sm" role="status"></i></div>
                        @if ($path_file)
                        <i class="fadeIn animated bx bx-check"></i>
                        @else
                        @endif
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-9">
                        @if($btnUpdate)
                        <button class="btn btn-primary" wire:click="editStore" wire:loading.attr="disabled">
                            <span wire:loading.remove>Update</span>
                            <span wire:loading wire:target="store">
                                <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-1.647zm10-3.882l3 1.646C19.865 17.825 21 15.043 21 12h-4a7.963 7.963 0 01-2 5.291zM12 20a8 8 0 100-16 8 8 0 000 16z"></path>
                                </svg>
                            </span>
                        </button>
                        @else
                        <button class="btn btn-primary" wire:click="store" wire:loading.attr="disabled">
                            <span wire:loading.remove>Simpan</span>
                            <span wire:loading wire:target="store">
                                <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-1.647zm10-3.882l3 1.646C19.865 17.825 21 15.043 21 12h-4a7.963 7.963 0 01-2 5.291zM12 20a8 8 0 100-16 8 8 0 000 16z"></path>
                                </svg>
                            </span>
                        </button>
                        @endif
                        <button type="submit" class="btn btn-warning px-5" wire:click='clear'>Batal</button>

                    </div>
                </div>
                <br>
                <hr>
                @else
                <div class="row">
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary px-5" wire:click='form'>Tambah Data</button>
                    </div>
                </div>
                @endif
                <br>

                <table class="table table-striped table-bordered" id="example">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Judul</th>
                            <th scope="col">File</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $a = 1;
                        @endphp
                        @foreach ($posts as $item)
                        <tr>
                            <th scope="row">{{ $a++ }}</th>
                            <td>{{ $item->kategoriNya->name }}</td>
                            <td>{{ $item->judul }}</td>
                            <td><a href="javascript:;" class="btn btn-sm btn-info" wire:click="$emit('showPostFile', {{ $item->id}})">View</a></td>
                            <td>
                                <div class="gap-3 table-actions d-flex align-items-center fs-6">
                                    <a href="#" class="text-warning" wire:click='edit({{ $item->id }})' data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" type="button"><i class="bi bi-pencil-fill"></i>
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
    <livewire:master.modal.modal-post-file />
    <livewire:global.konfirmasi-hapus />
</div>