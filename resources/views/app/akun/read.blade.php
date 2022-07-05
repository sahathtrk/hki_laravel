@extends('base') 
@section('judul-halaman', 'Read Akun')  
@section('konten')  

    <!-- HEADER -->
    <div class="row">
        <div class="col-12">
            <h1>Read Akun</h1> 

            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                <ol class="breadcrumb pt-0">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li> 
                    <li class="breadcrumb-item">
                        <a href="#">Akun</a>
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
                                <th>Nama Lengkap</th>
                                <th>Tipe Akun</th> 
                                <th>E-Mail</th> 
                                <th>Username</th> 
                                <th>Lihat Data / Kelola</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($akuns as $key => $akun) 
                                
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $akun->nama_lengkap }}</td>
                                        <td>{{ $akun->tipe_akun }}</td>
                                        <td>{{ $akun->email }}</td>
                                        <td>{{ $akun->username }}</td>
                                        <td>
                                            @if (hak_akses_penuh(Session::get('id_akun')) == true && $akun->tipe_akun != "Admin")
                                            <a href="{{ route('akun.anak.read', $akun->id) }}" class="btn btn-primary btn-sm text-small" data-toggle="tooltip" data-placement="top" title="Data Anak"><i class="iconsminds-big-data"></i></a> 
                                            <a href="{{ route('akun.grejawi', $akun->id) }}" class="btn btn-primary btn-sm text-small" data-toggle="tooltip" data-placement="top" title="Data Grejawi"><i class="iconsminds-big-data"></i></a> 
                                            <a href="{{ route('akun.pendidikan.formal', $akun->id) }}" class="btn btn-primary btn-sm text-small" data-toggle="tooltip" data-placement="top" title="Data Pendidikan Formal"><i class="iconsminds-big-data"></i></a> 
                                            <a href="{{ route('akun.pendidikan.informal', $akun->id) }}" class="btn btn-primary btn-sm text-small" data-toggle="tooltip" data-placement="top" title="Data Pendidikan Informal"><i class="iconsminds-big-data"></i></a> 
                                            <a href="{{ route('akun.pribadi', $akun->id) }}" class="btn btn-primary btn-sm text-small" data-toggle="tooltip" data-placement="top" title="Data Pribadi"><i class="iconsminds-big-data"></i></a> 
                                            <a href="{{ route('akun.suami.istri', $akun->id) }}" class="btn btn-primary btn-sm text-small" data-toggle="tooltip" data-placement="top" title="Data Suami Istri"><i class="iconsminds-big-data"></i></a>  
                                                <button onclick="hapus_universal_modal('{{ $akun->id }}', '{{ $akun->nama_lengkap }}');"  class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="simple-icon-trash"></i></button>
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
        function hapus_universal_modal(id, nama_lengkap){
            $("#universal-modal").modal("show");
            $("#universal-modal").find("#judul-h5").text("Hapus akun");
            $("#universal-modal").find("#paragraf-p").html("Anda yakin akan menghapus akun <strong>"+nama_lengkap+"</strong> ?");
            $("#universal-modal").find("#aksi-btn").attr("href", "/akun/"+id+"/delete");
            $("#universal-modal").find("#aksi-btn").text("Hapus")
        }
    
    </script>

@endsection