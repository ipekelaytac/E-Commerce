<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
class UserRecordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public function __construct(user $user)
    {
     $this->user=$user;

    }


    public function build()
    {
        return $this
        ->subject(config('app.name').' - kullanıcı kaydı')
        ->view('mails.user_record');
    }
}
