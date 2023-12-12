<div class="text-right float-right">
                    @if ($data->hasPages())
                        <ul class="pagination pagination">
                            @if ($data->onFirstPage())
                                <li class="disabled page-item "><span class="page-link">Previous</span></li>
                            @else
                                <li class=" page-item "><a class="page-link" href="{{ $data->previousPageUrl() }}" rel="prev">Previous</a>
                                </li>
                            @endif

                            @if($data->currentPage() > 3)
                                <li class="hidden-xs  page-item "><a class="page-link" href="{{ $data->url(1) }}">1</a></li>
                            @endif
                            @if($data->currentPage() > 4)
                                <li class="disabled hidden-xs  page-item "><span class="page-link">...</span></li>
                            @endif
                            @foreach(range(1, $data->lastPage()) as $i)
                                @if($i >= $data->currentPage() - 2 && $i <= $data->currentPage() + 2)
                                    @if ($i == $data->currentPage())
                                        <li class="active  page-item "><span class="page-link">{{ $i }}</span></li>
                                    @else
                                        <li class=" page-item "><a class="page-link" href="{{ $data->url($i) }}">{{ $i }}</a></li>
                                    @endif
                                @endif
                            @endforeach
                            @if($data->currentPage() < $data->lastPage() - 3)
                                <li class="disabled hidden-xs  page-item "><span class="page-link">...</span></li>
                            @endif
                            @if($data->currentPage() < $data->lastPage() - 2)
                                <li class="hidden-xs  page-item "><a class="page-link"
                                                                    href="{{ $data->url($data->lastPage()) }}">{{ $data->lastPage() }}</a>
                                </li>
                            @endif

                            {{-- Next Page Link --}}
                            @if ($data->hasMorePages())
                                <li class=" page-item "><a class="page-link" href="{{ $data->nextPageUrl() }}" rel="next">Next</a>
                                </li>
                            @else
                                <li class="disabled  page-item "><span class="page-link">Next</span></li>
                            @endif
                        </ul>
                    @endif
                </div> 