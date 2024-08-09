<x-admin-layout>

    <x-slot name="title" >Les factures</x-slot>

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
                    <h4 class="mb-sm-0">Les factures</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}">Tableau de bord</a></li>
                            <li class="breadcrumb-item active">Les factures</li>
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
                            <h5 class="card-title mb-0 flex-grow-1">Les factures</h5>
                            <div class="flex-shrink-0">
                                <div class="d-flex gap-2 flex-wrap">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div>
                            <div class="table-responsive ">
                                <table class="table align-middle table-nowrap" id="example" style="width: 100%" >
                                    <thead class="text-muted">
                                        <tr>
                                            <th class="sort text-uppercase" data-sort="invoice_id">ID</th>
                                            <th class="sort text-uppercase" data-sort="customer_name">Utilisateur</th>
                                            <th class="sort text-uppercase" data-sort="customer_name">Agrégateur</th>
                                            <th class="sort text-uppercase" data-sort="email">Montant</th>
                                            <th class="sort text-uppercase" data-sort="country">Statut</th>
                                            <th class="sort text-uppercase" data-sort="date">Date de paiement</th>
                                            <th class="sort text-uppercase" data-sort="status">Créer le</th>
                                            <th class="sort text-uppercase" data-sort="action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all" id="exemple">
                                        @foreach ($invoices as $invoice)
                                        <tr>
                                            <td class="id"><a href="{{route('admin_invoice_show',encrypt($invoice->id))}}" class="fw-medium link-primary">#{{$invoice->reference}}</a></td>
                                            <td class="email">{{$invoice->user->firstname}} {{$invoice->user->lastname}}</td>
                                            <td class="email"> {{$invoice->agregateur }}</td>
                                            <td class="invoice_amount">{{ format_money($invoice->amount) }}</td>

                                            <td class="status">
                                                <span class="badge badge-soft-success text-uppercase">Payer</span>
                                            </td>
                                            <td class="date">
                                                {{ Carbon\Carbon::parse($invoice->date_invoice)->translatedFormat('d M, Y H:i')}}
                                            </td>
                                            <td class="date">
                                                {{ Carbon\Carbon::parse($invoice->created_at)->translatedFormat('d M, Y  H:i')}}
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ri-more-fill align-middle"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                                        <li>
                                                            <a class="dropdown-item" href="{{route('admin_invoice_show',encrypt($invoice->id))}}" ><i class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                Voir la facture
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="{{route('admin_invoice_export',encrypt($invoice->id))}}" ><i class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                Télécharger la facture
                                                            </a>
                                                        </li>
                                                        <!--li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-download-2-line align-bottom me-2 text-muted"></i>Rapport</a></li>
                                                        <li class="dropdown-divider"></li>
                                                        <li>
                                                            <a class="dropdown-item remove-item-btn" data-bs-toggle="modal" href="#deleteOrder">
                                                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                Arreter l'abonnement
                                                            </a>
                                                        </li-->
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
