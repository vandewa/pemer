@push('css')
<style>
    table.dataTable tbody td {
        word-break: break-word;
        vertical-align: top;

    }
</style>
<!--plugins-->
<link href="{{ asset('snacked/ltr/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
<!-- Bootstrap CSS -->
<link href="{{ asset('snacked/ltr/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
<link href="{{ asset('snacked/ltr/assets/css/bootstrap-extended.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css/tri.css') }}">
<link href="{{ asset('snacked/ltr/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
@endpush
<div>
    <!-- ***** Header Area Start ***** -->
    @include('layouts.frontend.headerlink')
    <!-- ***** Header Area End ***** -->
    <div id="services" class="services section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
                        <h4>Halaman Statistika</h4>
                        <img src="{{ asset('chain/assets/images/heading-line-dec.png') }}" alt="">

                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table id="example" class="table table-striped table-bordered">
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
                                    <td>@php
                                        $a = explode(',',$row->no_pemkot);
                                        $b = array_filter($a);
                                        $no = 1;
                                        foreach($b as $c){
                                        echo $no .". ".$c."<br>";
                                        $no++;
                                        }
                                        @endphp</td>
                                    <td>{{ $row->para_pihak ?? ''}}</td>
                                    <td>{{ $row->pengajuanNya->judul ?? $row->tentang }}</td>
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
                                    <td><a class="btn btn-sm btn-info" href="{{ $row->path_surat_perjanjian_kerja }}" target="_blank">View</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
<script src="{{ asset('snacked/ltr/assets/js/bootstrap.bundle.min.js') }}"></script>
<!--plugins-->
<script src="{{ asset('snacked/ltr/assets/js/jquery.min.js') }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script src="{{ asset('snacked/ltr/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('snacked/ltr/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
@endpush