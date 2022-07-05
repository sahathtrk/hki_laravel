@extends('base') 
@section('judul-halaman', 'Read Data Anak')  
@section('konten')  

    <!-- HEADER -->
    <div class="row">
        <div class="col-12">
            <h1>Read Data Anak</h1>
 

            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                <ol class="breadcrumb pt-0">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li> 
                    <li class="breadcrumb-item">
                        <a href="#">Akun</a>
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
                                 
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $anak->nama_lengkap }}</td>
                                        <td>{{ $anak->jenis_kelamin }}</td>
                                        <td>{{ $anak->tanggal_lahir }}</td>
                                        <td>{{ $anak->anak_ke }}</td>
                                        <td>
                                            <a href="{{ route('profil.data.anak.update', $anak->id) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Lihat anak"><i class="simple-icon-note"></i></a> 
                                        </td>
                                    </tr>  
                              
                            @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
 

@endsection