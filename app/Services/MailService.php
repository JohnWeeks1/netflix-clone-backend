<?php

namespace App\Services;

use App\Jobs\User\WelcomeNewUserJob;

class MailService
{
    /**
     * Dispatch welcome email to user.
     *
     * @param $user
     *
     * @return void
     */
    public function welcomeNewUser($user): void
    {
        dispatch(new WelcomeNewUserJob($user))
            ->delay(now()->addSeconds(10));
    }
}
