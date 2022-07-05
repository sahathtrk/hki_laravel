@extends('auth.auth-base')
@section('judul-halaman', 'Log In')
@section('konten')
    <div class="card index-card">
        <div class="card-body text-center form-side">
            
            <a href="Dashboard.Default.html">
                <img src="{{ asset('img/logo/logo.png') }}" width="200" >
            </a> 
            
            <div class="row d-flex justify-content-center align-items-center">
                <div class="" style="width:300px;">       
                    <form action="{{ route('auth.log.in') }}" method="post">
                        {{ csrf_field() }}
                        
                        <h5 class="mb-4"><strong>Log In</strong></h5>  
                        
                        @if (session("aktivasi") == "success")
                            <div class="alert alert-success alert-dismissible fade show rounded mb-0" role="alert">
                                <strong>Berhasil!</strong> Akun Anda berhasil diaktivasi, silahkan Log-In!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @elseif ($notifikasi_login == "failed")
                        <div class="alert alert-danger alert-dismissible fade show rounded mb-0" role="alert">
                            <strong>Gagal!</strong> Mohon cek kembali username atau e-mail yang Anda masukan. Karena saat ini belum tersedia.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div> 
                        @elseif ($notifikasi_login == "inactive")
                            <div class="alert alert-danger alert-dismissible fade show rounded mb-0" role="alert">
                                <strong>Gagal!</strong> Akun Anda sedang tidak aktif, silahkan lakukan Aktivasi.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div> 
                        @endif

                        <!-- USERNAME/EMAIL -->
                        <label class="form-group has-float-label mb-4 mt-4">
                            <input type="text" class="form-control" name="username_email" id="username-email" placeholder="Masukan username/email...">
                            <span>Username/E-Mail</span>
                        </label> 
    
                        <!-- TANGGAL LAHIR -->
                        <label class="form-group has-float-label mb-4">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Masukan password...">
                            <span>Password</span>
                        </label>   
                        
                        <div class="d-flex justify-content-end align-items-center">
                            <div class="custom-control custom-checkbox mb-4">
                                <input type="checkbox" class="custom-control-input" checked name="rememberme" id="remember-me">
                                <label class="custom-control-label" for="remember-me">Remember Me</label>
                            </div>
                        </div>
                        <!-- TOMBOL -->   
                        <button class="btn btn-primary btn-lg btn-shadow w-100" type="submit">Log In</button><br><br>
                        <a href="{{ route('auth.registrasi') }}" class="btn btn-secondary btn-lg btn-shadow w-100" type="submit">Registrasi</a><br><br>
                        <a href="{{ route('auth.reset.password') }}">Lupa Password</a>

                    </form> 
                </div>
            </div>
        </div>
    </div>
@endsection