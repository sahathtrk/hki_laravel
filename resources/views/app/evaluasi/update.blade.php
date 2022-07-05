@extends('base') 
@section('judul-halaman', 'Update Lembar Evaluasi')  
@section('konten')  

    <!-- HEADER -->
    <div class="row">
        <div class="col-12">
            <h1>Update Lembar Evaluasi</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                <ol class="breadcrumb pt-0">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li> 
                    <li class="breadcrumb-item">
                        <a href="#">Lembar Evaluasi</a>
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

            <!-- RINCIAN EVALUASI -->
            <div class="card mb-4">
                <div class="card-body"> 
                    
                    <div class="d-flex flex-grow-1 min-width-zero">
                        
                        <div class="d-flex flex-grow-1 min-width-zero"> 
                            <h5>Deskripsi Lembar Evaluasi</h5> 
                        </div>

                    </div>

                    @if (session('notifikasi_create') == "success")
                            <div class="alert alert-success alert-dismissible fade show rounded mb-0" role="alert">
                                <strong>Berhasil!</strong> Lembar evaluasi berhasil dibuat.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                    @elseif (session('notifikasi_create') == "failed")
                        <div class="alert alert-danger alert-dismissible fade show rounded mb-0" role="alert">
                            <strong>Gagal!</strong> Lembar evaluasi gagal dibuat.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>  
                    @endif 
                    
                    <!-- JUDUL --> 
                    <div class="form-group mt-4">
                        <label for="jenis-evaluasi">Judul</label>
                        <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukan judul lembar evaluasi..." value="{{ $evaluasi->judul }}" >
                    </div> 

                    <!-- DESKRIPSI --> 
                    <div class="form-group">
                        <label for="tanggal-kegiatan-program">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Masukan deskripsi lembar evaluasi...">{{ $evaluasi->deskripsi }}</textarea>
                    </div>  

                    <!-- KATEGORI -->  
                    <div class="form-group">
                        <label for="kategori">Tipe Akun</label>
                        <select name="kategori" id="kategori" class="form-control"> 
                            <option value="{{ $evaluasi->kategori }}" hidden selected>{{ $evaluasi->kategori }}</option>
                            <option value="Laporan Pelayanan">Laporan Pelayanan</option>
                            <option value="Lembar Evaluasi">Lembar Evaluasi</option>
                        </select>
                    </div> 

                </div>
            </div>

            <!-- APPEND STAGE PERTANYAAN -->
            <div id="pertanyaan-stage"> 
                
                @foreach ($pertanyaans as $key => $pertanyaan) 
                    <div class="card mb-4 pertanyaan-div">
                        <div class="card-body"> 
                            
                            <!-- JUDUL & TRASH --> 
                            <div class="d-flex flex-grow-1 min-width-zero">
                                
                                <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                                    <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1">
                                        <h5>Pertanyaan {{ $key+1 }}</h5>
                                    </div>
                                </div> 

                                <div class="custom-control custom-checkbox pl-1 align-self-center pr-4">
                                    <button onclick="ajax_pertanyaan_delete({{ $pertanyaan->id }});" class="btn btn-outline-danger icon-button edit-button">
                                        <i class="simple-icon-trash"></i>
                                    </button> 
                                </div>

                            </div>

                            <!-- PERTANYAAN --> 
                            <div class="form-group">
                                <label for="jenis-pelayanan">Pertanyaan</label>
                                <textarea class="form-control" name="pertanyaan" id="pertanyaan" placeholder="Masukan pertanyaan...">{{ $pertanyaan->pertanyaan }}</textarea>
                            </div>  
                            
                            <!-- JENIS JAWABAN --> 
                            <div class='form-group'>
                                <label for='jenis-pelayanan'>Jenis Jawaban</label>
                                <select class='form-control' name='jenis-jawaban' id='jenis-jawaban' onchange='janis_jawaban("{{ $key+1 }} ", this.options[this.selectedIndex].value);'>
                                    <option value='{{ $pertanyaan->jenis_jawaban }}' selected hidden>{{ $pertanyaan->jenis_jawaban }}</option>
                                    <option value='Jawaban Teks'>Jawaban Teks</option>
                                    <option value='Pilihan Berganda'>Pilihan Berganda</option>
                                    <option value='Kotak Centang'>Kotak Centang</option>
                                    <option value='Upload File'>Upload File</option>
                                </select>
                            </div>
                            <div class='form-group' id='opsi-jenis-jawaban-{{ $key+1 }}'>
                                @php
                                    $opsi_jawaban_explode = explode(",", $pertanyaan->opsi_jawaban); 
                                @endphp

                                @if ($pertanyaan->jenis_jawaban == "Jawaban Teks")
                                    
                                @elseif ($pertanyaan->jenis_jawaban == "Pilihan Berganda")
                                    <input type='text' class='form-control' name='pg_a' id='pg-a' placeholder='Masukan pilihan A...' value='{{ $opsi_jawaban_explode[1] }}'></br>
                                    <input type='text' class='form-control' name='pg_b' id='pg-b' placeholder='Masukan pilihan B...' value='{{ $opsi_jawaban_explode[2] }}'></br>
                                    <input type='text' class='form-control' name='pg_c' id='pg-c' placeholder='Masukan pilihan C...' value='{{ $opsi_jawaban_explode[3] }}'></br>
                                    <input type='text' class='form-control' name='pg_d' id='pg-d' placeholder='Masukan pilihan D...' value='{{ $opsi_jawaban_explode[4] }}'></br>
                                    <input type='text' class='form-control' name='pg_e' id='pg-e' placeholder='Masukan pilihan E...' value='{{ $opsi_jawaban_explode[5] }}'></br> 
                                
                                @elseif ($pertanyaan->jenis_jawaban == "Kotak Centang")
                                    <input type='text' class='form-control' name='cb_a' id='cb-a' placeholder='Masukan pilihan A...' value='{{ $opsi_jawaban_explode[1] }}'></br>
                                    <input type='text' class='form-control' name='cb_b' id='cb-b' placeholder='Masukan pilihan B...' value='{{ $opsi_jawaban_explode[2] }}'></br>
                                    <input type='text' class='form-control' name='cb_c' id='cb-c' placeholder='Masukan pilihan C...' value='{{ $opsi_jawaban_explode[3] }}'></br>
                                    <input type='text' class='form-control' name='cb_d' id='cb-d' placeholder='Masukan pilihan D...' value='{{ $opsi_jawaban_explode[4] }}'></br>
                                    <input type='text' class='form-control' name='cb_e' id='cb-e' placeholder='Masukan pilihan E...' value='{{ $opsi_jawaban_explode[5] }}'></br> 

                                @else 

                                @endif

                            </div>

                        </div>
                    </div>
                @endforeach



            </div>

            <div class="text-right">
                <button onclick="data_evaluasi_append();" type="button" class="btn btn-outline-primary btn-sm mb-2">
                    <i class="simple-icon-plus btn-group-icon"></i>
                    Tambah Pertanyaan
                </button> &nbsp; &nbsp; 
                <button onclick="ajax_pertanyaan_create();" type="button" class="btn btn-primary btn-sm mb-2">
                    Update
                </button>
                <a href="{{ route('survei.evaluasi.read') }}" class="btn btn-danger btn-sm mb-2"> Kembali </a>
            </div>
        </div>
    </div> 

     
