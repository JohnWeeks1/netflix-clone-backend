<?php

namespace App\Services;

use App\User;
use App\Jobs\User\UserWelcomeEmailJob;

class MailService
{
    /**
     * Dispatch welcome email to user.
     *
     * @param User $user
     *
     * @return void
     */
    public function welcomeNewUser(User $user): void
    {
        dispatch(new UserWelcomeEmailJob($user))
            ->onQueue('emails')
            ->delay(now()->addSeconds(5));
    }
}
