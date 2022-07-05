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
                        <a href="#">Profil</a>
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

                    <form autocomplete="off" action="{{ route('profil.data.grejawi') }}" method="post">
                        {{ csrf_field() }} 

                        <h5 class="mb-4">Data Grejawi</h5>

                        @if ($notifikasi_update == "success")
                            <div class="alert alert-success alert-dismissible fade show rounded mb-0" role="alert">
                                <strong>Berhasil!</strong> Data grejawi berhasil diperbaharui.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            @elseif ($notifikasi_update == "failed")
                            <div class="alert alert-danger alert-dismissible fade show rounded mb-0" role="alert">
                                <strong>Gagal!</strong> Data grejawi gagal diperbaharui.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>  
                        @endif

                        <!-- TEMPAT BAPTIS -->
                        <div class="form-group mt-4">
                            <label for="tempat_baptis">Tempat Baptis</label>
                            <input type="text" class="form-control" name="tempat_baptis" id="tempat-baptis" placeholder="Masukan tempat baptis..." value="{{ $grejawi->tempat_baptis }}">
                        </div>
    
                        <!-- TANGGAL BAPTIS -->
                        <div class="form-group">
                            <label for="tanggal_baptis">Tanggal Baptis</label>
                            <input type="text" class="form-control datepicker" name="tanggal_baptis" id="tanggal-baptis" placeholder="Masukan tanggal baptis..." value="{{ $grejawi->tanggal_baptis }}">
                        </div>  

                        <!-- TEMPAT SIDI -->
                        <div class="form-group">
                            <label for="tempat-sidi">Tempat Sidi</label>
                            <input type="text" class="form-control" name="tempat_sidi" id="tempat-sidi" placeholder="Masukan tempat sidi..." value="{{ $grejawi->tempat_sidi }}">
                        </div>

                        <!-- TANGGAL SIDI -->
                        <div class="form-group">
                            <label for="tanggal-sidi">Tanggal Sidi</label>
                            <input type="text" class="form-control datepicker" name="tanggal_sidi" id="tanggal-sidi" placeholder="Masukan tanggal sidi..." value="{{ $grejawi->tanggal_sidi }}">
                        </div>  

                        <!-- TEMPAT MENIKAH -->
                        <div class="form-group">
                            <label for="tempat-menikah">Tempat Menikah</label>
                            <input type="text" class="form-control" name="tempat_menikah" id="tempat_menikah" placeholder="Masukan tempat menikah..." value="{{ $grejawi->tempat_menikah }}">
                        </div>

                        <!-- TANGGAL MENIKAH -->
                        <div class="form-group">
                            <label for="tanggal-menikah">Tanggal Menikah</label>
                            <input type="text" class="form-control datepicker" name="tanggal_menikah" id="tanggal-menikah" placeholder="Masukan tanggal menikah..." value="{{ $grejawi->tanggal_menikah }}">
                        </div>  

                        <!-- TEMPAT MENERIMA TAHBISAN -->
                        <div class="form-group">
                            <label for="tempat-tahbisan">Tempat menerima Tahbisan</label>
                            <input type="text" class="form-control" name="tempat_tahbisan" id="tempat-tahbisan" placeholder="Masukan menerima tahbisan..." value="{{ $grejawi->tempat_tahbisan }}">
                        </div>

                        <!-- TANGGAL MENERIMA TAHBISAN --> 
                        <div class="form-group">
                            <label for="tanggal-tahbisan">Tanggal Menerima Tahbisan</label>
                            <input type="text" class="form-control datepicker" name="tanggal_tahbisan" id="tanggal-tahbisan" placeholder="Masukan tanggal menerima tahbisan..." value="{{ $grejawi->tanggal_tahbisan }}">
                        </div>  

                        <!-- TOMBOL -->  
                        <div class="d-flex justify-content-end align-items-center">
                            <button type="submit" class="btn btn-primary mb-1">Perbaharui</button> &nbsp; &nbsp;
                            <button type="button" class="btn btn-danger mb-1">Kembali</button>
                        </div>

                    </form>
                </div>
            </div>

 
        </div>
    </div> 

@endsection