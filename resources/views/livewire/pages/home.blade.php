<div>
    <main class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Home</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page" style="color:white">
                            Aplikasi Sistem Informasi Kerjasama Wonosobo
                        </li>
                    </ol>
                </nav>
            </div>
            @if (Auth::check())
            <div class="ms-auto">
                <div class="btn-group">
                    <a href={{ route('pengajuan') }} type="button" class="btn btn-primary">Pengajuan</a>

                </div>
            </div>
            @endif
        </div>
        <div class="tri-cover bg-dark"></div>
        <div class="row row-cols-1 row-cols-lg-3 row-cols-xl-3">
            @foreach ($data as $row)
            <div class="col">
                <div class="card rounded-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="">
                                <h4 class="mb-0">{{ $row->perjanjianTipe->name }}</h4>
                                <p class="mb-1">{{ $row->name }}</p>
                            </div>
                            <div class="ms-auto widget-icon bg-primary text-white">
                                <p class="mb-0 mt-2 font-13">
                                    {{ App\Models\publish::where('jenis_dokumen_id', $row->id)->count() }}</>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!--end row-->
        <div class="card">
            <div class="card-body">
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
                                <td>#</td>
                                <td>{{ $row->no_pemkot }}</td>
                                <td>{{ $row->para_pihak }}</td>
                                <td>{{ $row->pengajuanNya->judul }}</td>
                                <td>{{ \Carbon\Carbon::parse($row->tanggal_mulai)->locale('id')->isoFormat('LL') }} s.d {{ \Carbon\Carbon::parse($row->tanggal_selesai)->locale('id')->isoFormat('LL') }}</td>
                                @php
                                $tanggalAwal = new DateTime($row->tanggal_mulai);
                                $tanggalSelesai = new DateTime($row->tanggal_selesai);

                                $selisih = $tanggalAwal->diff($tanggalSelesai);
                                $tanggalJatuhTempo = $tanggalAwal->add($selisih);
                                @endphp
                                <td>{{ $tanggalJatuhTempo->format('Y-m-d') }}</td>

                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>