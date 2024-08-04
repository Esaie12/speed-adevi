<x-guest-layout>

    <x-slot name="title" >Connexion</x-slot>

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card mt-4">

                <div class="card-body p-4">
                    <div class="text-center mt-2">
                        <h5 class="text-primary">Vérification de l'adresse email !</h5>
                        <p class="text-muted">Connectez-vous pour avoir accès à votre espace.</p>
                    </div>
                    <div class="p-2 mt-4">

                        <form action="{{ route('verification.send') }}" method="POST" >
                            @csrf

                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    Verifiez, vous venez de recevoir un nouveau mail
                                </div>
                            @endif
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('Un nouveau lien de vérification a été envoyé à votre adresse électronique.') }}
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="call-to-action__caption">
                                        <h6 class="text-muted" >Vous venez de vous inscrire avec l'email {{ Auth::user()->email }}</h6>

                                        <p class="text-muted my-3 text-center">
                                            Veuiller confirmer votre inscription. Vérifier vos
                                            e-mails, vous devriez avoir reçu un lien de vérification. <br> <br>
                                            Si vous n'avez pas reçu l'e-mail, cliquez sur ce bouton.
                                        </p>
                                    </div>
                                </div>
                            </div>


                            <div class="mt-4">
                                <button class="btn btn-success w-100" type="submit">Renvoyer le mail</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

            <div class="mt-4 text-center">
                <p class="mb-0">Je n'ai pas un compte ? <a href="{{route('register')}}" class="fw-semibold text-primary text-decoration-underline">S'inscrire </a> </p>
            </div>

        </div>
    </div>

</x-guest-layout>
