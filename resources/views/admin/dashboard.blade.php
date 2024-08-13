<x-admin-layout>

    <x-slot name="title" >Tableau de bord</x-slot>

    <x-slot name="admin_dashboard" >active</x-slot>

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Tableau de bord</h4>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <!-- card -->
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <p class="text-uppercase fw-medium text-muted mb-0">Total d'abonnement</p>
                            </div>
                            <div class="flex-shrink-0">
                                <h5 class="text-success fs-14 mb-0">
                                    {{$data['abonnement']}}
                                </h5>
                            </div>
                        </div>
                        <div class="d-flex align-items-end justify-content-between mt-4">
                            <div>
                                <h4 class="fs-22 fw-semibold ff-secondary mb-4"> {{format_money($data['abonnement_amount'])}} </h4>
                                <a href="#" class="text-decoration-underline">Voir tout</a>
                            </div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-success rounded fs-3">
                                    <i class="bx bx-dollar-circle text-success"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <!-- card -->
                <div class="card card-animate ">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <p class="text-uppercase fw-medium  mb-0">Tranches payées</p>
                            </div>
                            <div class="flex-shrink-0">
                                <h5 class="text-warning fs-14 mb-0">
                                     {{$data['paid']}}
                                </h5>
                            </div>
                        </div>
                        <div class="d-flex align-items-end justify-content-between mt-4">
                            <div>
                                <h4 class="fs-22 fw-semibold ff-secondary mb-4 ">{{format_money($data['paid_amount'])}}</h4>
                                <a href="#" class="text-decoration-underline">Les tranches payées</a>
                            </div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-light rounded fs-3">
                                    <i class="bx bx-shopping-bag "></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <!-- card -->
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <p class="text-uppercase fw-medium text-muted mb-0">Tranches impayées</p>
                            </div>
                            <div class="flex-shrink-0">
                                <h5 class="text-success fs-14 mb-0">
                                    {{$data['unpaid']}}
                                </h5>
                            </div>
                        </div>
                        <div class="d-flex align-items-end justify-content-between mt-4">
                            <div>
                                <h4 class="fs-22 fw-semibold ff-secondary mb-4">{{format_money($data['unpaid_amount'])}}</h4>
                                <a href="#" class="text-decoration-underline">Les tranches impayées</a>
                            </div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-warning rounded fs-3">
                                    <i class="bx bx-user-circle text-warning"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <!-- card -->
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <p class="text-uppercase fw-medium text-muted mb-0">Tranches en retard</p>
                            </div>
                            <div class="flex-shrink-0">
                                <h5 class="text-muted fs-14 mb-0">
                                    {{$data['retard']}}
                                </h5>
                            </div>
                        </div>
                        <div class="d-flex align-items-end justify-content-between mt-4">
                            <div>
                                <h4 class="fs-22 fw-semibold ff-secondary mb-4">{{format_money($data['retard_amount'])}}</h4>
                                <a href="#" class="text-decoration-underline">Les tranches en retard</a>
                            </div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-primary rounded fs-3">
                                    <i class="bx bx-wallet text-primary"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div>


        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="row align-items-end">
                            <div class="col-sm-8">
                                <div class="p-3">
                                    <p class="fs-16 lh-base">L'administration de la plateforme est <span class="fw-semibold">à votre portée.</span>, Commencer maintenant <i class="mdi mdi-arrow-right"></i></p>
                                    <div class="mt-3">
                                        <a href="{{route('plateforme')}}" class="btn btn-success">La plateforme</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="px-3">
                                    <img src="{{asset('assets/images/user-illustarator-2.png')}}" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                    </div> <!-- end card-body-->
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="d-flex p-3">
                            <div class="flex-shrink-0">
                                <div class="avatar-md me-3">
                                    <span class="avatar-title bg-soft-danger rounded-circle fs-1">
                                        <i class="ri-gift-2-line text-danger"></i>
                                    </span>
                                </div>
                            </div>
                            <div>
                                <p class="fs-16 lh-base">Vous avez la possibilités de lancer <span class="fw-semibold">des collectes de dons</span>. Essayez maintenant <i class="mdi mdi-arrow-right"></i></p>
                                <div class="mt-3">
                                    <a href="{{route('admin_dons_index')}}" class="btn btn-secondary">Créer une collecte</a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end card-body-->
                </div>
            </div> <!-- end col-->
        </div>


    </div>

</x-admin-layout>
