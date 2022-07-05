@extends('base') 
@section('judul-halaman', 'Detail Data Anak')  
@section('konten')  

    <!-- HEADER -->
    <div class="row">
        <div class="col-12">
            <h1>Data Anak</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                <ol class="breadcrumb pt-0">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li> 
                    <li class="breadcrumb-item">
                        <a href="#">Akun</a>
                    </li> 
                    <li class="breadcrumb-item">
                        <a href="#">Data Anak</a>
                    </li> 
                    <li class="breadcrumb-item active" aria-current="page">Detail</li>
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
                    <h5 class="mb-4">Data Anak</h5> 

                    <form id="form-foto-profil" enctype="multipart/form-data" class="text-center p-5">
						{{ csrf_field() }}
						<label for="foto-profil">
							<div class="profile-pic" id="foto-profil-css" style="background-image: url('/{{ $anak->foto }}')">
								<span class="glyphicon glyphicon-camera"></span>
								<span>{{ $anak->nama_lengkap }}</span>
							</div> 
						</label> 
					</form> 
                    
                    <form action="{{ route('profil.data.anak') }}" method="post">
                        {{ csrf_field() }} 

                        <!-- NAMA LENGKAP -->
                        <div class="form-group mt-4">
                            <label for="nama-lengkap">Nama Lengkap</label>
                            <input readonly type="text" class="form-control" name="nama_lengkap" id="nama-lengkap" placeholder="Nama lengkap tidak tersedia" value="{{ $anak->nama_lengkap }}">
                        </div>

                        <!-- JENIS KELAMIN -->
                        <div class="form-group">
                            <label for="jenis-kelamin">Jenis Kelamin</label>
                            <input readonly type="text" class="form-control" name="jenis_kelamin" id="jenis-kelamin" placeholder="Jenis kelamin tidak tersedia" value="{{ $anak->jenis_kelamin }}">
                        </div>

                        <!-- TANGGAL LAHIR -->
                        <div class="form-group">
                            <label for="tanggal-lahir">Tanggal Lahir</label>
                            <input readonly type="text" class="form-control datepicker" name="tanggal_lahir" id="tanggal-lahir" placeholder="Tanggal lahir tidak tersedia" value="{{ $anak->tanggal_lahir }}">
                        </div>  

                        <!-- TEMPAT LAHIR -->
                        <div class="form-group">
                            <label for="tempat-lahir">Tempat Lahir</label>
                            <input readonly type="text" class="form-control" name="tempat_lahir" id="tempat-lahir" placeholder="Tempat lahir tidak tesedia" value="{{ $anak->tempat_lahir }}">
                        </div>

                        <!-- ANAK KE -->
                        <div class="form-group">
                            <label for="anak-ke">Anak Ke</label>
                            <input readonly type="text" class="form-control" name="anak_ke" id="anak-ke" placeholder="Anak ke- tidak tersedia" value="{{ $anak->anak_ke }}">
                        </div>

                        <!-- TINGGI BADAN -->
                        <div class="form-group">
                            <label for="tinggi-badan">Tinggi Badan</label>
                            <input readonly type="number" class="form-control" name="tinggi_badan" id="tinggi-badan" placeholder="Tinggi badan tidak tersedia" value="{{ $anak->tinggi_badan }}">
                        </div>

                        <!-- BERAT BADAN -->
                        <div class="form-group">
                            <label for="berat-badan">Berat Badan</label>
                            <input readonly type="number" class="form-control" name="berat_badan" id="berat-badan" placeholder="Berat badan tidak tersedia" value="{{ $anak->berat_badan }}">
                        </div>  

                        <!-- GOLONGAN DARAH --> 
                        <div class="form-group">
                            <label for="golongan_darah">Golongan Darah</label>
                            <input readonly type="text" class="form-control" name="hobby" id="hobby" placeholder="Golongan darah tidak tersedia" value="{{ $anak->hobby }}">
                        </div>

                        <!-- HOBBY -->
                        <div class="form-group">
                            <label for="hobby">Hobby</label>
                            <input readonly type="text" class="form-control" name="hobby" id="hobby" placeholder="Hobi tidak tersedia" value="{{ $anak->hobby }}">
                        </div>

                        <!-- NO. HP -->
                        <div class="form-group">
                            <label for="no-hp">No. HP</label>
                            <input readonly type="text" class="form-control" name="no_hp" id="no-hp" placeholder="No. HP tidak tersedia" value="{{ $anak->no_hp }}">
                        </div>

                        <!-- E-MAIL -->
                        <div class="form-group">
                            <label for="email">E-Mail</label>
                            <input readonly type="text" class="form-control" name="email" id="email" placeholder="E-Mail tidak tersedia" value="{{ $anak->email }}">
                        </div>

                        <!-- MEDIA SOSIAL -->  
                        <div class="form-group">
                            <label for="media-sosial">Media Sosial</label>
                            <input readonly type="text" class="form-control" name="media_sosial" id="media-sosial" placeholder="Media sosial tidak tersedia" value="{{ $anak->media_sosial }}">
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