<?php

namespace App\Services;

use App\User;
use App\Jobs\User\WelcomeNewUserJob;

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
        dispatch(new WelcomeNewUserJob($user))
            ->delay(now()->addSeconds(10));
    }
}
