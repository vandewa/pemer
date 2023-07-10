<div class="table-responsive">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>

            <tr>
                <th>No</th>
                <th>Nomor Dokumen</th>
                <th>Pihak Kerjasama</th>
                <th>Tentang</th>
                <th>Jangka Waktu</th>
                <th>Batas Akhir</th>
                <th>Download</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($publish as $row)
            <tr>
                <td>{{ $loop->iteration ?? '' }}</td>
                <td>{{ $row->no_pemkot ?? '' }}</td>
                <td>{{ $row->para_pihak ?? ''}}</td>
                <td>{{ $row->pengajuanNya->judul ?? ''}}</td>
                <td>{{ \Carbon\Carbon::parse($row->tanggal_mulai)->locale('id')->isoFormat('LL') }} s.d {{ \Carbon\Carbon::parse($row->tanggal_selesai)->locale('id')->isoFormat('LL') }}</td>
                @php
                $tanggalAwal = \Carbon\Carbon::now();
                $tanggalSelesai = \Carbon\Carbon::createFromFormat('Y-m-d', $row->tanggal_selesai);
                $selisih = $tanggalAwal->diff($tanggalSelesai);
                if ($tanggalAwal > $tanggalSelesai) {
                if ($selisih->days > 365) {
                $selisih = '- '.$selisih->format('%y Tahun');
                } elseif ($selisih->days > 30) {
                $selisih = '- '.$selisih->format('%m Bulan');
                } else {
                $selisih = '- '.$selisih->format('%a Hari');
                }
                } else {
                if ($selisih->days > 365) {
                $selisih = $selisih->format('%y Tahun');
                } elseif ($selisih->days > 30) {
                $selisih = $selisih->format('%m Bulan');
                } else {
                $selisih = $selisih->format('%a Hari');
                }
                }
                @endphp
                <td>{{ $selisih }}</td>
                <td><button class="btn btn-sm btn-info" wire:click="path_surat_perjanjian('{{ $row->path_surat_perjanjian_kerja }}')">View</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>