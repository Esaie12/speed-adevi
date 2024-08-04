<x-guest-layout>

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card mt-4">

                <div class="card-body p-4">
                    <div class="text-center mt-2">
                        <h5 class="text-primary">Mot de passe oublié?</h5>
                        <p class="text-muted">Reinitialiser votre mot de passe avec ADEVI</p>

                        <lord-icon src="https://cdn.lordicon.com/rhvddzym.json" trigger="loop" colors="primary:#0ab39c" class="avatar-xl"></lord-icon>

                    </div>

                    <div class="alert border-0 alert-warning text-center mb-2 mx-2" role="alert">
                        Entrez votre adresse e-mail et les instructions vous seront envoyées !
                    </div>
                    <div class="p-2">
                        @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                        <form action="{{ route('password.request') }}" method="POST">
                            @csrf

                            <div class="mb-4">
                                <label class="form-label">Entrer le mail</label>
                                <input type="email" name="email" value="{{old('email')}}" class="form-control" id="email" placeholder="Entrer votre mail">
                                @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>

                            <div class="text-center mt-4">
                                <button class="btn btn-success w-100" type="submit">Envoyer la demande</button>
                            </div>
                        </form><!-- end form -->
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
