<?php

namespace App\Mail\User;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserInvoiceEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * User Details.
     *
     * @var $user
     */
    public $user;

    /**
     * WelcomeAfterRegistration constructor.
     *
     * @param $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('johnflix@mail.com')
            ->view('emails.user.user_invoice')
            ->with(['user' => $this->user]);
    }
}
