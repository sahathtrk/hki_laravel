<?php

# ██ FUNGSI GENERATE TABEL DATA ANAK

use App\Models\Anak;
use App\Models\Grejawi;
use App\Models\PendidikanFormal;
use App\Models\PendidikanInformal;
use App\Models\SuamiIstri;

function generate_data_anak($id_akun){
    $anak = new Anak();
    $anak->akun_id = $id_akun;
    $anak->save();
}

# ██ FUNGSI GENERATE TABEL DATA GREJAWI
function generate_data_grejawi($id_akun){
    $grejawi = new Grejawi();
    $grejawi->akun_id = $id_akun;
    $grejawi->save();
} 

# ██ FUNGSI GENERATE TABEL DATA PENDIDIKAN FORMAL
function generate_data_pendidikan_formal($id_akun){
    $pendidikan_formal = new PendidikanFormal();
    $pendidikan_formal->akun_id = $id_akun;
    $pendidikan_formal->save();
}

# ██ FUNGSI GENERATE TABEL DATA PENDIDIKAN INFORMAL
function generate_data_pendidikan_informal($id_akun){
    $pendidikan_informal = new PendidikanInformal();
    $pendidikan_informal->akun_id = $id_akun;
    $pendidikan_informal->save();
}

# ██ FUNGSI GENERATE TABEL DATA SUAMI ISTRI
function generate_data_suami_istri($id_akun){
    $suami_istri = new SuamiIstri(); 
    $suami_istri->akun_id = $id_akun;
    $suami_istri->save();
}