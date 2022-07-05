@extends('auth.auth-base')
@section('judul-halaman', 'Registrasi Akun')
@section('konten')
    <div class="card index-card">
        <div class="card-body text-center form-side">
            <a href="Dashboard.Default.html">
                <img src="{{ asset('img/logo/logo.png') }}" width="200" >
            </a> 
            
            <div class="row d-flex justify-content-center align-items-center">
                <div class="" style="width:400px;">    
                    <form action="{{ route('auth.registrasi') }}" method="post" autocomplete="off"> 
                        {{ csrf_field() }}

                        <h5 class="mb-4"><strong>Registrasi Akun</strong></h5>  
                        
                        @if ($notifikasi_create == "success")
                            <div class="alert alert-success alert-dismissible fade show rounded mb-0" role="alert">
                                <strong>Berhasil!</strong> E-mail aktivasi untuk akun Anda telah terkirim. Cek segera ya!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @elseif ($notifikasi_create == "failed")
                            <div class="alert alert-danger alert-dismissible fade show rounded mb-0" role="alert">
                                <strong>Gagal!</strong> Mohon cek kembali username dan password yang Anda masukan.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @elseif ($notifikasi_create == "email_already")
                            <div class="alert alert-danger alert-dismissible fade show rounded mb-0" role="alert">
                                <strong>Gagal!</strong> E-mail yang Anda masukan sudah tersedia.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @elseif ($notifikasi_create == "username_already")
                            <div class="alert alert-danger alert-dismissible fade show rounded mb-0" role="alert">
                                <strong>Gagal!</strong> Username yang Anda masukan sudah tersedia.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>  
                        @endif

                        <!-- NAMA LENGKAP -->
                        <label class="form-group has-float-label mb-4 mt-4">
                            <input required type="text" class="form-control" name="nama_lengkap" id="nama-lengkap" placeholder="Masukan nama lengkap...">
                            <span>Nama Lengkap</span>
                        </label> 
    
                        <!-- TANGGAL LAHIR -->
                        <label class="form-group has-float-label mb-4">
                            <input required type="text" class="form-control datepicker" name="tanggal_lahir" id="tanggal-lahir" placeholder="Masukan Tanggal lahir...">
                            <span>Tanggal Lahir</span>
                        </label>  
    
                        <!-- TEMPAT LAHIR -->
                        <label class="form-group has-float-label mb-4">
                            <input required type="text" class="form-control" name="tempat_lahir" id="tempat-lahir" placeholder="Masukan Tempat lahir...">
                            <span>Tempat Lahir</span>
                        </label>   
    
                        <!-- ALMAAT -->
                        <label class="form-group has-float-label mb-4">
                            <textarea required class="form-control" name="alamat" placeholder="Masukan alamat..."></textarea>
                            <span>Alamat</span>
                        </label> 

                        <!-- NO. HP -->
                        <label class="form-group has-float-label mb-4">
                            <input required type="text" class="form-control" name="no_hp" id="no-hp" placeholder="Masukan no. hp...">
                            <span>No. HP</span>
                        </label>
    
                        <!-- E-MAIL -->
                        <label class="form-group has-float-label mb-4">
                            <input required type="text" class="form-control" name="email" id="email" placeholder="Masukan e-mail...">
                            <span>E-Mail</span>
                        </label>

                        <!-- TIPE AKUN -->  
                        <label class="form-group has-float-label mb-4">
                            <select required name="tipe_akun" class="form-control">
                                <option value="Pimpinan Jemaat">Pimpinan Jemaat</option>
                                <option value="Pimpinan Daerah">Pimpinan Daerah</option>
                                <option value="Pimpinan Ressort">Pimpinan Ressort</option>
                            </select>
                            <span>Tipe Akun</span>
                        </label> 
    
                        <!-- USERNAME -->  
                        <label class="form-group has-float-label mb-4">
                            <input required type="text" class="form-control" name="username" id="media-sosial" placeholder="Masukan username...">
                            <span>Username</span>
                        </label> 

                        <!-- PASSWORD -->  
                        <label class="form-group has-float-label mb-4">
                            <input required type="text" class="form-control" name="password" id="media-sosial" placeholder="Masukan password...">
                            <span>Password</span>
                        </label> 
                        
                        <!-- TOMBOL -->  
                        <div class="d-flex justify-content-end align-items-center">
                            <button class="btn btn-primary btn-lg btn-shadow" type="submit">Registrasi</button>&nbsp;&nbsp;
                            <a href="{{ route('auth.log.in') }}" class="btn btn-danger btn-lg btn-shadow text-white">Kembali</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
  
@endsection