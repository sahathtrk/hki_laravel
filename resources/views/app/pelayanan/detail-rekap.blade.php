@extends('base') 
@section('judul-halaman', 'Detail Rekap Laporan Pelayanan')  
@section('konten')  

    <!-- HEADER -->
    <div class="row">
        <div class="col-12">
            <h1>Detail Rekap Laporan pelayanan</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                <ol class="breadcrumb pt-0">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li> 
                    <li class="breadcrumb-item">
                        <a href="#">Laporan pelayanan</a>
                    </li> 
                    <li class="breadcrumb-item">
                        <a href="#">Rekap</a>
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
            <div id="pelayanan-stage">

                <!-- HEADER SURVEI -->
                <div class="card mb-4">
                    <div class="card-body" style="background-color: #c0d1d5;"> 
                         
                        <div class="d-flex flex-grow-1 min-width-zero">
                        
                            <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                                <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1">
                                    <h5>Detail Rekap Lembar pelayanan</h5>
                                </div>
                            </div>

                        </div>

                        
                        <!-- JUDUL --> 
                        <div class="form-group">
                            <label for="jenis-pelayanan">Judul</label>
                            <input type="text" class="form-control" name="judul" id="jenis-pelayanan" placeholder="Masukan judul lembar pelayanan..." disabled value="{{ $pelayanan->judul }}">
                        </div> 

                        <!-- DESKRIPSI --> 
                        <div class="form-group">
                            <label for="tanggal-kegiatan-program">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="tanggal-kegiatan-program" placeholder="Masukan deskripsi lembar pelayanan..." disabled>{{ $pelayanan->deskripsi }}</textarea>
                        </div> 

                        <!-- KATEGORI -->  
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select name="kategori" id="kategori" class="form-control" disabled> 
                                <option value="{{ $pelayanan->kategori }}">{{ $pelayanan->kategori }}</option> 
                            </select>
                        </div>  

                        <!-- NAMA PENGIRIM --> 
                        <div class="form-group">
                            <label for="jenis-pelayanan">Nama Lengkap Pengirim</label>
                            <input type="text" class="form-control" name="nama" id="jenis-pelayanan" placeholder="Masukan nama lengkap..." disabled value="{{ $jawabans->where('akun_id', $id_akun)->first()->akun->nama_lengkap }}">
                        </div> 


                    </div>
                </div>
                
                <!-- PERTANYAAN -->
                @foreach ($pertanyaans as $key => $pertanyaan) 
                    <div class="card mb-4 jawaban-div">
                        <div class="card-body"> 
                            
                            <!-- JUDUL & TRASH --> 
                            <div class="d-flex flex-grow-1 min-width-zero">
                                
                                <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                                    <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1">
                                        <h5>Pertanyaan {{ $key+1 }}</h5>
                                    </div>
                                </div>  

                            </div>

                            <div class="form-group"> 
                                <p>{{ $pertanyaan->pertanyaan }}</p>
                            </div>
 

                            @php
                                $opsi_jawaban_explode = explode(",", $pertanyaan->opsi_jawaban); 
                            @endphp

                            <!-- JENIS JAWABAN --> 
                            @if ($pertanyaan->jenis_jawaban == "Jawaban Teks") 
                                <div class="form-group">
                                    <label for="jenis-pelayanan"><strong>Jawaban</strong></label>
                                    <p>{{ $jawabans->where('pertanyaan_id', $pertanyaan->id)->where('akun_id', $id_akun)->first()->jawaban }}</p>
                                </div>  
                            @elseif ($pertanyaan->jenis_jawaban == "Pilihan Berganda")
                                <div class="form-group">
                                    <label for="jenis-pelayanan"><strong>Jawaban</strong></label>
                                    <p>{{ $jawabans->where('pertanyaan_id', $pertanyaan->id)->where('akun_id', $id_akun)->first()->jawaban }}</p>
                                </div> 
 
                            @elseif ($pertanyaan->jenis_jawaban == "Kotak Centang")
                                <div class="form-group">
                                    <label for="jenis-pelayanan"><strong>Jawaban</strong></label></br>

                                    @php
                                        $explode_jawaban = explode(",", $jawabans->where('pertanyaan_id', $pertanyaan->id)->where('akun_id', $id_akun)->first()->jawaban);

                                        foreach ($explode_jawaban as $key_j => $jawaban) {
                                            if($jawaban != ""){
                                                echo ($key_j).". ".$jawaban."</br>";
                                            }
                                            
                                        }

                                    @endphp 
                                </div> 
                            @else 
                                <div class="form-group">
                                    <label for="jenis-pelayanan"><strong>Jawaban</strong></label></br>
                                    <a href="{{ asset($jawabans->where('pertanyaan_id', $pertanyaan->id)->where('akun_id', $id_akun)->first()->jawaban) }}" target="_blank" class="btn btn-primary">Lihat File</a>
                                </div>  
                            @endif

                        </div>
                    </div>
                @endforeach

                <div class="text-right">  
                    <a href="{{ route('survei.pelayanan.rekap', $pelayanan->id) }}" class="btn btn-danger btn-sm mb-2"> Kembali </a>
                </div>

            </div> 
        </div>

    </div> 


@endsection