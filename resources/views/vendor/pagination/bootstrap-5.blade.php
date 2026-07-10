@if ($paginator->hasPages())
    <Style>
        .pagination-wrapper {
            margin-top: 60px;
            text-align: center;
        }

        .pagination {
            gap: 12px;
        }

        .pagination .page-item {
            list-style: none;
        }

        .pagination .page-link {
            width: 48px;
            height: 48px;
            border: 1px solid #e5e5e5;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #111;
            background: #fff;
            font-size: 16px;
            font-weight: 600;
            transition: .3s;
            box-shadow: none;
        }

        .pagination .page-link:hover {
            background: #111;
            color: #fff;
            border-color: #111;
        }

        .pagination .page-item.active .page-link {
            background: #111;
            color: #fff;
            border-color: #111;
        }

        .pagination .page-item.disabled .page-link {
            opacity: .45;
            pointer-events: none;
            background: #f8f8f8;
        }

        .pagination .page-link:focus {
            box-shadow: none;
        }
    </Style>

    <div class="pagination-wrapper mt-60">
        <nav aria-label="Page navigation">

            <ul class="pagination justify-content-center">

                {{-- Previous --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">
                            <i class="fal fa-angle-left"></i>
                        </span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                            <i class="fal fa-angle-left"></i>
                        </a>
                    </li>
                @endif

                {{-- Pages --}}
                @foreach ($elements as $element)

                    @if (is_string($element))
                        <li class="page-item disabled">
                            <span class="page-link">{{ $element }}</span>
                        </li>
                    @endif

                    @if (is_array($element))

                        @foreach ($element as $page => $url)

                            @if ($page == $paginator->currentPage())

                                <li class="page-item active">
                                    <span class="page-link">
                                        {{ $page }}
                                    </span>
                                </li>

                            @else

                                <li class="page-item">
                                    <a class="page-link" href="{{ $url }}">
                                        {{ $page }}
                                    </a>
                                </li>

                            @endif

                        @endforeach

                    @endif

                @endforeach

                {{-- Next --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">
                            <i class="fal fa-angle-right"></i>
                        </a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link">
                            <i class="fal fa-angle-right"></i>
                        </span>
                    </li>
                @endif

            </ul>

        </nav>
    </div>

@endif