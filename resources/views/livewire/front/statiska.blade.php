@push('css')
<!--plugins-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
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
                <div>
                    <div class="row">
                        <div class="col-lg-7">
                            <!-- Left column content -->
                        </div>
                        <div class="col-lg-5">
                            <div class="input-group mb-3">
                                <input type="date" class="form-control" wire:model="start_date">&nbsp;
                                <h4>s.d</h4>&nbsp;
                                <input type="date" class="form-control" wire:model="end_date">&nbsp;<a class="btn btn-sm btn-info" wire:click="cari" target=" _blank">Terapkan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-md-4 offset-4">
                    <canvas id="myPieChart"></canvas>
                </div>
                <br>
                <div class="card">
                    <div class="card-body">

                        <table id="example" class="table table-striped">
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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript">
    new DataTable('#example');
    document.addEventListener('livewire:load', function() {

        var ctx = document.getElementById('myPieChart').getContext('2d');
        var chart;

        chart = new Chart(ctx, {
            type: 'pie'
            , data: @json($data)
        });



        Livewire.on('chartUpdate', function(data) {
            if (chart) {
                chart.destroy();
            }

            chart = new Chart(ctx, {
                type: 'pie'
                , data: data
            });


        });
    });

</script>

@endpush
