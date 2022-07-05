@extends('base') 
@section('judul-halaman', 'Data Suami Istri')  
@section('konten')  

    <!-- HEADER -->
    <div class="row">
        <div class="col-12">
            <h1>Data Suami Istri</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                <ol class="breadcrumb pt-0">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li> 
                    <li class="breadcrumb-item">
                        <a href="#">Akun</a>
                    </li> 
                    <li class="breadcrumb-item active" aria-current="page">Data Suami Istri</li>
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
                    <h5 class="mb-4">Data Suami Istri</h5>

                    <form id="form-foto-profil" enctype="multipart/form-data" class="text-center p-5">
						{{ csrf_field() }}
						<label for="foto-profil">
							<div class="profile-pic" id="foto-profil-css" style="background-image: url('/{{ $suami_istri->foto }}')">
								<span class="glyphicon glyphicon-camera"></span>
								<span>{{ $suami_istri->nama_lengkap }}</span>
							</div> 
						</label> 
					</form> 


                    <form action="{{ route('profil.data.suami.istri') }}" method="post">
                        {{ csrf_field() }}

                        <!-- NAMA LENGKAP -->
                        <div class="form-group">
                            <label for="nama-lengkap">Nama Lengkap</label>
                            <input readonly type="text" class="form-control" name="nama_lengkap" id="nama-lengkap" placeholder="Nama lengkap tidak tersedia" value="{{ $suami_istri->nama_lengkap }}">
                        </div>

                        <!-- NIK -->
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input readonly type="text" class="form-control" name="nik" id="nik" placeholder="Nik tidak tersedia" value="{{ $suami_istri->nik }}">
                        </div>

                        <!-- JENIS KELAMIN -->
                        <div class="form-group">
                            <label for="jenis-kelamin">Jenis Kelamin</label>
                            <input readonly type="text" class="form-control" name="jenis_kelamin" id="jenis-kelamin" placeholder="Jenis kelamin tidak tersedia" value="{{ $suami_istri->jenis_kelamin }}">
                        </div>

                        <!-- TANGGAL LAHIR -->
                        <div class="form-group">
                            <label for="tanggal-lahir">Tanggal Lahir</label>
                            <input readonly type="text" class="form-control datepicker" name="tanggal_lahir" id="tanggal-lahir" placeholder="Tanggal lahir tidak tersedia" value="{{ $suami_istri->tanggal_lahir }}">
                        </div>  
                        
                        <!-- TEMPAT LAHIR -->
                        <div class="form-group">
                            <label for="nama-ibu">Tempat Lahir</label>
                            <input readonly type="text" class="form-control" name="tempat_lahir" id="tempat-lahir" placeholder="Tempat lahir tidak tersedia" value="{{ $suami_istri->tempat_lahir }}">
                        </div>

                        <!-- NAMA IBU -->
                        <div class="form-group">
                            <label for="nama-ibu">Nama Ibu</label>
                            <input readonly type="text" class="form-control" name="nama_ibu" id="nama-ibu" placeholder="Nama ibu tidak tersedia" value="{{ $suami_istri->nama_ibu }}">
                        </div>

                        <!-- NAMA AYAH -->
                        <div class="form-group">
                            <label for="nama-ayah">Nama Ayah</label>
                            <input readonly type="text" class="form-control" name="nama_ayah" id="nama-ayah" placeholder="Nama ayah tidak tersedia" value="{{ $suami_istri->nama_ayah }}">
                        </div> 

                        <!-- TINGGI BADAN -->
                        <div class="form-group">
                            <label for="tinggi-badan">Tinggi Badan</label>
                            <input readonly type="number" class="form-control" name="tinggi_badan" id="tinggi-badan" placeholder="Tinggi badan tidak tersedia" value="{{ $suami_istri->tinggi_badan }}">
                        </div>

                        <!-- BERAT BADAN -->
                        <div class="form-group">
                            <label for="berat-badan">Berat Badan</label>
                            <input readonly type="number" class="form-control" name="berat_badan" id="berat-badan" placeholder="Berat badan tidak tersedia" value="{{ $suami_istri->berat_badan }}">
                        </div> 
 

                        <!-- GOLONGAN DARAH --> 
                        <div class="form-group">
                            <label for="golongan_darah">Golongan Darah</label>
                            <input readonly type="text" class="form-control" name="hobby" id="hobby" placeholder="Golongan darah tidak tersedia" value="{{ $suami_istri->golongan_darah }}">
                           
                        </div>

                        <!-- HOBBY -->
                        <div class="form-group">
                            <label for="hobby">Hobby</label>
                            <input readonly type="text" class="form-control" name="hobby" id="hobby" placeholder="Hobby tidak tersedia" value="{{ $suami_istri->hobby }}">
                        </div>

                        <!-- NO. HP (WHATSAPP) -->
                        <div class="form-group">
                            <label for="no_hp">No. HP (Whatsapp)</label>
                            <input readonly type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No. HP tidak tersedia" value="{{ $suami_istri->no_hp }}">
                        </div>

                        <!-- E-MAIL -->
                        <div class="form-group">
                            <label for="email">E-Mail</label>
                            <input readonly type="text" class="form-control" name="email" id="email" placeholder="E-mail tidak tersedia" value="{{ $suami_istri->email }}">
                        </div>

                        <!-- MEDIA SOSIAL -->  
                        <div class="form-group">
                            <label for="media_sosial">Media Sosial</label>
                            <input readonly type="text" class="form-control" name="media_sosial" id="media_sosial" placeholder="Media sosial tidak tersedia" value="{{ $suami_istri->media_sosial }}">
                        </div> 

                        <!-- TOMBOL -->  
                        <div class="d-flex justify-content-end align-items-center">
                            <a href="{{ route('akun.read') }}" class="btn btn-danger mb-1">Kembali</a>
                        </div>
                    
                </div>
            </div>

 
        </div>
    </div>  
@endsection