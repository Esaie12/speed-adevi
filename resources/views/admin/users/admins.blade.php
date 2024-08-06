<x-admin-layout>

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
                    <h4 class="mb-sm-0">Les administrateurs</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tableau de bord</a></li>
                            <li class="breadcrumb-item active">Les administrateurs</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="d-flex align-items-center">
                            <h5 class="card-title mb-0 flex-grow-1">Les administrateurs</h5>
                            <div class="flex-shrink-0">
                                <div class="d-flex gap-2 flex-wrap">
                                    <a class="btn btn-success" href="{{route('add_admin')}}">
                                        <i class="ri-add-line align-bottom me-1"></i> Ajouter un administrateur
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>ID</th>
                                    <th>Nom & Prénoms</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Dernière connexion</th>
                                    <th>Compte crée le</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $key=> $admin)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$admin->account_id}}</td>
                                    <td>{{$admin->lastname}} {{$admin->firstname}}</td>
                                    <td><a href="#!">{{$admin->email}}</a></td>
                                    <td>
                                        @if($admin->actif == true)
                                        <span class="badge badge-soft-success">Actif</span>
                                        @else
                                        <span class="badge badge-soft-danger">Bloqué</span>
                                        @endif
                                    </td>
                                    <td>{{$admin->last_login}}</td>
                                    <td>{{$admin->created_at}}</td>

                                    <td>
                                        <div class="dropdown d-inline-block">
                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill align-middle"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <a href="{{route('edit_admin',encrypt($admin->id))}}" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i>Modifier</a>
                                                </li>
                                                @if($admin->actif == true)
                                                <li>
                                                    <a href="{{route('block_user',encrypt($admin->id))}}" class="dropdown-item remove-item-btn">
                                                        <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Bloquer
                                                    </a>
                                                </li>
                                                @else
                                                <li>
                                                    <a href="{{route('unblock_user',encrypt($admin->id))}}" class="dropdown-item remove-item-btn">
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
                let table = new DataTable('#scroll-horizontal', {
                    scrollX: !0,
                    searching: true,
                    select: true,
                    columnDefs: [
                        {
                            orderable: false,
                            targets: 0
                        },
                    ],
                });
            });
        </script>

        <!--datatable js-->
        <script src="{{ asset('assets/js/pages/jquery.dataTables.min.js') }}"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js" integrity="sha384-jIAE3P7Re8BgMkT0XOtfQ6lzZgbDw/02WeRMJvXK3WMHBNynEx5xofqia1OHuGh0" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js" integrity="sha384-ziUH70yXeghwn7LIJvtjobzpllxs+w4FJL4/ssbFYWoYof46CveVyQ+GCaR1eTXj" crossorigin="anonymous"></script>

    @endpush

</x-admin-layout>
