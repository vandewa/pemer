 @push('css')
 <style>
     table.dataTable tbody td {
         word-break: break-word;
         vertical-align: top;

     }

 </style>
 @endpush
 <div>
     <main class="page-content">
         <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
             <div class="breadcrumb-title pe-3">Forms</div>
             <div class="ps-3">
                 <nav aria-label="breadcrumb">
                     <ol class="breadcrumb mb-0 p-0">
                         <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                         </li>
                         <li class="breadcrumb-item active" aria-current="page">Manual Publish</li>
                     </ol>
                 </nav>
             </div>
         </div>
         <div class="row">
             <div class="col-xl-12 mx-auto">
                 <div class="card">
                     <div class="card-body">
                         @if($showdiv)
                         <div class="border p-4 rounded">
                             <div class="row mb-3">
                                 <label class="col-sm-3 col-form-label">Jenis Pengajuan</label>
                                 <div class="col-sm-9">
                                     <select class="form-select" wire:model.lazy="jenis_dokumen_id">
                                         <option value>Pilih Jenis Kerjasama</option>
                                         @foreach($tipePerjanjian as $row)
                                         <option value={{ $row->id }}> {{$row->perjanjianTipe->name. ' - ' . $row->name}}</option>
                                         @endforeach
                                     </select>
                                 </div>
                             </div>
                             <div class="row mb-3">
                                 <label for="inputEnterYourName" class="col-sm-3 col-form-label">Nomor Pemkot</label>
                                 <div class="col-sm-9">
                                     {{ Form::text(null, null, [
                            'class' => 'form-control' .
                            ($errors->has('urutan.no_pemkot') ? '
                            border-danger' : null),
                            'placeholder' => 'Masukan No Pemkot',
                            'wire:model.lazy' => 'urutan.no_pemkot',
                            ]) }}
                                 </div>
                             </div>
                             <div class="row">
                                 <label class="col-sm-3 col-form-label"></label>
                                 <div class="col-sm-9">
                                     <button type="submit" class="btn btn-primary px-5" wire:click="tambahNomor">Tambah Nomor</button>
                                 </div>
                                 @if($listNoSurat)
                                 <hr>
                                 <table class="table table-strip text-center">
                                     <thead>
                                         <th>No Surat</th>
                                         <th>aksi</th>
                                     </thead>
                                     <tbody>
                                         @foreach ($listNoSurat as $index => $item)
                                         <tr>
                                             <td>{{ $item['no_pemkot'] }}</td>
                                             <td> <button wire:click="removeInput({{$index}})">
                                                     <svg viewBox="0 0 16 16" :class="{ 'text-white' : selectedColor == 'black', 'text-gray-500' : selectedColor != 'black' }" class="bi bi-dash-square-fill w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                         <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm2.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7z" />
                                                     </svg>
                                                 </button></td>
                                         </tr>
                                         @endforeach
                                     </tbody>
                                 </table>
                                 @endif
                                 <label class="col-sm-3 col-form-label"></label>
                             </div>
                             <div class="row mb-3">
                                 <label for="inputEnterYourName" class="col-sm-3 col-form-label">Tentang</label>
                                 <div class="col-sm-9">
                                     {{ Form::text(null, null, [
                            'class' => 'form-control' .
                            ($errors->has('tentang') ? '
                            border-danger' : null),
                            'wire:model.lazy' => 'tentang',
                            ]) }}
                                 </div>
                             </div>
                             <div class="row mb-3">
                                 <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Tanggal Mulai</label>
                                 <div class="col-sm-3">
                                     {{ Form::date(null, null, [
                            'class' => 'form-control' .
                            ($errors->has('tgl_mulai') ? '
                            border-danger' : null),
                            'wire:model.lazy' => 'tgl_mulai',
                            ]) }}
                                 </div>
                                 <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Tanggal Berakhir</label>
                                 <div class="col-sm-3">
                                     {{ Form::date(null, null, [
                            'class' => 'form-control' .
                            ($errors->has('tgl_berakhir') ? '
                            border-danger' : null),
                            'wire:model.lazy' => 'tgl_berakhir',
                            ]) }}
                                 </div>
                             </div>
                             <div class="row mb-3">
                                 <label for="inputAddress4" class="col-sm-3 col-form-label">Para Pihak Yang Bekerjasama</label>
                                 <div class="col-sm-9">
                                     {{ Form::textarea(null, null, [
                            'class' => 'form-control' .
                            ($errors->has('para_pihak') ? '
                            border-danger' : null),
                            'rows' => '3',
                            'wire:model.lazy' => 'para_pihak',
                            ]) }}
                                 </div>
                             </div>
                             <div class="row mb-3">
                                 <label for="inputAddress4" class="col-sm-3 col-form-label">File Surat Perjanjian Kerja</label>
                                 <div class="col-sm-7">

                                     {{ Form::text(null, null, [
                            'class' => 'form-control' .
                            ($errors->has('path_perjanjian') ? '
                            border-danger' : null),
                            'wire:model.lazy' => 'path_perjanjian',
                            'wire:change' => 'checkAvailability()',
                            'placeholder' => 'Masukan Link Google Drive'
                            ]) }}
                                 </div>
                                 <div class="col-sm-2">
                                     <button class="btn btn-primary" wire:click="checkAvailability" wire:loading.attr="disabled">
                                         <span wire:loading.remove>cek</span>
                                         <span wire:loading.delay wire:target="checkAvailability">
                                             <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                 <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                 <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-1.647zm10-3.882l3 1.646C19.865 17.825 21 15.043 21 12h-4a7.963 7.963 0 01-2 5.291zM12 20a8 8 0 100-16 8 8 0 000 16z"></path>
                                             </svg>
                                         </span>
                                     </button>
                                 </div>
                                 <label for="inputAddress4" class="col-sm-3 col-form-label"></label>
                                 <div class="col-sm-9">
                                     <div wire:loading wire:target="checkAvailability">Checking...<i class="spinner-border spinner-border-sm" role="status"></i></div>
                                     @if ($isAvailable)
                                     <p>The Google Drive link is available.</p>
                                     @elseif (isset($isAvailable))
                                     <p>The Google Drive link is not available.</p>
                                     @endif
                                 </div>
                             </div>
                             <div class="row mb-3">
                                 <label for="inputAddress4" class="col-sm-3 col-form-label"></label>
                                 <div class="col-sm-9">
                                     @if (session()->has('errors'))
                                     <div class="alert border-0 bg-light-danger alert-dismissible fade show">
                                         <div class="text-danger">Masukan link Google Drive Yang tersedia</div>
                                         <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                     </div>
                                     @endif
                                 </div>
                             </div>
                             <div class="row">
                                 <label class="col-sm-3 col-form-label"></label>
                                 @if ($isAvailable)
                                 <div class="col-sm-1">
                                     <button class="btn btn-primary" wire:click="simpan" wire:loading.attr="disabled">
                                         <span wire:loading.remove>Simpan</span>
                                         <span wire:loading.delay wire:target="simpan">
                                             <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                 <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                 <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-1.647zm10-3.882l3 1.646C19.865 17.825 21 15.043 21 12h-4a7.963 7.963 0 01-2 5.291zM12 20a8 8 0 100-16 8 8 0 000 16z"></path>
                                             </svg>
                                         </span>
                                     </button>

                                 </div>
                                 <div class="col-sm-1">
                                     <a class="btn btn-primary" type="btn" wire:click="kembali">
                                         Kembali
                                     </a>
                                 </div>
                                 @else
                                 <div class="col-sm-1">
                                     <a class="btn btn-primary" type="btn" wire:click="kembali">
                                         Kembali
                                     </a>
                                 </div>

                                 @endif
                             </div>
                             @elseif($showdiv == false)
                             <div>
                                 <div class="ms-auto">
                                     <div class="btn-group">
                                         <a href="#" class="btn btn-primary" wire:click="tambahData">
                                             Tambah Data
                                         </a>
                                     </div>
                                 </div>
                             </div>
                             <br>
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
                                         <th>Aksi</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @foreach ($publish as $row)
                                     <tr>
                                         <td>{{ $loop->iteration ?? '' }}</td>
                                         <td>{{ $row->no_pemkot ?? '' }}</td>
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
                                         <td>
                                             {{-- <a href="#" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i class="bi bi-pencil-fill"></i></a> --}}
                                             <a href="#" wire:click="$emit('showModal', {{ $row->id}})" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"><i class="bi bi-trash-fill"></i></a></td>
                                     </tr>
                                     @endforeach
                                 </tbody>
                             </table>
                             @endif
                         </div>
                     </div>
                 </div>
             </div>
     </main>
     <livewire:global.konfirmasi-hapus />
 </div>
