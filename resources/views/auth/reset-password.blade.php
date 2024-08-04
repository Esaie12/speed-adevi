<x-guest-layout>

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card mt-4">

                <div class="card-body p-4">
                    <div class="text-center mt-2">
                        <h5 class="text-primary">Changer votre mot de passe</h5>
                        <p class="text-muted">Vous etes sur le point de modifier votre mot de passe.</p>
                    </div>

                    <div class="p-2">
                        <form action="{{ route('password.update') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $request->route('token') }}" name="token">

                            <div class="mb-3">
                                <label for="useremail" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" readonly value="{{ $request->email }}" class="form-control" id="useremail" placeholder="Entrer votre mail" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="password-input">Mot de passe</label>
                                <div class="position-relative auth-pass-inputgroup">
                                    <input type="password" class="form-control pe-5 password-input" name="password" onpaste="return true" placeholder="Enter password" id="password-input" aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                    <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="confirm-password-input">Confirmer votre mot de passe</label>
                                <div class="position-relative auth-pass-inputgroup mb-3">
                                    <input type="password" class="form-control pe-5 password-input" name="password_confirmation" onpaste="return true" placeholder="Confirmer votre mot de passe" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  required>
                                    <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" ><i class="ri-eye-fill align-middle"></i></button>
                                </div>
                            </div>

                            <div id="password-contain" class="p-3 bg-light mb-2 rounded">
                                <h5 class="fs-13">Le mot de passe doit contenir :</h5>
                                <p id="pass-length" class="invalid fs-12 mb-2">Au moins <b>8 caractères</b></p>
                                <p id="pass-lower" class="invalid fs-12 mb-2">Au moins une <b>lettre minuscule</b> (a-z)</p>
                                <p id="pass-upper" class="invalid fs-12 mb-2">Au moins une <b>lettre majuscule</b> (A-Z)</p>
                                <p id="pass-number" class="invalid fs-12 mb-0">Au moins un <b>chiffre</b> (0-9)</p>
                            </div>

                            <div class="mt-4">
                                <button class="btn btn-success w-100" type="submit">Changer mon mot de passe</button>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

            <div class="mt-4 text-center">
                <p class="mb-0">Un instant, je viens de ma rappeler... <a href="{{route('login')}}" class="fw-semibold text-primary text-decoration-underline"> Me connecter </a> </p>
            </div>

        </div>
    </div>

</x-guest-layout>
