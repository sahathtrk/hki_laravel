@extends('base') 
@section('judul-halaman', 'Read Rekap Lembar Evaluasi')  
@section('konten')  

    <!-- HEADER -->
    <div class="row">
        <div class="col-12">
            <h1>Read Rekap Lembar Evaluasi</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                <ol class="breadcrumb pt-0">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li> 
                    <li class="breadcrumb-item">
                        <a href="#">Lembar Evaluasi</a>
                    </li> 
                    <li class="breadcrumb-item">
                        <a href="#">Rekap</a>
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
                                <th>Evaluasi</th>
                                <th>Kategori</th>
                                <th>Jumlah Jawaban</th>
                                <th>Kelola</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jawabans as $key => $jawaban)
                                @if ($jawaban->survei->kategori == "Lembar Evaluasi")
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $jawaban->akun->nama_lengkap }}</td>
                                        <td>{{ $jawaban->survei->judul }}</td>
                                        <td>{{ $jawaban->survei->kategori }}</td>
                                        <td>{{ $jawabans_tanpa_distinct->where('survei_id', $jawaban->survei->id)->where('akun_id', $jawaban->akun->id)->count() }}</td>
                                        <td>
                                            <a href="{{ route('survei.evaluasi.detail.rekap', [$jawaban->survei->id, $jawaban->akun->id]) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Lihat Jawaban"><i class="simple-icon-eye"></i></a>
                                            <button onclick="hapus_universal_modal('{{ $jawaban->survei->id }}', '{{ $jawaban->akun->id }}', '{{ $jawaban->akun->nama_lengkap }}')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="simple-icon-trash"></i></button>
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
        function hapus_universal_modal(id_evaluasi, id_akun, nama_lengkap){
            $("#universal-modal").modal("show");
            $("#universal-modal").find("#judul-h5").text("Hapus Jawaban Lembar Evaluasi");
            $("#universal-modal").find("#paragraf-p").html("Anda yakin akan menghapus jawaban lembar evaluasi milik <strong>"+nama_lengkap+"</strong> ?");
            $("#universal-modal").find("#aksi-btn").attr("href", "/evaluasi/rekap/"+id_evaluasi+"/"+id_akun+"/delete");
            $("#universal-modal").find("#aksi-btn").text("Hapus")
        }
    
    </script>

@endsection