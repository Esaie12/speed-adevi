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

                        <p>Nous sommes heureux de vous informer que les kits scolaires pour la classe de <b>{{ $classe->classe->name  }}</b> , inclus dans votre abonnement <b>#{{$subscription->reference}}</b>, ont été expédiés. 🌟</p>

                        <p>
                            <b>Détails de l'expédition : </b> <br>
                            - Adresse de livraison : [Adresse du Client] <br>
                            - Date d'expédition : <b>{{date('Y-m-d')}}</b> <br>
                        </p>
                        <p>
                            Nous espérons que ce kit répondra à vos attentes et facilitera la rentrée scolaire de votre enfant.
                            <br> <br>
                            Si vous avez des questions ou des préoccupations concernant cette expédition, n'hésitez pas à nous contacter à [Votre Adresse Email] ou au [Votre Numéro de Téléphone].

                        </p>
                        <p>
                            Merci de votre confiance et de votre fidélité.
                        </p>

                        <p><i class="fas fa-hourglass-half"></i>Cordialement,
                        </p>
                        <p><i class="fas fa-hourglass-half"></i>L'équipe d'ADEVI
                        </p>

                    </td>
                </tr>
            </table>
        </td>
    </tr>
@endsection
