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
                        <a href="#">Profil</a>
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

                    <form autocomplete="off" id="form-foto-profil" enctype="multipart/form-data" class="text-center p-5">
						{{ csrf_field() }}
						<label for="foto-profil">
							<div class="profile-pic" id="foto-suami-istri-css" style="background-image: url('/{{ str_replace(' ', '%20',  $suami_istri->foto); }}'); background-repeat: repeat; background-position: center; background-size: 100%;">
								<span class="glyphicon glyphicon-camera"></span>
								<span>Ubah Foto</span>
							</div> 
						</label>
						<input type="File" name="foto" id="foto-profil" class="fp_upload" accept="image/*">
					</form>


                    <form action="{{ route('profil.data.suami.istri') }}" method="post">
                        {{ csrf_field() }}

                        <!-- NAMA LENGKAP -->
                        <div class="form-group">
                            <label for="nama-lengkap">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_lengkap" id="nama-lengkap" placeholder="Masukan nama lengkap..." value="{{ $suami_istri->nama_lengkap }}">
                        </div>

                        <!-- NIK -->
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukan nik..." value="{{ $suami_istri->nik }}">
                        </div>

                        <!-- JENIS KELAMIN -->
                        <div class="form-group">
                            <label for="jenis-kelamin">Jenis Kelamin</label>
                            <input type="text" class="form-control" name="jenis_kelamin" id="jenis-kelamin" placeholder="Masukan jenis kelamin..." value="{{ $suami_istri->jenis_kelamin }}">
                        </div>

                        <!-- TANGGAL LAHIR -->
                        <div class="form-group">
                            <label for="tanggal-lahir">Tanggal Lahir</label>
                            <input type="text" class="form-control datepicker" name="tanggal_lahir" id="tanggal-lahir" placeholder="Masukan tanggal lahir..." value="{{ $suami_istri->tanggal_lahir }}">
                        </div>  
                        
                        <!-- TEMPAT LAHIR -->
                        <div class="form-group">
                            <label for="nama-ibu">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" id="tempat-lahir" placeholder="Masukan tempat lahir..." value="{{ $suami_istri->tempat_lahir }}">
                        </div>

                        <!-- NAMA IBU -->
                        <div class="form-group">
                            <label for="nama-ibu">Nama Ibu</label>
                            <input type="text" class="form-control" name="nama_ibu" id="nama-ibu" placeholder="Masukan nama ibu..." value="{{ $suami_istri->nama_ibu }}">
                        </div>

                        <!-- NAMA AYAH -->
                        <div class="form-group">
                            <label for="nama-ayah">Nama Ayah</label>
                            <input type="text" class="form-control" name="nama_ayah" id="nama-ayah" placeholder="Masukan nama ayah..." value="{{ $suami_istri->nama_ayah }}">
                        </div> 

                        <!-- TINGGI BADAN -->
                        <div class="form-group">
                            <label for="tinggi-badan">Tinggi Badan</label>
                            <input type="number" class="form-control col-2" name="tinggi_badan" id="tinggi-badan" placeholder="Masukan tinggi badan..." value="{{ $suami_istri->tinggi_badan }}">
                        </div>

                        <!-- BERAT BADAN -->
                        <div class="form-group">
                            <label for="berat-badan">Berat Badan</label>
                            <input type="number" class="form-control col-2" name="berat_badan" id="berat-badan" placeholder="Masukan berat badan..." value="{{ $suami_istri->berat_badan }}">
                        </div> 

                        @php
                            $checked_gol_a  = "";
                            $checked_gol_b  = "";
                            $checked_gol_o  = "";
                            $checked_gol_ab = "";

                            switch($suami_istri->golongan_darah){
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
                                    <input type="radio" id="gol-a" name="golongan_darah" value="A" {{ $checked_gol_a }}  class="custom-control-input">
                                    <label class="custom-control-label" for="gol-a">A</label> 
                                </div>
                                <div class="custom-control custom-radio col-1">
                                    <input type="radio" id="gol-b" name="golongan_darah" value="B" {{ $checked_gol_b }}  class="custom-control-input">
                                    <label class="custom-control-label" for="gol-b">B</label> 
                                </div>
                                <div class="custom-control custom-radio col-1">
                                    <input type="radio" id="gol-o" name="golongan_darah" value="O" {{ $checked_gol_o }}  class="custom-control-input">
                                    <label class="custom-control-label" for="gol-o">O</label> 
                                </div>
                                <div class="custom-control custom-radio col-1">
                                    <input type="radio" id="gol-ab" name="golongan_darah" value="AB" {{ $checked_gol_ab }}  class="custom-control-input">
                                    <label class="custom-control-label" for="gol-ab">AB</label> 
                                </div>
                            </div>
                        </div>

                        <!-- HOBBY -->
                        <div class="form-group">
                            <label for="hobby">Hobby</label>
                            <input type="text" class="form-control" name="hobby" id="hobby" placeholder="Masukan hobby..." value="{{ $suami_istri->hobby }}">
                        </div>

                        <!-- NO. HP (WHATSAPP) -->
                        <div class="form-group">
                            <label for="no_hp">No. HP (Whatsapp)</label>
                            <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Masukan no. hp..." value="{{ $suami_istri->no_hp }}">
                        </div>

                        <!-- E-MAIL -->
                        <div class="form-group">
                            <label for="email">E-Mail</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Masukan e-mail..." value="{{ $suami_istri->email }}">
                        </div>

                        <!-- MEDIA SOSIAL -->  
                        <div class="form-group">
                            <label for="media_sosial">Media Sosial</label>
                            <input type="text" class="form-control" name="media_sosial" id="media_sosial" placeholder="Masukan media sosial..." value="{{ $suami_istri->media_sosial }}">
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
                                xhr: function(){
                                    $("#overlay").fadeIn(300);  
                                    var xhr = $.ajaxSettings.xhr() ; 
                                    return xhr ;
                                },
                                url: "/profil/ajax-foto-suami-istri-update", 
                                data:  data_upload, 
                                type: 'POST',
                                contentType: false, 
                                processData: false,
                                cache: false,
                                success: function (res) { 
    
                                    $("#foto-suami-istri-css").css("background-image", "url('/"+res.url_fp+"')"); 
                                },
                                error: function(error){
                                    alert("error upload "+error);
                                }
                            }).done(function(){
                                $("#overlay").fadeOut(300);
                            });

                            /*
                        } 
                        */
                    }

                };
                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
@endsection