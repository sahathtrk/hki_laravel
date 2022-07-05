<?php

use App\Http\Controllers\AkunController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\SurveiController;
use App\Models\Akun;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::any('/auth/registrasi', [AuthController::class, 'registrasi'])->name('auth.registrasi');
Route::any('/auth/{id}/aktivasi', [AuthController::class, 'aktivasi'])->name('auth.aktivasi');
Route::any('/auth/log-in', [AuthController::class, 'log_in'])->name('auth.log.in');
Route::any('/auth/reset-password', [AuthController::class, 'reset_password'])->name('auth.reset.password');

Route::middleware(['akun_auth'])->group(function () { 

    # ⣿⣿⣿⣿⣿⣿⣿⣿⣿ PROFIL 
    Route::any('/profil', [ProfilController::class, 'profil'])->name('profil');
    Route::any('/profil/data-anak/create', [ProfilController::class, 'data_anak_create'])->name('profil.data.anak.create');
    Route::any('/profil/data-anak/read', [ProfilController::class, 'data_anak_read'])->name('profil.data.anak.read');
    Route::any('/profil/data-anak/{id}/update', [ProfilController::class, 'data_anak_update'])->name('profil.data.anak.update');
    Route::any('/profil/data-anak/{id}/delete', [ProfilController::class, 'data_anak_delete'])->name('profil.data.anak.delete');
    Route::any('/profil/data-grejawi', [ProfilController::class, 'data_grejawi'])->name('profil.data.grejawi');
    Route::any('/profil/data-pendidikan-formal', [ProfilController::class, 'data_pendidikan_formal'])->name('profil.data.pendidikan.formal');
    Route::any('/profil/data-pendidikan-informal', [ProfilController::class, 'data_pendidikan_informal'])->name('profil.data.pendidikan.informal');
    Route::any('/profil/data-pendidikan-informal/ajax-data-pendidikan-informal-refresh', [ProfilController::class, 'ajax_data_pendidikan_informal_refresh'])->name('profil.ajax.data.pendidikan.informal.refresh');
    Route::any('/profil/data-pendidikan-informal/ajax-data-pendidikan-informal-create', [ProfilController::class, 'ajax_data_pendidikan_informal_create'])->name('profil.ajax.data.pendidikan.informal.create');
    Route::any('/profil/data-pendidikan-informal/ajax-data-pendidikan-informal-delete', [ProfilController::class, 'ajax_data_pendidikan_informal_delete'])->name('profil.ajax.data.pendidikan.informal.delete');
    Route::any('/profil/data-pribadi', [ProfilController::class, 'data_pribadi'])->name('profil.data.pribadi');
    Route::any('/profil/data-suami-istri', [ProfilController::class, 'data_suami_istri'])->name('profil.data.suami.istri');
    Route::any('/profil/ajax-foto-pribadi-update', [ProfilController::class, 'ajax_foto_pribadi_update'])->name('ajax.foto.pribadi.update');
    Route::any('/profil/ajax-foto-anak-update', [ProfilController::class, 'ajax_foto_anak_update'])->name('ajax.foto.anak.update');
    Route::any('/profil/ajax-foto-suami-istri-update', [ProfilController::class, 'ajax_foto_suami_istri_update'])->name('ajax.foto.suami.istri.update');

    # ⣿⣿⣿⣿⣿⣿⣿⣿⣿ PELAYANAN
    Route::any('/pelayanan/read', [SurveiController::class, 'pelayanan_read'])->name('survei.pelayanan.read');
    Route::any('/pelayanan/create', [SurveiController::class, 'pelayanan_create'])->name('survei.pelayanan.create');
    Route::any('/pelayanan/{id}/update', [SurveiController::class, 'pelayanan_update'])->name('survei.pelayanan.update');
    Route::any('/pelayanan/{id}/submit', [SurveiController::class, 'pelayanan_submit'])->name('survei.pelayanan.submit');
    Route::any('/pelayanan/{id}/delete', [SurveiController::class, 'pelayanan_delete'])->name('survei.pelayanan.delete');
    Route::any('/pelayanan/{id_pelayanan}/{id_akun}/detail-rekap', [SurveiController::class, 'pelayanan_detail_rekap'])->name('survei.pelayanan.detail.rekap');
    Route::any('/pelayanan/rekap/{id_pelayanan}/read', [SurveiController::class, 'pelayanan_rekap'])->name('survei.pelayanan.rekap');
    Route::any('/pelayanan/rekap/{id_pelayanan}/{id_akun}/delete', [SurveiController::class, 'pelayanan_jawaban_delete'])->name('survei.pelayanan.jawaban.delete');
    
    
    # ⣿⣿⣿⣿⣿⣿⣿⣿⣿ EVALUASI 
    Route::any('/evaluasi/read', [SurveiController::class, 'evaluasi_read'])->name('survei.evaluasi.read');
    Route::any('/evaluasi/create', [SurveiController::class, 'evaluasi_create'])->name('survei.evaluasi.create');
    Route::any('/evaluasi/{id}/update', [SurveiController::class, 'evaluasi_update'])->name('survei.evaluasi.update');
    Route::any('/evaluasi/{id}/submit', [SurveiController::class, 'evaluasi_submit'])->name('survei.evaluasi.submit');
    Route::any('/evaluasi/{id}/delete', [SurveiController::class, 'evaluasi_delete'])->name('survei.evaluasi.delete');
    Route::any('/evaluasi/{id_evaluasi}/{id_akun}/detail-rekap', [SurveiController::class, 'evaluasi_detail_rekap'])->name('survei.evaluasi.detail.rekap');
    Route::any('/evaluasi/rekap/{id_pelayanan}/read', [SurveiController::class, 'evaluasi_rekap'])->name('survei.evaluasi.rekap');
    Route::any('/evaluasi/rekap/{id_evaluasi}/{id_akun}/delete', [SurveiController::class, 'evaluasi_jawaban_delete'])->name('survei.evaluasi.jawaban.delete');
    
    # ⣿⣿⣿⣿⣿⣿⣿⣿⣿ AJAX 
    Route::any('/survei/ajax-pertanyaan-create', [SurveiController::class, 'ajax_pertanyaan_create'])->name('survei.ajax.pertanyaan.create');
    Route::any('/survei/ajax-pertanyaan-refresh', [SurveiController::class, 'ajax_pertanyaan_refresh'])->name('survei.ajax.pertanyaan.refresh');
    Route::any('/survei/ajax-pertanyaan-delete', [SurveiController::class, 'ajax_pertanyaan_delete'])->name('survei.ajax.pertanyaan.delete');
    Route::any('/survei/ajax-survei-update', [SurveiController::class, 'ajax_survei_update'])->name('survei.ajax.survei.update');
    Route::any('/survei/ajax-submit-jawaban', [SurveiController::class, 'ajax_submit_jawaban'])->name('survei.ajax.submit.jawaban');

    # ⣿⣿⣿⣿⣿⣿⣿⣿⣿ DOKUMEN
    Route::any('/dok/read', [DokumenController::class, 'read'])->name('dokumen.read');
    Route::any('/dok/create', [DokumenController::class, 'create'])->name('dokumen.create');
    Route::any('/dok/{id}/update', [DokumenController::class, 'update'])->name('dokumen.update');
    Route::any('/dok/{id}/preview', [DokumenController::class, 'preview'])->name('dokumen.preview');
    Route::any('/dok/{id}/delete', [DokumenController::class, 'delete'])->name('dokumen.delete');

    # ⣿⣿⣿⣿⣿⣿⣿⣿⣿ AKUN
    Route::any('/akun/read', [AkunController::class, 'read'])->name('akun.read'); 
    Route::any('/akun/{id}/delete', [AkunController::class, 'delete'])->name('akun.delete');
    Route::any('/akun/{id}/data-pribadi', [AkunController::class, 'pribadi'])->name('akun.pribadi');
    Route::any('/akun/{id}/data-anak/read', [AkunController::class, 'anak_read'])->name('akun.anak.read');
    Route::any('/akun/{id}/data-anak/detail', [AkunController::class, 'anak_detail'])->name('akun.anak.detail'); 
    Route::any('/akun/{id}/data-grejawi', [AkunController::class, 'grejawi'])->name('akun.grejawi');
    Route::any('/akun/{id}/data-pendidikan-formal', [AkunController::class, 'pendidikan_formal'])->name('akun.pendidikan.formal');
    Route::any('/akun/{id}/data-pendidikan-informal', [AkunController::class, 'pendidikan_informal'])->name('akun.pendidikan.informal'); 
    Route::any('/akun/{id}/data-suami-istri', [AkunController::class, 'suami_istri'])->name('akun.suami.istri');

    Route::any('/log-out', [AuthController::class, 'log_out'])->name('auth.log.out');
});