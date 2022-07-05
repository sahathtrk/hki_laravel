<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\Anak;
use App\Models\Grejawi;
use App\Models\PendidikanFormal;
use App\Models\PendidikanInformal;
use App\Models\SuamiIstri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    # ██ FUNGSI MENAMPILKAN LAMAN PROFIL - MENU DATA DATA
    public function profil(){

        return view('app/profil/profil');
    }

    # ██ FUNGSI MENAMPILKAN LAMAN DATA ANAK
    public function data_anak_create(Request $request){ 

        $notifikasi_create = "";  

        if ($request->method() == 'POST'){

            $anak = new Anak();

            $tanggal_lahir =date_create($request->tanggal_lahir);
            $tanggal_lahir_format = date_format($tanggal_lahir,"Y-m-d");
            
            $anak->nama_lengkap     = $request->nama_lengkap;
            $anak->jenis_kelamin    = $request->jenis_kelamin;
            $anak->tanggal_lahir    = $tanggal_lahir_format;
            $anak->tempat_lahir     = $request->tempat_lahir;
            $anak->anak_ke          = $request->anak_ke;
            $anak->tinggi_badan     = $request->tinggi_badan;
            $anak->berat_badan      = $request->berat_badan;
            $anak->golongan_darah   = $request->golongan_darah;
            $anak->hobby            = $request->hobby;
            $anak->email            = $request->email;
            $anak->media_sosial     = $request->media_sosial;
            $anak->akun_id     = id_akun_session();

            if($request->hasFile('foto')){
                $file = $request->file('foto');
                $file->move('anak/foto/', $file->getClientOriginalName());
                $anak->foto           = 'anak/foto/'.$file->getClientOriginalName();
            } else {
                $anak->foto = 'anak/foto/anak-404.jpg';
            }

            $anak_saved = $anak->save();

            if($anak_saved){
                $notifikasi_create = "success";
            } else {
                $notifikasi_create = "failed";
            }
        }

        $context = [
            'notifikasi_create' => $notifikasi_create, 
        ];

        return view('app/profil/data-anak-create', $context);
    }

    public function data_anak_read(){

        $anaks = Anak::all();

        $context = [
            'anaks' => $anaks,
        ];

        return view('app/profil/data-anak-read', $context);
    }

    public function data_anak_update(Request $request, $id){
        
        $notifikasi_update = "";  
        $anak = Anak::where('id', $id)->first();

        if ($request->method() == 'POST'){ 

            $tanggal_lahir          = date_create($request->tanggal_lahir);
            $tanggal_lahir_format   = date_format($tanggal_lahir,"Y-m-d");
            
            $anak->nama_lengkap     = $request->nama_lengkap;
            $anak->jenis_kelamin    = $request->jenis_kelamin;
            $anak->tanggal_lahir    = $tanggal_lahir_format;
            $anak->tempat_lahir     = $request->tempat_lahir;
            $anak->anak_ke          = $request->anak_ke;
            $anak->tinggi_badan     = $request->tinggi_badan;
            $anak->berat_badan      = $request->berat_badan;
            $anak->golongan_darah   = $request->golongan_darah;
            $anak->hobby            = $request->hobby;
            $anak->email            = $request->email;
            $anak->media_sosial     = $request->media_sosial;

            if($request->hasFile('foto')){
                $file = $request->file('foto');
                $file->move('anak/foto/', $file->getClientOriginalName());
                $anak->foto           = 'anak/foto/'.$file->getClientOriginalName();
            }  

            $anak_saved = $anak->save();

            if($anak_saved){
                $notifikasi_update = "success";
            } else {
                $notifikasi_update = "failed";
            }
        }

        $context = [
            'notifikasi_update' => $notifikasi_update, 
            'anak'              => $anak,
        ];

        return view('app/profil/data-anak-update', $context);
    }

    public function data_anak_delete($id){
        Anak::where('id', $id)->delete();
        return redirect()->back();
    }

    # ██ FUNGSI MENAMPILKAN LAMAN DATA GREJAWI
    public function data_grejawi(Request $request){

        $notifikasi_update = "";
        $grejawi_exists = Grejawi::where('akun_id', id_akun_session())->exists();
        if(!$grejawi_exists){
            generate_data_grejawi(id_akun_session());
        } 

        $grejawi = Grejawi::where('akun_id', id_akun_session())->first();

        if ($request->method() == 'POST'){
            
            $grejawi->tempat_baptis     = $request->tempat_baptis;
            $grejawi->tanggal_baptis    = date_format(date_create($request->tanggal_baptis),"Y-m-d"); 
            $grejawi->tempat_sidi       = $request->tempat_sidi;
            $grejawi->tanggal_sidi      = date_format(date_create($request->tanggal_sidi),"Y-m-d"); 
            $grejawi->tempat_menikah    = $request->tempat_menikah;
            $grejawi->tanggal_menikah   = date_format(date_create($request->tanggal_menikah),"Y-m-d");
            $grejawi->tempat_tahbisan   = $request->tempat_tahbisan;
            $grejawi->tanggal_tahbisan  = date_format(date_create($request->tanggal_tahbisan),"Y-m-d");
            $grejawi_saved = $grejawi->save();

            if($grejawi_saved){
                $notifikasi_update = "success";
            } else {
                $notifikasi_update = "failed";
            }
            
        }

        $context = [
            'notifikasi_update' => $notifikasi_update,
            'grejawi'           => $grejawi,
        ];

        return view('app/profil/data-grejawi', $context);
    }

    # ██ FUNGSI MENAMPILKAN LAMAN PENDIDIKAN FORMAL
    public function data_pendidikan_formal(Request $request){

        $notifikasi_update = "";
        $pendidikan_formal_exists = PendidikanFormal::where('akun_id', id_akun_session())->exists();
        if(!$pendidikan_formal_exists){
            generate_data_pendidikan_formal(id_akun_session());
        }

        $pendidikan_formal = PendidikanFormal::where('akun_id', id_akun_session())->first();

        if ($request->method() == 'POST') { 
            
            $pendidikan_formal->sekolah_dasar           = $request->sekolah_dasar;
            $pendidikan_formal->tahun_masuk_sd          = $request->tahun_masuk_sd;
            $pendidikan_formal->tahun_selesai_sd        = $request->tahun_selesai_sd;
            $pendidikan_formal->sekolah_menengah_pertama= $request->sekolah_menengah_pertama;
            $pendidikan_formal->tahun_masuk_smp         = $request->tahun_masuk_smp;
            $pendidikan_formal->tahun_selesai_smp       = $request->tahun_selesai_smp;
            $pendidikan_formal->sekolah_menengah_atas   = $request->sekolah_menengah_atas;
            $pendidikan_formal->tahun_masuk_sma         = $request->tahun_masuk_sma;
            $pendidikan_formal->tahun_selesai_sma       = $request->tahun_selesai_sma;

            $pendidikan_formal_saved = $pendidikan_formal->save();

            if($pendidikan_formal_saved){
                $notifikasi_update = "success";
            } else {
                $notifikasi_update = "failed";
            }
            
        }

        $context = [
            'notifikasi_update' => $notifikasi_update,
            'pendidikan_formal' => $pendidikan_formal,
        ];

        return view('app/profil/data-pendidikan-formal', $context);
    }

    # ------------------------------------------------------------------------------------

    # ██ FUNGSI MENAMPILKAN LAMAN PENDIDIKAN INFORMAL
    public function data_pendidikan_informal(){

        $pendidikan_informal_exists = PendidikanInformal::where('akun_id', id_akun_session())->exists();
        if(!$pendidikan_informal_exists){
            generate_data_pendidikan_informal(id_akun_session());
        }

        $pendidikan_informals = PendidikanInformal::where('akun_id', id_akun_session())->get();
        $pendidikan_informals_count = PendidikanInformal::where('akun_id', id_akun_session())->count();

        $context =[
            'pendidikan_informals'          => $pendidikan_informals,
            'pendidikan_informals_count'    => $pendidikan_informals_count,
        ];

        return view('app/profil/data-pendidikan-informal', $context);
    }

    # ██ FUNGSI AJAX DATA PENDIDIKAN INFORMAL REFRESH (DELETE ALL)
    public function ajax_data_pendidikan_informal_refresh(){
        PendidikanInformal::where( 'akun_id', id_akun_session())->delete();
    }

    # ██ FUNGSI AJAX DATA PENDIDIKAN INFORMAL DELETE
    public function ajax_data_pendidikan_informal_delete(Request $request){ 
        $id_pendidikan_informal = $request->id_pendidikan_informal; 
        PendidikanInformal::where("id", $id_pendidikan_informal)->delete();
    }
    
    # ██ FUNGSI AJAX DATA PENDIDIKAN INFORMAL CREATE
    public function ajax_data_pendidikan_informal_create(Request $request){

        $notifikasi_create = "";
 
        $pendidikan_informal = new PendidikanInformal();
        $pendidikan_informal->jenis_pendidikan_informal = $request->jenis_pendidikan_informal;
        $pendidikan_informal->tanggal_kegiatan_program = $request->tanggal_kegiatan_program;
        $pendidikan_informal->tempat_kegiatan_program = $request->tempat_kegiatan_program;
        $pendidikan_informal->akun_id = id_akun_session();
        
        $pendidikan_informal_saved = $pendidikan_informal->save();

        if($pendidikan_informal_saved){
            $notifikasi_create = "success";
        } else {
            $notifikasi_create = "failed";
        }
             

        return response()->json([
            'notifikasi_create'     => $notifikasi_create, 
        ]);
    }

    # ------------------------------------------------------------------------------------

    # ██ FUNGSI MENAMPILKAN AKUN PRIBADI
    public function data_pribadi(Request $request){

        $notifikasi_update = "";
        $akun = Akun::where('id', id_akun_session())->first();

        if ($request->method() == 'POST') {
            
            $tanggal_lahir =date_create($request->tanggal_lahir);
            $tanggal_lahir_format = date_format($tanggal_lahir,"Y-m-d");
            
            $akun->nama_lengkap     = $request->nama_lengkap;
            $akun->nik              = $request->nik;
            $akun->jenis_kelamin    = $request->jenis_kelamin;
            $akun->tanggal_lahir    = $tanggal_lahir_format;
            $akun->tempat_lahir     = $request->tempat_lahir;
            $akun->alamat           = $request->alamat;
            $akun->nama_ibu         = $request->nama_ibu;
            $akun->nama_ayah        = $request->nama_ayah;
            $akun->tinggi_badan     = $request->tinggi_badan;
            $akun->berat_badan      = $request->berat_badan;
            $akun->golongan_darah   = $request->golongan_darah;
            $akun->hobby            = $request->hobby;
            $akun->no_hp            = $request->no_hp;
            $akun->email            = $request->email;
            $akun->tipe_akun        = $request->tipe_akun;
            $akun->media_sosial     = $request->media_sosial;
            $akun->username         = $request->username;
            
            if($request->password != null){
                $akun->password = Hash::make($request->password);
            }

            if($request->hasFile('foto')){
                $file = $request->file('foto');
                $file->move('akun/foto/', $file->getClientOriginalName());
                $akun->foto           = 'akun/foto/'.$file->getClientOriginalName();
            } 

            $akun_saved = $akun->save();

            if($akun_saved){
                $notifikasi_update = "success";
            } else {
                $notifikasi_update = "failed";
            }

        }

        $context = [
            'akun'  => $akun,
            'notifikasi_update' => $notifikasi_update,
        ];

        return view('app/profil/data-pribadi', $context);
    }

    # ██ FUNGSI MENAMPILKAN DATA SUAMI ISTRI
    public function data_suami_istri(Request $request){

        $notifikasi_update = "";
        $suami_istri_exists = SuamiIstri::where('akun_id', id_akun_session())->exists();
        if(!$suami_istri_exists){
            generate_data_suami_istri(id_akun_session());
        } 

        $suami_istri = SuamiIstri::where('akun_id', id_akun_session())->first();

        if ($request->method() == 'POST') {

            $tanggal_lahir =date_create($request->tanggal_lahir);
            $tanggal_lahir_format = date_format($tanggal_lahir,"Y-m-d");
             
            $suami_istri->nama_lengkap  = $request->nama_lengkap;
            $suami_istri->nik           = $request->nik;
            $suami_istri->jenis_kelamin = $request->jenis_kelamin;
            $suami_istri->tanggal_lahir = $tanggal_lahir_format;
            $suami_istri->tempat_lahir  = $request->tempat_lahir;
            $suami_istri->alamat        = $request->alamat;
            $suami_istri->nama_ibu      = $request->nama_ibu;
            $suami_istri->nama_ayah     = $request->nama_ayah;
            $suami_istri->tinggi_badan  = $request->tinggi_badan;
            $suami_istri->berat_badan   = $request->berat_badan;
            $suami_istri->golongan_darah= $request->golongan_darah;
            $suami_istri->hobby         = $request->hobby;
            $suami_istri->no_hp         = $request->no_hp;
            $suami_istri->email         = $request->email;
            $suami_istri->media_sosial  = $request->media_sosial;
            
            if($request->hasFile('foto')){
                $file = $request->file('foto');
                $file->move('suami-istri/foto/', $file->getClientOriginalName());
                $suami_istri->foto           = 'suami-istri/foto/'.$file->getClientOriginalName();
            }  

            $suami_istri_saved = $suami_istri->save();

            if ($suami_istri_saved) {
                $notifikasi_update = "success";
            } else {
                $notifikasi_update = "failed";
            }

        }

        $context = [
            'notifikasi_update' => $notifikasi_update,
            'suami_istri'       => $suami_istri,
        ];

        return view('app/profil/data-suami-istri', $context);
    }

    public function ajax_foto_pribadi_update(Request $request){

        $akun         = Akun::where('id', id_akun_session())->first();

        if ($request->method() == "POST") { 
            
            if($request->hasFile('foto')){
                $file = $request->file('foto');
                $file->move('akun/foto/', $file->getClientOriginalName());
                $akun->foto           = 'akun/foto/'.$file->getClientOriginalName();
            }  

            $akun->save();
        }   

        return response()->json([
            'url_fp'  => $akun->foto,  
        ]);
    }

    public function ajax_foto_anak_update(Request $request){

        $anak         = Anak::where('akun_id', id_akun_session())->first();

        if ($request->method() == "POST") { 
            
            if($request->hasFile('foto')){
                $file = $request->file('foto');
                $file->move('anak/foto/', $file->getClientOriginalName());
                $anak->foto           = 'anak/foto/'.$file->getClientOriginalName();
            }  

            $anak->save();
        }   

        return response()->json([
            'url_fp'  => $anak->foto,  
        ]);
    }

    public function ajax_foto_suami_istri_update(Request $request){

        $suami_istri         = SuamiIstri::where('akun_id', id_akun_session())->first();

        if ($request->method() == "POST") { 
            
            if($request->hasFile('foto')){
                $file = $request->file('foto');
                $file->move('suami-istri/foto/', $file->getClientOriginalName());
                $suami_istri->foto           = 'suami-istri/foto/'.$file->getClientOriginalName();
            }  

            $suami_istri->save();
        }   

        return response()->json([
            'url_fp'  => $suami_istri->foto,  
        ]);
    }
}
