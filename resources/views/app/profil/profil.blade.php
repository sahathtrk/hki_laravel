@extends('base')
@section('judul-halaman', 'Profil')  

@section('konten')

    <!-- HEADER -->
    <div class="row">
        <div class="col-12">
            <h1>Profil</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                <ol class="breadcrumb pt-0">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li> 
                    <li class="breadcrumb-item active" aria-current="page">Profil</li>
                </ol>
            </nav>
            <div class="separator mb-5"></div>
        </div> 
    </div>

    <!-- KONTEN -->
    <div class="row list disable-text-selection" data-check-all="checkAll">

        <!-- DATA ANAK -->
        <div class="col-xl-4 col-lg-4 col-12 col-sm-6 mb-4">
            <div class="card">

                <!-- JUDUL -->
                <div class="position-relative">
                    <a href="{{ route('profil.data.anak.read') }}"><img class="card-img-top" src="img/profil/data-anak-icon.jpg"
                            alt="Card image cap"></a>
                    <span class="badge badge-pill badge-theme-2 position-absolute badge-top-left">Data Anak</span>
                </div>

                <div class="card-body">
                    <div class="row"> 
                        <div class="col-10">
                            <a href="{{ route('profil.data.anak.read') }}">
                                <p class="list-item-heading mb-4 pt-1">Data Anak</p>
                            </a>
                            <footer>
                                <p class="text-muted text-small mb-0 font-weight-light">Lihat & edit data anak</p>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- DATA GREJAWI -->
        <div class="col-xl-4 col-lg-4 col-12 col-sm-6 mb-4">
            <div class="card">

                <!-- JUDUL -->
                <div class="position-relative">
                    <a href="{{ route('profil.data.grejawi') }}"><img class="card-img-top" src="img/profil/data-grejawi-icon.jpg"
                            alt="Card image cap"></a>
                    <span class="badge badge-pill badge-theme-2 position-absolute badge-top-left">Data Grejawi</span>
                </div>

                <div class="card-body">
                    <div class="row"> 
                        <div class="col-10">
                            <a href="{{ route('profil.data.grejawi') }}">
                                <p class="list-item-heading mb-4 pt-1">Data Grejawi</p>
                            </a>
                            <footer>
                                <p class="text-muted text-small mb-0 font-weight-light">Lihat & edit data grejawi</p>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 
        <!-- DATA PENDIDIKAN FORMAL -->
        <div class="col-xl-4 col-lg-4 col-12 col-sm-6 mb-4">
            <div class="card">

                <!-- JUDUL -->
                <div class="position-relative">
                    <a href="{{ route('profil.data.pendidikan.formal') }}"><img class="card-img-top" src="img/profil/data-pendidikan-formal-icon.jpg"
                            alt="Card image cap"></a>
                    <span class="badge badge-pill badge-theme-2 position-absolute badge-top-left">Data Pendidikan Formal</span>
                </div>

                <div class="card-body">
                    <div class="row"> 
                        <div class="col-10">
                            <a href="{{ route('profil.data.pendidikan.formal') }}">
                                <p class="list-item-heading mb-4 pt-1">Data Pendidikan Formal</p>
                            </a>
                            <footer>
                                <p class="text-muted text-small mb-0 font-weight-light">Lihat & edit data pendidikan formal</p>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- DATA PENDIDIKAN INFORMAL -->
        <div class="col-xl-4 col-lg-4 col-12 col-sm-6 mb-4">
            <div class="card">

                <!-- JUDUL -->
                <div class="position-relative">
                    <a href="{{ route('profil.data.pendidikan.informal') }}"><img class="card-img-top" src="img/profil/data-pendidikan-informal-icon.jpg"
                            alt="Card image cap"></a>
                    <span class="badge badge-pill badge-theme-2 position-absolute badge-top-left">Data Pendidikan Informal</span>
                </div>

                <div class="card-body">
                    <div class="row"> 
                        <div class="col-10">
                            <a href="{{ route('profil.data.pendidikan.informal') }}">
                                <p class="list-item-heading mb-4 pt-1">Data Pendidikan Informal</p>
                            </a>
                            <footer>
                                <p class="text-muted text-small mb-0 font-weight-light">Lihat & edit data pendidikan informal</p>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- DATA PERSONAL -->
        <div class="col-xl-4 col-lg-4 col-12 col-sm-6 mb-4">
            <div class="card">

                <!-- JUDUL -->
                <div class="position-relative">
                    <a href="{{ route('profil.data.pribadi') }}"><img class="card-img-top" src="img/profil/data-personal-icon.jpg"
                            alt="Card image cap"></a>
                    <span class="badge badge-pill badge-theme-2 position-absolute badge-top-left">Data Pribadi</span>
                </div>

                <div class="card-body">
                    <div class="row"> 
                        <div class="col-10">
                            <a href="{{ route('profil.data.pribadi') }}">
                                <p class="list-item-heading mb-4 pt-1">Data Personal</p>
                            </a>
                            <footer>
                                <p class="text-muted text-small mb-0 font-weight-light">Lihat & edit data personal</p>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- DATA SUAMI ISTRI -->
        <div class="col-xl-4 col-lg-4 col-12 col-sm-6 mb-4">
            <div class="card">

                <!-- JUDUL -->
                <div class="position-relative">
                    <a href="{{ route('profil.data.suami.istri') }}"><img class="card-img-top" src="img/profil/data-suami-istri-icon.jpg"
                            alt="Card image cap"></a>
                    <span class="badge badge-pill badge-theme-2 position-absolute badge-top-left">Data Suami Istri</span>
                </div>

                <div class="card-body">
                    <div class="row"> 
                        <div class="col-10">
                            <a href="{{ route('profil.data.suami.istri') }}">
                                <p class="list-item-heading mb-4 pt-1">Data Suami Istri</p>
                            </a>
                            <footer>
                                <p class="text-muted text-small mb-0 font-weight-light">Lihat & edit data suami istri</p>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
        </div> 

    </div>
@endsection