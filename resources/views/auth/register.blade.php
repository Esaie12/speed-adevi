<x-guest-layout>

    <x-slot name="title" >Inscription</x-slot>

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card mt-4">

                <div class="card-body p-4">
                    <div class="text-center mt-2">
                        <h5 class="text-primary">Créer un compte</h5>
                        <p class="text-muted">Commencer une nouvelle avanture avec nous</p>
                    </div>
                    <div class="p-2 mt-4">
                        <form class="needs-validation" method="POST" novalidate action="{{route('register')}}">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Nom <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="lastname" value="{{old('lastname')}}" id="name" placeholder="Entrer  votre nom" required>
                                <div class="invalid-feedback">
                                   Veuillez entrer votre nom
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="username" class="form-label">Prénoms <span class="text-danger">*</span></label>
                                <input type="text" class="form-control"  name="firstname" value="{{old('firstname')}}" id="username" placeholder="Entrer  vos prénoms" required>
                                <div class="invalid-feedback">
                                   Veuillez entrer vos prénoms
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="useremail" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" value="{{old('email')}}" class="form-control" id="useremail" placeholder="Entrer votre mail" required>
                                <div class="invalid-feedback">
                                    Veuillez entrer votre email
                                </div>
                            </div>


                            <div class="mb-3">
                                <label class="form-label" for="password-input">Mot de passe</label>
                                <div class="position-relative auth-pass-inputgroup">
                                    <input type="password" name="password" class="form-control pe-5 password-input" onpaste="return false" placeholder="Entrer votre password" id="password-input" aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                    <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                    <div class="invalid-feedback">
                                        Veuillez entrer votre mot de passe
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <p class="mb-0 fs-12 text-muted fst-italic">J'accepte les  <a href="#" class="text-primary text-decoration-underline fst-normal fw-medium">conditions et terms d'utilisation</a></p>
                            </div>

                            <div id="password-contain" class="p-3 bg-light mb-2 rounded">
                                <h5 class="fs-13">Le mot de passe doit contenir :</h5>
                                <p id="pass-length" class="invalid fs-12 mb-2">Au moins <b>8 caractères</b></p>
                                <p id="pass-lower" class="invalid fs-12 mb-2">Au moins une <b>lettre minuscule</b> (a-z)</p>
                                <p id="pass-upper" class="invalid fs-12 mb-2">Au moins une <b>lettre majuscule</b> (A-Z)</p>
                                <p id="pass-number" class="invalid fs-12 mb-0">Au moins un <b>chiffre</b> (0-9)</p>
                            </div>

                            <div class="mt-4">
                                <button class="btn btn-success w-100" type="submit">Inscription</button>
                            </div>
                        </form>

                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

            <div class="mt-4 text-center">
                <p class="mb-0">Vous avez deja un compte? <a href="{{route('login')}}" class="fw-semibold text-primary text-decoration-underline"> Se connecter</a> </p>
            </div>

        </div>
    </div>

</x-guest-layout>
