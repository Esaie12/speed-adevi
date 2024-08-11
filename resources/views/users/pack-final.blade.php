<x-user-layout>

    <x-slot name="title" >
        Faire un abonnement
    </x-slot>

    <x-slot name="pack_make">
        active
    </x-slot>

    <x-slot name="collapsed_sub">
        show
    </x-slot>

    @push('styles')
        <script src="https://cdn.kkiapay.me/k.js"></script>
        <script src="https://cdn.fedapay.com/checkout.js?v=1.1.7"></script>
        <script src="https://api.feexpay.me/feexpay-javascript-sdk/index.js"></script>
    @endpush

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Finaliser mon abonnement</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('user_dashboard')}}">Tableau de bord</a></li>
                            <li class="breadcrumb-item active">Passer au paiement</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <h4>Un ptit titre</h4>
                <p class="text-muted">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta sapiente cum aut mollitia, nemo est, doloremque inventore at necessitatibus rerum eligendi. Libero asperiores expedita est, illum tempora ullam quis adipisci?
                </p>
            </div>


            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-body">
                            <div class="d-flex mb-4 align-items-center">
                                <div class="flex-grow-1 ms-2">
                                    <h5 class="card-title mb-1">Abonnement au cursus de : {{$subs->title }}</h5>
                                    <p class="text-muted mb-0">Durée de {{$subs->nombre_year }} ans</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-arround">
                                <div>
                                    <h6 class="mb-1">{{format_money($subs->montant_inscription)}}</h6>
                                    <p class="card-text text-muted">Frais d'inscription</p>
                                </div>
                                <div class="ms-5" >
                                    <h6 class="mb-1">{{format_money($subs->montant_cursus)}}</h6>
                                    <p class="card-text text-muted">Montant du cursus</p>
                                </div>

                                @if(1 ==2)
                                <div class="ms-5" >
                                    <button class="btn btn-success" onclick="makePaiementKkiapay({{$subs->forfait_mensuel + $subs->montant_inscription}})" >Payer par acompte</button>
                                </div>
                                <div class="ms-5" >
                                    <button class="btn btn-success" onclick="makePaiementKkiapay({{$subs->montant_cursus + $subs->montant_inscription}})" >Payer en totalité </button>
                                </div>
                                @endif
                            </div>

                            <ul class="list-group mt-2">
                                @foreach ($details as $item)
                                <li class="list-group-item"><i class="ri-bill-line align-middle me-2"></i> {{$item['formatted_date']}} -- {{format_money($subs->forfait_mensuel)}} </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div>
                    <b>Payer avec FeexPay</b>
                    <div id='button_payee'></div>
                    <div class="d-grid gap-1">
                        <button class="btn btn-success" id='button_payee_tranche' >
                            Payer par tranche
                        </button>
                    </div>

                    <div id='button_payee2'></div>
                    <div class="mt-2 d-grid gap-1">
                        <button class="btn btn-primary" id='button_payee_total' >
                            Payer la totalité
                        </button>
                    </div>
                </div>

                <div class="mt-4">
                    <b>Payer avec kkiaPay</b>
                    <div class="mt-2 d-grid gap-1" >
                        <button class="btn btn-success" onclick="makePaiementKkiapay({{$subs->forfait_mensuel + $subs->montant_inscription}})" >Payer par acompte</button>
                    </div>
                    <div class="mt-2 d-grid gap-1" >
                        <button class="btn btn-primary" onclick="makePaiementKkiapay({{$subs->montant_cursus + $subs->montant_inscription}})" >Payer en totalité </button>
                    </div>
                </div>

            </div>



        </div>

    </div>

    @php
        $price_tranche = $subs->forfait_mensuel + $subs->montant_inscription;
        $price_total = $subs->montant_cursus + $subs->montant_inscription;

        $id= env('FEEX_SHOP_ID');
        $token= env('FEEX_TOKEN');

        $callback_url= route('paiement', $subs->id);
        $error_callback_url= route('user_dashboard');
        $mode= env('FEEX_MODE');

        $feexpayclass = new Feexpay\FeexpayPhp\FeexpayClass($id, $token, $callback_url, $mode, $error_callback_url);
        $result = $feexpayclass->init($price_tranche, "button_payee", true, "button_payee_tranche", "votre description", "votre callback_info");

       // $feexpayclass2 = new Feexpay\FeexpayPhp\FeexpayClass($id, $token, $callback_url, $mode, $error_callback_url);
        //$result2 = $feexpayclass2->init($price_total, "button_payee2", true, "button_payee_total", "votre description", "votre callback_info")

    @endphp


    @push('scripts')
    <script>
        /*// Variable globale pour l'URL de retour
        var call_back_url = "$this->url_back";

        // Écouteur d'événement global pour 'change_category'
        window.addEventListener("choiceCursus", (e) => {
            setTimeout(() => {
                call_back_url = e.detail; // Mettre à jour l'URL de retour
            }, 0);
        });*/

        function makePaiementKkiapay(price){
            var price = price;

            $(function(){
                openKkiapayWidget({
                    amount: price,
                    position: "right",
                    callback:  "{{ route('paiement_kkia', $subs->id) }}", // Utiliser la variable globale mise à jour
                    data: "",
                    theme: "#23a16f",
                    key: "85abcb60ae8311ecb9755de712bc9e4f",
                    sandbox: "true"
                });
            });
        }
    </script>
    @endpush

    @push('modals')  @endpush

</x-user-layout>
