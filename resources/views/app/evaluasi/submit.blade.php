@extends('base') 
@section('judul-halaman', 'Submit Lembar Evaluasi')  
@section('konten')  

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- HEADER -->
    <div class="row">
        <div class="col-12">
            <h1>Submit Lembar Evaluasi</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                <ol class="breadcrumb pt-0">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li> 
                    <li class="breadcrumb-item">
                        <a href="#">Lembar Evaluasi</a>
                    </li> 
                    <li class="breadcrumb-item active" aria-current="page">Submit</li>
                </ol>
            </nav>
            <div class="separator mb-5"></div>
        </div> 
    </div>

    <!-- KONTEN -->
    <div class="row">

        <div style="width:600px;" class="ml-4">   
            <div id="evaluasi-stage">

                <!-- HEADER SURVEI -->
                <div class="card mb-4">
                    <div class="card-body"> 
                         
                        <div class="d-flex flex-grow-1 min-width-zero">
                        
                            <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                                <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1">
                                    <h5>Deskripsi Lembar Evaluasi</h5>
                                </div>
                            </div>

                        </div>

                        <!-- JUDUL --> 
                        <div class="form-group">
                            <label for="jenis-evaluasi">Judul</label>
                            <input type="text" class="form-control" name="judul" id="jenis-evaluasi" placeholder="Masukan judul lembar evaluasi..." disabled value="{{ $evaluasi->judul }}">
                        </div> 

                        <!-- DESKRIPSI --> 
                        <div class="form-group">
                            <label for="tanggal-kegiatan-program">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="tanggal-kegiatan-program" placeholder="Masukan deskripsi lembar evaluasi..." disabled>{{ $evaluasi->deskripsi }}</textarea>
                        </div> 

                        <!-- KATEGORI -->  
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select name="kategori" id="kategori" class="form-control" disabled> 
                                <option value="{{ $evaluasi->kategori }}">{{ $evaluasi->kategori }}</option> 
                            </select>
                        </div>  

                    </div>
                </div>
                
                <!-- PERTANYAAN -->
                @foreach ($pertanyaans as $key => $pertanyaan) 
                    <div class="card mb-4 jawaban-div">
                        <div class="card-body"> 
                            
                            <!-- JUDUL & TRASH --> 
                            <div class="d-flex flex-grow-1 min-width-zero">
                                
                                <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                                    <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1">
                                        <h5>Pertanyaan {{ $key+1 }}</h5>
                                    </div>
                                </div>  

                            </div>

                            <div class="form-group">
                                <input type="hidden" name="id_pertanyaan" value="{{ $pertanyaan->id }}">
                                <p>{{ $pertanyaan->pertanyaan }}</p>
                            </div>

                            <input type="hidden" name="jenis_jawaban" value="{{ $pertanyaan->jenis_jawaban }}">
                           
                            @php
                                $opsi_jawaban_explode = explode(",", $pertanyaan->opsi_jawaban); 
                            @endphp

                            <!-- JENIS JAWABAN --> 
                            @if ($pertanyaan->jenis_jawaban == "Jawaban Teks") 
                                <div class="form-group">
                                    <label for="jenis-pelayanan"><strong>Jawaban</strong></label>
                                    <textarea class="form-control" required name="jawaban" id="jawaban" placeholder="Masukan jawaban..."></textarea>
                                </div>   
                                <form autocomplete="off" id="form-upload-file" enctype="multipart/form-data">
                                    {{ csrf_field() }} 
                                    <input type="File" class="form-control d-none" name="upload_file" id="upload-file" accept="image/*">
                                </form> 
                            @elseif ($pertanyaan->jenis_jawaban == "Pilihan Berganda")
                                <input type='radio'  name='pg_{{ $key+1 }}' id='pg-a' placeholder='Masukan pilihan A...' value='{{ $opsi_jawaban_explode[1] }}'>&nbsp;{{ $opsi_jawaban_explode[1] }}</br>
                                <input type='radio'  name='pg_{{ $key+1 }}' id='pg-b' placeholder='Masukan pilihan B...' value='{{ $opsi_jawaban_explode[2] }}'>&nbsp;{{ $opsi_jawaban_explode[2] }}</br>
                                <input type='radio'  name='pg_{{ $key+1 }}' id='pg-c' placeholder='Masukan pilihan C...' value='{{ $opsi_jawaban_explode[3] }}'>&nbsp;{{ $opsi_jawaban_explode[3] }}</br>
                                <input type='radio'  name='pg_{{ $key+1 }}' id='pg-d' placeholder='Masukan pilihan D...' value='{{ $opsi_jawaban_explode[4] }}'>&nbsp;{{ $opsi_jawaban_explode[4] }}</br>
                                <input type='radio'  name='pg_{{ $key+1 }}' id='pg-e' placeholder='Masukan pilihan E...' value='{{ $opsi_jawaban_explode[5] }}'>&nbsp;{{ $opsi_jawaban_explode[5] }}</br> 
                                <form autocomplete="off" id="form-upload-file" enctype="multipart/form-data">
                                    {{ csrf_field() }} 
                                    <input type="File" class="form-control d-none" name="upload_file" id="upload-file" accept="image/*">
                                </form> 
                            @elseif ($pertanyaan->jenis_jawaban == "Kotak Centang")
                                <input type='checkbox' name='cb_{{ $key+1 }}' id='cb-a' placeholder='Masukan pilihan A...' value='{{ $opsi_jawaban_explode[1] }}'>&nbsp;{{ $opsi_jawaban_explode[1] }}</br>
                                <input type='checkbox' name='cb_{{ $key+1 }}' id='cb-b' placeholder='Masukan pilihan B...' value='{{ $opsi_jawaban_explode[2] }}'>&nbsp;{{ $opsi_jawaban_explode[2] }}</br>
                                <input type='checkbox' name='cb_{{ $key+1 }}' id='cb-c' placeholder='Masukan pilihan C...' value='{{ $opsi_jawaban_explode[3] }}'>&nbsp;{{ $opsi_jawaban_explode[3] }}</br>
                                <input type='checkbox' name='cb_{{ $key+1 }}' id='cb-d' placeholder='Masukan pilihan D...' value='{{ $opsi_jawaban_explode[4] }}'>&nbsp;{{ $opsi_jawaban_explode[4] }}</br>
                                <input type='checkbox' name='cb_{{ $key+1 }}' id='cb-e' placeholder='Masukan pilihan E...' value='{{ $opsi_jawaban_explode[5] }}'>&nbsp;{{ $opsi_jawaban_explode[5] }}</br> 
                                <form autocomplete="off" id="form-upload-file" enctype="multipart/form-data">
                                    {{ csrf_field() }} 
                                    <input type="File" class="form-control d-none" name="upload_file" id="upload-file" accept="image/*">
                                </form> 
                            @else 
                                <div class="form-group">
                                    <label for="jenis-pelayanan"><strong>Jawaban</strong></label>
                                        <form autocomplete="off" id="form-upload-file" enctype="multipart/form-data">
                                            {{ csrf_field() }} 
                                            <input type="File" class="form-control" name="upload_file" id="upload-file" accept="image/*">
                                        </form> 
                                    </form>
                                </div>  
                            @endif

                        </div>
                    </div>
                @endforeach

                <div class="text-right"> 
                    <button onclick="ajax_submit_jawaban();" type="button" class="btn btn-primary btn-sm mb-2"> Submit </button>
                    <a href="{{ route('survei.evaluasi.read') }}" class="btn btn-danger btn-sm mb-2"> Kembali </a>
                </div>

            </div> 
        </div>

    </div> 

