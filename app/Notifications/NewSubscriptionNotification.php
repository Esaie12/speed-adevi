<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewSubscriptionNotification extends Notification
{
    use Queueable;

    public $subscription , $tranches;
    /**
     * Create a new notification instance.
     */
    public function __construct($subscription , $tranches)
    {
        $this->subscription = $subscription;
        $this->tranches = $tranches;
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
        ->subject("Felicitation ! vous venez de souscire à un abonnement de ".format_money($this->subscription->amount) )
        ->view('emails.users.subscription',[
            'subscription'=>  $this->subscription,
            'tranches'=> $this->tranches
        ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
       // $serviceLink = route('admin_show_reservation', encrypt($this->reservation->id));
        //$serviceReference = "<a href='$serviceLink' class='text-secondary'>".$this->reservation->user_session." Voir ses retours.</a>";
        //$message = "Le client vient de faire le retour après livraison concernant la réservation RES-".$serviceReference;

        $link = route('user_subscription_show', encrypt($this->subscription->id));
        $reference = "<a href='$link' class='text-secondary'>#" . $this->subscription->reference . "</a>";

        $message = "Vous venez de souscire à un abonnement: ".$reference;

        return [
            'message' => $message,
            'notif_type'=> 'alert',
        ];
    }
}
