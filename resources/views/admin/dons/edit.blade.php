<x-admin-layout>

    <x-slot name="admin_category_index" >active</x-slot>

    @push('styles')
    <script src="{{ asset('assets/js/ckeditor.js') }}"></script>
        <script src="{{ asset('assets/js/md5.min.js') }}"></script>
    @endpush

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Modifier une collecte</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}">Tableau de bord</a></li>
                            <li class="breadcrumb-item active">Modifier une collecte</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="card">
            <div class="card-header">
                <h5>Modifier une collecte</h5>
            </div>
            <form action="{{route('admin_dons_update')}}" method="POST" class="card-body">
                @csrf
                <input type="hidden" name="collect_id" value="{{ encrypt($don->id) }}" >
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="" class="form-label">Titre</label>
                            <input  type="text" value="{{old('title',$don->title)}}"   name="title" id="" class="form-control" placeholder=""  />
                            @error('title')
                            <small id="helpId" class="text-muted">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Commence le </label>
                            <input  type="date" value="{{old('started',$don->started)}}"   name="started" id="" class="form-control" placeholder=""  />
                            @error('started')
                            <small id="helpId" class="text-muted">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Termine le </label>
                            <input  type="date" value="{{old('finished',$don->finished)}}"   name="finished" id="" class="form-control" placeholder=""  />
                            @error('finished')
                            <small id="helpId" class="text-muted">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Cagnotte prévue</label>
                            <input  type="text" value="{{old('cagnotte',$don->cagnotte)}}"   name="cagnotte" id="" class="form-control" placeholder=""  />
                            @error('cagnotte')
                            <small id="helpId" class="text-muted">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <textarea name="description" class="form-control description @error('description') is-invalid @enderror">{{ old('description',$don->description) }}</textarea>
                    </div>
                    <div class="col-12 mt-3">
                        <div class="mb-3">
                            <label for="" class="form-label">Des mots clés</label>
                            <input  type="text" value="{{old('tags',$don->tags)}}"   name="tags" id="" class="form-control" placeholder=""  />
                            @error('tags')
                            <small id="helpId" class="text-muted">{{$message}}</small>
                            @enderror
                            <i class="text-primary">Séparés par des tirets (-)</i>
                        </div>
                    </div>

                    <div class="col-12 mt-3 mb-3 text-end">
                        <button type="submit" class="btn btn-success">Modifier</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

    @push('scripts')
    <script>
        let toolbarItems = [
            'exportPDF', 'exportWord', '|',
            'findAndReplace', 'selectAll', '|',
            'heading', '|',
            'bold', 'italic', 'strikethrough', 'underline', '|',
            'bulletedList', 'numberedList', '|',
            'undo', 'redo', '|',
            'fontSize', 'fontFamily', 'fontColor', '|',
            'alignment', '|',
            'link', 'insertImage', 'blockQuote', '|',
            'specialCharacters', 'horizontalLine', '|',
            'sourceEditing'
        ];
        if (window.innerWidth < 760 ) {
            toolbarItems = [
                'bold', 'italic', '|',
                'bulletedList', 'numberedList', '|',
                'undo', 'redo', '|',
                'fontSize', '|',
                'link', 'insertImage', 'blockQuote'
            ];
        }

        const editorElements = document.querySelectorAll('.description');
        editorElements.forEach(element => {
            CKEDITOR.ClassicEditor.create(element, {
                // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
                toolbar: {
                    items:toolbarItems,
                    shouldNotGroupWhenFull: true
                },
                // Changing the language of the interface requires loading the language file using the <script> tag.
                // language: 'es',
                list: {
                    properties: {
                        styles: true,
                        startIndex: true,
                        reversed: true
                    }
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                        { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                        { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                        { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                    ]
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
                placeholder: '',
                // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
                fontFamily: {
                    options: [
                        'default',
                        'Arial, Helvetica, sans-serif',
                        'Courier New, Courier, monospace',
                        'Georgia, serif',
                        'Lucida Sans Unicode, Lucida Grande, sans-serif',
                        'Tahoma, Geneva, sans-serif',
                        'Times New Roman, Times, serif',
                        'Trebuchet MS, Helvetica, sans-serif',
                        'Verdana, Geneva, sans-serif'
                    ],
                    supportAllValues: true
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
                fontSize: {
                    options: [ 10, 12, 14, 'default', 18, 20, 22 ],
                    supportAllValues: true
                },
                // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
                // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
                htmlSupport: {
                    allow: [
                        {
                            name: /.*/,
                            attributes: true,
                            classes: true,
                            styles: true
                        }
                    ]
                },
                // Be careful with enabling previews
                // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
                htmlEmbed: {
                    showPreviews: true
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
                link: {
                    decorators: {
                        addTargetToExternalLinks: true,
                        defaultProtocol: 'https://',
                        toggleDownloadable: {
                            mode: 'manual',
                            label: 'Downloadable',
                            attributes: {
                                download: 'file'
                            }
                        }
                    }
                },
                // The "super-build" contains more premium features that require additional configuration, disable them below.
                // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
                removePlugins: [
                    // These two are commercial, but you can try them out without registering to a trial.
                    // 'ExportPdf',
                    // 'ExportWord',
                    'CKBox',
                    'CKFinder',
                    'EasyImage',
                    'RealTimeCollaborativeComments',
                    'RealTimeCollaborativeTrackChanges',
                    'RealTimeCollaborativeRevisionHistory',
                    'PresenceList',
                    'Comments',
                    'TrackChanges',
                    'TrackChangesData',
                    'RevisionHistory',
                    'Pagination',
                    'WProofreader',
                    'MathType',
                    'MediaEmbed'
                ]
            }).then(editor => {
                configureCKEditor(editor);
            }).catch(error => {
                console.error(error);
            });
        });
    </script>
    @endpush

</x-admin-layout>
