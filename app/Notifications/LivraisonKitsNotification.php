<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LivraisonKitsNotification extends Notification
{
    use Queueable;

    public $subscription , $classe;
    /**
     * Create a new notification instance.
     */
    public function __construct($subscription , $classe)
    {
        $this->subscription = $subscription;
        $this->classe = $classe;
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
        $objet = "Votre abonnement ".$this->subscription->reference. " - Expédition des kits scolaires pour la classe de ".$this->classe->classe->name;

        return (new MailMessage)
        ->subject($objet)
        ->view('emails.users.livraison_kits',[
            'subscription'=>$this->subscription,
            'classe'=> $this->classe
        ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        $link = route('user_subscription_show', encrypt($this->subscription->id));
        $reference = "<a href='$link' class='text-secondary'> la classe de" . $this->classe->classe->name . "</a>";

        $message = "Vos kits scolaire pour  ".$reference." vient d'etre livrer";

        return [
            'message' => $message,
            'notif_type'=> 'alert',
        ];
    }
}
