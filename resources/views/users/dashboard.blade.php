<x-user-layout>

    <x-slot name="title" >Tableau de bord</x-slot>

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Tableau de bord</h4>

                    <!--div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                            <li class="breadcrumb-item active">Analytics</li>
                        </ol>
                    </div-->

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-column h-100">
                    <div class="row h-100">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="alert alert-warning border-0 rounded-0 m-0 d-flex align-items-center"
                                        role="alert">
                                        <i data-feather="alert-triangle"
                                            class="text-warning me-2 icon-sm"></i>
                                        <div class="flex-grow-1 text-truncate">
                                            Vous avez une facture qui arrive à échéance dans <b>17</b> jour.
                                        </div>
                                        <div class="flex-shrink-0">
                                            <a href="{{route('user_tranche')}}"
                                                class="text-reset text-decoration-underline"><b>Voir et payer maintenant</b></a>
                                        </div>
                                    </div>

                                    <div class="row align-items-end">
                                        <div class="col-sm-8">
                                            <div class="p-3">
                                                <p class="fs-16 lh-base">
                                                    Garrantissez la rentrée scolaire de vos enfants ou proche <i class="mdi mdi-arrow-right"></i></p>
                                                <div class="mt-3">
                                                    <a href="{{route('pack_list')}}"
                                                        class="btn btn-success">Faire un abonnement</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="px-3">
                                                <img src="{{asset('assets/images/user-illustarator-2.png')}}"
                                                    class="img-fluid" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end card-body-->
                            </div>
                        </div> <!-- end col-->
                    </div> <!-- end row-->

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="fw-medium text-muted mb-0">Abonnements en cours</p>
                                            <h2 class="mt-4 ff-secondary fw-semibold"><span
                                                    class="=" data-target="">{{ format_money($data['abonnement_amount']) }}</span></h2>
                                            <p class="mb-0 text-muted"><span
                                                    class="badge bg-light text-success mb-0"> {{ $data['abonnement'] }} Abonnement(s)
                                                </span> </p>
                                        </div>
                                        <div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                                    <i data-feather="users" class="text-info"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div> <!-- end card-->
                        </div> <!-- end col-->

                        <div class="col-md-6">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="fw-medium text-muted mb-0">Tranches payées</p>
                                            <h2 class="mt-4 ff-secondary fw-semibold"><span
                                                    class="" data-target="{{$data['paid_amount']}}">{{ format_money($data['paid_amount']) }}</span></h2>
                                            <p class="mb-0 text-muted">
                                                <span  class="badge bg-light text-danger mb-0"> {{$data['paid']}}  </span> Tranches
                                            </p>
                                        </div>
                                        <div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                                    <i data-feather="activity" class="text-info"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div> <!-- end row-->

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="fw-medium text-muted mb-0">Tranches à payer</p>
                                            <h2 class="mt-4 ff-secondary fw-semibold"><span
                                                    class="" data-target="{{ $data['unpaid_amount'] }}">{{ format_money($data['unpaid_amount']) }}</span>
                                            </h2>
                                            <p class="mb-0 text-muted"><span
                                                    class="badge bg-light text-danger mb-0">  {{ $data['unpaid'] }}
                                                </span> Tranches</p>
                                        </div>
                                        <div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                                    <i data-feather="clock" class="text-info"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div> <!-- end card-->
                        </div> <!-- end col-->

                        <div class="col-md-6">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="fw-medium text-muted mb-0">Tranches en retard</p>
                                            <h2 class="mt-4 ff-secondary fw-semibold"><span
                                                    class="" data-target="{{ $data['retard_amount'] }}">{{ format_money($data['retard_amount']) }}</span></h2>
                                            <p class="mb-0 text-muted"><span
                                                    class="badge bg-light text-success mb-0"> {{ $data['retard'] }}
                                                </span> Tranches</p>
                                        </div>
                                        <div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                                    <i data-feather="external-link" class="text-info"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div> <!-- end row-->
                </div>
            </div> <!-- end col-->

            <div class="col-xxl-7">

            </div><!-- end col -->
        </div> <!-- end row-->

    </div>


</x-user-layout>
