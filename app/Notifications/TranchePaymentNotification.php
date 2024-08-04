<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TranchePaymentNotification extends Notification
{
    use Queueable;

    public $tranche;
    /**
     * Create a new notification instance.
     */
    public function __construct($tranche)
    {
        $this->tranche = $tranche;
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
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        $link = route('user_tranche',['filter'=>'paid']);
        $reference = "<a href='$link' class='text-secondary'>#Tranche" . $this->tranche->id. "</a>";

        $message = "Vous venez de payer ".format_money($this->tranche->amount). " comptant pour le paiement de la ".$reference;

        return [
            'message' => $message,
            'notif_type'=> 'alert',
        ];
    }
}
