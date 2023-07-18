<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <title>Asik Sobo</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('chain/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!--

TemplateMo 570 Chain App Dev

https://templatemo.com/tm-570-chain-app-dev

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('chain/assets/css/templatemo-chain-app-dev.css') }}">
    <link rel="stylesheet" href="{{ asset('chain/assets/css/animated.css') }}">
    <link rel="stylesheet" href="{{ asset('chain/assets/css/owl.css') }}">
    <livewire:styles />
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->



    {{ $slot ?? '' }}

    <footer id="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-heading">
                        <h4></h4><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="footer-widget">
                        <h4>Sekretariat Daerah Kabupaten Wonosobo</h4>
                        <p>Jl. Sindoro No.2-4, Wonosobo Timur, Wonosobo Tim., Kec. Wonosobo, Kabupaten Wonosobo, Jawa Tengah 56311</p>
                        <p><a href="#">(0286) 321345</a></p>
                        <p><a href="#">diskominfo@wonosobokab.go.id</a></p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="footer-widget">
                        <h4>Link Terkait</h4>
                        <p><a target="_blank" href="https://website.wonosobokab.go.id/">◉ Website Pemkab Wonosobo</a></p>
                        <p><a target="_blank" href="https://smartcity.wonosobokab.go.id/">◉ Dashboard Smartcity</a></p>
                        <p><a target="_blank" href="https://aprizob.wonosobokab.go.id/">◉ Website Aplikasi Peizinan Wonosobo</a></p>
                        <p><a target="_blank" href="https://diskominnfo.wonosobokab.go.id/">◉ Website Diskominfo Wonosobo</a></p>

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer-widget">
                        <div class="card" style="background-color:rgba(0,0,0,0.0); margin-top:10px; border:0;">
                            <div class="card-body">
                                <div class="container align-items-center">
                                    <h4>Statistika Pengunjung</h4>
                                    <div id="histats_counter"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="copyright-text">
                        <p>Copyright © 2022 Chain App Dev Company. © 2023 Diskominfo Wonosobo.
                            <br>By: <a href="https://github.com/triemaryanto" target="_blank" title="css templates">Tri Maryanto</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    @stack('script')
    <livewire:scripts />
    <!-- Histats.com  (div with counter) -->

    <!-- Histats.com  START  (aync)-->
    <script type="text/javascript">
        var _Hasync = _Hasync || [];
        _Hasync.push(['Histats.start', '1,4784140,4,428,112,75,00011111']);
        _Hasync.push(['Histats.fasi', '1']);
        _Hasync.push(['Histats.track_hits', '']);
        _Hasync.push(['Histats.framed_page', '']);
        (function() {
            var hs = document.createElement('script');
            hs.type = 'text/javascript';
            hs.async = true;
            hs.src = ('//s10.histats.com/js15_as.js');
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
        })();

    </script>
    <noscript><a href="/" target="_blank"><img src="//sstatic1.histats.com/0.gif?4784140&101" alt="" border="0"></a></noscript>
    <!-- Histats.com  END  -->
    <!-- Scripts -->
    <script src="{{ asset('chain/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('chain/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('chain/assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('chain/assets/js/animation.js') }}"></script>
    <script src="{{ asset('chain/assets/js/imagesloaded.js') }}"></script>
    <script src="{{ asset('chain/assets/js/popup.js') }}"></script>
    <script src="{{ asset('chain/assets/js/custom.js') }}"></script>
</body>

</html>
