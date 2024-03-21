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
    <title>Reset Password Asik Sobo</title>
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
                    <span
                        style="margin-left: 10px; font-weight: normal; font-family: 'Teko', sans-serif; color: #ffffff; font-size: 20pt">(
                        Aplikasi Sistem Informasi Kerja Sama )</span>
                </div>
            </div>
            <div class="mt-4 row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="p-0 login-wrap">
                        <h6 class="mb-4 text-center" style="color: #ffffff;">Silahkan Masukan Password Baru Anda</h6>
                        <hr>
                        @error('password')
                            <span class="d-block" style="color: #C0392B;">Password Tidak Sama atau minimal 8 karakter dengan
                                campuran huruf, angka &
                                simbol.</span>
                        @enderror
                        <form action="{{ route('rubah.password') }}" class="signin-form" id="flogin" method="post"
                            accept-charset="utf-8">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">


                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email"
                                    value="{{ $email }}" id="email" required readonly>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password"
                                    placeholder="Masukkan Password Baru" id="password" onkeyup="cek()" required>
                                <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password">
                                </span>
                            </div>
                            <label class="block mt-1 w-full" id="pw" for="password"></label>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password_confirmation"
                                    placeholder="Konfirmasi Password Baru" id="password_confirmation" onkeyup="cek2()"
                                    required>
                                <span toggle="#password_confirmation"
                                    class="fa fa-fw fa-eye field-icon toggle-password"></span>

                            </div>
                            <label class="block mt-1 w-full" id="pw2" for="password2"></label>
                            <div class="form-group">
                                <button type="submit" class="px-3 form-control btn submit" id="flogin_tb_ok"
                                    style="background-color: rgb(51, 88, 244) !important;
                           background-image: linear-gradient(to left bottom, rgb(29, 140, 248), rgb(51, 88, 244), rgb(29, 140, 248)) !important;
                           background-size: 210% 210%;
                           background-position: 100% 0;
                           transition: all .15s ease;
                           box-shadow: none;
                           color: #fff;"><b>Reset
                                        Password</b></button>
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
                        Sekretariat Daerah Kabupaten Wonosobo | by <a href="https://wa.me/+6285157392291"
                            style="color: #ffffff;" target="_blank">Tri Maryanto</a></b></span>
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
        })(jQuery);

        function cek() {
            var pwText = document.getElementById('password').value;
            var pwElm = document.getElementById('pw');
            var passwordInput = document.getElementById('password');
            var pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
            if (pattern.test(pwText)) {
                pw.textContent = "";
                passwordInput.style.border = '2px solid green';
            } else {
                passwordInput.style.border = '2px solid red';
                pw.style.color = "red";
                pw.textContent = "Gunakan minimal 8 karakter dengan campuran huruf, angka & simbol. ❌";
            }
        }

        function cek2() {
            var pwText2 = document.getElementById('password_confirmation').value;
            var pwElm2 = document.getElementById('pw2');
            var passwordInput2 = document.getElementById('password_confirmation');
            var pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
            if (pattern.test(pwText2)) {
                pw2.textContent = "";
                passwordInput2.style.border = '2px solid green';
            } else {
                pw2.style.color = "red";
                pw2.textContent = "Gunakan minimal 8 karakter dengan campuran huruf, angka & simbol. ❌";
                passwordInput2.style.border = '2px solid red';
            }
        }
    </script>
</body>

</html>
