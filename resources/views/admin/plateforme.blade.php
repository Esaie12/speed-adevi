<x-admin-layout>

    <x-slot name="title" >Configurer la plateforme</x-slot>

    <x-slot name="admin_category_index" >active</x-slot>

    @push('styles')
    @endpush

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Plateforme</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}">Tableau de bord</a></li>
                            <li class="breadcrumb-item active">Plateforme</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card">
            <div class="card-body">
                <ul class="nav nav-pills nav-custom-outline nav-primary mb-3" role="tablist">
                    <li class="nav-item waves-effect waves-light" role="presentation">
                        <a class="nav-link active" data-bs-toggle="tab" href="#border-nav-home" role="tab" aria-selected="true">Méthode de paiement</a>
                    </li>
                    <li class="nav-item waves-effect waves-light" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#border-nav-profile" role="tab" aria-selected="false" tabindex="-1">Profile</a>
                    </li>
                    <li class="nav-item waves-effect waves-light" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#border-nav-messages" role="tab" aria-selected="false" tabindex="-1">Messages</a>
                    </li>
                    <li class="nav-item waves-effect waves-light" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#border-nav-settings" role="tab" aria-selected="false" tabindex="-1">Settings</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content text-muted">
                    <div class="tab-pane active show" id="border-nav-home" role="tabpanel">

                        <form action="{{route('plateforme_update')}}" method="POST" class="">
                            @csrf

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Utiliser <strong class="text-primary">Kkiapay</strong> sur la plateforme </label>
                                        <select class="form-control" name="use_kkia" id="">
                                            <option {{ old('use_kkia',$plateforme->use_kkia) == 1 ? 'selected' : '' }} value="1">Oui</option>
                                            <option {{ old('use_kkia',$plateforme->use_kkia) == 0 ? 'selected' : '' }} value="0">Non</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Mode de paiement <strong class="text-primary">(Kkiapay)</strong> </label>
                                        <select class="form-control" name="mode_kkia" id="">
                                            <option {{ old('mode_kkia',$plateforme->mode_kkia) == 1 ? 'selected' : '' }} value="1">Mode de paiement Test</option>
                                            <option {{ old('mode_kkia',$plateforme->mode_kkia) == 0 ? 'selected' : '' }} value="0">Mode de paiement Live</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Clé Publique <strong class="text-primary">(Kkiapay)</strong></label>
                                        <input  type="text" value="{{old('public_key_kkia',$plateforme->public_key_kkia)}}"   name="public_key_kkia" id="" class="form-control" placeholder=""  />
                                        @error('public_key_kkia')
                                        <small id="helpId" class="text-muted">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Clé Privée <strong class="text-primary">(Kkiapay)</strong></label>
                                        <input  type="text" value="{{old('private_key_kkia',$plateforme->private_key_kkia)}}"   name="private_key_kkia" id="" class="form-control" placeholder=""  />
                                        @error('private_key_kkia')
                                        <small id="helpId" class="text-muted">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Clé secrete <strong class="text-primary">(Kkiapay)</strong></label>
                                        <input  type="text" value="{{old('secret_key_kkia',$plateforme->secret_key_kkia)}}"   name="secret_key_kkia" id="" class="form-control" placeholder=""  />
                                        @error('secret_key_kkia')
                                        <small id="helpId" class="text-muted">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Utiliser <strong class="text-primary">Feexpay</strong> sur la plateforme </label>
                                        <select class="form-control" name="use_feex" id="">
                                            <option {{ old('use_feex',$plateforme->use_feex) == 1 ? 'selected' : '' }} value="1">Oui</option>
                                            <option {{ old('use_feex',$plateforme->use_feex) == 0 ? 'selected' : '' }} value="0">Non</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="" class="form-label">SHOP ID <strong class="text-primary">(Feexpay)</strong></label>
                                        <input  type="text" value="{{old('shop_id_feex',$plateforme->shop_id_feex)}}"   name="shop_id_feex" id="" class="form-control" placeholder=""  />
                                        @error('shop_id_feex')
                                        <small id="helpId" class="text-muted">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="" class="form-label">TOKEN <strong class="text-primary">(Feexpay)</strong></label>
                                        <input  type="text" value="{{old('token_feex',$plateforme->token_feex)}}"   name="token_feex" id="" class="form-control" placeholder=""  />
                                        @error('token_feex')
                                        <small id="helpId" class="text-muted">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Utiliser <strong class="text-primary">Fedapay</strong> sur la plateforme </label>
                                        <select class="form-control" name="use_feda" id="">
                                            <option {{ old('use_feda',$plateforme->use_feda) == 1 ? 'selected' : '' }} value="1">Oui</option>
                                            <option {{ old('use_feda',$plateforme->use_feda) == 0 ? 'selected' : '' }} value="0">Non</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Clé Publique <strong class="text-primary">(Fedapay)</strong></label>
                                        <input  type="text" value="{{old('public_key_feda',$plateforme->shop_id_feex)}}"   name="public_key_feda" id="" class="form-control" placeholder=""  />
                                        @error('public_key_feda')
                                        <small id="helpId" class="text-muted">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Clé secrete <strong class="text-primary">(Fedapay)</strong></label>
                                        <input  type="text" value="{{old('secret_key_feda',$plateforme->secret_key_feda)}}"   name="secret_key_feda" id="" class="form-control" placeholder=""  />
                                        @error('secret_key_feda')
                                        <small id="helpId" class="text-muted">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 mt-3 mb-3 text-end">
                                    <button type="submit" class="btn btn-success">Sauvegarder</button>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="tab-pane" id="border-nav-profile" role="tabpanel">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <i class="ri-checkbox-circle-fill text-success"></i>
                            </div>
                            <div class="flex-grow-1 ms-2">
                                In some designs, you might adjust your tracking to create a certain artistic effect. It can also help
                                you fix fonts that are poorly spaced to begin with.
                            </div>
                        </div>
                        <div class="d-flex mt-2">
                            <div class="flex-shrink-0">
                                <i class="ri-checkbox-circle-fill text-success"></i>
                            </div>
                            <div class="flex-grow-1 ms-2">
                                A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I
                                enjoy with my whole heart.
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="border-nav-messages" role="tabpanel">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <i class="ri-checkbox-circle-fill text-success"></i>
                            </div>
                            <div class="flex-grow-1 ms-2">
                                Each design is a new, unique piece of art birthed into this world, and while you have the opportunity to
                                be creative and make your own style choices.
                            </div>
                        </div>
                        <div class="d-flex mt-2">
                            <div class="flex-shrink-0">
                                <i class="ri-checkbox-circle-fill text-success"></i>
                            </div>
                            <div class="flex-grow-1 ms-2">
                                For that very reason, I went on a quest and spoke to many different professional graphic designers and
                                asked them what graphic design tips they live.
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="border-nav-settings" role="tabpanel">
                        <div class="d-flex mt-2">
                            <div class="flex-shrink-0">
                                <i class="ri-checkbox-circle-fill text-success"></i>
                            </div>
                            <div class="flex-grow-1 ms-2">
                                For that very reason, I went on a quest and spoke to many different professional graphic designers and
                                asked them what graphic design tips they live.
                            </div>
                        </div>
                        <div class="d-flex mt-2">
                            <div class="flex-shrink-0">
                                <i class="ri-checkbox-circle-fill text-success"></i>
                            </div>
                            <div class="flex-grow-1 ms-2">
                                After gathering lots of different opinions and graphic design basics, I came up with a list of 30
                                graphic design tips that you can start implementing.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    @push('scripts')

    @endpush

</x-admin-layout>
