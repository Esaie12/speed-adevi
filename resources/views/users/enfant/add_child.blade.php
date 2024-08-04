<x-user-layout>

    <x-slot name="admin_category_index" >active</x-slot>

    @push('styles')
    @endpush

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Béneficiaire</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}">Tableau de bord</a></li>
                            <li class="breadcrumb-item active">Béneficiaire</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Ajouter un bénéficiaire</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <form action="#" class="" autocomplete="off">

                            <div class="tab-pane fade show active" id="steparrow-gen-info" role="tabpanel" aria-labelledby="steparrow-gen-info-tab">
                                <div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="steparrow-gen-info-username-input">Nom & Prénoms du béneficaire</label>
                                                <input type="text" class="form-control" id="steparrow-gen-info-username-input" placeholder="Enter user name" required >
                                                <div class="invalid-feedback">Please enter a user name</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="steparrow-gen-info-password-input">Date de naissance</label>
                                                <input type="date" class="form-control" id="steparrow-gen-info-password-input" placeholder="Enter password" required >
                                                <div class="invalid-feedback">Please enter a password</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="steparrow-gen-info-password-input">Sexe</label>
                                                <select class="form-control" id="steparrow-gen-info-password-input" name="sexe" required >
                                                    <option value="Homme">Homme</option>
                                                    <option value="Fille">Fille</option>
                                                </select>
                                                <div class="invalid-feedback">Please enter a password</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="steparrow-gen-info-password-input">Classe de l'enfant</label>
                                                <input type="text" class="form-control" id="steparrow-gen-info-password-input" placeholder="Enter password" required >
                                                <div class="invalid-feedback">Please enter a password</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="steparrow-gen-info-password-input">Numéro de telephone</label>
                                                <input type="text" class="form-control" id="steparrow-gen-info-password-input" placeholder="Enter password" required >
                                                <div class="invalid-feedback">Please enter a password</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="steparrow-gen-info-password-input">Adresse</label>
                                                <input type="text" class="form-control" id="steparrow-gen-info-password-input" placeholder="Enter password" required >
                                                <div class="invalid-feedback">Please enter a password</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Upload Image</label>
                                        <input class="form-control" type="file" id="formFile" />
                                    </div>
                                    <div>
                                        <label class="form-label" for="des-info-description-input">Description</label>
                                        <textarea class="form-control" placeholder="Enter Description" id="des-info-description-input" rows="3" required></textarea>
                                        <div class="invalid-feedback">Please enter a description</div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start gap-3 mt-4">
                                    <button type="button" class="btn btn-success btn-label right ms-auto nexttab nexttab" data-nexttab="steparrow-description-info-tab"><i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Enregistrer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>

    </div>

    @push('scripts')
        <script src="{{asset('assets/js/pages/form-wizard.init.js')}}"></script>
    @endpush

    @push('modals')

    @endpush

</x-user-layout>
