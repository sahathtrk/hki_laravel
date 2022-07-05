@extends('base') 
@section('judul-halaman', 'Data Pendidikan Informal')  
@section('konten')  

    <!-- HEADER -->
    <div class="row">
        <div class="col-12">
            <h1>Data Pendidikan Informal</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                <ol class="breadcrumb pt-0">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li> 
                    <li class="breadcrumb-item">
                        <a href="#">Profil</a>
                    </li> 
                    <li class="breadcrumb-item active" aria-current="page">Data Pendidikan Informal</li>
                </ol>
            </nav>
            <div class="separator mb-5"></div>
        </div> 
    </div>

    <!-- KONTEN -->
    <div class="row">

        <div style="width:600px;" class="ml-4">  

            <div id="pendidikan-informal-stage">

                @foreach ($pendidikan_informals as $key => $pendidikan_informal) 
                    <div class="card mb-4 pendidikan-informal-div">
                        <div class="card-body"> 
                            
                            <div class="d-flex flex-grow-1 min-width-zero">
                                
                                <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                                    <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1">
                                        <h5>Data Pendidikan Informal {{ $key+1 }}</h5>
                                    </div>
                                </div>

                                @if ($pendidikan_informals_count != 1) 
                                    <div class="custom-control custom-checkbox pl-1 align-self-center pr-4">
                                        <button onclick="ajax_data_pendidikan_informal_delete({{ $pendidikan_informal->id }});" class="btn btn-outline-danger icon-button edit-button">
                                            <i class="simple-icon-trash"></i>
                                        </button> 
                                    </div>
                                @endif
                            </div>

                            <!-- SEKOLAH DASAR --> 
                            <div class="form-group">
                                <label for="jenis-pendidikan-informal">Jenis Pendidikan Informal</label>
                                <input type="text" class="form-control" name="jenis_pendidikan_informal" id="jenis-pendidikan-informal" placeholder="Masukan jenis pendidikan informal..." value="{{ $pendidikan_informal->jenis_pendidikan_informal }}">
                            </div> 

                            <!-- SEKOLAH DASAR --> 
                            <div class="form-group">
                                <label for="tanggal-kegiatan-program">Tanggal/Kegiatan Program</label>
                                <input type="text" class="form-control" name="tanggal_kegiatan_program" id="tanggal-kegiatan-program" placeholder="Masukan tanggal kegiatan/program..." value="{{ $pendidikan_informal->tanggal_kegiatan_program }}">
                            </div> 

                            <!-- SEKOLAH DASAR --> 
                            <div class="form-group">
                                <label for="tempat-kegiatan-program">Tempat/Kegiatan Program</label>
                                <input type="text" class="form-control" name="tempat_kegiatan_program" id="tempat-kegiatan-program" placeholder="Masukan tempat kegiatan/program..." value="{{ $pendidikan_informal->tempat_kegiatan_program }}">
                            </div> 

                        </div>
                    </div>
                @endforeach



            </div>

            <div class="text-right">
                <button onclick="data_pendidikan_informal_append();" type="button" class="btn btn-outline-primary btn-sm mb-2">
                    <i class="simple-icon-plus btn-group-icon"></i>
                    Tambah Pendidikan Informal
                </button> &nbsp; &nbsp; 
                <button onclick="ajax_data_pendidikan_informal_create();" type="button" class="btn btn-primary btn-sm mb-2">
                    Perbaharui
                </button>
            </div>
        </div>
    </div> 

     
