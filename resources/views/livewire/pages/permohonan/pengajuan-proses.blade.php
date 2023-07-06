<div>
    <main class="page-content">
        <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
            <div class="breadcrumb-title pe-3">Data Pengajuan</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="p-0 mb-0 breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Pengajuan</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-togglable table-hover">
                                <tbody>
                                    <tr>
                                        <td>Judul</td>
                                        <td>: {{ $data->judul ?? '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Surat</td>
                                        <td>: {{ $data->no_surat ?? '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tannggal Permohonan</td>
                                        <td>:
                                            {{ $data->tgl_permohonan ?? '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Obyek</td>
                                        <td>: {{ $data->obyek ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Ruang Lingkup</td>
                                        <td>: {{ $data->ruang_lingkup ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Surat Permohonan</td>
                                        <td>: {{ $data->path_surat_permohonan ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Surat Studi Kelayakan / KAK</td>
                                        <td>: {{ $data->path_studi_kak ?? '-' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>