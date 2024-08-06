<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewAdminNotification extends Notification
{
    use Queueable;

    public $user , $mdp;
    /**
     * Create a new notification instance.
     */
    public function __construct($user , $mdp)
    {
        $this->user = $user;
        $this->mdp = $mdp;
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
        ->subject("Félicitation, vous etes maintenant un administrateur de ADEVI")
        ->view('emails.admins.new_admin',[
            'user'=>$this->user,
            'mdp'=>$this->mdp
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
