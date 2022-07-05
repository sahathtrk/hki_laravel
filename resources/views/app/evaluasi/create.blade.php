@extends('base') 
@section('judul-halaman', 'Create Lembar Evaluasi')  
@section('konten')  

    <!-- HEADER -->
    <div class="row">
        <div class="col-12">
            <h1>Create Lembar Evaluasi</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                <ol class="breadcrumb pt-0">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li> 
                    <li class="breadcrumb-item">
                        <a href="#">Lembar Evaluasi</a>
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
            
            <form action="{{ route('survei.evaluasi.create') }}" method="post" autocomplete="off">
                {{ csrf_field() }}

                <div id="evaluasi-stage">

                    <div class="card mb-4 evaluasi-div">
                        <div class="card-body"> 
                            
                        
                                <div class="d-flex flex-grow-1 min-width-zero"> 
                                    <h5>Create Lembar Evaluasi</h5> 
                                </div>
        
                                @if ($notifikasi_create == "success")
                                    <div class="alert alert-success alert-dismissible fade show rounded mb-0" role="alert">
                                        <strong>Berhasil!</strong> Lembar evaluasi berhasil dibuat.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                @elseif ($notifikasi_create == "failed")
                                    <div class="alert alert-danger alert-dismissible fade show rounded mb-0" role="alert">
                                        <strong>Gagal!</strong> Lebar evaluasi gagal dibuat.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>  
                                @endif
                                
                                <!-- JUDUL --> 
                                <div class="form-group mt-4">
                                    <label for="jenis-evaluasi">Judul</label>
                                    <input type="text" class="form-control" name="judul" id="jenis-evaluasi" placeholder="Masukan judul lembar evaluasi..." >
                                </div> 
        
                                <!-- DESKRIPSI --> 
                                <div class="form-group">
                                    <label for="tanggal-kegiatan-program">Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi" id="tanggal-kegiatan-program" placeholder="Masukan deskripsi lembar evaluasi..."></textarea>
                                </div> 

                                <!-- KATEGORI -->  
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select name="kategori" id="kategori" class="form-control"> 
                                        <option value="Laporan Pelayanan">Laporan Pelayanan</option>
                                        <option value="Lembar Evaluasi" selected>Lembar Evaluasi</option>
                                    </select>
                                </div>  
                             
                        </div>
                    </div>
                    

                </div>

                <div class="text-right"> 
                    <button type="submit" class="btn btn-primary btn-sm mb-2"> Create </button>
                    <a href="{{ route('survei.evaluasi.read') }}" class="btn btn-danger btn-sm mb-2"> Kembali </a>
                </div>

            </form> 
        </div>

    </div> 

      
@endsection