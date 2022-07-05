@extends('base') 
@section('judul-halaman', 'Data Pribadi')  
@section('konten')  

    <!-- HEADER -->
    <div class="row">
        <div class="col-12">
            <h1>Data Pribadi (Detail Akun)</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                <ol class="breadcrumb pt-0">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li> 
                    <li class="breadcrumb-item">
                        <a href="#">Akun</a>
                    </li> 
                    <li class="breadcrumb-item active" aria-current="page">Detail Akun</li>
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
                    <h5 class="mb-4">Detail Akun</h5>

                    <form id="form-foto-profil" enctype="multipart/form-data" class="text-center p-5">
						{{ csrf_field() }}
						<label for="foto-profil">
							<div class="profile-pic" id="foto-profil-css" style="background-image: url('/{{ $akun->foto }}')">
								<span class="glyphicon glyphicon-camera"></span>
								<span>{{ $akun->nama_lengkap }}</span>
							</div> 
						</label> 
					</form>

                    <form action="{{ route('profil.data.pribadi') }}" method="post">
                        {{ csrf_field() }} 

                        <!-- NAMA LENGKAP -->
                        <div class="form-group mt-4">
                            <label for="nama-lengkap">Nama Lengkap</label>
                            <input readonly type="text" class="form-control" name="nama_lengkap" id="nama-lengkap" placeholder="Nama lengkap tidak tersedia" value="{{ $akun->nama_lengkap }}">
                        </div>

                        <!-- NIK -->
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input readonly type="text" class="form-control" name="nik" id="nik" placeholder="Nik tidak tersedia" value="{{ $akun->nik }}">
                        </div>

                        <!-- JENIS KELAMIN -->
                        <div class="form-group">
                            <label for="jenis-kelamin">Jenis Kelamin</label>
                            <input readonly type="text" class="form-control" name="jenis_kelamin" id="jenis-kelamin" placeholder="Jenis kelamin tidak tersedia" value="{{ $akun->jenis_kelamin }}">
                        </div>

                        <!-- TANGGAL LAHIR -->
                        <div class="form-group">
                            <label for="tanggal-lahir">Tanggal Lahir</label>
                            <input readonly type="text" class="form-control datepicker" name="tanggal_lahir" id="tanggal-lahir" placeholder="Tanggal lahir tidak tersedia" value="{{ $akun->tanggal_lahir }}">
                        </div>  
                        
                        <!-- TEMPAT LAHIR -->
                        <div class="form-group">
                            <label for="tempat-lahir">Tempat Lahir</label>
                            <input readonly type="text" class="form-control" name="tempat_lahir" id="tempat-lahir" placeholder="Tempat lahir tidak tersedia" value="{{ $akun->tempat_lahir }}">
                        </div>

                        <!-- ALAMAT -->
                        <div class="form-group">
                            <label for="tempat-lahir">Alamat</label>
                            <textarea readonly class="form-control" name="alamat" id="alamat" placeholder="Tempat alamat tidak tersedia"  >{{ $akun->alamat }}</textarea>
                        </div>

                        <!-- NAMA IBU -->
                        <div class="form-group">
                            <label for="nama-ibu">Nama Ibu</label>
                            <input readonly type="text" class="form-control" name="nama_ibu" id="nama-ibu" placeholder="Nama ibu tidak tersedia" value="{{ $akun->nama_ibu }}">
                        </div>

                        <!-- NAMA AYAH -->
                        <div class="form-group">
                            <label for="nama-ayah">Nama Ayah</label>
                            <input readonly type="text" class="form-control" name="nama_ayah" id="nama-ayah" placeholder="Nama ayah tidak tersedia" value="{{ $akun->nama_ayah }}">
                        </div> 

                        <!-- TINGGI BADAN -->
                        <div class="form-group">
                            <label for="tinggi-badan">Tinggi Badan</label>
                            <input readonly type="number" class="form-control" name="tinggi_badan" id="tinggi-badan" placeholder="Tinggi badan tidak tersedia" value="{{ $akun->tinggi_badan }}">
                        </div>

                        <!-- BERAT BADAN -->
                        <div class="form-group">
                            <label for="berat-badan">Berat Badan</label>
                            <input readonly type="number" class="form-control" name="berat_badan" id="berat-badan" placeholder="Berat badan tidak tersedia" value="{{ $akun->berat_badan }}">
                        </div> 

                        <!-- GOLONGAN DARAH -->
                        <div class="form-group">
                            <label for="berat-badan">Golongan Darah</label>
                            <input readonly type="text" class="form-control" name="berat_badan" id="berat-badan" placeholder="Golongan darah tidak tersedia" value="{{ $akun->golongan_darah }}">
                        </div> 

                        <!-- HOBBY -->
                        <div class="form-group">
                            <label for="hobby">Hobby</label>
                            <input readonly type="text" class="form-control" name="hobby" id="hobby" placeholder="hobby tidak tersedia" value="{{ $akun->hobby }}">
                        </div>

                        <!-- NO. HP (WHATSAPP) -->
                        <div class="form-group">
                            <label for="no_hp">No. HP (Whatsapp)</label>
                            <input readonly type="text" class="form-control" name="no_hp" id="no_hp" placeholder="no. hp tidak tersedia" value="{{ $akun->no_hp }}">
                        </div>

                        <!-- E-MAIL -->
                        <div class="form-group">
                            <label for="email">E-Mail</label>
                            <input readonly type="text" class="form-control" name="email" id="email" placeholder="e-mail tidak tersedia" value="{{ $akun->email }}">
                        </div>
                        
                        <!-- BERAT BADAN -->
                        <div class="form-group">
                            <label for="berat-badan">Tipe Akun</label>
                            <input readonly type="text" class="form-control" name="tipe_akun" id="tipe-akun" placeholder="Tipe Akun tidak tersedia" value="{{ $akun->tipe_akun }}">
                        </div> 

                        <!-- MEDIA SOSIAL -->  
                        <div class="form-group">
                            <label for="media_sosial">Media Sosial</label>
                            <input readonly type="text" class="form-control" name="media_sosial" id="media_sosial" placeholder="media sosial tidak tersedia" value="{{ $akun->media_sosial }}">
                        </div> 

                        <!-- USERNAME -->  
                        <div class="form-group">
                            <label for="media_sosial">Username</label>
                            <input readonly type="text" class="form-control" name="username" id="username" placeholder="username tidak tersedia" value="{{ $akun->username }}">
                        </div> 

                        <!-- PASSWORD -->  
                        <div class="form-group">
                            <label for="media_sosial">Password Baru</label>
                            <input readonly type="text" class="form-control" name="password" id="password" placeholder="password tidak tersedia" >
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