@extends('base') 
@section('judul-halaman', 'Create Data Anak')  
@section('konten')  

    <!-- HEADER -->
    <div class="row">
        <div class="col-12">
            <h1>Create Data Anak</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                <ol class="breadcrumb pt-0">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li> 
                    <li class="breadcrumb-item">
                        <a href="#">Profil</a>
                    </li> 
                    <li class="breadcrumb-item">
                        <a href="#">Data Anak</a>
                    </li> 
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
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
                    
                    <form action="{{ route('profil.data.anak.create') }}" method="post" autocomplete="off">
                        {{ csrf_field() }}
                        
                        @if ($notifikasi_create == "success")
                            <div class="alert alert-success alert-dismissible fade show rounded mb-0" role="alert">
                                <strong>Berhasil!</strong> Data anak berhasil dibuat.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @elseif ($notifikasi_create == "failed")
                            <div class="alert alert-danger alert-dismissible fade show rounded mb-0" role="alert">
                                <strong>Gagal!</strong> Data anak gagal dibuat.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>  
                        @endif

                        <!-- NAMA LENGKAP -->
                        <div class="form-group mt-4">
                            <label for="nama-lengkap">Nama Lengkap</label>
                            <input required type="text" class="form-control" name="nama_lengkap" id="nama-lengkap" placeholder="Masukan nama lengkap...">
                        </div>

                        <!-- JENIS KELAMIN -->
                        <div class="form-group">
                            <label for="jenis-kelamin">Jenis Kelamin</label>
                            <select required class="form-control" name="jenis_kelamin" id="jenis-kelamin">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Laki-laki">Perempuan</option>
                            </select>
                        </div>

                        <!-- TANGGAL LAHIR -->
                        <div class="form-group">
                            <label for="tanggal-lahir">Tanggal Lahir</label>
                            <input required type="text" class="form-control datepicker" name="tanggal_lahir" id="tanggal-lahir" placeholder="Masukan Tanggal lahir...">
                        </div>  

                        <!-- TEMPAT LAHIR -->
                        <div class="form-group">
                            <label for="tempat-lahir">Tempat Lahir</label>
                            <input required type="text" class="form-control" name="tempat_lahir" id="tempat-lahir" placeholder="Masukan Tempat lahir...">
                        </div>

                        <!-- ANAK KE -->
                        <div class="form-group">
                            <label for="anak-ke">Anak Ke</label>
                            <input required type="text" class="form-control" name="anak_ke" id="anak-ke" placeholder="Masukan anak ke...">
                        </div>

                        <!-- TINGGI BADAN -->
                        <div class="form-group">
                            <label for="tinggi-badan">Tinggi Badan</label>
                            <input required type="number" class="form-control col-2" name="tinggi_badan" id="tinggi-badan" placeholder="Masukan tinggi badan...">
                        </div>

                        <!-- BERAT BADAN -->
                        <div class="form-group">
                            <label for="berat-badan">Berat Badan</label>
                            <input required type="number" class="form-control col-2" name="berat_badan" id="berat-badan" placeholder="Masukan berat badan...">
                        </div> 
                        
                        <!-- GOLONGAN DARAH --> 
                        <div class="form-group">
                            <label for="golongan_darah">Golongan Darah</label>
                            <div class="row pl-4">
                                <div class="custom-control custom-radio col-1">
                                    <input required type="radio" id="gol-a" name="golongan_darah" value="A" class="custom-control-input">
                                    <label class="custom-control-label" for="gol-a">A</label> 
                                </div>
                                <div class="custom-control custom-radio col-1">
                                    <input required type="radio" id="gol-b" name="golongan_darah" value="B" class="custom-control-input">
                                    <label class="custom-control-label" for="gol-b">B</label> 
                                </div>
                                <div class="custom-control custom-radio col-1">
                                    <input required type="radio" id="gol-o" name="golongan_darah" value="O" class="custom-control-input">
                                    <label class="custom-control-label" for="gol-o">O</label> 
                                </div>
                                <div class="custom-control custom-radio col-1">
                                    <input required type="radio" id="gol-ab" name="golongan_darah" value="AB" class="custom-control-input">
                                    <label class="custom-control-label" for="gol-ab">AB</label> 
                                </div>
                            </div>
                        </div>

                        <!-- HOBBY -->
                        <div class="form-group">
                            <label for="hobby">Hobby</label>
                            <input required type="text" class="form-control" name="hobby" id="hobby" placeholder="Masukan hobby..." >
                        </div>

                        <!-- NO. HP -->
                        <div class="form-group">
                            <label for="no-hp">No. HP</label>
                            <input required type="text" class="form-control" name="no_hp" id="no-hp" placeholder="Masukan no. hp..." >
                        </div>

                        <!-- E-MAIL -->
                        <div class="form-group">
                            <label for="email">E-Mail</label>
                            <input required type="text" class="form-control" name="email" id="email" placeholder="Masukan e-mail..." >
                        </div>

                        <!-- MEDIA SOSIAL -->  
                        <div class="form-group">
                            <label for="media-sosial">Media Sosial</label>
                            <input required type="text" class="form-control" name="media_sosial" id="media-sosial" placeholder="Masukan media sosial..." >
                        </div> 

                        <!-- FOTO -->  
                        <div class="form-group">
                            <label for="media-sosial">Foto</label>
                            <input required type="file" accept="image/*" class="form-control" name="foto" id="foto" placeholder="Masukan foto..." >
                        </div> 

                        <!-- TOMBOL -->  
                        <div class="d-flex justify-content-end align-items-center">
                            <button type="submit" class="btn btn-primary mb-1">Create</button> &nbsp; &nbsp;
                            <a href="{{ route('profil.data.anak.read') }}" class="btn btn-danger mb-1">Kembali</a>
                        </div>

                    </form>

                </div>
            </div>

 
        </div>
    </div>   

@endsection