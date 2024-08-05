<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MakeDonationNotification extends Notification
{
    use Queueable;

    public $don , $ligne;
    /**
     * Create a new notification instance.
     */
    public function __construct($dons , $ligne)
    {
        $this->don = $dons;
        $this->ligne = $ligne;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
        ->subject("Dons reçu pour la collecte du dons de :".$this->don->title )
        ->view('emails.users.donate.thanks',[
            'collect'=>$this->don,
            'ligne'=>$this->ligne
        ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        $link = route('show_dons_collects', $this->don->slug);
        $reference = "<a href='$link' class='text-secondary'>" . $this->don->title . "</a>";

        $message = "Merci pour votre participation à la collecte du dons de : ".$reference;

        return [
            'message' => $message,
            'notif_type'=> 'alert',
        ];
    }
}