<script> 
    let count_pendidikan_informal_element = 1;

    /* FUNGSI MENGHITUNG ELEMENT PENDIDIKAN INFORMAL DIV */
    function count_pendidikan_informal_div(){
        count_pendidikan_informal_element = 0;
        
        $(".data-sampel").each(function(){
            count_pendidikan_informal_element++; 
            $(this).find("#sampel_count_span").text(count_pendidikan_informal_element);
        });
    }

    /* FUNGSI MENAMBAH ELEMENT PADA STAGE PENDIDIKAN INFORMAL */
    function data_pendidikan_informal_append(){  

        let sampel_count = count_pendidikan_informal_element+1;
        
        let data_pendidikan_informal_div = 
            "<div class='card mb-4 pendidikan-informal-div data-sampel' id='data-sampel-"+sampel_count+"'>"+
                " <div class='card-body'   style='background-color: #c0d1d5;'>"+
                    
                    "<div class='d-flex flex-grow-1 min-width-zero'>"+
                                
                        "<div class='card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center'>"+
                            "<div class='list-item-heading mb-0 truncate w-80 mb-1 mt-1'>"+
                                "<h5>Data Sampel Pendidikan Informal <span id='sampel_count_span'></span</h5>"+
                                "</div>"+
                        "</div>"+
                    
                        "<div class='custom-control custom-checkbox pl-1 align-self-center pr-4'>"+
                            "<button onclick='remove_pendidikan_informal_div("+sampel_count+");' class='btn btn-outline-danger icon-button edit-button'>"+
                                "<i class='simple-icon-trash'></i>"+
                            "</button> "+
                        "</div>"+

                    "</div>"+
            
                    "<div class='form-group'>"+
                        "<label for='jenis-pendidikan-informal'>Jenis Pendidikan Informal</label>"+
                        "<input type='text' class='form-control' name='jenis_pendidikan_informal' id='jenis-pendidikan-informal' placeholder='Masukan jenis pendidikan informal...'>"+
                    "</div> "+
            
                    "<div class='form-group'>"+
                        "<label for='tanggal-kegiatan-program'>Tanggal/Kegiatan Program</label>"+
                        "<input type='text' class='form-control' name='tanggal_kegiatan_program' id='tanggal-kegiatan-program' placeholder='Masukan tanggal kegiatan/program...'>"+
                    "</div> "+
        
                    " <div class='form-group'>"+
                        "<label for='tempat-kegiatan-program'>Tempat/Kegiatan Program</label>"+
                        "<input type='text' class='form-control' name='tempat_kegiatan_program' id='tempat-kegiatan-program' placeholder='Masukan tempat kegiatan/program...'>"+
                    "</div>"+

                "</div>"+
            "</div>";
            
        $("#pendidikan-informal-stage").append(data_pendidikan_informal_div);
        count_pendidikan_informal_div();
    }

    /* FUNGSI REMOVE ELEMENT PENDIDIKAN INFORMAL DIV */
    function remove_pendidikan_informal_div(sampel_count){
        $("#data-sampel-"+sampel_count).remove();
        count_pendidikan_informal_div();
    }

    /* FUNGSI REFRESH ULANG DATA PENDIDIKAN INFORMAL MELALUI AJAX */
    function ajax_data_pendidikan_informal_delete(id_pendidikan_informal){
        $.ajax({ 
            url: '/profil/data-pendidikan-informal/ajax-data-pendidikan-informal-delete', 
            data: { id_pendidikan_informal : id_pendidikan_informal },
            success: function(res){ 
                window.location.reload();
            },
            error: function(){
                alert("error");
            },
        });
    }

    /* FUNGSI REFRESH ULANG DATA PENDIDIKAN INFORMAL MELALUI AJAX */
    function ajax_data_pendidikan_informal_refresh(){
        $.ajax({ 
            url: '/profil/data-pendidikan-informal/ajax-data-pendidikan-informal-refresh', 
            success: function(res){ 
            },
            error: function(){
                alert("error");
            },
        });
    }

    /* FUNGSI REFRESH ULANG DATA PENDIDIKAN INFORMAL MELALUI AJAX */
    function ajax_data_pendidikan_informal_create(){
        
        ajax_data_pendidikan_informal_refresh();

        $(".pendidikan-informal-div").each(function(){
            
            let jenis_pendidikan_informal   = $(this).find("input[name=jenis_pendidikan_informal]").val();
            let tanggal_kegiatan_program    = $(this).find("input[name=tanggal_kegiatan_program]").val();
            let tempat_kegiatan_program     = $(this).find("input[name=tempat_kegiatan_program]").val();

            $.ajax({ 
                url: '/profil/data-pendidikan-informal/ajax-data-pendidikan-informal-create',
                data: {
                    "jenis_pendidikan_informal" : jenis_pendidikan_informal,
                    "tanggal_kegiatan_program"  : tanggal_kegiatan_program,
                    "tempat_kegiatan_program"   : tempat_kegiatan_program,
                },
                success: function(res){
                   
                },
                error: function(){
                    alert("error");
                },
            });

        });

        window.location.reload();
    }
    
</script>

@endsection