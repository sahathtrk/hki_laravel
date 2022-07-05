<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>HKI | @yield('judul-halaman')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="{{ asset('font/iconsmind-s/css/iconsminds.css') }}" />
    <link rel="stylesheet" href="{{ asset('font/simple-line-icons/css/simple-line-icons.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.rtl.only.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/fullcalendar.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/datatables.responsive.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/glide.core.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap-stars.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/nouislider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap-datepicker3.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/component-custom-switch.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />

    <style>
		.icon-photo {
			position: absolute;
			right: 0;
			bottom: 0;
		}

		.profile-pic {
			border-radius: 50%;
			height: 150px;
			width: 150px;
			background-size: cover;
			background-position: center;
			background-blend-mode: multiply;
			vertical-align: middle;
			text-align: center;
			color: transparent;
			transition: all .3s ease;
			text-decoration: none;
			cursor: pointer;
            border: 2px solid grey;
		}

		.profile-pic:hover {
			background-color: rgba(0,0,0,.5);
			z-index: 10000;
			color: #fff;
			transition: all .3s ease;
			text-decoration: none;
		}

		.profile-pic span {
			display: inline-block;
			padding-top: 4.5em;
			padding-bottom: 4.5em;
		}

		.fp_upload {
				display: none;
				cursor: pointer;
		}
	</style>

</head>

