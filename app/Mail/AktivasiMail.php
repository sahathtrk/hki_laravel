<?php

namespace App\Mail;

use App\Models\Akun;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AktivasiMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Akun $akun)
    {
        $this->akun = $akun;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@hki-huriakristenindonesia.com')
            ->view('auth/aktivasi-mail-html')
            ->with(
            [
                'id'                => $this->akun->id,
                'nama_lengkap'      => $this->akun->nama_lengkap,
            ]);
    }
}
