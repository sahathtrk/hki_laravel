@extends('base') 
@section('judul-halaman', 'Read Lembar Evaluasi')  
@section('konten')  

    <!-- HEADER -->
    <div class="row">
        <div class="col-12">

            <!-- JUDUL -->
            <h1>Read Lembar Evaluasi</h1>

            <!-- TOMBOL CREATE -->
            @if (hak_akses_penuh(Session::get('id_akun')) == true)
                <div class="top-right-button-container">
                    <a href="{{ route('survei.evaluasi.create') }}" class="btn btn-primary  top-right-button mr-1" data-toggle="tooltip" data-placement="top" title="Create"><i class="simple-icon-plus"></i> &nbsp; Create</a>
                    
                </div>
            @endif
            
            <!-- BREADCUMB -->
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                <ol class="breadcrumb pt-0">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li>  
                    <li class="breadcrumb-item">
                        <a href="#">Lembar Evaluasi</a>
                    </li>  
                    <li class="breadcrumb-item active" aria-current="page">Read</li>
                </ol>
            </nav>

            <div class="separator mb-5"></div>
        </div> 
    </div>

    <!-- KONTEN -->
    <div class="row">
        <div class="col-12 list" data-check-all="checkAll">
            
            @foreach ($evaluasis as $key => $evaluasi)
                <div class="card d-flex flex-row mb-3">
                    <div class="d-flex flex-grow-1 min-width-zero">
 
                            <!-- VALUE -->
                            <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                                
                                <span>{{ $key+1 }}</span>

                                <a class="list-item-heading mb-0 truncate w-20 w-xs-100"  >
                                    {{ $evaluasi->judul }}
                                </a>

                                <p class="mb-0 text-muted w-30 w-xs-100">{{ Str::limit($evaluasi->deskripsi, 150) }}...</p>
                                <p class="mb-0 text-muted w-20 w-xs-100">{{ $evaluasi->kategori }}</p>
                                <div class="w-15 w-xs-100">
                                    <span class="badge badge-pill badge-secondary">{{ $pertanyaans->where('survei_id', $evaluasi->id)->count() }} Pertanyaan</span>
                                </div>
                            </div> 

                        <!-- TOMBOL -->
                        <label class="custom-control custom-checkbox mb-1 align-self-center pr-4">

                            @if (hak_akses_penuh(Session::get('id_akun')) == true)
                                <a href="{{ route('survei.evaluasi.update', $evaluasi->id) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Update"><i class="simple-icon-note"></i></a> 
                                <a href="{{ route('survei.evaluasi.rekap', $evaluasi->id) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Rekap"><i class="iconsminds-files"></i></a> 
                                <button onclick="hapus_universal_modal('{{ $evaluasi->id }}', '{{ $evaluasi->judul }}')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="simple-icon-trash"></i></button>
                            @else
                                @if ($jawabans->where('survei_id', $evaluasi->id)->where('akun_id', id_akun_session())->count() == 0)
                                    <a href="{{ route('survei.evaluasi.submit', $evaluasi->id) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Submit Jawaban"><i class="iconsminds-mail-reply"></i></a> 
                                @else
                                    <a class="text-muted"><i>Anda sudah mengisi lembar evaluasi ini.</i></a>
                                @endif
                            @endif 
                            
                            
                        </label>
                    </div>
                </div>
            @endforeach
  
            {{ $evaluasis->links('pagination::bootstrap-5') }}
        </div>
    </div>

<script>

    /* FUNGSI MENAMPILKAN MODAL */
    function hapus_universal_modal(id, judul){
        $("#universal-modal").modal("show");
        $("#universal-modal").find("#judul-h5").text("Hapus Lembar Evaluasi");
        $("#universal-modal").find("#paragraf-p").html("Anda yakin akan menghapus lembar evaluasi <strong>"+judul+"</strong> ?");
        $("#universal-modal").find("#aksi-btn").attr("href", "/evaluasi/"+id+"/delete");
        $("#universal-modal").find("#aksi-btn").text("Hapus")
    }

</script>
@endsection