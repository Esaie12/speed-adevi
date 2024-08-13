<x-admin-layout>

    <x-slot name="title" >
        Les utilisateurs
    </x-slot>

    <x-slot name="admin_dashboard" >active</x-slot>

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
                    <h4 class="mb-sm-0">Les utilisateurs</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tableau de bord</a></li>
                            <li class="breadcrumb-item active">Les utilisateurs</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>ID</th>
                                    <th>Nom & Prénoms</th>
                                    <th>Email</th>
                                    <th>Pays</th>
                                    <th>Status</th>
                                    <th>Dernière connexion</th>
                                    <th>Compte crée le</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key=> $user)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$user->account_id}}</td>
                                    <td>{{$user->lastname}} {{$user->firstname}}</td>
                                    <td><a href="#!">{{$user->email}}</a></td>
                                    <td>{{$user->country}}</td>
                                    <td>
                                        @if($user->actif == true)
                                        <span class="badge badge-soft-success">Actif</span>
                                        @else
                                        <span class="badge badge-soft-danger">Bloqué</span>
                                        @endif
                                    </td>
                                    <td>{{$user->last_login}}</td>
                                    <td>{{$user->created_at}}</td>

                                    <td>
                                        <div class="dropdown d-inline-block">
                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill align-middle"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a href="#!" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> Voir Profil</a></li>
                                                @if($user->actif == true)
                                                <li>
                                                    <a href="{{route('block_user',encrypt($user->id))}}" class="dropdown-item remove-item-btn">
                                                        <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Bloquer
                                                    </a>
                                                </li>
                                                @else
                                                <li>
                                                    <a href="{{route('unblock_user',encrypt($user->id))}}" class="dropdown-item remove-item-btn">
                                                        <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Débloquer
                                                    </a>
                                                </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->


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
                }

                $('#filterButton').click(function () {
                    let idStatus = $('#idStatus').val();
                    let dateRange = $('#demo-datepicker').val();
                    let startDate = new Date(dateRange.split(" to ")[0]);
                    let endDate = new Date(dateRange.split(" to ")[1]);

                    // Appliquez le filtrage à DataTables
                    if (idStatus === 'all') {
                        table.column(7).search('', false, true);
                    }else{
                        table.column(7).search(idStatus, false, true);
                    }

                    if (dateRange) {
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
                    }

                    table.draw();
                });*/
            });
        </script>

        <!--datatable js-->
        <script src="{{ asset('assets/js/pages/jquery.dataTables.min.js') }}"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js" integrity="sha384-jIAE3P7Re8BgMkT0XOtfQ6lzZgbDw/02WeRMJvXK3WMHBNynEx5xofqia1OHuGh0" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js" integrity="sha384-ziUH70yXeghwn7LIJvtjobzpllxs+w4FJL4/ssbFYWoYof46CveVyQ+GCaR1eTXj" crossorigin="anonymous"></script>

        <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
    @endpush

</x-admin-layout>
