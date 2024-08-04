<x-guest-layout>

    <x-slot name="title" >Connexion</x-slot>

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card mt-4">

                <div class="card-body p-4">
                    <div class="text-center mt-2">
                        <h5 class="text-primary">Bienvenue !</h5>
                        <p class="text-muted">Connectez-vous pour avoir accès à votre espace.</p>
                    </div>
                    <div class="p-2 mt-4">
                        <form action="{{route('login')}}" method="POST" >
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" value="{{old('email')}}" class="form-control" id="email" placeholder="Entrer votre mail">
                                @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="float-end">
                                    <a href="{{ route('password.request') }}" class="text-muted">Mot de passe oublié?</a>
                                </div>
                                <label class="form-label" for="password-input">Mot de passe</label>
                                <div class="position-relative auth-pass-inputgroup mb-3">
                                    <input name="password" type="password" class="form-control pe-5 password-input" placeholder="Entrer votre mot de passe" id="password-input">
                                    <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                </div>
                                @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <button class="btn btn-success w-100" type="submit">Se connecter</button>
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
