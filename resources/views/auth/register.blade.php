 <!doctype html>
 <html lang="en">

 <head>
     <base href="./">
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
     <meta name="description" content="Layanan Konsultasi">
     <meta name="author" content="Diskominfo Wonosobo">
     <meta name="keyword" content="Sistem Informasi Laporan Kegiatan Harian">
     <link rel="icon" href="{{ asset('snacked/ltr/assets/images/favicon/favicon-32x32.png') }}" type="image/png" />
     <title>Register Asik Sobo</title>
     <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <link href="https://fonts.googleapis.com/css?family=Teko&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="{{ asset('style.css') }}">

 </head>

 <body class="img js-fullheight" style="background-image:url({{ asset('2655967.jpg') }});object-fit:cover">
     <section class="ftco-section">
         <div class="container">
             <div class="row justify-content-center">
                 <div class="mt-4 mb-0 text-center col-md-6">
                     <img src="{{ asset('chain/assets/images/logo3.png') }}" style=" width: 70%;
  height: auto;"></br>
                     <span style="margin-left: 10px; font-weight: normal; font-family: 'Teko', sans-serif; color: #ffffff; font-size: 20pt">(
                         Aplikasi Sistem Informasi Kerja Sama )</span>
                 </div>
             </div>
             <div class="mt-4 row justify-content-center">
                 <div class="col-md-6 col-lg-4">
                     <div class="p-0 login-wrap">
                         <h6 class="mb-4 text-center" style="color: #ffffff;">Form Registrasi</h6>
                         <form action="{{ route('register') }}" class="signin-form" id="flogin" onsubmit="return lsogin();" method="post" accept-charset="utf-8">
                             @csrf

                             <x-validation-errors class="mb-4" />

                             @if (session('status'))
                             <div class="mb-4 text-sm font-medium text-green-600">
                                 {{ session('status') }}
                             </div>
                             @endif
                             <div class="form-group">
                                 <input type="text" class="form-control" name="name" placeholder="Name" :value="old('name')" required autofocus autocomplete="name">
                             </div>
                             <div class="form-group">
                                 <input type="email" class="form-control" name="email" placeholder="Email" :value="old('email')" required autocomplete="username">
                             </div>
                             <div class="form-group">
                                 <input name="password" placeholder="Password" id="flogin_password" type="password" class="form-control" required autocomplete="new-password">
                                 <span toggle="#flogin_password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                             </div>
                             <div class="form-group">
                                 <input name="password_confirmation" placeholder="Confirm Password" id="flogin_password2" type="password" class="form-control" required autocomplete="new-password">
                                 <span toggle="#flogin_password2" class="fa fa-fw fa-eye field-icon toggle-password2"></span>
                             </div>
                             <div class="form-group">
                                 <button type="submit" class="px-3 form-control btn submit" id="flogin_tb_ok" style="background-color: rgb(51, 88, 244) !important;
								background-image: linear-gradient(to left bottom, rgb(29, 140, 248), rgb(51, 88, 244), rgb(29, 140, 248)) !important;
								background-size: 210% 210%;
								background-position: 100% 0;
								transition: all .15s ease;
								box-shadow: none;
								color: #fff;"><b>Register</b></button>
                             </div>
                             <div class="form-group">
                                 <a href="{{ route('login') }}" class="px-3 form-control btn radius-30" id="flogin_tb_ok" style="background-color: rgb(51, 88, 244) !important;
								background-image: linear-gradient(to left bottom, rgb(29, 140, 248), rgb(51, 88, 244), rgb(29, 140, 248)) !important;
								background-size: 210% 210%;
								background-position: 100% 0;
								transition: all .15s ease;
								box-shadow: none;
								color: #fff;"><b>Sudah Punya Akun?</b> </a>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
         <div class="pt-3 container-fluid client bg-transparent">
             <div class="container text-center">
                 <span class="small float-center" style="font-size: 10px; color:#fff;"><b>&copy; 2023
                         <?php if (date('Y') == 2023) {
                                echo '';
                            } else {
                                echo '- ' . date('Y');
                            }
                            ?>
                         Sekretariat Daerah Kabupaten Wonosobo | by Tri Maryanto</b></span>
             </div>
         </div>
     </section>
     <script src="{{ asset('jquery.min.js') }}"></script>

     <script>
         $(function() {
             $(".alert").delay(3000).slideUp(300);
         });

     </script>
     <script type="text/javascript">
         (function($) {
             "use strict";
             var fullHeight = function() {
                 $('.js-fullheight').css('height', $(window).height());
                 // $(window).resize(function () {
                 // 	$('.js-fullheight').css('height', $(window).height());
                 // });
             };
             fullHeight();
             $(".toggle-password").click(function() {
                 $(this).toggleClass("fa-eye fa-eye-slash");
                 var input = $($(this).attr("toggle"));
                 if (input.attr("type") == "password") {
                     input.attr("type", "text");
                 } else {
                     input.attr("type", "password");
                 }
             });
             $(".toggle-password2").click(function() {
                 $(this).toggleClass("fa-eye fa-eye-slash");
                 var input = $($(this).attr("toggle"));
                 if (input.attr("type") == "password") {
                     input.attr("type", "text");
                 } else {
                     input.attr("type", "password");
                 }
             });
         })(jQuery);

     </script>

 </body>

 </html>
