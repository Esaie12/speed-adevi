<x-user-layout>

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
                    <h4 class="mb-sm-0">Cards</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Base UI</a></li>
                            <li class="breadcrumb-item active">Cards</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xxl-6">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img class="rounded-start img-fluid h-100 object-cover" src="{{asset('assets/images/small/img-12.jpg')}}" alt="Card image">
                        </div>
                        <div class="col-md-8">
                            <div class="card-header">
                                <h6 class="card-title mb-0"><i class="ri-gift-line align-middle me-1 lh-1"></i> You've made it!</h6>
                            </div>
                            <div class="card-body">
                                <p class="card-text mb-2">For that very reason, I went on a quest and spoke to many different professional graphic designers and asked them what graphic design tips they live.</p>
                                <p class="card-text"><small class="text-muted">Publier  3 mins ago</small></p>

                                <div class="d-flex align-items-center py-2">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar-xs">
                                            <div class="avatar-title bg-light rounded-circle text-muted fs-16">
                                                <i class=" ri-hand-heart-line"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="progress animated-progress custom-progress progress-label">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><div class="label">Dons 30% soit 2000 FCFA sur 30000Fcfa</div></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        15 Jours 15 min 30 s
                                    </div>
                                    <div class="hstack gap-2 justify-content-end">
                                        <a href="{{route('show_dons_collects',1)}}" class="btn btn-primary btn-sm">Faire un dons</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end card -->
            </div>
        </div>

    </div>


    @push('scripts')

    @endpush

    @push('modals')

    @endpush

</x-user-layout>
