<div>
    <main class="page-content">
        <!--breadcrumb-->
         <main class="page-content">ss="row mb-3">
                    <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" wire:model.lazy='form.name' placeholder="Tipe Perjanjian">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Tipe Perjanjian</label>
                    <div class="col-sm-9">
                        <select wire:model.lazy="form.tipe_perjanjian_id" class="form-control">
                            <option value="">Pilih Tipe Perjanjian</option>
                            @foreach ($listPerjanjian as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
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

                <hr>
                <div class="row">
                    <div class="col-md-2 mb-3">
                        <input type="text" name="" class="form-control" wire:model="nama" placeholder="Pencarian">
                    </div>
                </div>

                <table class="table mb-0 table-striped mb-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tipe</th>
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
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->perjanjianTipe->name }}</td>
                            <td>
                                <div class="gap-3 table-actions d-flex align-items-center fs-6">
                                    <a href="#" class="text-warning" wire:click='show({{ $item->id }})' data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" type="button"><i class="bi bi-pencil-fill"></i>
                                    </a>
                                    <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete" wire:click.prevent="hapus({{$item->id }})" type="button"><i class="bi bi-trash-fill"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

                {{ $posts->links() }}
            </div>
        </div>
    </main>
</div>
