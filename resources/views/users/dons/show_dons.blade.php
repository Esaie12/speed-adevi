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
                                                    <img src="assets/images/brands/slack.png" alt="" class="avatar-xs">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div>
                                                <h4 class="fw-bold">Velzon - Admin &amp; Dashboard</h4>
                                                <div class="hstack gap-3 flex-wrap">
                                                    <div><i class="ri-building-line align-bottom me-1"></i> Themesbrand</div>
                                                    <div class="vr"></div>
                                                    <div>Create Date : <span class="fw-medium">15 Sep, 2021</span></div>
                                                    <div class="vr"></div>
                                                    <div>Due Date : <span class="fw-medium">29 Dec, 2021</span></div>

                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center py-2 mt-5">
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

                                <div class="hstack flex-wrap gap-2">
                                    <button class="btn btn-success" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                                        Faire un don aussi
                                    </button>
                                </div>

                                <div class="card mt-4">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">Mot clés</h5>
                                        <div class="d-flex flex-wrap gap-2 fs-16">
                                            <div class="badge fw-medium badge-soft-secondary">UI/UX</div>
                                            <div class="badge fw-medium badge-soft-secondary">Figma</div>
                                            <div class="badge fw-medium badge-soft-secondary">HTML</div>
                                            <div class="badge fw-medium badge-soft-secondary">CSS</div>
                                            <div class="badge fw-medium badge-soft-secondary">Javascript</div>
                                            <div class="badge fw-medium badge-soft-secondary">C#</div>
                                            <div class="badge fw-medium badge-soft-secondary">Nodejs</div>
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
                                            <h6 class="mb-3 fw-semibold text-uppercase">Summary</h6>
                                            <p>It will be as simple as occidental in fact, it will be Occidental. To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is. The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words.</p>

                                            <ul class="ps-4 vstack gap-2">
                                                <li>Product Design, Figma (Software), Prototype</li>
                                                <li>Four Dashboards : Ecommerce, Analytics, Project,etc.</li>
                                                <li>Create calendar, chat and email app pages.</li>
                                                <li>Add authentication pages.</li>
                                                <li>Content listing.</li>
                                            </ul>

                                            <div>
                                                <button type="button" class="btn btn-link link-success p-0">Read more</button>
                                            </div>

                                            <div class="pt-3 border-top border-top-dashed mt-4">
                                                <div class="row">

                                                    <div class="col-lg-3 col-sm-6">
                                                        <div>
                                                            <p class="mb-2 text-uppercase fw-medium">Create Date :</p>
                                                            <h5 class="fs-15 mb-0">15 Sep, 2021</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div>
                                                            <p class="mb-2 text-uppercase fw-medium">Due Date :</p>
                                                            <h5 class="fs-15 mb-0">29 Dec, 2021</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div>
                                                            <p class="mb-2 text-uppercase fw-medium">Priority :</p>
                                                            <div class="badge bg-danger fs-12">High</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div>
                                                            <p class="mb-2 text-uppercase fw-medium">Status :</p>
                                                            <div class="badge bg-warning fs-12">Inprogess</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="pt-3 border-top border-top-dashed mt-4">
                                                <h6 class="mb-3 fw-semibold text-uppercase">Resources</h6>
                                                <div class="row g-3">
                                                    <div class="col-xxl-4 col-lg-6">
                                                        <div class="border rounded border-dashed p-2">
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 me-3">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-light text-secondary rounded fs-24">
                                                                            <i class="ri-folder-zip-line"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 overflow-hidden">
                                                                    <h5 class="fs-13 mb-1"><a href="#" class="text-body text-truncate d-block">App pages.zip</a></h5>
                                                                    <div>2.2MB</div>
                                                                </div>
                                                                <div class="flex-shrink-0 ms-2">
                                                                    <div class="d-flex gap-1">
                                                                        <button type="button" class="btn btn-icon text-muted btn-sm fs-18"><i class="ri-download-2-line"></i></button>
                                                                        <div class="dropdown">
                                                                            <button class="btn btn-icon text-muted btn-sm fs-18 dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                <i class="ri-more-fill"></i>
                                                                            </button>
                                                                            <ul class="dropdown-menu">
                                                                                <li><a class="dropdown-item" href="#"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Rename</a></li>
                                                                                <li><a class="dropdown-item" href="#"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end col -->
                                                    <div class="col-xxl-4 col-lg-6">
                                                        <div class="border rounded border-dashed p-2">
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 me-3">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-light text-secondary rounded fs-24">
                                                                            <i class="ri-file-ppt-2-line"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 overflow-hidden">
                                                                    <h5 class="fs-13 mb-1"><a href="#" class="text-body text-truncate d-block">Velzon admin.ppt</a></h5>
                                                                    <div>2.4MB</div>
                                                                </div>
                                                                <div class="flex-shrink-0 ms-2">
                                                                    <div class="d-flex gap-1">
                                                                        <button type="button" class="btn btn-icon text-muted btn-sm fs-18"><i class="ri-download-2-line"></i></button>
                                                                        <div class="dropdown">
                                                                            <button class="btn btn-icon text-muted btn-sm fs-18 dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                <i class="ri-more-fill"></i>
                                                                            </button>
                                                                            <ul class="dropdown-menu">
                                                                                <li><a class="dropdown-item" href="#"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Rename</a></li>
                                                                                <li><a class="dropdown-item" href="#"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end col -->
                                                </div>
                                                <!-- end row -->
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
                                    <h5 class="card-title flex-grow-1">Documents</h5>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive table-card">
                                            <table class="table table-borderless align-middle mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th scope="col">File Name</th>
                                                        <th scope="col">Type</th>
                                                        <th scope="col">Size</th>
                                                        <th scope="col">Upload Date</th>
                                                        <th scope="col" style="width: 120px;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar-sm">
                                                                    <div class="avatar-title bg-light text-secondary rounded fs-24">
                                                                        <i class="ri-folder-zip-line"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="ms-3 flex-grow-1">
                                                                    <h5 class="fs-14 mb-0"><a href="javascript:void(0)" class="text-dark">Artboard-documents.zip</a></h5>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>Zip File</td>
                                                        <td>4.57 MB</td>
                                                        <td>12 Dec 2021</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);" class="btn btn-soft-secondary btn-sm btn-icon" data-bs-toggle="dropdown" aria-expanded="true">
                                                                    <i class="ri-more-fill"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill me-2 align-bottom text-muted"></i>View</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-download-2-fill me-2 align-bottom text-muted"></i>Download</a></li>
                                                                    <li class="dropdown-divider"></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill me-2 align-bottom text-muted"></i>Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar-sm">
                                                                    <div class="avatar-title bg-light text-danger rounded fs-24">
                                                                        <i class="ri-file-pdf-fill"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="ms-3 flex-grow-1">
                                                                    <h5 class="fs-14 mb-0"><a href="javascript:void(0);" class="text-dark">Bank Management System</a></h5>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>PDF File</td>
                                                        <td>8.89 MB</td>
                                                        <td>24 Nov 2021</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);" class="btn btn-soft-secondary btn-sm btn-icon" data-bs-toggle="dropdown" aria-expanded="true">
                                                                    <i class="ri-more-fill"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill me-2 align-bottom text-muted"></i>View</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-download-2-fill me-2 align-bottom text-muted"></i>Download</a></li>
                                                                    <li class="dropdown-divider"></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill me-2 align-bottom text-muted"></i>Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar-sm">
                                                                    <div class="avatar-title bg-light text-secondary rounded fs-24">
                                                                        <i class="ri-video-line"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="ms-3 flex-grow-1">
                                                                    <h5 class="fs-14 mb-0"><a href="javascript:void(0);" class="text-dark">Tour-video.mp4</a></h5>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>MP4 File</td>
                                                        <td>14.62 MB</td>
                                                        <td>19 Nov 2021</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);" class="btn btn-soft-secondary btn-sm btn-icon" data-bs-toggle="dropdown" aria-expanded="true">
                                                                    <i class="ri-more-fill"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill me-2 align-bottom text-muted"></i>View</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-download-2-fill me-2 align-bottom text-muted"></i>Download</a></li>
                                                                    <li class="dropdown-divider"></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill me-2 align-bottom text-muted"></i>Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar-sm">
                                                                    <div class="avatar-title bg-light text-success rounded fs-24">
                                                                        <i class="ri-file-excel-fill"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="ms-3 flex-grow-1">
                                                                    <h5 class="fs-14 mb-0"><a href="javascript:void(0);" class="text-dark">Account-statement.xsl</a></h5>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>XSL File</td>
                                                        <td>2.38 KB</td>
                                                        <td>14 Nov 2021</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);" class="btn btn-soft-secondary btn-sm btn-icon" data-bs-toggle="dropdown" aria-expanded="true">
                                                                    <i class="ri-more-fill"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill me-2 align-bottom text-muted"></i>View</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-download-2-fill me-2 align-bottom text-muted"></i>Download</a></li>
                                                                    <li class="dropdown-divider"></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill me-2 align-bottom text-muted"></i>Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar-sm">
                                                                    <div class="avatar-title bg-light text-warning rounded fs-24">
                                                                        <i class="ri-folder-fill"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="ms-3 flex-grow-1">
                                                                    <h5 class="fs-14 mb-0"><a href="javascript:void(0);" class="text-dark">Project Screenshots Collection</a></h5>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>Floder File</td>
                                                        <td>87.24 MB</td>
                                                        <td>08 Nov 2021</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);" class="btn btn-soft-secondary btn-sm btn-icon" data-bs-toggle="dropdown" aria-expanded="true">
                                                                    <i class="ri-more-fill"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill me-2 align-bottom text-muted"></i>View</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-download-2-fill me-2 align-bottom text-muted"></i>Download</a></li>
                                                                    <li class="dropdown-divider"></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill me-2 align-bottom text-muted"></i>Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar-sm">
                                                                    <div class="avatar-title bg-light text-danger rounded fs-24">
                                                                        <i class="ri-image-2-fill"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="ms-3 flex-grow-1">
                                                                    <h5 class="fs-14 mb-0"><a href="javascript:void(0);" class="text-dark">Velzon-logo.png</a></h5>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>PNG File</td>
                                                        <td>879 KB</td>
                                                        <td>02 Nov 2021</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);" class="btn btn-soft-secondary btn-sm btn-icon" data-bs-toggle="dropdown" aria-expanded="true">
                                                                    <i class="ri-more-fill"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill me-2 align-bottom text-muted"></i>View</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-download-2-fill me-2 align-bottom text-muted"></i>Download</a></li>
                                                                    <li class="dropdown-divider"></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill me-2 align-bottom text-muted"></i>Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="text-center mt-3">
                                            <a href="javascript:void(0);" class="text-success "><i class="mdi mdi-loading mdi-spin fs-20 align-middle me-2"></i> Load more </a>
                                        </div>
                                    </div>
                                </div>
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

    @endpush

    @push('modals')
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Laisser votre dons</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
            <div class="form-group">
                    <label for="my-input">Text</label>
                    <input id="my-input" class="form-control" type="text" name="">
                </div>
                <div class="form-group">
                    <label for="my-input">Text</label>
                    <input id="my-input" class="form-control" type="text" name="">
                </div>
                <div class="form-group">
                    <label for="my-input">Text</label>
                    <input id="my-input" class="form-control" type="text" name="">
                </div>
                <button class="btn btn-lg btn-success mt-4">Valider mon dons</button>
            </div>
        </div>
    @endpush

</x-user-layout>
