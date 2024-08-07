<x-admin-layout>

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
            <div class="card-header">
                <h5>Plateforme</h5>
            </div>
            <form action="{{route('plateforme_update')}}" method="POST" class="card-body">
                @csrf

                <div class="row">
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Mode de paiement</label>
                            <select class="form-control" name="mode" id="">
                                <option {{ old('mode',$plateforme->mode) == 1 ? 'selected' : '' }} value="1">Mode de paiement Test</option>
                                <option {{ old('mode',$plateforme->mode) == 0 ? 'selected' : '' }} value="0">Mode de paiement Live</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Clé Publique</label>
                            <input  type="text" value="{{old('public_key',$plateforme->public_key)}}"   name="public_key" id="" class="form-control" placeholder=""  />
                            @error('public_key')
                            <small id="helpId" class="text-muted">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Clé Privée</label>
                            <input  type="text" value="{{old('private_key',$plateforme->private_key)}}"   name="private_key" id="" class="form-control" placeholder=""  />
                            @error('private_key')
                            <small id="helpId" class="text-muted">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Clé secrete</label>
                            <input  type="text" value="{{old('secret_key',$plateforme->secret_key)}}"   name="secret_key" id="" class="form-control" placeholder=""  />
                            @error('secret_key')
                            <small id="helpId" class="text-muted">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 mt-3 mb-3 text-end">
                        <button type="submit" class="btn btn-success">Sauvegarder</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

    @push('scripts')

    @endpush

</x-admin-layout>
