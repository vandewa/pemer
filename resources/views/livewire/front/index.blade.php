@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
<style>
    body {
        background: aliceblue;
    }

    .single-logo {
        width: 70%;
    }

    .section-padding {
        padding: 60px 0;
    }

    .brand-carousel {
        background: aliceblue;
    }

    .owl-dots {
        text-align: center;
        margin-top: 4%;
    }

    .owl-dot {
        display: inline-block;
        height: 15px !important;
        width: 15px !important;
        background-color: #878787 !important;
        opacity: 0.8;
        border-radius: 50%;
        margin: 0 5px;
    }

    .owl-dot.active {
        background-color: #000 !important;
    }

</style>
@endpush
<!-- ***** Header Area Start ***** -->
@include('layouts.frontend.header')
<!-- ***** Header Area End ***** -->
<div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <livewire:front.main>
</div>

<div id="services" class="services section">
    <livewire:front.service>
</div>


<div id="clients" class="the-clients">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="section-heading">
                    <h4>Mitra <em>Kerja Sama</em> Daerah</h4>
                    <img src="{{ asset('chain/assets/images/heading-line-dec.png') }}" alt="">
                    <br>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="brand-carousel section-padding owl-carousel">
                    <div class="single-logo">
                        <img src="https://e7.pngegg.com/pngimages/509/403/png-clipart-semarang-university-faculty-of-information-and-communication-technology-resume-college-soekarno-resume-logo.png" alt="">
                    </div>
                    <div class="single-logo">
                        <img src="https://pbs.twimg.com/media/CpyqP0DVYAEsmm-.jpg" alt="">
                    </div>
                    <div class="single-logo">
                        <img src="https://upload.wikimedia.org/wikipedia/id/b/b4/UIN_SUNAN_KALIJAGA.jpg" alt="">
                    </div>
                    <div class="single-logo">
                        <img src="https://www.pa-wonosobo.go.id/images/LOGO.png" alt="">
                    </div>
                    <div class="single-logo">
                        <img src="https://taspenbukittinggii.files.wordpress.com/2014/12/531461_221281074642446_958268533_n.jpg" alt="">
                    </div>
                    <div class="single-logo">
                        <img src="https://w7.pngwing.com/pngs/923/664/png-transparent-perum-perhutani-central-java-regional-division-jakarta-forest-organization-forest.png" alt="">
                    </div>
                    <div class="single-logo">
                        <img src="https://bob.kemenparekraf.go.id/wp-content/uploads/2021/03/logobob-vertikal.png" alt="">
                    </div>
                    <div class="single-logo">
                        <img src="https://wonosobo.kemenag.go.id/wp-content/uploads/2022/06/logo-kemenag-pasa-min.png" alt="">
                    </div>
                    <div class="single-logo">
                        <img src="https://upload.wikimedia.org/wikipedia/id/thumb/0/0f/Makara_of_Universitas_Indonesia.svg/1200px-Makara_of_Universitas_Indonesia.svg.png" alt="">
                    </div>
                    <div class="single-logo">
                        <img src="https://upload.wikimedia.org/wikipedia/id/thumb/9/9f/Emblem_of_Universitas_Gadjah_Mada.svg/1200px-Emblem_of_Universitas_Gadjah_Mada.svg.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    $('.brand-carousel').owlCarousel({
        loop: true
        , margin: 5
        , autoplay: true
        , responsive: {
            0: {
                items: 1
            }
            , 600: {
                items: 3
            }
            , 1000: {
                items: 5
            }
        }
    })

</script>
@endpush
