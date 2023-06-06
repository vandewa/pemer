<!doctype html>
<html lang="en" class="minimal-theme">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{csrf_token()}}">
  <link rel="icon" href="{{ asset('snacked/ltr/assets/images/favicon/favicon-32x32.png')}}" type="image/png" />

  <!--plugins-->
  <link href="{{ asset('snacked/ltr/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
  <link href="{{ asset('snacked/ltr/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
  <link href="{{ asset('snacked/ltr/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
  <link href="{{ asset('snacked/ltr/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link href="{{ asset('snacked/ltr/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{ asset('snacked/ltr/assets/css/bootstrap-extended.css')}}" rel="stylesheet" />
  <link href="{{ asset('snacked/ltr/assets/css/style.css')}}" rel="stylesheet" />
  <link href="{{ asset('snacked/ltr/assets/css/icons.css')}}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

  <!-- loader-->
  <link href="{{ asset('snacked/ltr/assets/css/pace.min.css')}}" rel="stylesheet" />

  <!--Theme Styles-->
  <link href="{{ asset('snacked/ltr/assets/css/dark-theme.css')}}" rel="stylesheet" />
  <link href="{{ asset('snacked/ltr/assets/css/light-theme.css')}}" rel="stylesheet" />
  <link href="{{ asset('snacked/ltr/assets/css/semi-dark.css')}}" rel="stylesheet" />
  <link href="{{ asset('snacked/ltr/assets/css/header-colors.css')}}" rel="stylesheet" />

  <!-- Styles -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
  <!-- Or for RTL support -->

  <!-- Scripts -->

  <link href="{{ asset('snacked/ltr/assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <link href="{{ asset('snacked/ltr/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('snacked/ltr/assets/plugins/select2/css/select2-bootstrap4.css')}}" rel="stylesheet" />


  @stack('css')
  @livewireStyles

  @vite([])

    {{-- <script src="https://cdn.plot.ly/plotly-2.20.0.min.js" charset="utf-8"></script> --}}

  <title>LAKON</title>
</head>

<body>

  <!--start wrapper-->
  <div class="wrapper">
    <!--start top header-->
      <header class="top-header">
        <nav class="gap-3 navbar navbar-expand align-items-center">
          <div class="mobile-toggle-icon fs-3">
              <i class="bi bi-list"></i>
            </div>
            <form class="searchbar">
                <div class="position-absolute top-50 translate-middle-y search-icon ms-3"><i class="bi bi-search"></i></div>
                <input class="form-control" type="text" placeholder="Type here to search">
                <div class="position-absolute top-50 translate-middle-y search-close-icon"><i class="bi bi-x-lg"></i></div>
            </form>
            <div class="top-navbar-right ms-auto">
              <ul class="navbar-nav align-items-center">
                <li class="nav-item search-toggle-icon">
                  <a class="nav-link" href="#">
                    <div class="">
                      <i class="bi bi-search"></i>
                    </div>
                  </a>
              </li>

              <li class="nav-item dropdown dropdown-user-setting">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                  <div class="user-setting d-flex align-items-center">
                    <h6 class="mb-0 dropdown-user-name me-2">{{ auth()->user()->name??'' }}</h6>
                    <img src="{{ asset('snacked/ltr/assets/images/favicon/android-chrome-512x512.png')}}" class="user-img" alt="">
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                     <a class="dropdown-item" href="#">
                       <div class="d-flex align-items-center">
                          <img src="{{ asset('snacked/ltr/assets/images/favicon/android-chrome-512x512.png')}}" alt="" class="rounded-circle" width="54" height="54">
                          <div class="ms-3">
                            <h6 class="mb-0 dropdown-user-name">{{ auth()->user()->name??'' }}</h6>
                          </div>
                       </div>
                     </a>
                   </li>
                   <li><hr class="dropdown-divider"></li>
                   <li>
                      <a class="dropdown-item" type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleVerticallycenteredModal"><i class="bx bx-cog"></i>
                        <span class="ms-2">Ganti Password</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                         <div class="d-flex align-items-center">
                           <div class=""><i class="bi bi-lock-fill"></i></div>
                           <div class="ms-3"><span>Logout</span></div>
                         </div>
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                       </a>
                    </li>
                </ul>
              </li>
              </ul>
              </div>
        </nav>
      </header>
       <!--end top header-->

       <!-- Modal -->
      <div class="modal fade" id="exampleVerticallycenteredModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ganti Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{Form::open(['route' => 'ganti.password','method' => 'post', 'class' => 'row g-3 mt-2', 'files' => true, 'id' => 'my-forms'])}}
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Password Baru</label>
                        {{Form::password('password', null, ['class' => 'form-control' ])}}
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Konfirmasi Password</label>
                        {{Form::password('password_confirmation', null, ['class' => 'form-control' ])}}
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                {{Form::close()}}
            </div>
        </div>
      </div>

       @include('layouts.sidebar')
       
       @yield('content')
       {{ $slot??"" }}

       <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
       <!--end overlay-->

       <!--Start Back To Top Button-->
		     <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
       <!--End Back To Top Button-->

       <!--start switcher-->
       <div class="switcher-body">
        <button class="shadow-sm btn btn-primary btn-switcher" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i class="bi bi-paint-bucket me-0"></i></button>
        <div class="p-2 shadow offcanvas offcanvas-end border-start-0" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling">
          <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Theme Customizer</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
          </div>
          <div class="offcanvas-body">
            <h6 class="mb-0">Theme Variation</h6>
            <hr>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="LightTheme" value="option1">
              <label class="form-check-label" for="LightTheme">Light</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="DarkTheme" value="option2">
              <label class="form-check-label" for="DarkTheme">Dark</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="SemiDarkTheme" value="option3" checked>
              <label class="form-check-label" for="SemiDarkTheme">Semi Dark</label>
            </div>
            <hr>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="MinimalTheme" value="option3">
              <label class="form-check-label" for="MinimalTheme">Minimal Theme</label>
            </div>
            <hr/>
            <h6 class="mb-0">Header Colors</h6>
            <hr/>
            <div class="header-colors-indigators">
              <div class="row row-cols-auto g-3">
                <div class="col">
                  <div class="indigator headercolor1" id="headercolor1"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor2" id="headercolor2"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor3" id="headercolor3"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor4" id="headercolor4"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor5" id="headercolor5"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor6" id="headercolor6"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor7" id="headercolor7"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor8" id="headercolor8"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
       </div>
       <!--end switcher-->

  </div>
  <!--end wrapper-->

  <!-- Bootstrap bundle JS -->
  <script src="{{ asset('snacked/ltr/assets/js/bootstrap.bundle.min.js')}}"></script>
  <!--plugins-->
  <script src="{{ asset('snacked/ltr/assets/js/jquery.min.js')}}"></script>
  <script src="{{ asset('snacked/ltr/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
  <script src="{{ asset('snacked/ltr/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
  <script src="{{ asset('snacked/ltr/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
  <script src="{{ asset('snacked/ltr/assets/js/pace.min.js')}}"></script>
  <script src="{{ asset('snacked/ltr/assets/plugins/chartjs/js/Chart.min.js')}}"></script>
  <script src="{{ asset('snacked/ltr/assets/plugins/chartjs/js/Chart.extension.js')}}"></script>
  <script src="{{ asset('snacked/ltr/assets/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script>
   <!-- Vector map JavaScript -->
  <script src="{{ asset('snacked/ltr/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
  <script src="{{ asset('snacked/ltr/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
  <script src="{{ asset('snacked/ltr/assets/plugins/select2/js/select2.min.js')}}"></script>
  <script src="{{ asset('snacked/ltr/assets/js/form-select2.js')}}"></script>
  {{-- <script src="{{ asset('snacked/ltr/assets/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script> --}}

	
  <!--app-->
  <script src="{{ asset('snacked/ltr/assets/js/app.js')}}"></script>
  {{-- <script src="{{ asset('snacked/ltr/assets/js/index.js')}}"></script> --}}

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script> --}}


  <script src="{{ asset('snacked/ltr/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{ asset('snacked/ltr/assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
  <script src="{{ asset('snacked/ltr/assets/js/table-datatable.js')}}"></script>

  {{-- Sweet Alert Delete Script --}}
  <script>
    window.addEventListener('show-delete-confirmation', event => {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteConfirmed')
                }
        })
    });
    window.addEventListener('Delete', event => {
        Swal.fire(
            'Deleted!',
            'Data has been deleted.',
            'success'
        )
    });
    window.addEventListener('Success', event => {
        Swal.fire(
          'Good job!',
          'Data has been added.',
          'success'
        )
    });
    window.addEventListener('Update', event => {
        Swal.fire(
          'Good job!',
          'Data has been updated.',
          'success'
        )
    });
</script>
<script type="text/javascript">
  function sweetAlert2() {
      Swal.fire(
          'Berhasil!',
          'Mengedit data.',
          'success'
      )
  }

  @if (session('edit'))
      sweetAlert2();
  @endif
</script>

<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

<!-- Laravel Javascript Validation -->
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\PasswordValidation','#my-forms') !!}

<script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>

 @include('sweetalert::alert')
 @stack('js')
 @livewireScripts

 <script>
		$(document).on('click', '.delete-data-table', function (a) {
			a.preventDefault();
			Swal.fire({
				title: 'Are you sure?',
				text: "Do you realy want to delete this records? This process cannot be undone.",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Delete!'
			}).then((result) => {
				if (result.value) {
					a.preventDefault();
					var url = $(this).attr('href');
					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});

					$.ajax({
						url: url,
						method: 'delete',
						success: function () {
							Swal.fire(
								'Dihapus!',
								'Data berhasil di hapus.',
								'success'
							)
							if (typeof table) {
								$('#devan').DataTable().ajax.reload();	
							}
						}
					})
				}
			})
		});
	</script>
  <script type="text/javascript">
		function sweetAlert() 
		{  
			Swal.fire(
			'Berhasil!',
			'Menambahkan data.',
			'success'
			)
		}
	
		@if(session('store'))
		sweetAlert();
		@endif
	
	</script>
	<script type="text/javascript">
		function sweetAlert2() 
		{  
			Swal.fire(
			'Berhasil!',
			'Mengedit data.',
			'success'
			)
		}
	
		@if(session('edit'))
		sweetAlert2();
		@endif
	</script>


</body>

</html>
