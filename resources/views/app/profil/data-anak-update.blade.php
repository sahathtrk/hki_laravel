@extends('base') 
@section('judul-halaman', 'Update Data Anak')  
@section('konten')  

    <!-- HEADER -->
    <div class="row">
        <div class="col-12">
            <h1>Update Data Anak</h1>
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
                    <li class="breadcrumb-item active" aria-current="page">Update</li>
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

                    <form autocomplete="off" id="form-foto-profil" enctype="multipart/form-data" class="text-center p-5">
						{{ csrf_field() }}
						<label for="foto-profil"> 
							<div class="profile-pic" id="foto-anak-css" style="background-image: url('/{{ str_replace(' ', '%20',  $anak->foto); }}'); background-repeat: repeat; background-position: center; background-size: 100%;">
								<span class="glyphicon glyphicon-camera"></span>
								<span>Ubah Foto</span>
							</div> 
						</label>
						<input type="File" name="foto" id="foto-profil" class="fp_upload" accept="image/*">
					</form>
                    
                    <form action="{{ route('profil.data.anak.update', $anak->id) }}" method="post">
                        {{ csrf_field() }}
                        
                        @if ($notifikasi_update == "success")
                            <div class="alert alert-success alert-dismissible fade show rounded mb-0" role="alert">
                                <strong>Berhasil!</strong> Data anak berhasil diperbaharui.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @elseif ($notifikasi_update == "failed")
                            <div class="alert alert-danger alert-dismissible fade show rounded mb-0" role="alert">
                                <strong>Gagal!</strong> Data anak gagal diperbaharui.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>  
                        @endif

                        <!-- NAMA LENGKAP -->
                        <div class="form-group mt-4">
                            <label for="nama-lengkap">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_lengkap" id="nama-lengkap" placeholder="Masukan nama lengkap..." value="{{ $anak->nama_lengkap }}">
                        </div>

                        <!-- JENIS KELAMIN -->
                        <div class="form-group">
                            <label for="jenis-kelamin">Jenis Kelamin</label>
                            <select required class="form-control" name="jenis_kelamin" id="jenis-kelamin">
                                <option hidden value="{{ $anak->jenis_kelamin }}">{{ $anak->jenis_kelamin }}</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Laki-laki">Perempuan</option>
                            </select>
                        </div>

                        <!-- TANGGAL LAHIR -->
                        <div class="form-group">
                            <label for="tanggal-lahir">Tanggal Lahir</label>
                            <input type="text" class="form-control datepicker" name="tanggal_lahir" id="tanggal-lahir" placeholder="Masukan Tanggal lahir..." value="{{ $anak->tanggal_lahir }}">
                        </div>  

                        <!-- TEMPAT LAHIR -->
                        <div class="form-group">
                            <label for="tempat-lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" id="tempat-lahir" placeholder="Masukan Tempat lahir..." value="{{ $anak->tempat_lahir }}">
                        </div>

                        <!-- ANAK KE -->
                        <div class="form-group">
                            <label for="anak-ke">Anak Ke</label>
                            <input type="text" class="form-control" name="anak_ke" id="anak-ke" placeholder="Masukan anak ke..." value="{{ $anak->anak_ke }}">
                        </div>

                        <!-- TINGGI BADAN -->
                        <div class="form-group">
                            <label for="tinggi-badan">Tinggi Badan</label>
                            <input type="number" class="form-control col-2" name="tinggi_badan" id="tinggi-badan" placeholder="Masukan tinggi badan..." value="{{ $anak->tinggi_badan }}">
                        </div>

                        <!-- BERAT BADAN -->
                        <div class="form-group">
                            <label for="berat-badan">Berat Badan</label>
                            <input type="number" class="form-control col-2" name="berat_badan" id="berat-badan" placeholder="Masukan berat badan..." value="{{ $anak->berat_badan }}">
                        </div> 


                        @php
                            $checked_gol_a  = "";
                            $checked_gol_b  = "";
                            $checked_gol_o  = "";
                            $checked_gol_ab = "";

                            switch($anak->golongan_darah){
                                case 'A': 
                                        $checked_gol_a  = "checked";
                                        $checked_gol_b  = "";
                                        $checked_gol_o  = "";
                                        $checked_gol_ab = "";
                                    break;
                                case 'B': 
                                        $checked_gol_a  = "";
                                        $checked_gol_b  = "checked";
                                        $checked_gol_o  = "";
                                        $checked_gol_ab = "";
                                    break;
                                case 'O': 
                                        $checked_gol_a  = "";
                                        $checked_gol_b  = "";
                                        $checked_gol_o  = "checked";
                                        $checked_gol_ab = "";
                                    break;
                                case 'AB': 
                                        $checked_gol_a  = "";
                                        $checked_gol_b  = "";
                                        $checked_gol_o  = "";
                                        $checked_gol_ab = "checked";
                                    break;
                            }
                        @endphp

                        <!-- GOLONGAN DARAH --> 
                        <div class="form-group">
                            <label for="golongan_darah">Golongan Darah</label>
                            <div class="row pl-4">
                                <div class="custom-control custom-radio col-1">
                                    <input type="radio" id="gol-a" name="golongan_darah" value="A" {{ $checked_gol_a }} class="custom-control-input">
                                    <label class="custom-control-label" for="gol-a">A</label> 
                                </div>
                                <div class="custom-control custom-radio col-1">
                                    <input type="radio" id="gol-b" name="golongan_darah" value="B" {{ $checked_gol_b }} class="custom-control-input">
                                    <label class="custom-control-label" for="gol-b">B</label> 
                                </div>
                                <div class="custom-control custom-radio col-1">
                                    <input type="radio" id="gol-o" name="golongan_darah" value="O" {{ $checked_gol_o }} class="custom-control-input">
                                    <label class="custom-control-label" for="gol-o">O</label> 
                                </div>
                                <div class="custom-control custom-radio col-1">
                                    <input type="radio" id="gol-ab" name="golongan_darah" value="AB" {{ $checked_gol_ab }} class="custom-control-input">
                                    <label class="custom-control-label" for="gol-ab">AB</label> 
                                </div>
                            </div>
                        </div>

                        <!-- HOBBY -->
                        <div class="form-group">
                            <label for="hobby">Hobby</label>
                            <input type="text" class="form-control" name="hobby" id="hobby" placeholder="Masukan hobby..." value="{{ $anak->hobby }}">
                        </div>

                        <!-- NO. HP -->
                        <div class="form-group">
                            <label for="no-hp">No. HP</label>
                            <input type="text" class="form-control" name="no_hp" id="no-hp" placeholder="Masukan no. hp..." value="{{ $anak->no_hp }}">
                        </div>

                        <!-- E-MAIL -->
                        <div class="form-group">
                            <label for="email">E-Mail</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Masukan e-mail..." value="{{ $anak->email }}">
                        </div>

                        <!-- MEDIA SOSIAL -->  
                        <div class="form-group">
                            <label for="media-sosial">Media Sosial</label>
                            <input type="text" class="form-control" name="media_sosial" id="media-sosial" placeholder="Masukan media sosial..." value="{{ $anak->media_sosial }}">
                        </div> 

                        <!-- TOMBOL -->  
                        <div class="d-flex justify-content-end align-items-center">
                            <button type="submit" class="btn btn-primary mb-1">Perbaharui</button> &nbsp; &nbsp;
                            <a href="{{ route('profil.data.anak.read') }}" class="btn btn-danger mb-1">Kembali</a>
                        </div>

                    </form>

                </div>
            </div>

 
        </div>
    </div>  

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- ⠿⠿⠿⠿⠿⠿⠿⠿⠿⠿⠿ ⠿ ⠿ GANTI FOTO PROFILE -->
    <script> 
        $(document).ready(function(){  
        
            $('#foto-profil').change(function (e) { 
                var fileName = e
                    .target
                    .files[0]
                    .name;
                $("#file").val(fileName);
    

                var reader = new FileReader();
                reader.onload = function (e) { 
                    // Inisialisasi file gambar
                    image = new Image();  
                    image.src = e.target.result;

                    image.onload = function () {
                        /*
                        var w = this.width;
                        var h = this.height;

                        if(w != h){ 
                            $("#universal-modal").modal("show");
                            $("#universal-modal").find("#judul-h5").text("Ukuran gambar salah!");
                            $("#universal-modal").find("#paragraf-p").html("Gunakan gambar berukuran skala 1:1 sebelum diunggah.");
                            $("#universal-modal").find("#aksi-btn").remove(); 
                        } else {   
                            */
                            
                            let form      	= $('#form-foto-profil')[0]
                            let data_upload = new FormData(form);   
                            
                            $.ajax({  
                                url: "/profil/ajax-foto-anak-update", 
                                data:  data_upload, 
                                type: 'POST',
                                contentType: false, 
                                processData: false,
                                cache: false,
                                success: function (res) { 
    
                                    $("#foto-anak-css").css("background-image", "url('/"+res.url_fp+"')"); 
                                },
                                error: function(error){
                                    alert("error upload "+error);
                                }
                            }) 
                        /*} */
                    }

                };
                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>


@endsection