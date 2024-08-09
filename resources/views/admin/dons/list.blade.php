<x-admin-layout>

    <x-slot name="admin_category_index" >active</x-slot>

    @push('styles')
     <!--datatable css-->
     <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
     <!--datatable responsive css-->
     <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

     <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
     @endpush

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Les dons et collectes</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}">Tableau de bord</a></li>
                            <li class="breadcrumb-item active">Les dons et collectes</li>
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
                            <h5 class="card-title mb-0 flex-grow-1">Les dons et collectes</h5>
                            <div class="flex-shrink-0">
                                <div class="d-flex gap-2 flex-wrap">
                                    <a  class="btn btn-success" href="{{route('create_dons_collects')}}" >
                                        <i class="ri-add-line align-bottom me-1"></i> Créer une collecte
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body bg-soft-light border border-dashed border-start-0 border-end-0">
                        <form>
                            <div class="row g-3">
                                <div class="col-xxl-5 col-sm-12">
                                    <div class="search-box">
                                        <input type="text" class="form-control search bg-light border-light" placeholder="Search for customer, email, country, status or something...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xxl-3 col-sm-4">
                                    <input type="text" class="form-control bg-light border-light" id="datepicker-range" placeholder="Select date">
                                </div>
                                <!--end col-->
                                <div class="col-xxl-3 col-sm-4">
                                    <div class="input-light">
                                        <select class="form-control" data-choices data-choices-search-false name="choices-single-default" id="idStatus">
                                            <option value="">Status</option>
                                            <option value="all" selected>All</option>
                                            <option value="Unpaid">Unpaid</option>
                                            <option value="Paid">Paid</option>
                                            <option value="Cancel">Cancel</option>
                                            <option value="Refund">Refund</option>
                                        </select>
                                    </div>
                                </div>
                                <!--end col-->

                                <div class="col-xxl-1 col-sm-4">
                                    <button type="button" class="btn btn-primary w-100" onclick="SearchData();">
                                        <i class="ri-equalizer-fill me-1 align-bottom"></i> Filters
                                    </button>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </form>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="table-responsive table-card">
                                <table class="table align-middle table-nowrap" id="invoiceTable">
                                    <thead class="text-muted">
                                        <tr>
                                            <th class="sort text-uppercase" data-sort="invoice_id">ID</th>
                                            <th class="sort text-uppercase" data-sort="customer_name">Titre</th>
                                            <th class="sort text-uppercase" data-sort="email">Cagnotte</th>
                                            <th class="sort text-uppercase" data-sort="country">Montant reçu</th>
                                            <th class="sort text-uppercase" data-sort="date">Date de publication</th>
                                            <th class="sort text-uppercase" data-sort="invoice_amount">Date de fin</th>
                                            <th class="sort text-uppercase" data-sort="status">Status</th>
                                            <th class="sort text-uppercase" data-sort="action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all" id="i">
                                        @foreach ($dons as $collect)
                                        <tr>

                                            <td class="id"><a href="javascript:void(0);" onclick="ViewInvoice(this);" data-id="25000351" class="fw-medium link-primary">{{$collect->reference}}</a></td>
                                            <td class="customer_name">
                                                <div class="d-flex align-items-center">
                                                    {{$collect->title}}
                                                </div>
                                            </td>
                                            <td class="email">{{ format_money($collect->cagnotte) }}</td>
                                            <td class="country">{{ format_money($collect->amount_collect) }}</td>
                                            <td class="date">{{ $collect->started }}</td>
                                            <td class="invoice_amount">{{ $collect->finished }}</td>
                                            <td class="status">
                                               statut
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ri-more-fill align-middle"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li>
                                                            <button class="dropdown-item" href="javascript:void(0);" ><i class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                Voir les collects
                                                            </button>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="{{route('edit_dons_collects',encrypt($collect->id))}}" ><i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                Modifier
                                                            </a>
                                                        </li>
                                                        <li class="dropdown-divider"></li>
                                                        <li>
                                                            <a class="dropdown-item remove-item-btn" href="{{route('delete_dons_collects',encrypt($collect->id))}}" >
                                                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                Supprimer
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="noresult" style="display: none">
                                    <div class="text-center">
                                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                        <h5 class="mt-2">Sorry! No Result Found</h5>
                                        <p class="text-muted mb-0">We've searched more than 150+ invoices We did not find any invoices for you search.</p>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
            <!--end col-->
        </div>

    </div>

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="{{asset('assets/js/pages/invoiceslist.init.js')}}"></script>
    @endpush

    @push('modals')
    <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Créer un cursus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0);">
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <div>
                                    <label for="firstName" class="form-label">Titre</label>
                                    <input type="text" class="form-control" id="" value="{{old('title')}}" placeholder="Ex: Maternelle - CM2" name="title" >
                                </div>
                                @error('title')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div><!--end col-->
                            <div class="col-lg-12">
                                <div>
                                    <label for="firstName" class="form-label">Catégorie de cursus</label>
                                    <select class="form-select mb-3" name="category" >
                                        <option value="" >Choisir une catégorie</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                    </select>
                                </div>
                                @error('category')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <label for="lastName" class="form-label">Nombre d'année</label>
                                    <input type="text" class="form-control" value="{{old('duree_year')}}" name="duree_year" placeholder="Ex: 8">
                                </div>
                                @error('duree_year')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <div>
                                    <label for="lastName" class="form-label">Montant d'inscription</label>
                                    <input type="number" class="form-control" name="inscription" value="{{old('inscription')}}"  placeholder="Ex: 5000">
                                </div>
                                @error('inscription')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <label for="lastName" class="form-label">Montant cursus</label>
                                    <input type="number" class="form-control" name="amount" value="{{old('amount')}}" placeholder="Ex : 100 000">
                                </div>
                                @error('amount')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <label for="lastName" class="form-label">Forfait mensuel</label>
                                    <input type="number" class="form-control" value="{{old('amount_monthly')}}"  name="amount_monthly" placeholder="Ex: 10 000">
                                </div>
                                @error('amount_monthly')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endpush

</x-admin-layout>
