<div>
    <main class="page-content">
        <div class="row row-cols-1 row-cols-lg-3 row-cols-xl-3">
            @foreach ($data as $row)
            <div class="col">
                <div class="card rounded-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="">
                                <h4 class="mb-0">{{ $row->perjanjianTipe->name}}</h4>
                                <p class="mb-1">{{ $row->name }}</p>
                            </div>
                            <div class="ms-auto widget-icon bg-primary text-white">
                                <p class="mb-0 mt-2 font-13">{{ App\Models\perjanjian::where('jenis_dokumen_id', $row->id)->count() }}</>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div><!--end row-->
    </main>
</div>