<?php

namespace App\Notifications\Slack;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\SlackMessage;

class UserRegisteredSlackNotification extends Notification
{
    use Queueable;

    /**
     * The user.
     *
     * @var User
     */
    protected $user;

    /**
     * UserRegisteredSlackNotification constructor.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     *
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack'];
    }


    /**
     * To Slack.
     *
     * @param $notifiable
     *
     * @return SlackMessage
     */
    public function toSlack($notifiable)
    {
        return (new SlackMessage)
            ->content('New user called ' . $this->user->firstname . ' registered!');
    }
}
