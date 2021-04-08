<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class approveanggota extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($anggota)
    {
        $this->anggota = $anggota;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this->from('umkm@gmail.com','database UMKM')
        ->subject('Notifikasi Approval Anggota UMKM')
        ->view('emails.approval')
        ->with($this->anggota);
    }
}
