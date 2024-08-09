<x-user-layout>

    <x-slot name="title" >Mes factures</x-slot>

    <x-slot name="pack_list">
        active
    </x-slot>

    <x-slot name="collapsed_sub">
        show
    </x-slot>

    @push('styles')
    @endpush

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Détails Facture {{$invoice->reference}} </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('user_dashboard')}}">Tableau de bord</a></li>
                            <li class="breadcrumb-item active">Facture {{$invoice->reference}}</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row justify-content-center">
            <div class="col-xxl-9">
                <div class="card" id="demo">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-header border-bottom-dashed p-4">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <img src="{{asset('assets/images/logo-dark.png')}}" class="card-logo card-logo-dark" alt="logo dark" height="17">
                                        <img src="{{asset('assets/images/logo-light.png')}}" class="card-logo card-logo-light" alt="logo light" height="17">
                                        <div class="mt-sm-5 mt-4">
                                            <h6 class="text-muted text-uppercase fw-semibold">Facturée délivrée par <strong>{{env('APP_NAME')}}</strong> </h6>
                                            <p class="text-muted mb-1" id="address-details">California, United States</p>
                                            <p class="text-muted mb-0" id="zip-code"><span>Zip-code:</span> 90201</p>
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0 mt-sm-0 mt-3">
                                        <h6><span class="text-muted fw-normal">Facture de: </span><span id="email">{{$invoice->user->firstname}} {{$invoice->user->lastname}}</span></h6>
                                        <h6><span class="text-muted fw-normal">Client N°: </span><span id="legal-register-no">{{$invoice->user->account_id}}</span></h6>
                                        <h6><span class="text-muted fw-normal">Email: </span><span id="email">{{$invoice->user->email}}</span></h6>
                                        <h6 class="mb-0"><span class="text-muted fw-normal">Téléphone: </span><span id="contact-no"> {{$invoice->user->phone}}</span></h6>
                                    </div>
                                </div>
                            </div>
                            <!--end card-header-->
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div class="card-body p-4">
                                <div class="row g-3">
                                    <div class="col-lg-3 col-6">
                                        <p class="text-muted mb-2 text-uppercase fw-semibold">Facture No</p>
                                        <h5 class="fs-14 mb-0">#<span id="invoice-no">{{$invoice->reference}}</span></h5>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-3 col-6">
                                        <p class="text-muted mb-2 text-uppercase fw-semibold">Facture crée le</p>
                                        <h5 class="fs-14 mb-0"><span id="invoice-date">{{ Carbon\Carbon::parse($invoice->date_invoice)->translatedFormat('d M, Y H:i')}}</span> </h5>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-3 col-6">
                                        <p class="text-muted mb-2 text-uppercase fw-semibold">Status</p>
                                        <span class="badge badge-soft-success fs-11" id="payment-status">Payer</span>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-3 col-6">
                                        <p class="text-muted mb-2 text-uppercase fw-semibold">Montant Payer</p>
                                        <h5 class="fs-14 mb-0"><span id="total-amount">{{ format_money($invoice->amount) }}</span></h5>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <!--end card-body-->
                        </div>

                        <div class="col-lg-12">
                            <div class="card-body p-4">
                                <div class="table-responsive">
                                    <table class="table table-borderless text-center table-nowrap align-middle mb-0">
                                        <thead>
                                            <tr class="table-active">
                                                <th scope="col" style="width: 50px;">#</th>
                                                <th scope="col">Product</th>
                                                <th scope="col">Montant</th>
                                                <th scope="col">Quantité</th>
                                                <th scope="col" class="text-end">Montant</th>
                                            </tr>
                                        </thead>
                                        <tbody id="products-list">
                                            @foreach ($items as $key=> $item)
                                            <tr>
                                                <th scope="row">{{$key+1}}</th>
                                                <td class="text-start">
                                                    <span class="fw-medium">{{$item->item}}</span>
                                                    <p class="text-muted mb-0">{{$item->description}}</p>
                                                </td>
                                                <td>{{ format_money($item->amount) }}</td>
                                                <td>{{$item->quantity}}</td>
                                                <td class="text-end">{{ format_money($item->amount) }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table><!--end table-->
                                </div>
                                <div class="border-top border-top-dashed mt-2">
                                    <table class="table table-borderless table-nowrap align-middle mb-0 ms-auto" style="width:250px">
                                        <tbody>
                                            <tr>
                                                <td>Sous Total</td>
                                                <td class="text-end">{{ format_money($invoice->amount) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Taxe (0%)</td>
                                                <td class="text-end">{{ format_money(0) }}</td>
                                            </tr>
                                            <tr class="border-top border-top-dashed fs-15">
                                                <th scope="row">Montant Total</th>
                                                <th class="text-end">{{ format_money($invoice->amount) }}</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!--end table-->
                                </div>
                                <div class="mt-3">
                                    <h6 class="text-muted text-uppercase fw-semibold mb-3">Détails sur le paiement:</h6>
                                    <p class="text-muted mb-1">Moyen de paiement: <span class="fw-medium" id="payment-method">{{$invoice->agregateur}}</span></p>
                                    <p class="text-muted mb-1">Date de paiement: <span class="fw-medium" id="card-holder-name">{{ Carbon\Carbon::parse($invoice->date_invoice)->translatedFormat('d M, Y H:i')}}</span></p>
                                </div>

                                <div class="hstack gap-2 justify-content-end d-print-none mt-4">
                                    <a href="javascript:window.print()" class="btn btn-success"><i class="ri-printer-line align-bottom me-1"></i> Imprimer</a>
                                    <a href=" {{route('user_invoice_export',encrypt($invoice->id))}}" class="btn btn-primary"><i class="ri-download-2-line align-bottom me-1"></i>Télécharger</a>
                                </div>
                            </div>
                            <!--end card-body-->
                        </div><!--end col-->
                    </div><!--end row-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->

    </div>



    @push('scripts')
    @endpush


    @push('modals')

    @endpush

</x-user-layout>
