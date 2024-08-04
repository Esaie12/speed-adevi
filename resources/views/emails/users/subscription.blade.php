@extends('emails.template_email')
@section('body')
    <tr>
        <td class="body" width="100%" cellpadding="0" cellspacing="0"
            style="-premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%; background-color: #edf2f7; border-bottom: 1px solid #edf2f7; border-top: 1px solid #edf2f7; margin: 0; padding: 0; width: 100%; border: hidden !important;">
            <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation"
                style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 570px; background-color: #ffffff; border-color: #e8e5ef; border-radius: 2px; border-width: 1px; box-shadow: 0 2px 0 rgba(0, 0, 150, 0.025), 2px 4px 0 rgba(0, 0, 150, 0.015); margin: 0 auto; padding: 0; width: 570px;">
                <!-- Body content -->
                <tr>
                    <td class="content-cell" style="max-width: 100vw; padding: 32px;">
                        <h5>Bonjour {{$subscription->user->firstname." ".$subscription->user->lastname }},</h5>
                        <p>
                            Nous sommes heureux de vous confirmer la réception de votre abonnement à notre service. Merci pour votre confiance en [Nom de votre entreprise] ! 🌟
                        </p>

                        <p>
                            Voici les détails de votre abonnement <b>#{{$subscription->reference}}</b> : <br>

                            - Montant total de l'abonnement : <b>{{ format_money( $subscription->amount) }}</b> <br>
                            - Durée de l'abonnement : <b>{{$subscription->cursus->nombre_year}} Ans</b> <br>
                            - Mode de paiement : Paiement en tranches avec intervalle de  <b> {{$subscription->cursus->duree_mensuelle}} mois </b> <br>
                        </p>
                        <p>
                            Votre abonnement sera réglé en plusieurs tranches comme suit : <br>

                            @foreach ($tranches as $key=> $tranche)
                            - Tranche {{$key+1}} :  <b>{{ format_money( $subscription->cursus->forfait_mensuel) }}</b> à payer avant le {{$tranche['formatted_date']}} <br>
                            @endforeach
                        </p>
                        <p>
                            Pour chaque paiement, vous recevrez un rappel à l'approche de la date d'échéance. Vous pouvez effectuer vos paiements en ligne via notre portail sécurisé [Lien vers le portail de paiement] ou choisir une autre méthode de paiement qui vous convient.
                        </p>
                        <p>
                            Si vous avez des questions concernant votre abonnement ou le processus de paiement, n'hésitez pas à nous contacter à [Adresse email de contact] ou au [Numéro de téléphone de contact]. Nous sommes là pour vous aider et nous assurer que vous avez la meilleure expérience possible.
                        </p>
                        <p>
                            Nous vous remercions encore une fois pour votre abonnement et nous sommes impatients de vous offrir un service de qualité.
                        </p>

                        <p>
                            <i class="fas fa-hourglass-half"></i>Cordialement,
                        </p>
                        <p>
                            <i class="fas fa-hourglass-half"></i>L'équipe de ADEVI
                        </p>

                    </td>
                </tr>
            </table>
        </td>
    </tr>
@endsection
