@extends('auth.auth-base')
@section('judul-halaman', 'Reset Password')
@section('konten')
    <div class="card index-card">
        <div class="card-body text-center form-side">
            
            <a href="Dashboard.Default.html">
                <img src="{{ asset('img/logo/logo.png') }}" width="200" >
            </a> 
            
            <div class="row d-flex justify-content-center align-items-center">
                <div class="" style="width:300px;">       
                    <form action="{{ route('auth.reset.password') }}" autocomplete="off" method="post">
                        {{ csrf_field() }}
                        
                        <h5 class="mb-4"><strong>Reset Password</strong></h5>  
                        
                        @if ($notifikasi_reset == "success")
                            <div class="alert alert-success alert-dismissible fade show rounded mb-0" role="alert">
                                <strong>Berhasil!</strong> E-mail password baru untuk akun Anda telah terkirim. Cek segera ya!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @elseif ($notifikasi_reset == "failed")
                            <div class="alert alert-danger alert-dismissible fade show rounded mb-0" role="alert">
                                <strong>Gagal!</strong> Mohon cek kembali username atau e-mail yang Anda masukan. Karena saat ini belum tersedia.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div> 
                        @endif

                        <!-- USERNAME/EMAIL -->
                        <label class="form-group has-float-label mb-4 mt-4">
                            <input type="text" class="form-control" name="username_email" id="username_email" placeholder="Masukan username/email...">
                            <span>Username/E-Mail</span> 
                        </label>

                        <!-- TOMBOL -->   
                        <button class="btn btn-primary btn-lg btn-shadow" type="submit">Reset Password</button><br><br>
                        <a href="{{ route('auth.log.in') }}">Kembali</a>

                    </form> 
                </div>
            </div>
        </div>
    </div>
@endsection