<x-admin-layout>

    <x-slot name="title" >
        Les cursus disponibles
    </x-slot>

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
                                    <button type="button"  class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">
                                        <i class="ri-add-line align-bottom me-1"></i> Créer un cursus
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body bg-soft-light border border-dashed border-start-0 border-end-0">
                        <form>
                            <div class="row g-3">
                                <div class="col-xxl-3 col-sm-4">
                                    <div class="input-light">
                                        <select class="form-control"  id="idStatus">
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

                                <div class="col-lg-4">
                                    <button type="button" class="btn btn-primary w-100"  id="filterButton">
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
                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap" id="example" style="width:100%">
                                    <thead class="text-muted">
                                        <tr>
                                            <th class="sort text-uppercase" data-sort="invoice_id">ID</th>
                                            <th class="sort text-uppercase" data-sort="customer_name">Catégorie</th>
                                            <th class="sort text-uppercase" data-sort="email">Durée</th>
                                            <th class="sort text-uppercase" data-sort="country">Mensualité</th>
                                            <th class="sort text-uppercase" data-sort="date">Tranche</th>
                                            <th class="sort text-uppercase" data-sort="invoice_amount">Inscription</th>
                                            <th class="sort text-uppercase" data-sort="status">Montant total</th>
                                            <th class="sort text-uppercase" data-sort="action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all" id="i">
                                        @foreach ($cursus as $cur)
                                        <tr>

                                            <td class="id"><a href="javascript:void(0);" onclick="ViewInvoice(this);" data-id="25000351" class="fw-medium link-primary">{{$cur->title}}</a></td>
                                            <td class="customer_name">
                                                <div class="d-flex align-items-center">
                                                    {{$cur->category->title}}
                                                </div>
                                            </td>
                                            <td class="email">{{$cur->nombre_year }} Ans</td>
                                            <td class="country">Chaque {{$cur->duree_mensuelle}} mois</td>
                                            <td class="date">{{ format_money($cur->forfait_mensuel) }}</td>
                                            <td class="invoice_amount">{{ format_money($cur->montant_inscription) }}</td>
                                            <td class="status">
                                                {{$cur->montant_cursus}}
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ri-more-fill align-middle"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li>
                                                            <a class="dropdown-item" href="{{route('admin_cursus_edit', encrypt( $cur->id) )}}" ><i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                Modifier</a>
                                                        </li>
                                                        <li class="dropdown-divider"></li>
                                                        <li>
                                                            <a class="dropdown-item remove-item-btn" href="{{route('admin_cursus_delete', encrypt( $cur->id) )}}">
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
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                let table = new DataTable('#example', {
                    scrollX: !0,
                    searching: true,
                    select: true,
                    columnDefs: [
                        {
                            orderable: false,
                            targets: 0
                        },
                        {
                            orderable: false,
                            targets: 1
                        },
                    ],
                });

                /*
                $('#checkAll').on('change', function () {
                    let isChecked = $(this).prop('checked');
                    $('.selectRow').prop('checked', isChecked);

                    // Appliquez la classe CSS 'selected' aux lignes sélectionnées
                    table.rows({ page: 'current' }).every(function () {
                        let row = this.nodes().to$();
                        if (isChecked) {
                            row.addClass('selected');
                        } else {
                            row.removeClass('selected');
                        }
                    });
                    updateSelectionCount();
                });

                // Gestion des cases à cocher individuelles
                $('.selectRow').on('change', function () {
                    let isChecked = $(this).prop('checked');
                    let row = table.row($(this).parents('tr'));
                    let rowElement = row.node();

                    if (isChecked) {
                        rowElement.classList.add('selected');
                    } else {
                        rowElement.classList.remove('selected');
                    }

                    updateSelectionCount();
                });

                // Mettre à jour le compteur de sélection
                function updateSelectionCount() {
                    let selectedCount = $('.selected', table.table().node()).length;

                    if (selectedCount > 0) {
                        $('.other').addClass('d-none');
                        $('#many_export').removeClass('d-none');
                        document.getElementById('selected_count').textContent = selectedCount ;
                    }else{
                        $('.other').removeClass('d-none');
                        $('#many_export').addClass('d-none');
                    }
                }*/

                $('#filterButton').click(function () {
                    let idStatus = $('#idStatus').val();

                    // Appliquez le filtrage à DataTables
                    if (idStatus === 'all') {
                        table.column(1).search('', false, true);
                    }else{
                        table.column(1).search(idStatus, false, true);
                    }

                    table.draw();
                });
            });
        </script>

        <!--datatable js-->
        <script src="{{ asset('assets/js/pages/jquery.dataTables.min.js') }}"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js" integrity="sha384-jIAE3P7Re8BgMkT0XOtfQ6lzZgbDw/02WeRMJvXK3WMHBNynEx5xofqia1OHuGh0" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js" integrity="sha384-ziUH70yXeghwn7LIJvtjobzpllxs+w4FJL4/ssbFYWoYof46CveVyQ+GCaR1eTXj" crossorigin="anonymous"></script>

        <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
    @endpush

    @push('scripts2')
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
                    <form action="{{route('admin_cursus_save')}}" method="POST" >
                        @csrf
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
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
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
                            <div class="col-lg-6">
                                <div>
                                    <label for="lastName" class="form-label">Mensualité</label>
                                    <input type="number" readonly class="form-control" value="4"  name="mensuality" placeholder="Ex: 10 000">
                                </div>
                                @error('mensuality')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="my-input">Cochez les classes</label>
                                    <div class="row">
                                        @foreach ($classes as $classe)
                                        <div class="col-md-4 mb-2" >
                                            <input name="classes[]" type="checkbox" value="{{$classe->id}}" >
                                            <span class="text-primary">{{$classe->name}}</span>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
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