<script> 

    /* INISIALISASI */
    let count_pertanyaan_element = 0;
    let id_survei                = "{{ $id_survei }}";

    /* FUNGSI MENGHITUNG ELEMENT PERTANYAAN DIV */
    function count_pertanyaan_div(){
        count_pertanyaan_element = 0;
        
        $(".data-sampel").each(function(){
            count_pertanyaan_element++; 
            $(this).find("#sampel_count_span").text(count_pertanyaan_element);
        });
    }

    /* FUNGSI MENAMBAH ELEMENT PADA STAGE PERTANYAAN */
    function data_evaluasi_append(){  

        let sampel_count = count_pertanyaan_element+1;
        
        let pertanyaan_div = 
            "<div  style='background-color: #c0d1d5;' class='card mb-4 pertanyaan-div data-sampel' id='data-sampel-"+sampel_count+"' >"+
                "<div class='card-body'>"+

                    "<div class='d-flex flex-grow-1 min-width-zero'>"+
                        
                        "<div class='card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center'>"+
                            "<div class='list-item-heading mb-0 truncate w-80 mb-1 mt-1'>"+
                                "<h5>Sampel Pertanyaan <span id='sampel_count_span'></span></h5>"+
                            "</div>"+
                        "</div> "+

                        "<div class='custom-control custom-checkbox pl-1 align-self-center pr-4'>"+
                            "<button onclick='remove_pertanyaan_div("+sampel_count+")' class='btn btn-outline-danger icon-button edit-button'>"+
                                "<i class='simple-icon-trash'></i>"+
                            "</button> "+
                        "</div>"+

                    "</div>"+
            
                    "<div class='form-group'>"+
                        "<label for='jenis-pelayanan'>Pertanyaan</label>"+
                        "<textarea class='form-control' name='pertanyaan' id='pertanyaan' placeholder='Masukan pertanyaan...'></textarea>"+
                    "</div>"+

                    "<div class='form-group'>"+
                        "<label for='jenis-pelayanan'>Jenis Jawaban</label>"+
                        "<select class='form-control' name='jenis-jawaban' id='jenis-jawaban' onchange='janis_jawaban_sampel("+sampel_count+", this.options[this.selectedIndex].value);'>"+
                            "<option value='Jawaban Teks'>Jawaban Teks</option>"+ 
                            "<option value='Pilihan Berganda'>Pilihan Berganda</option>"+ 
                            "<option value='Kotak Centang'>Kotak Centang</option>"+ 
                            "<option value='Upload File'>Upload File</option>"+ 
                        "</select>"+
                    "</div>"+
                    "<div class='form-group' id='opsi-jenis-jawaban-sampel"+sampel_count+"'>"+
                    "</div>"+
    
                "</div>"+
            "</div>";
            
        $("#pertanyaan-stage").append(pertanyaan_div);
        count_pertanyaan_div();
    }

    /* FUNGSI APPEND OPSI JENIS JAWABAN */
    function janis_jawaban(sampel_count, jenis){ 

        let pilihan_berganda_html = 
            "<input type='text' class='form-control' name='pg_a' id='pg-a' placeholder='Masukan pilihan A...'></br>"+
            "<input type='text' class='form-control' name='pg_b' id='pg-b' placeholder='Masukan pilihan B...'></br>"+
            "<input type='text' class='form-control' name='pg_c' id='pg-c' placeholder='Masukan pilihan C...'></br>"+
            "<input type='text' class='form-control' name='pg_d' id='pg-d' placeholder='Masukan pilihan D...'></br>"+
            "<input type='text' class='form-control' name='pg_e' id='pg-e' placeholder='Masukan pilihan E...'></br>";
        
        let kotak_centang_html = 
            "<input type='text' class='form-control' name='cb_a' id='cb-a' placeholder='Masukan pilihan A...'></br>"+
            "<input type='text' class='form-control' name='cb_b' id='cb-b' placeholder='Masukan pilihan B...'></br>"+
            "<input type='text' class='form-control' name='cb_c' id='cb-c' placeholder='Masukan pilihan C...'></br>"+
            "<input type='text' class='form-control' name='cb_d' id='cb-d' placeholder='Masukan pilihan D...'></br>"+
            "<input type='text' class='form-control' name='cb_e' id='cb-e' placeholder='Masukan pilihan E...'></br>";

        $("#opsi-jenis-jawaban-"+sampel_count).empty();

        switch (jenis) {
            case "Jawaban Teks":
                
                break;
            case "Pilihan Berganda":
                    $("#opsi-jenis-jawaban-"+sampel_count).append(pilihan_berganda_html);
                break;
            case "Kotak Centang":
                    $("#opsi-jenis-jawaban-"+sampel_count).append(kotak_centang_html);
                break;
            case "Upload File":
                
                break;
            default:
                break;
        }
        
    }

    /* FUNGSI APPEND OPSI JENIS JAWABAN */
    function janis_jawaban_sampel(sampel_count, jenis){ 

        let pilihan_berganda_html = 
            "<input type='text' class='form-control' name='pg_a' id='pg-a' placeholder='Masukan pilihan A...'></br>"+
            "<input type='text' class='form-control' name='pg_b' id='pg-b' placeholder='Masukan pilihan B...'></br>"+
            "<input type='text' class='form-control' name='pg_c' id='pg-c' placeholder='Masukan pilihan C...'></br>"+
            "<input type='text' class='form-control' name='pg_d' id='pg-d' placeholder='Masukan pilihan D...'></br>"+
            "<input type='text' class='form-control' name='pg_e' id='pg-e' placeholder='Masukan pilihan E...'></br>";
        
        let kotak_centang_html = 
            "<input type='text' class='form-control' name='cb_a' id='cb-a' placeholder='Masukan pilihan A...'></br>"+
            "<input type='text' class='form-control' name='cb_b' id='cb-b' placeholder='Masukan pilihan B...'></br>"+
            "<input type='text' class='form-control' name='cb_c' id='cb-c' placeholder='Masukan pilihan C...'></br>"+
            "<input type='text' class='form-control' name='cb_d' id='cb-d' placeholder='Masukan pilihan D...'></br>"+
            "<input type='text' class='form-control' name='cb_e' id='cb-e' placeholder='Masukan pilihan E...'></br>";

        $("#opsi-jenis-jawaban-sampel"+sampel_count).empty();

        switch (jenis) {
            case "Jawaban Teks":
                
                break;
            case "Pilihan Berganda":
                    $("#opsi-jenis-jawaban-sampel"+sampel_count).append(pilihan_berganda_html);
                break;
            case "Kotak Centang":
                    $("#opsi-jenis-jawaban-sampel"+sampel_count).append(kotak_centang_html);
                break;
            case "Upload File":
                    
                break;
            default:
                break;
        }
        
    }

    /* FUNGSI REMOVE ELEMENT PERTANYAAN DIV */
    function remove_pertanyaan_div(sampel_count){
        $("#data-sampel-"+sampel_count).remove();
        count_pertanyaan_div();
    }

    /* FUNGSI REFRESH ULANG DATA PERTANYAAN MELALUI AJAX */
    function ajax_pertanyaan_delete(id_pertanyaan){
        $.ajax({ 
            url: '/survei/ajax-pertanyaan-delete', 
            data: { id_pertanyaan : id_pertanyaan },
            success: function(res){ 
                window.location.reload();
            },
            error: function(){
                alert("error");
            },
        });
    }

    /* FUNGSI REFRESH ULANG DATA PERTANYAAN MELALUI AJAX */
    function ajax_pertanyaan_refresh(){
        $.ajax({ 
            url: '/survei/ajax-pertanyaan-refresh',
                data: { 
                    "id_survei"  : id_survei, 
                }, 
            success: function(res){ 
            },
            error: function(){
                alert("error");
            },
        });
    }

    /* FUNGSI AJAX PERBAHARUI SURVEI */
    function ajax_survei_update(){

        let judul       = $("input[name=judul]").val();
        let deskripsi   = $("textarea[name=deskripsi]").val(); 
        let kategori    = $("#kategori option:selected").val();  
        
        $.ajax({ 
            async: false,
            url: '/survei/ajax-survei-update',
                data: {  
                    "id_survei"  : id_survei, 
                    "judul"      : judul,  
                    "deskripsi"  : deskripsi,  
                    "kategori"   : kategori, 
                }, 
            success: function(res){ 
            },
            error: function(){
                alert("error");
            },
        });
    }

    /* FUNGSI REFRESH ULANG DATA PERTANYAAN MELALUI AJAX */
    function ajax_pertanyaan_create(){
        
        ajax_pertanyaan_refresh();
        ajax_survei_update();
       
        $(".pertanyaan-div").each(function(){
            
            let pertanyaan      = $(this).find("textarea[name=pertanyaan]").val();  
            let jenis_jawaban   = $(this).find("#jenis-jawaban option:selected").val(); 
            let grouping_opsi   = ""; 
            
            
            switch (jenis_jawaban) {
                case "Jawaban Teks":
                        grouping_opsi   = "none";
                        
                    break;
                case "Pilihan Berganda":
                        grouping_opsi = grouping_opsi +","+ $(this).find("input[name=pg_a]").val() +","+ $(this).find("input[name=pg_b]").val() +","+ $(this).find("input[name=pg_c]").val() +","+ $(this).find("input[name=pg_d]").val() +","+ $(this).find("input[name=pg_e]").val();
                         
                    break;
                case "Kotak Centang":
                        grouping_opsi = grouping_opsi +","+ $(this).find("input[name=cb_a]").val() +","+ $(this).find("input[name=cb_b]").val() +","+ $(this).find("input[name=cb_c]").val() +","+ $(this).find("input[name=cb_d]").val() +","+ $(this).find("input[name=cb_e]").val();
                        
                    break;
                case "Upload File":
                        grouping_opsi   = "none"; 
                    break;
                default:
                    break;
            } 

            $.ajax({ 
                async: false,
                url: '/survei/ajax-pertanyaan-create',
                data: {
                    "grouping_opsi" : grouping_opsi,
                    "jenis_jawaban" : jenis_jawaban,
                    "pertanyaan" : pertanyaan, 
                    "id_survei"  : id_survei, 
                },
                success: function(res){
                   
                },
                error: function(){
                    alert("error");
                },
            });

        });
 
        $("#universal-modal").modal("show");
        $("#universal-modal").find("#judul-h5").text("Berhasil Diperbaharui!");
        $("#universal-modal").find("#paragraf-p").html("Anda berhasil memperbaharui lembar evaluasi.");
        $("#universal-modal").find("#tutup-btn").remove();
        $("#universal-modal").find("#aksi-btn").attr("href", "");
        $("#universal-modal").find("#aksi-btn").text("Reload");
        $("#universal-modal").find("#aksi-btn").on("click", function() {
            window.location.reload();
        });
     
    }
    
</script>

@endsection