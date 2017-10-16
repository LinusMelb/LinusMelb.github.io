<!-- Created in 2017-08-21. USE FOR FORUM ONLY. -->
@if ($paginator->hasPages())

    <div class="container" style="text-align: center; width: 100%">
        <div class="row">
            <div class="col-lg-12 col-xs-12 col-md-12">
                <div>
                    <ul class="paginationforum">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li class="disabled"><a disabled>&laquo;</a></li>
                    @else
                        <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li class="hidden-xs disabled"><span>{{ $element }}</span></li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li ><a class="active" disabled>{{ $page }}</a></li>
                                @else
                                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
                    @else
                        <li class="disabled"><a>&raquo;</a></li>
                    @endif
                    </ul>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@else

    <div class='row pagi-placeholder'></div>

@endif
