<x-user-layout>

    <x-slot name="title" >Faire un abonnement</x-slot>

    <x-slot name="pack_make">
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
                    <h4 class="mb-sm-0">Faire un abonnement</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('user_dashboard')}}">Tableau de bord</a></li>
                            <li class="breadcrumb-item active">Choisir un pack</li>
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
            @foreach ($categories as $category)
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-2">{{$category->title}}</h4>
                    </div>
                    <img class="img-fluid" src="{{asset('assets/images/small/img-4.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">{{$category->description}}</p>
                        <div class="text-end">
                            <a href="{{route('pack_show',$category->slug)}}" class="btn btn-primary">Souscrire à ce pack</a>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach

        </div>

    </div>

    @push('scripts')

    @endpush

    @push('modals')

    @endpush

</x-user-layout>
