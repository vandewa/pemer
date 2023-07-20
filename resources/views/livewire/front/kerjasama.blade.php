<!-- ***** Header Area Start ***** -->
@include('layouts.frontend.headerlink')
<!-- ***** Header Area End ***** -->
<div id="services" class="services section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
                    <h4>Pengetahuan <em>Kerja Sama</em> Daerah</h4>
                    <img src="{{ asset('chain/assets/images/heading-line-dec.png') }}" alt="">
                    <p>Pilih salah satu pengetahuan yang ada di bawah ini</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="service-item first-service">
                    <div class="icon"></div>
                    <h4>Tutorial Kerja Sama Daerah Wonosobo</h4>
                    <div class="text-button">
                        <a href="{{ route('login') }}">Lihat<i class=" fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="service-item second-service">
                    <div class="icon"></div>
                    <h4>Contoh Surat Penawaran / Pengajuan, KAK / Studi Kelayakan</h4>
                    <div class="text-button">
                        <a href="{{ route('front.kerjasama') }}">Lihat<i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-4">
                <div class="service-item third-service">
                    <div class="icon"></div>
                    <h4>Comunity Of Praktik Kerja Sama Daerah</h4>
                    <div class="text-button">
                        <a href="#">Lihat<i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div> --}}
            <div class="col-lg-4">
                <div class="service-item fourth-service">
                    <div class="icon"></div>
                    <h4>Peraturan Kerja Sama Daerah</h4>
                    <div class="text-button">
                        <a href="#">Lihat<i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
