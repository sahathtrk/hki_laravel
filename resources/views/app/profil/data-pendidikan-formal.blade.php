@extends('base') 
@section('judul-halaman', 'Detail Pendidikan Formal')  
@section('konten')  

    <!-- HEADER -->
    <div class="row">
        <div class="col-12">
            <h1>Data Pendidikan Formal</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                <ol class="breadcrumb pt-0">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li> 
                    <li class="breadcrumb-item">
                        <a href="#">Profil</a>
                    </li> 
                    <li class="breadcrumb-item active" aria-current="page">Data Pendidikan Formal</li>
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
                    <h5 class="mb-4">Data Pendidikan Formal</h5>

                    <form autocomplete="off" action="{{ route('profil.data.pendidikan.formal') }}" method="post">
                        {{ csrf_field() }}
                        
                        @if ($notifikasi_update == "success")
                            <div class="alert alert-success alert-dismissible fade show rounded mb-0" role="alert">
                                <strong>Berhasil!</strong> Data pendidikan formal berhasil diperbaharui.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @elseif ($notifikasi_update == "failed")
                            <div class="alert alert-danger alert-dismissible fade show rounded mb-0" role="alert">
                                <strong>Gagal!</strong> Data pendidikan formal gagal diperbaharui.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>  
                        @endif
                        
                        <!-- SEKOLAH DASAR --> 
                        <div class="form-group mt-4">
                            <label for="sekolah-dasar">Sekolah Dasar</label>
                            <input type="text" class="form-control" name="sekolah_dasar" id="sekolah-dasar" placeholder="Masukan sekolah dasar..." value="{{ $pendidikan_formal->sekolah_dasar }}">
                        </div>

                        <!-- TAHUN MASUK --> 
                        <div class="form-group">
                            <label for="tahun-masuk-sd">Tahun Masuk</label>
                            <input type="text" class="form-control" name="tahun_masuk_sd" id="tahun-masuk-sd" placeholder="Masukan tahun masuk SD..." value="{{ $pendidikan_formal->tahun_masuk_sd }}">
                        </div>

                        <!-- TAHUN SELESAI -->
                        <div class="form-group">
                            <label for="tahun-selesai-sd">Tahun Selesai</label>
                            <input type="text" class="form-control" name="tahun_selesai_sd" id="tahun-selesai-sd" placeholder="Masukan tahun selesai SD..." value="{{ $pendidikan_formal->tahun_selesai_sd }}">
                        </div>

                        <!-- SEKOLAH MENENGAH PERTAMA -->
                        <div class="form-group">
                            <label for="sekolah-menengah-pertama">Sekolah Menengah Pertama</label>
                            <input type="text" class="form-control" name="sekolah_menengah_pertama" id="sekolah-menengah-pertama" placeholder="Masukan sekolah menengah pertama..." value="{{ $pendidikan_formal->sekolah_menengah_pertama }}">
                        </div>
                        
                        <!-- TAHUN MASUK --> 
                        <div class="form-group">
                            <label for="tahun-masuk-smp">Tahun Masuk</label>
                            <input type="text" class="form-control" name="tahun_masuk_smp" id="tahun-masuk-smp" placeholder="Masukan tahun masuk SMP..."  value="{{ $pendidikan_formal->tahun_masuk_smp }}">
                        </div>

                        <!-- TAHUN SELESAI -->
                        <div class="form-group">
                            <label for="tahun-selesai-smp">Tahun Selesai</label>
                            <input type="text" class="form-control" name="tahun_selesai_smp" id="tahun-selesai-smp" placeholder="Masukan tahun selsai SMP..." value="{{ $pendidikan_formal->tahun_selesai_smp }}">
                        </div>

                        <!-- SEKOLAH MENENGAH ATAS -->
                        <div class="form-group">
                            <label for="sekolah-menengah-atas">Sekolah Menengah Atas</label>
                            <input type="text" class="form-control" name="sekolah_menengah_atas" id="sekolah-menengah-atas" placeholder="Masukan sekolah menengah atas..." value="{{ $pendidikan_formal->sekolah_menengah_atas }}">
                        </div>

                        <!-- TAHUN MASUK -->
                        <div class="form-group">
                            <label for="tahun-masuk-sma">Tahun Masuk</label>
                            <input type="text" class="form-control" name="tahun_masuk_sma" id="tahun-masuk-sma" placeholder="Masukan tahun masuk SMA..." value="{{ $pendidikan_formal->tahun_masuk_sma }}">
                        </div>

                        <!-- TAHUN SELESAI -->      
                        <div class="form-group">
                            <label for="tahun_selesai-sma">Tahun Selesai</label>
                            <input type="text" class="form-control" name="tahun_selesai_sma" id="tahun-selesai-sma" placeholder="Masukan tahun selesai SMA..." value="{{ $pendidikan_formal->tahun_selesai_sma }}">
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