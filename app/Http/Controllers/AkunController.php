<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\Anak;
use App\Models\Grejawi;
use App\Models\PendidikanFormal;
use App\Models\PendidikanInformal;
use App\Models\SuamiIstri;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    # ██ FUNGSI MENAMPILKAN DATA SEMUA AKUN
    public function read(){

        $akuns = Akun::all();

        $context = [
            'akuns' => $akuns,
        ];

        return view('app/akun/read', $context);
    }

    # ██ FUNGSI MENAMPILKAN DETAIL AKUN
    public function pribadi($id){

        $akun = Akun::where('id', $id)->first();
        
        $context = [
            'akun'  => $akun,
        ];

        return view('app/akun/data-pribadi', $context);
    }

    # ██ FUNGSI MENAMPILKAN DETAIL ANAK
    public function anak_detail($id){ 

        $anak = Anak::where('akun_id', $id)->first();
        return view('app/akun/data-anak', ['anak' => $anak]);

    }

    # ██ FUNGSI MENAMPILKAN LIST ANAK
    public function anak_read($id){

        $anaks = Anak::where('akun_id', $id)->get();

        $context = [
            'anaks' => $anaks,
        ];

        return view('app/akun/data-anak-read', $context);
    } 

    # ██ FUNGSI MENAMPILKAN DETAIL GREJAWI
    public function grejawi($id){

        $grejawi_exists = Grejawi::where('akun_id', $id)->exists();
        if($grejawi_exists == null){
            generate_data_grejawi($id);
        }

        $grejawi = Grejawi::where('akun_id', $id)->first();
        return view('app/akun/data-grejawi', ['grejawi' => $grejawi]);
        
    }

    # ██ FUNGSI MENAMPILKAN DETAIL PENDIDIKAN FORMAL
    public function pendidikan_formal($id){
        
        $pendidikan_formal_exists = PendidikanFormal::where('akun_id', $id)->exists();
        if($pendidikan_formal_exists == null){
            generate_data_pendidikan_formal($id);
        }

        $pendidikan_formal = PendidikanFormal::where('akun_id', $id)->first();
        return view('app/akun/data-pendidikan-formal', ['pendidikan_formal' => $pendidikan_formal]);
        
    }

    # ██ FUNGSI MENAMPILKAN DETAIL PENDIDIKAN INFORMAL
    public function pendidikan_informal($id){

        $pendidikan_informal_exists = PendidikanInformal::where('akun_id', $id)->exists();
        if($pendidikan_informal_exists == null){
            generate_data_pendidikan_informal($id);
        }

        $pendidikan_informals = PendidikanInformal::where('akun_id', $id)->get();
        $pendidikan_informals_count = PendidikanInformal::where('akun_id', $id)->count();

        $context =[
            'pendidikan_informals'          => $pendidikan_informals,
            'pendidikan_informals_count'    => $pendidikan_informals_count,
        ];
        return view('app/akun/data-pendidikan-informal', $context);

    }

    # ██ FUNGSI MENAMPILKAN DETAIL SUAMI ISTRI
    public function suami_istri($id){

        $suami_istri_exists = SuamiIstri::where('akun_id', $id)->exists();
        if($suami_istri_exists == null){
            generate_data_suami_istri($id);
        }

        $suami_istri = SuamiIstri::where('akun_id', $id)->first();
        return view('app/akun/data-suami-istri', ['suami_istri' => $suami_istri]);

    }

    # ██ FUNGSI DELETE
    public function delete($id){
        Akun::where('id', $id)->delete();
        return redirect()->back();
    }
}
