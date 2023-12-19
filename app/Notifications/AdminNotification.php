<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AdminNotification extends Notification
{
    use Queueable;
    public $user;

    /**
     * Create a new notification instance.
     */
    public function __construct($user)
    {
         $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'user_id' => $this->user['id'],
            'name' => $this->user['name'],
        ];
    }

    public function middleware()
    {
        return [new AdminMiddleware];
    }
}
