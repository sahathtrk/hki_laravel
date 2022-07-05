<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\Pertanyaan;
use App\Models\Survei;
use Database\Factories\PertanyaanFactory;
use Illuminate\Http\Request;

class SurveiController extends Controller
{
    # ⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿
    # ⣿⣿⣿⣿⣿⣿⣿⣿⣿ EVALUASI 
    # ⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿

    # ██ FUNGSI CREATE EVALUASI
    public function evaluasi_create(Request $request){

        $evaluasis = Survei::where('kategori', 'Evaluasi')->get();
        $notifikasi_create = "";

        if ($request->method() == 'POST') {

            $evaluasi               = new Survei();
            $evaluasi->judul        = $request->judul;
            $evaluasi->deskripsi    = $request->deskripsi;
            $evaluasi->kategori     = $request->kategori;
            $evaluasi->akun_id      = id_akun_session();
            $evaluasi_saved = $evaluasi->save();

            if($evaluasi_saved){
                $notifikasi_create = "success";
                return redirect()->route('survei.evaluasi.update', $evaluasi->id)->with('notifikasi_create', $notifikasi_create);
            } else {
                $notifikasi_create = "failed";
            }
        } 

        $context = [
            'evaluasis' => $evaluasis,
            'notifikasi_create' => $notifikasi_create,
        ];

        return view('app/evaluasi/create', $context);
    }

    # ██ FUNGSI UPDATE EVALUASI
    public function evaluasi_update($id){

        $evaluasi     = Survei::where('id', $id)->first();
        $pertanyaans  = Pertanyaan::where('survei_id', $id)->get();
        $notifikasi_create = "";

        $context = [ 
            'id_survei'         => $id,
            'evaluasi'          => $evaluasi,
            'pertanyaans'       => $pertanyaans,
            'notifikasi_create' => $notifikasi_create,
        ];

        return view('app/evaluasi/update', $context);
    }

    # ██ FUNGSI READ EVALUASI
    public function evaluasi_read(){
        $evaluasis      = Survei::where('kategori', 'Lembar Evaluasi')->paginate(5);
        $pertanyaans    = Pertanyaan::all();
        $jawabans = Jawaban::all();

        $context = [
            'jawabans'       => $jawabans,
            'pertanyaans'   => $pertanyaans,
            'evaluasis' => $evaluasis,
        ];

        return view('app/evaluasi/read', $context);
    }

    # ██ FUNGSI REKAP
    public function evaluasi_rekap($id_evaluasi){
        
        $jawabans       = Jawaban::where('survei_id', $id_evaluasi)
                                ->select('survei_id')
                                ->distinct() 
                                ->addSelect('akun_id') 
                                ->get();
        $jawabans_tanpa_distinct = Jawaban::all();
 
        $context=[
            'jawabans_tanpa_distinct'   => $jawabans_tanpa_distinct,
            'jawabans'                  => $jawabans, 
        ];

        return view('app/evaluasi/rekap', $context);
    }

    # ██ FUNGSI DETAIL REKAP
    public function evaluasi_detail_rekap($id_evaluasi, $id_akun){

        $evaluasi       = Survei::where('id', $id_evaluasi)->first();
        $pertanyaans    = Pertanyaan::where('survei_id', $id_evaluasi)->get();
        $jawabans       = Jawaban::all();

        $context=[
            'id_akun'       => $id_akun,
            'evaluasi'      => $evaluasi,
            'pertanyaans'    => $pertanyaans,
            'jawabans'       => $jawabans,
        ];

        return view('app/evaluasi/detail-rekap', $context);
    }

    # ██ FUNGSI SUBMIT EVALUASI
    public function evaluasi_submit($id){

        $notifikasi_submit = "";
        $pertanyaans = Pertanyaan::where('survei_id', $id)->get();
        $evaluasi    = Survei::where("id",$id)->first(); 
        
        $context = [
            'evaluasi'          => $evaluasi,
            'notifikasi_submit' => $notifikasi_submit,
            'pertanyaans'       => $pertanyaans, 
        ];

        return view('app/evaluasi/submit', $context);
    }

    public function evaluasi_delete($id){
        Survei::where('id', $id)->delete();
        return redirect()->back();
    }

    public function evaluasi_jawaban_delete($id_survei, $id_akun){
        Jawaban::where('survei_id', $id_survei)->where('akun_id', $id_akun)->delete();
        return redirect()->back();
    }

    # ⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿
    # ⣿⣿⣿⣿⣿⣿⣿⣿⣿ PELAYANAN 
    # ⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿

    # ██ FUNGSI CREATE PELAYANAN
    public function pelayanan_create(Request $request){

        $pelayanans = Survei::where('kategori', 'Laporan Pelayanan')->get();
        $notifikasi_create = "";

        if ($request->method() == 'POST') {

            $pelayanan               = new Survei();
            $pelayanan->judul        = $request->judul;
            $pelayanan->deskripsi    = $request->deskripsi;
            $pelayanan->kategori     = $request->kategori;
            $pelayanan->akun_id      = id_akun_session();
            $pelayanan_saved = $pelayanan->save();

            if($pelayanan_saved){
                $notifikasi_create = "success";
                return redirect()->route('survei.pelayanan.update', $pelayanan->id)->with('notifikasi_create', $notifikasi_create);
            } else {
                $notifikasi_create = "failed";
            }
        } 

        $context = [
            'pelayanans' => $pelayanans,
            'notifikasi_create' => $notifikasi_create,
        ];

        return view('app/pelayanan/create', $context);
    }

