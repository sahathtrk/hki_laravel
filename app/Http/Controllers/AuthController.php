<?php

namespace App\Http\Controllers;

use App\Mail\AktivasiMail;
use App\Models\Akun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    # ██ MENAMPILKAN LAMAN REGISTRASI
    public function registrasi(Request $request){

        $notifikasi_create = "";

        if ($request->method() == 'POST') {
            if(username_akun_unik($request->username) == false){
                if(email_akun_unik($request->email) == false){

                    $tanggal_lahir =date_create($request->tanggal_lahir);
                    $tanggal_lahir_format = date_format($tanggal_lahir,"Y-m-d");

                    $akun = new Akun();
                    $akun->nama_lengkap     = $request->nama_lengkap;
                    $akun->tanggal_lahir    = $tanggal_lahir_format; 
                    $akun->tempat_lahir     = $request->tempat_lahir; 
                    $akun->alamat           = $request->alamat; 
                    $akun->no_hp            = $request->no_hp; 
                    $akun->email            = $request->email; 
                    $akun->tipe_akun        = $request->tipe_akun; 
                    $akun->username         = $request->username; 
                    $akun->password         = Hash::make($request->password); 
                    $akun->aktivasi         = false; 
                    $akun->foto             = "akun/foto/foto-404.jpg"; 
                    $akun_saved             = $akun->save();

                    if($akun_saved){
                        Mail::to($akun->email)->send(new AktivasiMail($akun));
                        $notifikasi_create = "success";
                    } else {
                        $notifikasi_create = "failed";
                    }
                    
                } else {
                    $notifikasi_create = "email_already";
                }
            } else {
                $notifikasi_create = "username_already";
            }
        }

        $context = [
            'notifikasi_create' => $notifikasi_create,
        ];

        return view('auth/registrasi', $context);
    }

    # ██ MENAMPILKAN LAMAN LOGIN
    public function log_in(Request $request){
        $notifikasi_login = "";

        if ($request->method() == 'POST') {

            $username_email = $request->username_email;
            $password       = $request->password;
            $remember       = $request->remember; 

            if(status_akun($username_email) == true){
                if(akun_auth($request, $username_email, $password, $remember) == True){ 
                     $akun = Akun::where('id', id_akun_session())->first();
                     if($akun->tipe_akun == "Admin"){
                        return redirect()->route('akun.read');
                     } else {
                        return redirect()->route('profil');
                     }
                    
                } else {
                    $notifikasi_login = "failed";
                }
            } else {
                $notifikasi_login = "inactive";
            }
        }

        $context = [
            'notifikasi_login' => $notifikasi_login,
        ];

        return view('auth/login', $context);
    }

    # ██ FUNGSI LOG OUT
    public function log_out(Request $request){
        $request->session()->forget('id_akun');
        return redirect()->route('auth.log.in');
    }

    # ██ MENAMPILKAN LAMAN RESET PASSWORD
    public function reset_password(Request $request){

        $notifikasi_reset = "";

        if ($request->method() == 'POST') {
            
            $sent = reset_password_akun($request, $request->username_email);
            if($sent == true){
                $notifikasi_reset = "success";
            } else {
                $notifikasi_reset = "failed";
            }
        }

        $context = [
            'notifikasi_reset' => $notifikasi_reset,
        ];

        return view('auth/reset-password', $context);
    }

    public function aktivasi($id){
        $akun = Akun::where("id", $id)->first();
        $akun->aktivasi = true;
        $akun->save();
        return redirect()->route("auth.log.in")->with("aktivasi", "success");
    }
}
