{{-- <ul class="ts-pagination">
    @if($results->onFirstPage())
    @else
        <li><a href="{{ $results->previousPageUrl() }}"><i class="fa fa-angle-left"></i></a></li>
    @endif
    <li><a href="#">1</a></li>
    <li><a href="#" class="active">{{ $results->perPage() }}</a></li>
    @if ($results->hasMorePages())
        <li><a href="{{ $results->nextPageUrl() }}"><i class="fa fa-angle-right"></i></a></li>
    @endif

    @foreach ($results->getUrlRange(1, 5) as $item)
        {{ $item }}
    @endforeach
</ul> --}}


@if ($paginator->hasPages())
    <ul class="ts-pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        @else
            <li>
                <li><a href="{{ $paginator->previousPageUrl() }}"><i class="fa fa-angle-left"></i></a></li>
                {{-- <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a> --}}
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        {{-- <li class="active" aria-current="page"><span>{{ $page }}</span></li> --}}
                        <li><a href="#" class="active">{{ $page }}</a></li>
                    @else
                        {{-- <li><a href="{{ $url }}">{{ $page }}</a></li> --}}
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <li><a href="{{ $paginator->nextPageUrl() }}"><i class="fa fa-angle-right"></i></a></li>
                {{-- <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a> --}}
            </li>
        @else
            
        @endif
    </ul>
@endif
