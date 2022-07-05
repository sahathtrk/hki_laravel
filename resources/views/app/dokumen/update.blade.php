@extends('base') 
@section('judul-halaman', 'Update Dokumen')  
@section('konten')  

    <!-- HEADER -->
    <div class="row">
        <div class="col-12">
            <h1>Update Dokumen</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                <ol class="breadcrumb pt-0">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li> 
                    <li class="breadcrumb-item">
                        <a href="#">Dokumen</a>
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
                    <h5 class="mb-4">Update Dokumen</h5> 

                    <form action="{{ route('dokumen.update', $dokumen->id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        @if ($notifikasi_update == "success")
                            <div class="alert alert-success alert-dismissible fade show rounded mb-0" role="alert">
                                <strong>Berhasil!</strong> Dokumen berhasil diperbaharui.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @elseif ($notifikasi_update == "failed")
                            <div class="alert alert-danger alert-dismissible fade show rounded mb-0" role="alert">
                                <strong>Gagal!</strong> Dokumen gagal diperbaharui.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>  
                        @endif

                        <!-- NAMA LENGKAP -->
                        <div class="form-group mt-4">
                            <label for="nama-lengkap">Judul Dokumen</label>
                            <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukan judul dokumen..." required value="{{ $dokumen->judul }}">
                        </div>
 

                        <!-- ALAMAT -->
                        <div class="form-group">
                            <label for="tempat-lahir">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Masukan deskripsi..." required>{{ $dokumen->deskripsi }}</textarea>
                        </div>
 
                         <!-- UPLOAD FILE -->
                         <div class="form-group">
                            <label for="tempat-lahir">Upload File</label>
                            <input type="file" name="file" id="file" class="form-control" onchange="read_url_file(this);">
                        </div> 

                        <div id='pdf-preview'> 
                        </div>

                        <!-- TOMBOL -->  
                        <div class="d-flex justify-content-end align-items-center">
                            <button type="submit" class="btn btn-primary mb-1">Update</button> &nbsp; &nbsp;
                            <a href="{{ route('dokumen.read') }}" class="btn btn-danger mb-1">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>

 
        </div>
    </div> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>

        let pdf = "{{ $dokumen->file }}";
        let pdf_name = filename(pdf);  

        file_pdf_preview(pdf_name, pdf);

         /* FFUNGSI MENGAMBIL NAMA FILE DARI URL */
        function filename(path){
            path = path.substring(path.lastIndexOf("/")+ 1);
            return (path.match(/[^.]+(\.[^?#]+)?/) || [])[0];
        }

         /* FUNGSI APPEND PREVEIW FILE */
        function file_pdf_preview(nama_file, url){

            preview_html = 
                "<div class='card border border-primary d-flex flex-row align-items-center mb-3'>"+
                    "<a class='d-block position-relative p-2'>"+
                        "<i class='simple-icon-notebook large-icon initial-height'></i>"+
                    "</a>"+
                    "<div class='pl-3 pt-2 pr-2 pb-2'>"+
                        "<a href='#'>"+
                            "<p class='list-item-heading mb-1'><strong>"+nama_file+"</strong></p>"+
                            "<p class='list-item-heading mb-1 text-small text-mute'>"+url+"</p>"+
                        "</a>"+
                    "</div>"+
                "</div>";
                        
            $("#pdf-preview").empty(); 
            $("#pdf-preview").append(preview_html);  
            
        }
 
         /* FUNGSI JIKA FILE INPUT ON CHANGE */
        function read_url_file(input) {
        
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    let tags = file_pdf_preview(input.name, input.value);  
                    
                    //$('#preview-pdf').attr('src', e.target.result);
                    //$('#preview-foto').height = 150;
                }; 
                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>
@endsection