@if ($paginator->hasPages())
<div class="row">
    <div class="col-12">
        <ul class="pagination mt-3 justify-content-center pagination_style1">
            @if ($paginator->onFirstPage())

            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}"  class="page-link"  rel="prev" aria-label="@lang('pagination.previous')">
                       Précedent
                    </a>
                </li>
            @endif


            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif

            @endforeach

            @if ($paginator->hasMorePages())
                <li>
                    <a  class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                        Suivant
                    </a>
                </li>
            @else
            @endif
        </ul>
    </div>
</div>
@endif



