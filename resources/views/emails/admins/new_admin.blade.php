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
                        <h5>Bonjour {{$user->firstname}} {{$user->lastname}},</h5>

                        <p>Nous sommes heureux de vous informer que vous avez été ajouté en tant qu'administrateur sur notre plateforme {{env('APP_NAME')}}.</p>

                        <p>Vous pouvez vous connecter en utilisant les informations suivantes :</p>
                        <ul>
                            <li><strong>Nom d'utilisateur :</strong> {{$user->email}} </li>
                            <li><strong>Mot de passe :</strong> {{$mdp}}</li>
                        </ul>

                        <p>Pour vous connecter, veuillez suivre ce lien : <a href="{{route('login')}}">Cliquer ici {{route('login')}} </a></p>

                        <p>Nous vous recommandons de changer votre mot de passe après votre première connexion pour des raisons de sécurité.</p>

                        <p>Si vous avez des questions ou avez besoin d'aide, n'hésitez pas à nous contacter.</p>


                        <p>Bien cordialement,</p>

                        <p><i class="fas fa-hourglass-half"></i>L'équipe ADEVI
                        </p>

                    </td>
                </tr>
            </table>
        </td>
    </tr>
@endsection
