<x-admin-layout>
    <x-slot name="title" >Voir un abonnement</x-slot>

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Détails de l'abonnement  {{$abonnement->reference}} </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}">Tableau de bord</a></li>
                            <li class="breadcrumb-item active">Détails {{$abonnement->reference}}</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <div class="col-xl-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0"><i class="ri-secure-payment-line align-bottom me-1 text-muted"></i>Abonnement</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <div class="flex-shrink-0">
                                <p class="text-muted mb-0">Code:</p>
                            </div>
                            <div class="flex-grow-1 ms-2">
                                <h6 class="mb-0">#{{$abonnement->reference}}</h6>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <div class="flex-shrink-0">
                                <p class="text-muted mb-0">Inscription:</p>
                            </div>
                            <div class="flex-grow-1 ms-2">
                                <h6 class="mb-0">{{ format_money($abonnement->amount_inscription) }}</h6>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <div class="flex-shrink-0">
                                <p class="text-muted mb-0">Montant cursus:</p>
                            </div>
                            <div class="flex-grow-1 ms-2">
                                <h6 class="mb-0">{{ format_money($abonnement->amount) }}</h6>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <div class="flex-shrink-0">
                                <p class="text-muted mb-0">Commence le:</p>
                            </div>
                            <div class="flex-grow-1 ms-2">
                                <h6 class="mb-0">{{ Carbon\Carbon::parse($abonnement->started_at)->translatedFormat('d M, Y')}}</h6>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <div class="flex-shrink-0">
                                <p class="text-muted mb-0">Activer le:</p>
                            </div>
                            <div class="flex-grow-1 ms-2">
                                <h6 class="mb-0"> {{ Carbon\Carbon::parse($abonnement->created_at)->translatedFormat('d M, Y')}}</h6>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <p class="text-muted mb-0">Statut:</p>
                            </div>
                            <div class="flex-grow-1 ms-2">
                                <h6 class="mb-0"><span class="badge badge-soft-{{$abonnement->status->color }} text-uppercase">{{$abonnement->status->title }}</span></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0"><i class="ri-map-pin-line align-middle me-1 text-muted"></i>Addresse de livraison</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled vstack gap-2 fs-13 mb-0">
                            <li class="fw-medium fs-14">{{$abonnement->user->lastname." ".$abonnement->user->firstname}}</li>
                            <li>{{$abonnement->user->phone}}</li>
                            <li>{{$abonnement->user->address}}</li>
                            <li>{{$abonnement->user->country}} {{$abonnement->user->department}}</li>
                            <li>{{$abonnement->user->website}}</li>
                        </ul>
                    </div>
                </div>

                <!--end card-->
            </div>
            <!--end col-->
            <div class="col-xl-9">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h5 class="card-title flex-grow-1 mb-0">Les classes #{{$abonnement->reference}}</h5>
                            <div class="flex-shrink-0">
                                <a href="#" class="btn btn-success btn-sm"><i class="ri-download-2-fill align-middle me-1"></i>Rapport</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-card">
                            <table class="table table-nowrap align-middle table-borderless mb-0">
                                <thead class="table-light text-muted">
                                    <tr>
                                        <th scope="col">Classe</th>
                                        <th scope="col">Montant</th>
                                        <th scope="col">Statistique</th>
                                        <th scope="col">Statut</th>
                                        <th scope="col" class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($les_classes as $classe)
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="flex-grow-1 ms-3">
                                                    <h5 class="fs-15"><a href="#" class="link-primary">{{$classe->classe->name}} </a></h5>
                                                 </div>
                                            </div>
                                        </td>
                                        <td> --- </td>
                                        <td>
                                            @php
                                            $stats =  app('App\Http\Controllers\AppController')->getTranchesAttribute($classe->id);
                                            @endphp
                                            {{ $stats['payer']." Payées sur ".$stats['payerNon'] }}
                                        </td>
                                        <td>
                                            <span class="badge badge-soft-{{$classe->status->color }} text-uppercase">{{$classe->status->title }}</span>
                                        </td>
                                        <td class="fw-medium text-end">

                                            @if($classe->status_id == 1)
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Actions
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item btn-sm btn btn-info" href="{{route('admin_livrer',encrypt($classe->id))}}">Livraison effectué</a>
                                                </div>
                                            </div>
                                            @else
                                            ------
                                            @endif

                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card mt-5">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h5 class="card-title flex-grow-1 mb-0">Abonnement #{{$abonnement->reference}}</h5>
                            <div class="flex-shrink-0">
                                <a href="#" class="btn btn-success btn-sm"><i class="ri-download-2-fill align-middle me-1"></i>Rapport</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-card">
                            <table class="table table-nowrap align-middle table-borderless mb-0">
                                <thead class="table-light text-muted">
                                    <tr>
                                        <th scope="col">Tranche par classe</th>
                                        <th scope="col">Montant</th>
                                        <th scope="col">Statut</th>
                                        <th scope="col">Echéance</th>
                                        <th scope="col" class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tranches as $key=> $tranche)
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="flex-grow-1 ms-3">
                                                    <h5 class="fs-15"><a href="#" class="link-primary">Tranche {{$key+1}} </a></h5>
                                                    <p class="text-muted mb-0">Classe: <span class="fw-medium">{{ $tranche->classe->name }}</span></p>

                                                </div>
                                            </div>
                                        </td>
                                        <td>{{format_money($tranche->amount)}}</td>
                                        <td>
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
                                        <td> {{ Carbon\Carbon::parse($tranche->date_tranche)->translatedFormat('d M, Y')}}</td>
                                        <td class="fw-medium text-end">
                                            @if($tranche->pay_at)
                                            <span class="fw-medium"> {{ Carbon\Carbon::parse($tranche->pay_at)->translatedFormat('d M, Y H:i')}}</span>
                                            @else
                                            <button  class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$tranche->id}}" class="btn btn-sm btn-primary">Marquer payer</button>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->

    </div>

    @push('modals')
        @foreach ($tranches as $key=> $tranche)
            @if(!$tranche->pay_at)
            <div class="modal fade" id="staticBackdrop{{$tranche->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body text-center p-5">
                            <lord-icon
                                src="https://cdn.lordicon.com/lupuorrc.json"
                                trigger="loop"
                                colors="primary:#121331,secondary:#08a88a"
                                style="width:120px;height:120px">
                            </lord-icon>

                            <div class="mt-4">
                                <h4 class="mb-3">Marquer payer cette tranche! #TRANCHE{{$key+1}} </h4>
                                <p class="text-muted mb-4">Vous avez reçu un paiement en espèce ?? Marquer le paiement de cette tranche</p>
                                <div class="hstack gap-2 justify-content-center">
                                    <a href="javascript:void(0);" class="btn btn-link link-success fw-medium" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Fermer</a>
                                    <a href="{{route('admin_confirm_pay',encrypt($tranche->id))}}" class="btn btn-success">Oui, Confirmer</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
    @endpush

</x-admin-layout>
