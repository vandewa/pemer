<div class="container">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
                <h4>Fasilitas <em>Kerja Sama</em> Daerah</h4>
                <img src="{{ asset('chain/assets/images/heading-line-dec.png') }}" alt="">
                <p>Silahkan pilih fasilitas di bawah untuk membantu Anda</p>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="service-item submission-service">
                <div class="icon"></div>
                <h4>Pengajuan Kerja Sama Daerah</h4>
                <div class="text-button">
                    <a href="{{ route('login') }}">Klik To Go..<i class=" fa fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="service-item knowledge-service">
                <div class="icon"></div>
                <h4>Pengetahuan Kerja Sama Daerah</h4>
                <div class="text-button">
                    <a href="{{ route('front.kerjasama') }}">Klik To Go..<i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="service-item chart-service">
                <div class="icon"></div>
                <h4>Statistika Kerja Sama Daerah</h4>
                <div class="text-button">
                    <a href="{{ route('front.statistika') }}">Klik To Go..<i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="service-item fourth-service">
                <div class="icon"></div>
                <h4>Tanya Disini Kerja Sama Daerah</h4>
                <div class="text-button">
                    <a href="https://wa.me/{{ $no }}" target="_blank">Klik To Go..<i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
        </div>

    </div>
</div>