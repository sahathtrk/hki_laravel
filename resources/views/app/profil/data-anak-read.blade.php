@extends('base') 
@section('judul-halaman', 'Read Data Anak')  
@section('konten')  

    <!-- HEADER -->
    <div class="row">
        <div class="col-12">
            <h1>Data Anak</h1>

            <!-- TOMBOL CREATE --> 
            <div class="top-right-button-container">
                <a href="{{ route('profil.data.anak.create') }}" class="btn btn-primary  top-right-button mr-1" data-toggle="tooltip" data-placement="top" title="Create"><i class="simple-icon-plus"></i> &nbsp; Create</a>
                
            </div> 

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
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>Anak Ke...</th>
                                <th>Kelola</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($anaks as $key => $anak)  
                             @if ($anak->akun_id == id_akun_session()) 
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $anak->nama_lengkap }}</td>
                                    <td>{{ $anak->jenis_kelamin }}</td>
                                    <td>{{ $anak->tanggal_lahir }}</td>
                                    <td>{{ $anak->anak_ke }}</td>
                                    <td>
                                        <a href="{{ route('profil.data.anak.update', $anak->id) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Lihat anak"><i class="simple-icon-note"></i></a>
                                        <button onclick="hapus_universal_modal('{{ $anak->id }}', '{{ $anak->nama_lengkap }}')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="simple-icon-trash"></i></button>
                                    </td>
                                </tr>  
                               @endif
                            @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>

        /* FUNGSI MENAMPILKAN MODAL */
        function hapus_universal_modal(id, nama_lengkap){
            $("#universal-modal").modal("show");
            $("#universal-modal").find("#judul-h5").text("Hapus anak Lembar pelayanan");
            $("#universal-modal").find("#paragraf-p").html("Anda yakin akan menghapus anak <strong>"+nama_lengkap+"</strong> ?");
            $("#universal-modal").find("#aksi-btn").attr("href", "/profil/data-anak/"+id+"/delete");
            $("#universal-modal").find("#aksi-btn").text("Hapus")
        }
    
    </script>

@endsection