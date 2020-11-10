<?php

namespace App\Services;

use App\Jobs\user\UserWelcomeEmail;

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
        dispatch(new UserWelcomeEmail($user))
            ->delay(now()->addSeconds(2));
    }
}
