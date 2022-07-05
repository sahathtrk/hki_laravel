@extends('base') 
@section('judul-halaman', 'Create Laporan Pelayanan')  
@section('konten')  

    <!-- HEADER -->
    <div class="row">
        <div class="col-12">
            <h1>Create Laporan pelayanan</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                <ol class="breadcrumb pt-0">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li> 
                    <li class="breadcrumb-item">
                        <a href="#">Laporan pelayanan</a>
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
            
            <form action="{{ route('survei.pelayanan.create') }}" method="post" autocomplete="off">
                {{ csrf_field() }}

                <div id="pelayanan-stage">

                    <div class="card mb-4 pelayanan-div">
                        <div class="card-body"> 
                            
                        
                                <div class="d-flex flex-grow-1 min-width-zero"> 
                                    <h5>Create Lembar pelayanan</h5> 
                                </div>
        
                                @if ($notifikasi_create == "success")
                                    <div class="alert alert-success alert-dismissible fade show rounded mb-0" role="alert">
                                        <strong>Berhasil!</strong> Lembar pelayanan berhasil dibuat.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                @elseif ($notifikasi_create == "failed")
                                    <div class="alert alert-danger alert-dismissible fade show rounded mb-0" role="alert">
                                        <strong>Gagal!</strong> Lebar pelayanan gagal dibuat.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>  
                                @endif
                                
                                <!-- JUDUL --> 
                                <div class="form-group mt-4">
                                    <label for="jenis-pelayanan">Judul</label>
                                    <input type="text" class="form-control" name="judul" id="jenis-pelayanan" placeholder="Masukan judul lembar pelayanan..." >
                                </div> 
        
                                <!-- DESKRIPSI --> 
                                <div class="form-group">
                                    <label for="tanggal-kegiatan-program">Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi" id="tanggal-kegiatan-program" placeholder="Masukan deskripsi lembar pelayanan..."></textarea>
                                </div> 

                                <!-- KATEGORI -->  
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select name="kategori" id="kategori" class="form-control"> 
                                        <option value="Laporan Pelayanan">Laporan Pelayanan</option>
                                        <option value="Lembar pelayanan">Lembar Evaluasi</option>
                                    </select>
                                </div>  
                             
                        </div>
                    </div>
                    

                </div>

                <div class="text-right"> 
                    <button type="submit" class="btn btn-primary btn-sm mb-2"> Create </button>
                    <a href="{{ route('survei.pelayanan.read') }}" class="btn btn-danger btn-sm mb-2"> Kembali </a>
                </div>

            </form> 
        </div>

    </div> 

      
@endsection