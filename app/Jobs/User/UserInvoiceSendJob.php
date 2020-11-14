<?php

namespace App\Jobs\User;

use App\User;
use Illuminate\Bus\Queueable;
use App\Mail\User\UserInvoiceEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserInvoiceSendJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * User details.
     *
     * @var $user
     */
    public $user;

    /**
     * UserWelcomeEmailJob constructor.
     *
     * @param $user
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->user->email)
            ->send(new UserInvoiceEmail($this->user));
    }
}
