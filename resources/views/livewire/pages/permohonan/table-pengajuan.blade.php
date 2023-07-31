@push('css')
<style>
    table.dataTable tbody td {
        word-break: break-word;
        vertical-align: top;

    }

</style>
@endpush

<table id="example" class="table table-striped table-bordered">
    <thead>

        <tr>
            <th>No</th>
            <th>Pemohon</th>
            <th style='width: 15%;'>Status</th>
            <th>Jenis</th>
            <th>Judul</th>
            <th>Tanggal Pengajuan</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pengajuan as $row)
        <tr>
            <td>{{ $loop->iteration ?? '' }}</td>
            <td>{{ $row->pemohon->name ?? '' }}</td>
            <td>
                @switch ($row->status)
                @case ('Pengajuan')
                <div class="chip chip-md bg-info">Pengajuan</div>
                @break
                @case ('Diterima')
                <div class="chip chip-md bg-warning">Di Terima</div>
                @break
                @case ('Diproses')
                <div class="chip chip-md bg-warning">Di Proses</div>
                @break
                @case ('Selesai')
                <div class="chip chip-md bg-success">Selesai</div>
                @break
                @case ('Ditolak')
                <div class="chip chip-md bg-danger">Di Tolak</div>
                @break
                @endswitch
            </td>
            <td> {{ $row->jenisDokument->perjanjianTipe->name . ' ' . $row->jenisDokument->name }}</td>
            <td> {{ $row->judul }}</td>
            <td> {{ $row->created_at->settings(['formatFunction' => 'translatedFormat'])->locale('id')->format('l, j F
                Y') }}</td>
            <td> @if (!auth()->user()->hasRole("admin"))
                <div class="ms-auto">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle " data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
                            <a wire:click="getID({{$row->id}})" class="dropdown-item" href="javascript:;">Lihat Data</a>
                        </div>
                    </div>
                </div>
                @else
                <div class="ms-auto">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle " data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
                            <a class="dropdown-item" wire:click="getID({{$row->id}})" href="javascript:;">Lihat Data</a>
                            <a class="dropdown-item" href="{{route('pengajuan.proses', ['id' => $row->id])}}">Proses</a>
                            <a href="#" wire:click="$emit('showModal', {{ $row->id}})" class="dropdown-item">Hapus</a>
                        </div>
                    </div>
                </div>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