    # ██ FUNGSI UPDATE pelayanan
    public function pelayanan_update($id){

        $pelayanan     = Survei::where('id', $id)->first();
        $pertanyaans  = Pertanyaan::where('survei_id', $id)->get();
        $notifikasi_create = "";

        $context = [ 
            'id_survei'         => $id,
            'pelayanan'          => $pelayanan,
            'pertanyaans'       => $pertanyaans,
            'notifikasi_create' => $notifikasi_create,
        ];

        return view('app/pelayanan/update', $context);
    }

    # ██ FUNGSI READ pelayanan
    public function pelayanan_read(){
        $pelayanans      = Survei::where('kategori', 'Laporan Pelayanan')->paginate(5);
        $pertanyaans    = Pertanyaan::all();
        $jawabans = Jawaban::all();

        $context = [
            'jawabans'       => $jawabans,
            'pertanyaans'   => $pertanyaans,
            'pelayanans' => $pelayanans,
        ];

        return view('app/pelayanan/read', $context);
    }

    # ██ FUNGSI REKAP
    public function pelayanan_rekap($id_pelayanan){
        
        $jawabans       = Jawaban::where('survei_id', $id_pelayanan)
                                ->select('survei_id')
                                ->distinct() 
                                ->addSelect('akun_id') 
                                ->get();
        $jawabans_tanpa_distinct = Jawaban::all();
 
        $context=[
            'jawabans_tanpa_distinct'   => $jawabans_tanpa_distinct,
            'jawabans'                  => $jawabans, 
        ];

        return view('app/pelayanan/rekap', $context);
    }

    # ██ FUNGSI DETAIL REKAP
    public function pelayanan_detail_rekap($id_pelayanan, $id_akun){

        $pelayanan       = Survei::where('id', $id_pelayanan)->first();
        $pertanyaans    = Pertanyaan::where('survei_id', $id_pelayanan)->get();
        $jawabans       = Jawaban::all();

        $context=[
            'id_akun'       => $id_akun,
            'pelayanan'      => $pelayanan,
            'pertanyaans'    => $pertanyaans,
            'jawabans'       => $jawabans,
        ];

        return view('app/pelayanan/detail-rekap', $context);
    }

    # ██ FUNGSI SUBMIT pelayanan
    public function pelayanan_submit($id){

        $notifikasi_submit = "";
        $pertanyaans = Pertanyaan::where('survei_id', $id)->get();
        $pelayanan    = Survei::where("id",$id)->first(); 
        
        $context = [
            'pelayanan'          => $pelayanan,
            'notifikasi_submit' => $notifikasi_submit,
            'pertanyaans'       => $pertanyaans, 
        ];

        return view('app/pelayanan/submit', $context);
    }

    public function pelayanan_delete($id){
        Survei::where('id', $id)->delete();
        return redirect()->back();
    }

    public function pelayanan_jawaban_delete($id_survei, $id_akun){
        Jawaban::where('survei_id', $id_survei)->where('akun_id', $id_akun)->delete();
        return redirect()->back();
    }

    # ⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿
    # ⣿⣿⣿⣿⣿⣿⣿⣿⣿ AJAX 
    # ⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿

    # ██ FUNGSI AJAX PERTANYAAN REFRESH (DELETE ALL)
    public function ajax_pertanyaan_refresh(Request $request){ 
        Pertanyaan::where( 'survei_id', $request->id_survei)->delete();
    }

    # ██ FUNGSI AJAX PERTANYAAN DELETE
    public function ajax_pertanyaan_delete(Request $request){  
        Pertanyaan::where("id", $request->id_pertanyaan)->delete();
    }
    
    # ██ FUNGSI AJAX PERTANYAAN CREATE
    public function ajax_pertanyaan_create(Request $request){

        $notifikasi_create = ""; 
 
        $pertanyaan                 = new Pertanyaan();
        $pertanyaan->pertanyaan     = $request->pertanyaan; 
        $pertanyaan->jenis_jawaban  = $request->jenis_jawaban; 
        $pertanyaan->opsi_jawaban   = $request->grouping_opsi; 
        $pertanyaan->survei_id      = $request->id_survei;
        
        $pertanyaan_saved = $pertanyaan->save();

        if($pertanyaan_saved){
            $notifikasi_create = "success";
        } else {
            $notifikasi_create = "failed";
        }
             

        return response()->json([
            'notifikasi_create'     => $notifikasi_create, 
        ]);
    }

    # ██ FUNGSI AJAX PERBAHARUI INFO HEADER SURVEI
    public function ajax_survei_update(Request $request){

        $survei             = Survei::where("id", $request->id_survei)->first();
        $survei->judul      = $request->judul;
        $survei->deskripsi  = $request->deskripsi;
        $survei->kategori   = $request->kategori;
        $survei->save();
    
    }

    # ██ FUNGSI AJAX SUBMIT JAWABAN SURVEI
    public function ajax_submit_jawaban(Request $request){

        $jawaban                     = new Jawaban();

        if($request->hasFile('upload_file')){
            
            $file = $request->file('upload_file');
            $file->move('survei/file/', $file->getClientOriginalName());
            $jawaban->jawaban      = 'survei/file/'.$file->getClientOriginalName();

        }  else {

            $jawaban->jawaban   = $request->jawaban; 
        
        }
        
        $jawaban->pertanyaan_id      = $request->id_pertanyaan;
        $jawaban->survei_id          = $request->id_survei;
        $jawaban->akun_id            = id_akun_session();
        $jawaban->save();
    
    }


}
