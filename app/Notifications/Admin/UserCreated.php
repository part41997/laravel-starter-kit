<?php

namespace App\Notifications\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserCreated extends Notification
{
    use Queueable;

    /**
     * @var string
     */
    protected $token;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var string
     */
    protected $resetPasswordUrl;

    /**
     * Create a new notification instance.
     */
    public function __construct($token, $password)
    {
        $this->token = $token;
        $this->password = $password;

        // Reset password url
        $this->resetPasswordUrl = route('password.reset',[
            'token' => $this->token,
            'email' => request()->email,
        ]);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Welcome to ' . config('app.name'))
            ->markdown('mail.user.created', [
                'token' => $this->token,
                'password' => $this->password,
                'user' => $notifiable,
                'resetPasswordUrl' => $this->resetPasswordUrl,
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
