@if ($paginator->hasPages())
    <div class="row">
        <div class="col-lg-12">
            <ul class="pagination">
                {{-- Previous Button --}}
                @if ($paginator->onFirstPage())
                    <li><a href="#" style="pointer-events: none; color: #ccc;"><<</a></li>
                @else
                    <li><a href="{{ $paginator->previousPageUrl() }}"><<</a></li>
                @endif

                {{-- Page Numbers --}}
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <li><a href="#" style="pointer-events: none;">{{ $element }}</a></li>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li><a class="is_active" href="#">{{ $page }}</a></li>
                            @else
                                <li><a href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Button --}}
                @if ($paginator->hasMorePages())
                    <li><a href="{{ $paginator->nextPageUrl() }}">>></a></li>
                @else
                    <li><a href="#" style="pointer-events: none; color: #ccc;">>></a></li>
                @endif
            </ul>
        </div>
    </div>
@endif
