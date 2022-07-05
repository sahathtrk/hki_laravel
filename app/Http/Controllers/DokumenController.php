<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;

class DokumenController extends Controller
{
    public function create(Request $request){

        $notifikasi_create = "";

        if($request->method() == "POST"){

            $dokumen = new Dokumen();
            $dokumen->judul = $request->judul;
            $dokumen->deskripsi = $request->deskripsi;

            if($request->hasFile('file')){
                $file = $request->file('file');
                $file->move('dokumen/', $file->getClientOriginalName());
                $dokumen->file           = 'dokumen/'.$file->getClientOriginalName();
            } else {
                $dokumen->file = "dokumen/dokumen-404.pdf";
            }

            $dokumen_saved = $dokumen->save();

            if($dokumen_saved){
                $notifikasi_create = "success";
            } else {
                $notifikasi_create = "false";
            }
        }

        $context = [
            'notifikasi_create' => $notifikasi_create,
        ];

        return view('app/dokumen/create', $context);
    }

    public function read(){

        $dokumens = Dokumen::all();

        $context = [
            'dokumens'  => $dokumens,
        ];

        return view('app/dokumen/read', $context);
    }

    public function update(Request $request, $id){
        $notifikasi_update = "";
        $dokumen  = Dokumen::where('id', $id)->first();

        if($request->method() == "POST"){
 
            $dokumen->judul = $request->judul;
            $dokumen->deskripsi = $request->deskripsi;

            if($request->hasFile('file')){
                $file = $request->file('file');
                $file->move('dokumen/', $file->getClientOriginalName());
                $dokumen->file           = 'dokumen/'.$file->getClientOriginalName();
            }  

            $dokumen_saved = $dokumen->save();

            if($dokumen_saved){
                $notifikasi_update = "success";
            } else {
                $notifikasi_update = "false";
            }
        }

        $context = [
            'dokumen'           => $dokumen,
            'notifikasi_update' => $notifikasi_update,
        ];

        return view('app/dokumen/update', $context);
    }

    public function delete($id){
        Dokumen::where('id', $id)->delete();
        return redirect()->back(); 
    }

    public function preview($id){
        $dokumen = DOkumen::where('id', $id)->first();

        $context = [
            'dokumen'   => $dokumen,
        ];

        return view('app/dokumen/preview', $context);
    }
}
