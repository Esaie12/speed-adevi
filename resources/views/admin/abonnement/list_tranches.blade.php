<x-admin-layout>

    <x-slot name="tite" >
        Les différentes tranches
    </x-slot>

    <x-slot name="pack_list">
        active
    </x-slot>

    <x-slot name="collapsed_sub">
        show
    </x-slot>

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
                    <h4 class="mb-sm-0">Les différentes tranches</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}">Tableau de bord</a></li>
                            <li class="breadcrumb-item active">Les différentes tranches</li>
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
                            <h5 class="card-title mb-0 flex-grow-1">Les différentes tranches</h5>
                        </div>
                    </div>
                    <div class="card-body bg-soft-light border border-dashed border-start-0 border-end-0">
                        <form>
                            <div class="row g-3">
                                <div class="col-lg-3">
                                    <div class="input-light">
                                        <select class="form-control"  id="idCateg">
                                            <option value="all" selected>Toutes les catégories</option>
                                            @foreach ($categories as $categorie)
                                            <option value="{{$categorie->title}}">{{$categorie->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="input-light">
                                        <select class="form-control"  id="idStatus">
                                            <option value="all" selected>Status des tranches</option>
                                            <option value="PAYER">Tranche Payer</option>
                                            <option value="{{strtoupper("Non Payé")}}">Tranche non Payer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="input-light">
                                        <select class="form-control" id="idClasse">
                                            <option value="all" selected>Tous les classes</option>
                                           @foreach ($classes as $classe)
                                           <option value="{{ strtoupper($classe->name) }}">{{$classe->name}}</option>
                                           @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!--end col-->

                                <div class="col-lg-3">
                                    <button type="button" class="btn btn-primary w-100" id="filterButton">
                                        <i class="ri-equalizer-fill me-1 align-bottom"></i> Filtrer
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
                                <table class="table align-middle table-nowrap" id="example">
                                    <thead class="text-muted">
                                        <tr>
                                            <th class="sort text-uppercase" data-sort="invoice_id">ID</th>
                                            <th class="sort text-uppercase" data-sort="customer_name">Client</th>
                                            <th class="sort text-uppercase" data-sort="customer_name">Pack</th>
                                            <th class="sort text-uppercase" data-sort="email">Cursus</th>
                                            <th class="sort text-uppercase" data-sort="country">Montant</th>
                                            <th class="sort text-uppercase" data-sort="date">Paiement</th>
                                            <th class="sort text-uppercase" data-sort="invoice_amount">Status</th>
                                            <th class="sort text-uppercase" data-sort="status">Dernier paiement</th>
                                            <th class="sort text-uppercase" data-sort="status">Activer le</th>
                                            <th class="sort text-uppercase" data-sort="action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all" id="exemple">
                                        @foreach ($tranches as $key=> $tranche)
                                        <tr>
                                            <td class="id"><a href="javascript:void(0);" onclick="ViewInvoice(this);" data-id="25000351" class="fw-medium link-primary"># Tranche {{$key+1}}</a></td>
                                            <td class="email">
                                                {{ $tranche->subscription->user->firstname }}  {{ $tranche->subscription->user->lastname }}
                                            </td>
                                            <td class="email">{{ $tranche->subscription->cursus->category->title }}</td>
                                            <td class="customer_name">
                                                {{ $tranche->subscription->cursus->title }}
                                            </td>
                                            <td>
                                                {{ $tranche->classe->name }}
                                            </td>
                                            <td class="invoice_amount">{{ format_money($tranche->amount) }}</td>
                                            <td>
                                                <strong>{{ Carbon\Carbon::parse($tranche->date_tranche)->translatedFormat('d M, Y')}}</strong>
                                            </td>
                                            <td class="date">
                                                @if($tranche->pay_at)
                                                {{ Carbon\Carbon::parse($tranche->pay_at)->translatedFormat('d M, Y H:i')}}
                                                @else
                                                @endif
                                            </td>

                                            <td class="status">
                                                @if($tranche->pay_at)
                                                        <span class="badge badge-soft-success text-uppercase">Payer</span>
                                                    @else
                                                        @if($tranche->date_tranche < date('Y-m-d'))
                                                        <span class="badge badge-soft-danger text-uppercase">En retard</span>
                                                        @else
                                                        <span class="badge badge-soft-warning text-uppercase">Non Payé</span>
                                                    @endif
                                                @endif
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ri-more-fill align-middle"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                                        <li>
                                                            <a class="dropdown-item" href="{{route('admin_subscription_show',encrypt($tranche->id))}}" ><i class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                Voir l'abonnement
                                                            </a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-download-2-line align-bottom me-2 text-muted"></i>Rapport</a></li>
                                                        <li class="dropdown-divider"></li>
                                                        <li>
                                                            <a class="dropdown-item remove-item-btn" onclick="return confirm('Êtes-vous sûr de vouloir marquer la fin de cet abonnement ?');" href="{{route('finish_subscription_admin',encrypt($tranche->id))}}r">
                                                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                Marquer la fin de l'abonnement
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item remove-item-btn"  onclick="return confirm('Êtes-vous sûr de vouloir suspendre cet abonnement ?');" href="{{route('stop_subscription_admin',encrypt($tranche->id))}}">
                                                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                Arreter l'abonnement
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade flip" id="deleteOrder" tabindex="-1" aria-labelledby="deleteOrderLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body p-5 text-center">
                                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px"></lord-icon>
                                        <div class="mt-4 text-center">
                                            <h4>You are about to delete a order ?</h4>
                                            <p class="text-muted fs-15 mb-4">Deleting your order will remove all of your information from our database.</p>
                                            <div class="hstack gap-2 justify-content-center remove">
                                                <button class="btn btn-link link-success fw-medium text-decoration-none" id="deleteRecord-close" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</button>
                                                <button class="btn btn-danger" id="delete-record">Yes, Delete It</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end modal -->
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
                            targets: 8
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
                    let idClasse = $('#idClasse').val();
                    let idCateg = $('#idCateg').val();
                    //let dateRange = $('#demo-datepicker').val();
                    //let startDate = new Date(dateRange.split(" to ")[0]);
                    //let endDate = new Date(dateRange.split(" to ")[1]);

                    // Appliquez le filtrage à DataTables
                    if (idStatus === 'all') {
                        table.column(8).search('', false, true);
                    }else{
                        table.column(8).search(idStatus, false, true);
                    }

                    if (idClasse=== 'all') {
                        table.column(4).search('', false, true);
                    }else{
                        table.column(4).search(idClasse, false, true);
                    }

                    if (idCateg=== 'all') {
                        table.column(2).search('', false, true);
                    }else{
                        table.column(2).search(idCateg, false, true);
                    }

                    /*if (dateRange) {
                        $.fn.dataTable.ext.search.length = 0;

                        $.fn.dataTable.ext.search.push(
                            function (settings, data, dataIndex) {

                                let firstDateValue = data[2];

                                let secondDateValue = data[6];

                                let firstDate = new Date(firstDateValue);

                                let secondDate = new Date(secondDateValue);

                                return ((firstDate >= startDate && firstDate <= endDate)
                                    || (secondDate >= startDate && secondDate <= endDate));
                            }
                        );
                    }else{
                        $.fn.dataTable.ext.search.pop();
                    }*/

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


    @push('modals')

    @endpush

</x-admin-layout>