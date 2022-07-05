@extends('base') 
@section('judul-halaman', 'Data Grejawi')  
@section('konten')  

    <!-- HEADER -->
    <div class="row">
        <div class="col-12">
            <h1>Data Grejawi</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                <ol class="breadcrumb pt-0">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li> 
                    <li class="breadcrumb-item">
                        <a href="#">Akun</a>
                    </li> 
                    <li class="breadcrumb-item active" aria-current="page">Data Grejawi</li>
                </ol>
            </nav>
            <div class="separator mb-5"></div>
        </div> 
    </div>

    <!-- KONTEN -->
    <div class="row">

        <div style="width:600px;" class="ml-4">    

            <div class="card mb-4">
                <div class="card-body">

                    <form action="{{ route('profil.data.grejawi') }}" method="post">
                        {{ csrf_field() }} 

                        <h5 class="mb-4">Data Grejawi</h5> 

                        <!-- TEMPAT BAPTIS -->
                        <div class="form-group mt-4">
                            <label for="tempat_baptis">Tempat Baptis</label>
                            <input readonly type="text" class="form-control" name="tempat_baptis" id="tempat-baptis" placeholder="Tempat baptis tidak tersedia" value="{{ $grejawi->tempat_baptis }}">
                        </div>
    
                        <!-- TANGGAL BAPTIS -->
                        <div class="form-group">
                            <label for="tanggal_baptis">Tanggal Baptis</label>
                            <input readonly type="text" class="form-control datepicker" name="tanggal_baptis" id="tanggal-baptis" placeholder="Tanggal baptis tidak tersedia" value="{{ $grejawi->tanggal_baptis }}">
                        </div>  

                        <!-- TEMPAT SIDI -->
                        <div class="form-group">
                            <label for="tempat-sidi">Tempat Sidi</label>
                            <input readonly type="text" class="form-control" name="tempat_sidi" id="tempat-sidi" placeholder="Tempat sidi tidak tersedia" value="{{ $grejawi->tempat_sidi }}">
                        </div>

                        <!-- TANGGAL SIDI -->
                        <div class="form-group">
                            <label for="tanggal-sidi">Tanggal Sidi</label>
                            <input readonly type="text" class="form-control" name="tanggal_sidi" id="tanggal-sidi" placeholder="Tanggal sidi tidak tersedia" value="{{ $grejawi->tanggal_sidi }}">
                        </div>  

                        <!-- TEMPAT MENIKAH -->
                        <div class="form-group">
                            <label for="tempat-menikah">Tempat Menikah</label>
                            <input readonly type="text" class="form-control" name="tempat_menikah" id="tempat_menikah" placeholder="Tempat menikah tidak tersedia" value="{{ $grejawi->tempat_menikah }}">
                        </div>

                        <!-- TANGGAL MENIKAH -->
                        <div class="form-group">
                            <label for="tanggal-menikah">Tanggal Menikah</label>
                            <input readonly type="text" class="form-control datepicker" name="tanggal_menikah" id="tanggal-menikah" placeholder="Tanggal menikah tidak tersedia" value="{{ $grejawi->tanggal_menikah }}">
                        </div>  

                        <!-- TEMPAT MENERIMA TAHBISAN -->
                        <div class="form-group">
                            <label for="tempat-tahbisan">Tempat menerima Tahbisan</label>
                            <input readonly type="text" class="form-control" name="tempat_tahbisan" id="tempat-tahbisan" placeholder="Menerima tahbisan tidak tersedia" value="{{ $grejawi->tempat_tahbisan }}">
                        </div>

                        <!-- TANGGAL MENERIMA TAHBISAN --> 
                        <div class="form-group">
                            <label for="tanggal-tahbisan">Tanggal Menerima Tahbisan</label>
                            <input readonly type="text" class="form-control datepicker" name="tanggal_tahbisan" id="tanggal-tahbisan" placeholder="Tanggal menerima tahbisan tidak tersedia" value="{{ $grejawi->tanggal_tahbisan }}">
                        </div>  

                        <!-- TOMBOL -->  
                        <div class="d-flex justify-content-end align-items-center">
                            <a href="{{ route('akun.read') }}" class="btn btn-danger mb-1">Kembali</a>
                        </div>

                    </form>
                </div>
            </div>

 
        </div>
    </div> 

@endsection