<script> 

    let id_evaluasi = "{{ $evaluasi->id }}";
     function ajax_submit_jawaban(){ 
        $(".jawaban-div").each(function(){ 

            let id_pertanyaan   = $(this).find("input[name=id_pertanyaan]").val();  
            let jenis_jawaban   = $(this).find("input[name=jenis_jawaban]").val(); 
            let jawaban         = "";  

            switch (jenis_jawaban) {
                case "Jawaban Teks":
                        jawaban         = $(this).find("textarea[name=jawaban]").val();  
                    break;
                case "Pilihan Berganda":
                        jawaban         = $(this).find("input[type=radio]:checked").val();  
                    break;
                case "Kotak Centang": 
                        $.each($(this).find("input[type=checkbox]:checked"), function(){
                            jawaban = jawaban +","+ $(this).val();
                        }); 
                    break; 
            }

            if(jawaban == ""){ 
                jawaban = "Tidak dijawab";
            }
 
            let form = $(this).find("#form-upload-file")[0];
            let data_upload = new FormData(form);     
            data_upload.append('id_survei', id_evaluasi);
            data_upload.append('jawaban', jawaban);
            data_upload.append('id_pertanyaan', id_pertanyaan);  

            $.ajax({  
                async: false,
                url: '/survei/ajax-submit-jawaban',
                data: data_upload,  
                type: 'POST',
                contentType: false, 
                processData: false,
                cache: false,
                success: function(res){  
                },
                error: function(e){
                    alert(e);
                },
            });
        });

        $("#universal-modal").modal("show");
        $("#universal-modal").find("#judul-h5").text("Berhasil Dikirim!");
        $("#universal-modal").find("#paragraf-p").html("Anda berhasil mengirim lembar evaluasi.");
        $("#universal-modal").find("#tutup-btn").remove();
        $("#universal-modal").find("#aksi-btn").attr("href", "");
        $("#universal-modal").find("#aksi-btn").text("Keluar");
        $("#universal-modal").find("#aksi-btn").attr("href", "/evaluasi/read");
    }
</script>
@endsection