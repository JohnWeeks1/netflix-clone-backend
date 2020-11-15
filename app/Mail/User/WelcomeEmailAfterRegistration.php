<?php

namespace App\Mail\User;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeEmailAfterRegistration extends Mailable
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
     * @param User $user
     */
    public function __construct(User $user)
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
            ->view('emails.user.welcome_email_after_registration')
            ->with(['user' => $this->user]);
    }
}
