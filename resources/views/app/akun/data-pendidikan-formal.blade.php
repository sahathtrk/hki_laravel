@extends('base') 
@section('judul-halaman', 'Data Pendidikan Formal')  
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
                        <a href="#">Akun</a>
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

                    <form action="{{ route('profil.data.pendidikan.formal') }}" method="post">
                        {{ csrf_field() }}
                         
                        
                        <!-- SEKOLAH DASAR --> 
                        <div class="form-group mt-4">
                            <label for="sekolah-dasar">Sekolah Dasar</label>
                            <input readonly type="text" class="form-control" name="sekolah_dasar" id="sekolah-dasar" placeholder="Sekolah dasar" value="{{ $pendidikan_formal->sekolah_dasar }}">
                        </div>

                        <!-- TAHUN MASUK --> 
                        <div class="form-group">
                            <label for="tahun-masuk-sd">Tahun Masuk</label>
                            <input readonly type="text" class="form-control" name="tahun_masuk_sd" id="tahun-masuk-sd" placeholder="Tahun masuk SD" value="{{ $pendidikan_formal->tahun_masuk_sd }}">
                        </div>

                        <!-- TAHUN SELESAI -->
                        <div class="form-group">
                            <label for="tahun-selesai-sd">Tahun Selesai</label>
                            <input readonly type="text" class="form-control" name="tahun_selesai_sd" id="tahun-selesai-sd" placeholder="Tahun selesai SD" value="{{ $pendidikan_formal->tahun_selesai_sd }}">
                        </div>

                        <!-- SEKOLAH MENENGAH PERTAMA -->
                        <div class="form-group">
                            <label for="sekolah-menengah-pertama">Sekolah Menengah Pertama</label>
                            <input readonly type="text" class="form-control" name="sekolah_menengah_pertama" id="sekolah-menengah-pertama" placeholder="Sekolah menengah pertama" value="{{ $pendidikan_formal->sekolah_menengah_pertama }}">
                        </div>
                        
                        <!-- TAHUN MASUK --> 
                        <div class="form-group">
                            <label for="tahun-masuk-smp">Tahun Masuk</label>
                            <input readonly type="text" class="form-control" name="tahun_masuk_smp" id="tahun-masuk-smp" placeholder="Tahun masuk SMP"  value="{{ $pendidikan_formal->tahun_masuk_smp }}">
                        </div>

                        <!-- TAHUN SELESAI -->
                        <div class="form-group">
                            <label for="tahun-selesai-smp">Tahun Selesai</label>
                            <input readonly type="text" class="form-control" name="tahun_selesai_smp" id="tahun-selesai-smp" placeholder="Tahun selsai SMP" value="{{ $pendidikan_formal->tahun_selesai_smp }}">
                        </div>

                        <!-- SEKOLAH MENENGAH ATAS -->
                        <div class="form-group">
                            <label for="sekolah-menengah-atas">Sekolah Menengah Atas</label>
                            <input readonly type="text" class="form-control" name="sekolah_menengah_atas" id="sekolah-menengah-atas" placeholder="Sekolah menengah atas" value="{{ $pendidikan_formal->sekolah_menengah_atas }}">
                        </div>

                        <!-- TAHUN MASUK -->
                        <div class="form-group">
                            <label for="tahun-masuk-sma">Tahun Masuk</label>
                            <input readonly type="text" class="form-control" name="tahun_masuk_sma" id="tahun-masuk-sma" placeholder="Tahun masuk SMA" value="{{ $pendidikan_formal->tahun_masuk_sma }}">
                        </div>

                        <!-- TAHUN SELESAI -->      
                        <div class="form-group">
                            <label for="tahun_selesai-sma">Tahun Selesai</label>
                            <input readonly type="text" class="form-control" name="tahun_selesai_sma" id="tahun-selesai-sma" placeholder="Tahun selesai SMA" value="{{ $pendidikan_formal->tahun_selesai_sma }}">
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