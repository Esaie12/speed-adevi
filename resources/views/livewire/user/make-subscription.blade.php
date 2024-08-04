<div class="col-lg-8">
    <h5>Chosissez la classe du bénéficiaire</h5>
    <div class="row mt-3">
        @foreach ($cursus  as $cur)
            <div class="col-lg-3 mb-3">
                <div class="d-grid gap-1" >
                    <button wire:click="choiceCursus({{$cur->id}})" class="btn  {{ $my_choice == $cur->id ? 'btn-outline-primary' : 'btn-primary' }} " type="button">{{$cur->title}}</button>
                </div>
            </div>
        @endforeach
    </div>

    @if($this->subs )
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
                    <div class="ms-5" >
                        <button class="btn btn-success" onclick="makePaiementKkiapay({{$subs->forfait_mensuel + $subs->montant_inscription}})" >Payer par acompte</button>
                    </div>
                    <div class="ms-5" >
                        <button class="btn btn-success" onclick="makePaiementKkiapay({{$subs->montant_cursus + $subs->montant_inscription}})" >Payer en totalité </button>
                    </div>
                </div>

                <ul class="list-group mt-2">
                    @foreach ($details as $item)
                    <li class="list-group-item"><i class="ri-bill-line align-middle me-2"></i> {{$item['formatted_date']}} -- {{format_money($subs->forfait_mensuel)}} </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    @endif

    @push('scripts')
    <script>
        // Variable globale pour l'URL de retour
        var call_back_url = "{{$this->url_back}}";

        // Écouteur d'événement global pour 'change_category'
        window.addEventListener("choiceCursus", (e) => {
            setTimeout(() => {
                call_back_url = e.detail; // Mettre à jour l'URL de retour
            }, 0);
        });

        function makePaiementKkiapay(price){
            var price = price;

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


</div>

