<x-admin-layout>

    <x-slot name="title" >
        Modifier un cursus
    </x-slot>

    <x-slot name="admin_category_index" >active</x-slot>

    @push('styles')
    @endpush

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Cursus</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}">Tableau de bord</a></li>
                            <li class="breadcrumb-item active">Cursus</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="row">
            <div class="col-lg-12">
                <div class="card" id="invoiceList">
                    <div class="card-header border-0">
                        <div class="d-flex align-items-center">
                            <h5 class="card-title mb-0 flex-grow-1">Cursus</h5>
                            <div class="flex-shrink-0">
                                <div class="d-flex gap-2 flex-wrap">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <form action="{{route('admin_cursus_update')}}" method="POST" >
                                @csrf
                                <input type="hidden" name="cursus_id" value="{{ encrypt($cursus->id) }}" >
                                <div class="row g-3">
                                    <div class="col-lg-12">
                                        <div>
                                            <label for="firstName" class="form-label">Titre</label>
                                            <input type="text" class="form-control" id="" value="{{old('title',$cursus->title)}}" placeholder="Ex: Maternelle - CM2" name="title" >
                                        </div>
                                        @error('title')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div><!--end col-->
                                    <div class="col-lg-6">
                                        <div>
                                            <label for="firstName" class="form-label">Catégorie de cursus</label>
                                            <select class="form-select mb-3" name="category" >
                                                <option value="" >Choisir une catégorie</option>
                                                @foreach ($categories as $category)
                                                <option  {{old('category',$cursus->category_id) == $category->id ? 'selected' : '' }} value="{{$category->id}}">{{$category->title}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        @error('category')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <div>
                                            <label for="lastName" class="form-label">Nombre d'année</label>
                                            <input type="text" class="form-control" value="{{old('duree_year',$cursus->nombre_year)}}" name="duree_year" placeholder="Ex: 8">
                                        </div>
                                        @error('duree_year')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6">
                                        <div>
                                            <label for="lastName" class="form-label">Montant d'inscription</label>
                                            <input type="number" class="form-control" name="inscription" value="{{old('inscription',$cursus->montant_inscription)}}"  placeholder="Ex: 5000">
                                        </div>
                                        @error('inscription')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <div>
                                            <label for="lastName" class="form-label">Montant cursus</label>
                                            <input type="number" class="form-control" name="amount" value="{{old('amount',$cursus->montant_cursus)}}" placeholder="Ex : 100 000">
                                        </div>
                                        @error('amount')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <div>
                                            <label for="lastName" class="form-label">Forfait mensuel</label>
                                            <input type="number" class="form-control" value="{{old('amount_monthly',$cursus->forfait_mensuel)}}"  name="amount_monthly" placeholder="Ex: 10 000">
                                        </div>
                                        @error('amount_monthly')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <div>
                                            <label for="lastName" class="form-label">Mensualité</label>
                                            <input type="number" readonly class="form-control" value="{{$cursus->duree_mensuelle}}"  name="mensuality" placeholder="Ex: 10 000">
                                        </div>
                                        @error('mensuality')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    @php
                                    $cursus_classes = json_decode($cursus->classes);
                                    @endphp

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="my-input">Cochez les classes</label>
                                            <div class="row">
                                                @foreach ($classes as $classe)
                                                <div class="col-md-4 mb-2" >
                                                    <input name="classes[]" {{ in_array($classe->id , $cursus_classes ) ? 'checked' : '' }}  type="checkbox" value="{{$classe->id}}" >
                                                    <span class="text-primary">{{$classe->name}}</span>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                                            <button type="submit" class="btn btn-primary">Modifier</button>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <!--end col-->
        </div>

    </div>

    @push('scripts')
    @endpush


    @push('modals')

    @endpush

</x-admin-layout>
