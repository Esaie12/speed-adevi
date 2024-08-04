<x-user-layout>

    <x-slot name="pack_make">
        active
    </x-slot>

    <x-slot name="collapsed_sub">
        show
    </x-slot>

    @push('styles')
    @endpush

    <div class="container-fluid">

        <div class="position-relative mx-n4 mt-n4">
            <div class="profile-wid-bg profile-setting-img">
                <img src="assets/images/profile-bg.jpg" class="profile-wid-img" alt="">
                <div class="overlay-content">
                    <div class="text-end p-3">
                        <div class="p-0 ms-auto rounded-circle profile-photo-edit">
                            <input id="profile-foreground-img-file-input" type="file" class="profile-foreground-img-file-input">
                            <label for="profile-foreground-img-file-input" class="profile-photo-edit btn btn-light">
                                <i class="ri-image-edit-line align-bottom me-1"></i> Change Cover
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xxl-3">
                <div class="card mt-n5">
                    <div class="card-body p-4">
                        <div class="text-center">
                            <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                                <img src="{{asset('assets/images/users/avatar-1.jpg')}}" class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image">
                                <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                    <input id="profile-img-file-input" type="file" class="profile-img-file-input">
                                    <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                        <span class="avatar-title rounded-circle bg-light text-body">
                                            <i class="ri-camera-fill"></i>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <h5 class="fs-16 mb-1">{{Auth::user()->firstname}} {{Auth::user()->lastname}}</h5>
                        </div>
                    </div>
                </div>
                <!--end card-->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-5">
                            <div class="flex-grow-1">
                                <h5 class="card-title mb-0">Profil completer à </h5>
                            </div>
                        </div>
                        @if( Auth::user()->percentage < 100)
                        <!-- danger Alert -->
                        <div class="alert alert-danger" role="alert">
                            <strong> Avant de continuer, veuillez </strong> completer les informations liés à votre profil!
                        </div>

                        @endif

                        <div class="progress animated-progress custom-progress progress-label">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: {{Auth::user()->percentage}}%" aria-valuenow="{{Auth::user()->percentage}}" aria-valuemin="0" aria-valuemax="100">
                                <div class="label">{{Auth::user()->percentage}}%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
            <div class="col-xxl-9">
                <div class="card mt-xxl-n5">
                    <div class="card-header">
                        <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                    <i class="fas fa-home"></i> Informations personnelles
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab">
                                    <i class="far fa-user"></i> Changer mot de passe
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body p-4">
                        <div class="tab-content">
                            <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                <form action="{{route('update_profil')}}" method="POST" >
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="firstnameInput" class="form-label">Nom</label>
                                                <input type="text" class="form-control" id="firstnameInput" placeholder="Entrer votre nom" name="firstname" value="{{ old('firstname',Auth::user()->firstname) }}">
                                                @error('firstname')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="lastnameInput" class="form-label">Prénoms</label>
                                                <input type="text" class="form-control" name="lastname" id="lastnameInput" placeholder="Entrer votre prénom" value="{{ old('lastname',Auth::user()->lastname) }}">
                                                @error('lastname')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="phonenumberInput" class="form-label">Numéro de telephone</label>
                                                <input name="phone" value="{{old('phone',Auth::user()->phone)}}" type="text" class="form-control" id="phonenumberInput" placeholder="Entrer votre numéro de telephone">
                                                @error('phone')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="emailInput" class="form-label">Email Address</label>
                                                <input type="email" name="email" class="form-control" id="emailInput" placeholder="Entrer votre mail" value="{{old('email',Auth::user()->email)}}">
                                                @error('email')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="designationInput" class="form-label">Profession</label>
                                                <input type="text" class="form-control" id="designationInput" name="profession" placeholder="Entrer votre profession" value="{{old('profession',Auth::user()->profession)}}">
                                                @error('profession')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="websiteInput1" class="form-label">Site web</label>
                                                <input type="text" name="website" class="form-control" id="websiteInput1" placeholder="www.example.com" value="{{old('website',Auth::user()->website)}}" />
                                                @error('website')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="cityInput" class="form-label">Pays</label>
                                                <input type="text" class="form-control" id="cityInput" placeholder="Pays" name="country" value="{{old('country',Auth::user()->country)}}" />
                                                @error('country')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="countryInput" class="form-label">Département</label>
                                                <input type="text" class="form-control" id="countryInput" placeholder="Departement" name="department" value="{{old('department',Auth::user()->department)}}" />
                                                @error('department')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="zipcodeInput" class="form-label">Adresse</label>
                                                <input type="text" class="form-control" placeholder="Entrer votre adresse" name="adresse" value="{{old('adresse',Auth::user()->adresse)}}">
                                                @error('adresse')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-12">
                                            <div class="mb-3 pb-2">
                                                <label for="exampleFormControlTextarea" class="form-label">Comment souhaiteriez-vous etre livrer </label>
                                                <textarea class="form-control" id="exampleFormControlTextarea" placeholder="Dites nous en plus" name="others" rows="3">{{old('others',Auth::user()->others)}}</textarea>
                                                @error('others')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-12">
                                            <div class="hstack gap-2 justify-content-end">
                                                <button type="submit" class="btn btn-primary">Modifier</button>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </form>
                            </div>
                            <!--end tab-pane-->
                            <div class="tab-pane" id="changePassword" role="tabpanel">
                                <form action="{{route('update_password')}}" method="POST">
                                    @csrf
                                    <div class="row g-2">
                                        <div class="col-lg-4">
                                            <div>
                                                <label for="oldpasswordInput" class="form-label">Actuel Mot de passe*</label>
                                                <input type="password" name="recent_password" class="form-control" id="oldpasswordInput" placeholder="Entrer l'actuel mot de passe">
                                                @error('recent_password')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-4">
                                            <div>
                                                <label for="newpasswordInput" class="form-label">Nouveau mot de passe*</label>
                                                <input type="password" name="new_password" class="form-control" id="newpasswordInput" placeholder="Entrer un nouveau mot de passe">
                                                @error('new_password')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-4">
                                            <div>
                                                <label for="confirmpasswordInput" class="form-label">Confirm Password*</label>
                                                <input type="password" name="confirm_password" class="form-control" id="confirmpasswordInput" placeholder="Confirmer le nouveau mot de passe">
                                                @error('new_password')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-12">
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-success">Changer mon mot de passe</button>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->

    </div>

    @push('scripts')
    @endpush

    @push('modals')
    @endpush

</x-user-layout>
