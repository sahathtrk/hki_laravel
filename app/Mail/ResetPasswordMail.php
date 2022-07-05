<?php

namespace App\Mail;

use App\Models\Akun;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Akun $akun, $password_baru)
    {
        $this->akun = $akun;
        $this->password_baru = $password_baru;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@hki-huriakristenindonesia.com')
                   ->view('auth/reset-password-mail-html')
                   ->with(
                    [
                        'nama'              => $this->akun->nama, 
                        'password_baru'     => $this->password_baru,
                    ]);
    }
}
