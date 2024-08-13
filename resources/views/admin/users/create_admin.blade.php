<x-admin-layout>

    <x-slot name="title" >
        Créer un administrateur
    </x-slot>

    <x-slot name="admin_category_index" >active</x-slot>

    @push('styles')
    @endpush

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Ajouter un collaborateur</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}">Tableau de bord</a></li>
                            <li class="breadcrumb-item active">Ajouter un collaborateur</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="card">
            <div class="card-header">
                <h5>Ajouter un collaborateur</h5>
            </div>
            <form action="{{route('admin_save')}}" method="POST" class="card-body">
                @csrf

                <div class="row">
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Nom</label>
                            <input  type="text" value="{{old('lastname')}}"   name="lastname" id="" class="form-control" placeholder=""  />
                            @error('lastname')
                            <small id="helpId" class="text-muted">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Prénoms</label>
                            <input  type="text" value="{{old('firstname')}}"   name="firstname" id="" class="form-control" placeholder=""  />
                            @error('firstname')
                            <small id="helpId" class="text-muted">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input  type="email" value="{{old('email')}}"   name="email" id="" class="form-control" placeholder=""  />
                            @error('email')
                            <small id="helpId" class="text-muted">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Telephone</label>
                            <input  type="text" value="{{old('phone')}}"   name="phone" id="" class="form-control" placeholder=""  />
                            @error('phone')
                            <small id="helpId" class="text-muted">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Date de naissane </label>
                            <input  type="date" value="{{old('birthday')}}"   name="birthday" id="" class="form-control" placeholder=""  />
                            @error('birthday')
                            <small id="helpId" class="text-muted">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Pays</label>
                            <input  type="text" value="{{old('country')}}"   name="country" id="" class="form-control" placeholder=""  />
                            @error('country')
                            <small id="helpId" class="text-muted">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Addresse</label>
                            <input  type="text" value="{{old('adresse')}}"   name="adresse" id="" class="form-control" placeholder=""  />
                            @error('adresse')
                            <small id="helpId" class="text-muted">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 mt-3 mb-3 text-end">
                        <button type="submit" class="btn btn-success">Enregistrer</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

    @push('scripts')

    @endpush

</x-admin-layout>
