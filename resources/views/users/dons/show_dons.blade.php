<x-user-layout>

    <x-slot name="title" >
        Faire un dons - {{$collect->title}}
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

        <div class="row">
            <div class="col-lg-12">
                <div class="card mt-n4 mx-n4">
                    <div class="bg-soft-warning">
                        <div class="card-body pb-0 px-4">
                            <div class="row mb-3">
                                <div class="col-md">
                                    <div class="row align-items-center g-3">
                                        <div class="col-md-auto">
                                            <div class="avatar-md">
                                                <div class="avatar-title bg-white rounded-circle">
                                                    <img src="{{asset('assets/images/brands/slack.png')}}" alt="" class="avatar-xs">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div>
                                                <h4 class="fw-bold"> {{$collect->title}}</h4>
                                                <div class="hstack gap-3 flex-wrap">
                                                    <div><i class="ri-building-line align-bottom me-1"></i> {{env('APP_NAME')}}</div>
                                                    <div class="vr"></div>
                                                    <div>A débuter le : <span class="fw-medium">{{ $collect->started }}</span></div>
                                                    <div class="vr"></div>
                                                    <div>Termine le : <span class="fw-medium">{{ $collect->finished }}</span></div>
                                                    <div class="vr"></div>
                                                    <div class="badge bg-success fs-12">{{ format_money($collect->amount_collect) }}</div>
                                                    collectés sur
                                                    <div class="badge bg-danger fs-12">{{ format_money($collect->cagnotte) }}</div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center py-2 mt-5">
                                                @php
                                                $calcul = ($collect->amount_collect / $collect->cagnotte) * 100;
                                                $calcul = number_format($calcul, 2);
                                                @endphp
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar-xs">
                                                        <div class="avatar-title bg-light rounded-circle text-muted fs-16">
                                                            <i class=" ri-hand-heart-line"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="progress animated-progress custom-progress progress-label">
                                                        <div class="progress-bar bg-success" role="progressbar" style="width: {{$calcul}}%" aria-valuenow="{{$calcul}}" aria-valuemin="0" aria-valuemax="100"><div class="label">Dons {{$calcul}}% soit {{ format_money($collect->amount_collect) }} sur {{ format_money($collect->cagnotte) }}</div></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between">

                                                <div id="countdown{{$collect->reference}}" class="countdownlist"></div>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>

                            <ul class="nav nav-tabs-custom border-bottom-0" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link fw-semibold active" data-bs-toggle="tab" href="#project-overview" role="tab" aria-selected="true">
                                        Tout savoir sur le don
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#project-documents" role="tab" aria-selected="false" tabindex="-1">
                                        Les paiements reçus
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link fw-semibold" href="Javascript:void(0)"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                                        Faire un don aussi
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- end card body -->
                    </div>
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="tab-content text-muted">
                    <div class="tab-pane fade active show" id="project-overview" role="tabpanel">
                        <div class="row">
                             <!-- ene col -->
                             <div class="col-xl-3 col-lg-4">

                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="form-group mb-2">
                                            <label for="my-input">Nom & Prénoms</label>
                                            <input id="my-input" class="form-control" type="text" name="name" value="{{Auth::user()->lastname." ".Auth::user()->firstname}}" >
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="my-input">Montant</label>
                                            <input  class="form-control" id="donate_price" type="number"  onchange="updatePrice()" value="" min="100" name="amount">
                                            <i class="text-primary">Minimu: 100 Fcfa</i>
                                            <input type="hidden" id="priceField" name="price" value="200">
                                        </div>
                                        <div style="display: none" class="text-danger" id="msg">
                                            Veuillez entrer un montant suppérieur à 200 Fcfa
                                        </div>

                                        <div class="mt-4 d-grid gap-1">
                                            <button class="btn btn-success" id='button_payee_tranche2' >
                                                Valider mon dons
                                            </button>
                                            <i>Avec Feexpay</i>
                                        </div>

                                        <div class="mt-4 d-grid gap-1">
                                            <button class="btn btn-primary" onclick="valideDonate()" >Valider mon dons</button>
                                            <i>Avec Kkipay</i>
                                        </div>

                                    </div>
                                </div>

                                <!--div class="d-grid gap-1" >
                                    <button class="btn btn-success btn-block" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                                        Faire un don aussi
                                    </button>
                                </div-->

                                <div class="card mt-4">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">Mot clés</h5>
                                        <div class="d-flex flex-wrap gap-2 fs-16">
                                            @php
                                            $tags=[];
                                            if($collect->tags){
                                                $tags = json_decode($collect->tags);
                                            }
                                            @endphp
                                            @foreach ($tags as $value)
                                            <div class="badge fw-medium badge-soft-secondary">{{$value}}</div>
                                            @endforeach

                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->

                            </div>
                            <!-- end col -->

                            <div class="col-xl-9 col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-muted">
                                            <h6 class="mb-3 fw-semibold text-uppercase">Description</h6>

                                            <div id='button_payee'></div>
                                            <div class="render"></div>

                                            <div>
                                                {!!  $collect->description !!}
                                            </div>

                                            <div class="pt-3 border-top border-top-dashed mt-4">
                                                <div class="row">

                                                    <div class="col-lg-3 col-sm-6">
                                                        <div>
                                                            <p class="mb-2 text-uppercase fw-medium">Débuter le :</p>
                                                            <h5 class="fs-15 mb-0">{{ $collect->started }}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div>
                                                            <p class="mb-2 text-uppercase fw-medium">Termine le :</p>
                                                            <h5 class="fs-15 mb-0">{{ $collect->finished }}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div>
                                                            <p class="mb-2 text-uppercase fw-medium">Cagnotte prévus :</p>
                                                            <div class="badge bg-danger fs-12">{{ format_money($collect->cagnotte) }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div>
                                                            <p class="mb-2 text-uppercase fw-medium">Collecte effectuée :</p>
                                                            <div class="badge bg-warning fs-12">{{ format_money($collect->amount_collect) }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>

                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end tab pane -->
                    <div class="tab-pane fade" id="project-documents" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4">
                                    <h5 class="card-title flex-grow-1">Liste des transactions reçues</h5>
                                </div>

                                <table class="table table-nowrap">
                                    <thead class="table-light ">
                                        <tr>
                                            <th scope="col">N°</th>
                                            <th scope="col">Numéro de compte</th>
                                            <th scope="col">Donateurs</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Montant</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($paiements as $key=> $item)
                                        <tr>
                                            <th scope="row">{{$key+1}}</th>
                                            @if($item->anonyme == false)
                                            <td>
                                                {{$item->user->account_id}}
                                            </td>
                                            <td>
                                                {{$item->user->lastname." ".$item->user->firstname}}
                                            </td>
                                            @else
                                            <td>Anonyme</td>
                                            <td>Anonyme</td>
                                            @endif
                                            <td>{{$item->created_at}}</td>
                                            <td>{{ format_money($item->amount) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot class="table-light">
                                        <tr>
                                            <td colspan="4">Total collecté</td>
                                            <td>{{ format_money($collect->amount_collect) }}</td>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>




    @push('scripts')
    <script>

        function valideDonate(){
            var price = document.getElementById('donate_price').value;
            var don_id = "{{$collect->id}}";

            if(price >=200 ){
                var call_back_url = "{{ route('donate_paiement_kkia', ['id' => '__id__', 'amount' => '__amount__']) }}";

                call_back_url = call_back_url.replace('__id__', don_id).replace('__amount__', price);

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
            }else{
                alert("Montant doit etre supérieur à 200 Fcfa");
            }

        }
    </script>

    <script>
         function updatePrice() {
            var don_id = "{{$collect->id}}";
            var price = document.getElementById('donate_price').value;
            document.getElementById('priceField').value = price;

            if(price >= 20){

                var call_back_url = "{{ route('donate_paiement', ['id' => '__id__', 'amount' => '__amount__']) }}";

                call_back_url = call_back_url.replace('__id__', don_id).replace('__amount__', price);

                FeexPayButton.init("render",{
                    id: "{{env('FEEX_SHOP_ID')}}",
                    amount: price,
                    token: "{{env('FEEX_TOKEN')}}",

                    callback_url: call_back_url,
                    mode: "{{env('FEEX_MODE')}}",
                    custom_button:  true,
                    id_custom_button: 'button_payee_tranche2',
                    description: "{{$collect->title}}",
                    case: '',
                });
            }else{
                alert("Montant doit etre supérieur à 200 Fcfa");
            }

        }
    </script>


    <script>
        document.addEventListener("DOMContentLoaded", function () {
         var divId = "{{ $collect->reference }}";
         var divDown = "countdown"+divId;
         var date_finished = "{{$collect->finished}}";

             var e = new Date( date_finished ).getTime(),
             d = setInterval(function () {
                     var t = (new Date).getTime(),
                         t = e - t,
                         n = Math.floor(t / 864e5) + ' Jours ' + Math.floor(t % 864e5 / 36e5) + ' Heures ' + Math.floor(t % 36e5 / 6e4) + ' Minutes ' + Math.floor(t % 6e4 / 1e3) + " sec.";
                 document.getElementById(  divDown ) && (document.getElementById(  divDown ).innerHTML = n), t < 0 && (clearInterval(d), document.getElementById( divDown ).innerHTML = '<div class="countdown-endtxt">Collecte expirée!</div>')
             }, 1e3)
         });
    </script>
    @endpush


</x-user-layout>