<body id="app-container" class="menu-default show-spinner">

    <!-- TOP NAVBAR -->
    <nav class="navbar fixed-top">
        <div class="d-flex align-items-center navbar-left">
            <a href="#" class="menu-button d-none d-md-block">
                <svg class="main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 17">
                    <rect x="0.48" y="0.5" width="7" height="1" />
                    <rect x="0.48" y="7.5" width="7" height="1" />
                    <rect x="0.48" y="15.5" width="7" height="1" />
                </svg>
                <svg class="sub" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 17">
                    <rect x="1.56" y="0.5" width="16" height="1" />
                    <rect x="1.56" y="7.5" width="16" height="1" />
                    <rect x="1.56" y="15.5" width="16" height="1" />
                </svg>
            </a>
  
        </div>


        <a class="navbar-logo" href="{{ route('profil') }}">
            <img src="{{ asset('img/logo/logo-header.png') }}" alt="" width="250">
        </a>

        <div class="navbar-right"> 

            <div class="user d-inline-block">
                <button class="btn btn-empty p-0" type="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <span class="name">{{ nama_akun_session() }}</span>
                    <span>
                        <img alt="Profile Picture" src="{{ asset(foto_akun_session()) }}" />
                    </span>
                </button>

                <div class="dropdown-menu dropdown-menu-right mt-3"> 
                    <a class="dropdown-item" href="{{ route('auth.log.out') }}">Keluar</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- MENU SIDEBAR -->
    <div class="menu">
        <div class="main-menu">
            <div class="scroll">
                <ul class="list-unstyled">
                    @if (hak_akses_penuh(Session::get('id_akun')) == true)
                        <li class="">
                            <a href="#akun">
                                <i class="simple-icon-lock"></i>
                                <span>Akun</span>
                            </a>
                        </li>
                    @endif
                   
                    <li class="">
                        <a href="#profil">
                            <i class="simple-icon-people"></i>
                            <span>Profil</span>
                        </a>
                    </li> 
                    <li>
                        <a href="#laporan-pelayanan">
                            <i class="iconsminds-file-clipboard-file---text"></i> Lap. Pelayanan
                        </a>
                    </li>
                    <li>
                        <a href="#lembar-evaluasi">
                            <i class="iconsminds-file-edit"></i> Lembar Evaluasi
                        </a>
                    </li>
                    <li>
                        <a href="#dokumen">
                            <i class="iconsminds-books"></i> Dokumen
                        </a>
                    </li> 
                </ul>
            </div>
        </div>

        <div class="sub-menu">
            <div class="scroll">
                <ul class="list-unstyled" data-link="akun">
                    <li class="">
                        <a href="{{ route('akun.read') }}">
                            <i class="iconsminds-big-data"></i> <span class="d-inline-block">Read Akun</span>
                        </a>
                    </li>     
                </ul> 

                <ul class="list-unstyled" data-link="profil">
                    @if (hak_akses_penuh(Session::get('id_akun')) != true)
                    <li class="">
                        <a href="{{ route('profil.data.anak.read') }}">
                            <i class="iconsminds-big-data"></i> <span class="d-inline-block">Data Anak</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profil.data.grejawi') }}">
                            <i class="iconsminds-big-data"></i> <span class="d-inline-block">Data Grejawi</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profil.data.pendidikan.formal') }}">
                            <i class="iconsminds-big-data"></i> <span class="d-inline-block">Data Pendidikan Formal</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profil.data.pendidikan.informal') }}">
                            <i class="iconsminds-big-data"></i> <span class="d-inline-block">Data Pendidikan Informal</span>
                        </a>
                    </li>     
                    @endif
                    <li>
                        <a href="{{ route('profil.data.pribadi') }}">
                            <i class="iconsminds-big-data"></i> <span class="d-inline-block">Data Pribadi</span>
                        </a>
                    </li> 
                     @if (hak_akses_penuh(Session::get('id_akun')) != true)
                    <li>
                        <a href="{{ route('profil.data.suami.istri') }}">
                            <i class="iconsminds-big-data"></i> <span class="d-inline-block">Data Suami Istri</span>
                        </a>
                    </li>           
                    @endif
                </ul> 

                <ul class="list-unstyled" data-link="laporan-pelayanan">
                    
                    
                    @if (hak_akses_penuh(Session::get('id_akun')) == true)
                        <li class="">
                            <a href="{{ route('survei.pelayanan.create') }}">
                                <i class="iconsminds-big-data"></i> <span class="d-inline-block">Create Laporan Pelayanan</span>
                            </a>
                        </li>  
                        <li class="">
                            <a href="{{ route('survei.pelayanan.read') }}">
                                <i class="iconsminds-big-data"></i> <span class="d-inline-block">Read Laporan Pelayanan</span>
                            </a>
                        </li> 
                         
                    @else 
                        <li class="">
                            <a href="{{ route('survei.pelayanan.read') }}">
                                <i class="iconsminds-big-data"></i> <span class="d-inline-block">Submit Laporan Pelayanan</span>
                            </a>
                        </li> 
                    @endif    
                    
                </ul> 

                <ul class="list-unstyled" data-link="lembar-evaluasi">
                     
                    @if (hak_akses_penuh(Session::get('id_akun')) == true)

                        <li class="">
                            <a href="{{ route('survei.evaluasi.create') }}">
                                <i class="iconsminds-big-data"></i> <span class="d-inline-block">Create Lembar Evaluasi</span>
                            </a>
                        </li>    
                        
                        <li class="">
                            <a href="{{ route('survei.evaluasi.read') }}">
                                <i class="iconsminds-big-data"></i> <span class="d-inline-block">Read Lembar Evaluasi</span>
                            </a>
                        </li> 
                         
                    @else 
                        <li class="">
                            <a href="{{ route('survei.evaluasi.read') }}">
                                <i class="iconsminds-big-data"></i> <span class="d-inline-block">Submit Lembar Evaluasi</span>
                            </a>
                        </li> 
                    @endif  
                    
                </ul> 

                <ul class="list-unstyled" data-link="dokumen">
                    @if (hak_akses_penuh(Session::get('id_akun')) == true)
                        <li class="">
                            <a href="{{ route('dokumen.create') }}">
                                <i class="iconsminds-big-data"></i> <span class="d-inline-block">Create Dokumen</span>
                            </a>
                        </li>
                    @endif
                    <li>
                        <a href="{{ route('dokumen.read') }}">
                            <i class="iconsminds-big-data"></i> <span class="d-inline-block">Lihat Dokumen</span>
                        </a>
                    </li>  
                </ul> 
            </div>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <main>
        <div class="container-fluid">
            
          @yield('konten')
 
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="page-footer">
        <div class="footer-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <p class="mb-0 text-muted">HKI - Huria Kristen Indonesia 2022</p>
                    </div> 
                </div>
            </div>
        </div>
    </footer>

    <!-- UNIVERSAL MODAL -->
    <div class="modal fade" id="universal-modal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="judul-h5"></h5> 
                </div>
                <div class="modal-body">
                    <p id="paragraf-p"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="tutup-btn" data-dismiss="modal">Tutup</button>
                    <a  class="btn btn-primary" id="aksi-btn">Save changes</a>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/vendor/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/vendor/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('js/vendor/chartjs-plugin-datalabels.js') }}"></script>
    <script src="{{ asset('js/vendor/moment.min.js') }}"></script>
    <script src="{{ asset('js/vendor/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('js/vendor/datatables.min.js') }}"></script>
    <script src="{{ asset('js/vendor/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/vendor/progressbar.min.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery.barrating.min.js') }}"></script>
    <script src="{{ asset('js/vendor/select2.full.js') }}"></script>
    <script src="{{ asset('js/vendor/nouislider.min.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/vendor/Sortable.js') }}"></script>
    <script src="{{ asset('js/vendor/mousetrap.min.js') }}"></script>
    <script src="{{ asset('js/vendor/glide.min.js') }}"></script>
    <script src="{{ asset('js/dore.script.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>