@extends('base') 
@section('judul-halaman', 'Read Dokumen')  
@section('konten')  

    <!-- HEADER -->
    <div class="row">
        <div class="col-12">
            <h1>Read Dokumen</h1>

            <!-- TOMBOL CREATE -->
            @if (hak_akses_penuh(Session::get('id_akun')) == true)
                <div class="top-right-button-container">
                    <a href="{{ route('dokumen.create') }}" class="btn btn-primary  top-right-button mr-1" data-toggle="tooltip" data-placement="top" title="Create"><i class="simple-icon-plus"></i> &nbsp; Create</a>
                    
                </div>
            @endif

            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                <ol class="breadcrumb pt-0">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li> 
                    <li class="breadcrumb-item">
                        <a href="#">Dokumen</a>
                    </li> 
                    <li class="breadcrumb-item active" aria-current="page">Read</li>
                </ol>
            </nav>
            <div class="separator mb-5"></div>
        </div> 
    </div>

    <!-- KONTEN -->
    <div class="row mb-4">
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <table class="data-table data-table-feature">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Judul</th>
                                <th>Deskripsi</th> 
                                <th>Preview</th> 
                                <th>Download</th> 
                                <th>@if (hak_akses_penuh(Session::get('id_akun')) == true)Kelola @endif</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dokumens as $key => $dokumen) 
                                
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $dokumen->judul }}</td>
                                        <td>{{ Str::limit($dokumen->deskripsi, 90, '...') }}</td>  
                                        <td><a href="{{ route('dokumen.preview', $dokumen->id) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Preview"><i class="simple-icon-eye"></i></a></td>  
                                        <td><a download href="{{ asset($dokumen->file) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Download"><i class="iconsminds-download-1"></i></a></td>  
                                        <td>
                                            @if (hak_akses_penuh(Session::get('id_akun')) == true)
                                                <a href="{{ route('dokumen.update', $dokumen->id) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Update"><i class="simple-icon-note"></i></a>  
                                                <button onclick="hapus_universal_modal('{{ $dokumen->id }}', '{{ $dokumen->judul }}');"  class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="simple-icon-trash"></i></button>
                                            @endif
                                        </td>
                                    </tr> 
                                    
                            @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>

        /* FUNGSI MENAMPILKAN MODAL */
        function hapus_universal_modal(id, judul){
            $("#universal-modal").modal("show");
            $("#universal-modal").find("#judul-h5").text("Hapus dokumen");
            $("#universal-modal").find("#paragraf-p").html("Anda yakin akan menghapus dokumen <strong>"+judul+"</strong> ?");
            $("#universal-modal").find("#aksi-btn").attr("href", "/dok/"+id+"/delete");
            $("#universal-modal").find("#aksi-btn").text("Hapus")
        }
    
    </script>

@endsection