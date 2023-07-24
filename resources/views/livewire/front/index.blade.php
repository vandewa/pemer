@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
<style>
    body {
        background: aliceblue;
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
                        <img src="https://i.postimg.cc/QxPJ8hXy/brand-1.png" alt="">
                    </div>
                    <div class="single-logo">
                        <img src="https://i.postimg.cc/pdMQjC5Q/brand-2.png" alt="">
                    </div>
                    <div class="single-logo">
                        <img src="https://i.postimg.cc/B6qxYvgX/brand-3.png" alt="">
                    </div>
                    <div class="single-logo">
                        <img src="https://i.postimg.cc/d14GzKHn/brand-4.png" alt="">
                    </div>
                    <div class="single-logo">
                        <img src="https://i.postimg.cc/x8ZM13Sz/brand-5.png" alt="">
                    </div>
                    <div class="single-logo">
                        <img src="https://i.postimg.cc/B6qxYvgX/brand-3.png" alt="">
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
        , margin: 10
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
