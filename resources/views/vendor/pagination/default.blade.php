@if ($paginator->hasPages())
    <div class="ui borderless compact menu">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <div class="item disabled"><span>&laquo;</span></div>
        @else
            <div><a class="item" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></div>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <div class="item disabled"><span>{{ $element }}</span></div>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <div class="item active"><span>{{ $page }}</span></div>
                    @else
                        <div><a class="item" href="{{ $url }}">{{ $page }}</a></div>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <div><a class="item" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></div>
        @else
            <div class="item disabled"><span>&raquo;</span></div>
        @endif
    </div>
@endif
