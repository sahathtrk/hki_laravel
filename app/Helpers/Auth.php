<?php

use App\Mail\ResetPasswordMail;
use App\Models\Akun;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

# ██ FUNGSI CEK USERNAME AKUN UNIK
function username_akun_unik($username){
    
    # ██ INISIALISASI
    $akuns = Akun::all();

    foreach ($akuns as $akun) {
        if ($akun->username == $username) {
            return true;
            break;
        }  
    }

    return false; 
}

# ██ FUNGSI CEK EMAIL AKUN UNIK
function email_akun_unik($email){
    
    # ██ INISIALISASI
    $akuns = Akun::all();

    foreach ($akuns as $akun) {
        if ($akun->email == $email) {
            return true;
            break;
        }  
    }

    return false; 
}

# ██ FUNGSI AKUN AUTHENTICATION
function akun_auth(Request $request, $username_email, $password, $remember){ 

    if (filter_var($username_email, FILTER_VALIDATE_EMAIL) && email_akun_unik($username_email) == true) {
        $akun_first = Akun::where('email', $username_email)->first();
        if(Hash::check($password, $akun_first->password)){
            
            // ██ STORING id_akun
            $request->session()->put('id_akun', $akun_first->id);

            if($remember === null){
                setcookie('username_email', $username_email, 100);
                setcookie('password', $password,100);
             } else {
                setcookie('username_email', $username_email, time()+60*60*24*100);
                setcookie('password', $password, time()+60*60*24*100); 
             }

            return true;
        } 

    } elseif (username_akun_unik($username_email) == true) {
        $akun_first = Akun::where('username', $username_email)->first();
        if(Hash::check($password, $akun_first->password)){

            // ██ STORING id_akun
            $request->session()->put('id_akun', $akun_first->id);
            
            if($remember === null){
                setcookie('username_email', $username_email, 100);
                setcookie('password', $password,100);
             } else {
                setcookie('username_email', $username_email, time()+60*60*24*100);
                setcookie('password', $password, time()+60*60*24*100); 
             }
             
            return true;
        }
    } else {
        return false;
    }

    return false;
} 

# ██ FUNGSI CEK STATUS AKUN
function status_akun($username_email){

    $aktivasi = false;
    $akuns = Akun::all();

    if (filter_var($username_email, FILTER_VALIDATE_EMAIL) && email_akun_unik($username_email) == true){
        
        foreach ($akuns as $key => $akun) {
            if($akun->email == $username_email && $akun->aktivasi == true){
                $aktivasi = true;
                return $aktivasi;
                break;
            }  
        }


    }elseif (username_akun_unik($username_email) == true) {

        foreach ($akuns as $key => $akun) {
            if($akun->username == $username_email && $akun->aktivasi == true){
                $aktivasi = true;
                return $aktivasi;
                break;
            }  
        } 

    } else {
        return $aktivasi;
    }
}

# ██ FUNGSI MENGAMBIL ID AKUN
function id_akun_session(){
    $id_akun = Session::get('id_akun');
    return $id_akun;
}

function nama_akun_session(){
    $id_akun = Session::get('id_akun');
    $akun = Akun::where('id', $id_akun)->first();
    return $akun->nama_lengkap;
}

function foto_akun_session(){
    $id_akun = Session::get('id_akun');
    $akun = Akun::where('id', $id_akun)->first();
    return $akun->foto;
}
 
# ██ FUNGSI RETURN TIPE AKUN
function hak_akses_penuh($id){

    $akun = Akun::where('id', $id)->first();
    $tipe_akun = $akun->tipe_akun;
    $hak_akses_penuh = false;

    if($tipe_akun == "Admin"){
        $hak_akses_penuh = true;
    } else {
        $hak_akses_penuh = false;
    }

    return $hak_akses_penuh;
}

# ██ FUNGSI RESET PASWORD AKUN
function reset_password_akun(Request $request, $username_email){
 

    if (filter_var($username_email, FILTER_VALIDATE_EMAIL) && email_akun_unik($username_email) == true) {
        $akun_first = Akun::where('email', $username_email)->first();
        
        $day            = Carbon::now()->format('d');
        $month          = Carbon::now()->format('m');
        $year           = Carbon::now()->format('Y');
        $random_str     = Str::random(2);  
        $password_baru  = $day.$month.$year.$random_str;
 
        Mail::to($akun_first->email)->send(new ResetPasswordMail($akun_first, $password_baru)); 
        $akun_first->password = Hash::make($password_baru);
        $akun_first->save();
        return true; 

    } elseif (username_akun_unik($username_email) == true) {
        $akun_first = Akun::where('username', $username_email)->first();

        $day            = Carbon::now()->format('d');
        $month          = Carbon::now()->format('m');
        $year           = Carbon::now()->format('Y');
        $random_str     = Str::random(2);  
        $password_baru  = $day.$month.$year.$random_str;
 
        Mail::to($akun_first->email)->send(new ResetPasswordMail($akun_first, $password_baru)); 
        $akun_first->password = Hash::make($password_baru);
        $akun_first->save();
        return true; 
        
    } else {
        return false;
    }

     
}