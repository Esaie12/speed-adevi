<x-user-layout>

    @push('styles')
    <script src="https://cdn.kkiapay.me/k.js"></script>
        <script src="https://cdn.fedapay.com/checkout.js?v=1.1.7"></script>
    @endpush

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{$title}}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tableau de bord</a></li>
                            <li class="breadcrumb-item active">{{$title}}</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="justify-content-between d-flex align-items-center mt-3 mb-4">
                    <h5>{{$title}}</h5>
                    <div class="justify-content-end">
                        <a href="{{route('user_tranche')}}" class="btn btn-link me-3">Toutes les tranches</a>
                        <a href="{{route('user_tranche',['filter'=> 'unpaid'])}}" class="btn btn-danger me-3">Les tranches impayées</a>
                        <a href="{{route('user_tranche',['filter'=> 'paid'])}}" class="btn btn-success">Les tranches payées</a>
                    </div>
                </div>

                <div class="row">
                    @foreach ($tranches as $key=> $tranche)
                    <div class="col-md-4">
                        <div class="card border card-border-{{$tranche->status->color }}">
                            <div class="card-header">
                                <span class="float-end">{{$tranche->status->title }}</span>
                                <h6 class="card-title mb-0">
                                    Tranche {{$key+1}}
                                    @if($tranche->pay_at)
                                            <span class="badge badge-soft-success text-uppercase">Payer</span>
                                            @else
                                                @if($tranche->date_tranche < date('Y-m-d'))
                                                <span class="badge badge-soft-danger text-uppercase">En retard</span>
                                                @else
                                                <span class="badge badge-soft-warning text-uppercase">Non Payé</span>
                                                @endif
                                    @endif
                                </h6>
                            </div>
                            <div class="card-body">
                                <p>
                                    <strong class="text-primary">{{ $tranche->subscription->cursus->category->title }}</strong>
                                </p>
                                <p>
                                    Cursus: <strong class="text-primary">{{ $tranche->subscription->cursus->title }}</strong>
                                </p>
                                <p>
                                    Date d'echéance: <strong>{{ Carbon\Carbon::parse($tranche->date_tranche)->translatedFormat('d M, Y')}}</strong>
                                </p>
                                <div class="d-flex justify-content-between">
                                    <b>{{format_money($tranche->amount)}}</b>
                                    <div class="text-end">
                                        @if($tranche->pay_at)
                                        Payer le <strong>{{ Carbon\Carbon::parse($tranche->pay_at)->translatedFormat('d M, Y H:i')}}</strong>
                                        @else
                                        <a onclick="makePaiementKkiapay({{$tranche->amount}},{{$tranche->id}})" href="javascript:void(0);" class="link-primary fw-medium">
                                            Payer maintenant<i  class="ri-arrow-right-line align-middle ms-2"></i>
                                        </a>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div><!-- end row -->

                <div class="row">
                    <div class="col-12">
                        {{$tranches->links()}}
                    </div>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->

    </div>

    @push('scripts')
    <script>

        function makePaiementKkiapay(price, id){
            var price = price;

            var call_back_url = "{{ route('paiement-tranche', ['id' => '__id__']) }}".replace('__id__', id);

            $(function(){
                openKkiapayWidget({
                    amount: price,
                    position: "right",
                    callback: call_back_url, // Utiliser la variable globale mise à jour
                    data: "",
                    theme: "#23a16f",
                    key: "85abcb60ae8311ecb9755de712bc9e4f",
                    sandbox: "true"
                });
            });
        }
    </script>
    @endpush

</x-user-layout>
