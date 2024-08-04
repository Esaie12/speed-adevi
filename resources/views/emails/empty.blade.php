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
                        <h5>Bonjour ,</h5>

                        <p>Un client vient de vous laisser un message à travers le formulaire de contact 🌟</p>

                        <p>
                            <b>Son nom : </b>
                        </p>
                        <p>
                            <b>Son mail : </b>
                        </p>
                        <p>
                            <b>Son message : </b>
                        </p>

                        <p><i class="fas fa-hourglass-half"></i>Cordialement,
                        </p>
                        <p><i class="fas fa-hourglass-half"></i>L'équipe Creator Studio.
                        </p>

                    </td>
                </tr>
            </table>
        </td>
    </tr>
@endsection
