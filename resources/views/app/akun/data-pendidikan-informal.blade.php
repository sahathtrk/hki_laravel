@extends('base') 
@section('judul-halaman', 'Data Pendidikan Informal')  
@section('konten')  

    <!-- HEADER -->
    <div class="row">
        <div class="col-12">
            <h1>Data Pendidikan Informal</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                <ol class="breadcrumb pt-0">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li> 
                    <li class="breadcrumb-item">
                        <a href="#">Akun</a>
                    </li> 
                    <li class="breadcrumb-item active" aria-current="page">Data Pendidikan Informal</li>
                </ol>
            </nav>
            <div class="separator mb-5"></div>
        </div> 
    </div>

    <!-- KONTEN -->
    <div class="row">

        <div style="width:600px;" class="ml-4">  

            <div id="pendidikan-informal-stage">

                @foreach ($pendidikan_informals as $key => $pendidikan_informal) 
                    <div class="card mb-4 pendidikan-informal-div">
                        <div class="card-body"> 
                            
                            <div class="d-flex flex-grow-1 min-width-zero">
                                
                                <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                                    <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1">
                                        <h5>Data Pendidikan Informal {{ $key+1 }}</h5>
                                    </div>
                                </div> 
                            </div>

                            <!-- SEKOLAH DASAR --> 
                            <div class="form-group">
                                <label for="jenis-pendidikan-informal">Jenis Pendidikan Informal</label>
                                <input readonly type="text" class="form-control" name="jenis_pendidikan_informal" id="jenis-pendidikan-informal" placeholder="Jenis pendidikan informal" value="{{ $pendidikan_informal->jenis_pendidikan_informal }}">
                            </div> 

                            <!-- SEKOLAH DASAR --> 
                            <div class="form-group">
                                <label for="tanggal-kegiatan-program">Tanggal/Kegiatan Program</label>
                                <input readonly type="text" class="form-control" name="tanggal_kegiatan_program" id="tanggal-kegiatan-program" placeholder="Tanggal kegiatan/program" value="{{ $pendidikan_informal->tanggal_kegiatan_program }}">
                            </div> 

                            <!-- SEKOLAH DASAR --> 
                            <div class="form-group">
                                <label for="tempat-kegiatan-program">Tempat/Kegiatan Program</label>
                                <input readonly type="text" class="form-control" name="tempat_kegiatan_program" id="tempat-kegiatan-program" placeholder="Tempat kegiatan/program" value="{{ $pendidikan_informal->tempat_kegiatan_program }}">
                            </div> 

                        </div>
                    </div>
                @endforeach

                <!-- TOMBOL -->  
                <div class="d-flex justify-content-end align-items-center">
                    <a href="{{ route('akun.read') }}" class="btn btn-danger mb-1">Kembali</a>
                </div>


            </div>
 
        </div>
    </div> 

      

@endsection