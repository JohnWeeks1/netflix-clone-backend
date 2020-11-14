<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use App\Jobs\User\UserInvoiceSendJob;

class UserInvoice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:user-invoice {user_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send user invoice';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user_id = $this->argument('user_id');
        $user = User::find($user_id);

        dispatch(new UserInvoiceSendJob($user))
            ->onQueue('emails')
            ->delay(now()->addSeconds(5));

        $this->info('User with the id: ' . $user_id . ' has been sent');
    }
}
