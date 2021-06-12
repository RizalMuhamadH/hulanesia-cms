<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="d-inline-block">
            <ul class="pagination mb-0">
                @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link" tabindex="-1"><i class="fas fa-chevron-left"></i></span>
                  </li>
                @else
                <li class="page-item">
                    <button wire:click="previousPage"  rel="prev" class="page-link"><i class="fas fa-chevron-left"></i></button>
                  </li>
                @endif

                @foreach ($elements as $element)
                    @if (is_array($element))
                    @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                    <li class="page-item active"><button class="page-link" wire:click="gotoPage({{$page}})">{{$page}}</button></li>
                    @else
                    <li class="page-item">
                        <button class="page-link" wire:click="gotoPage({{$page}})">{{$page}}</button>
                      </li>
                    @endif
                    @endforeach
                    @endif
                @endforeach                

                @if ($paginator->hasMorePages())
                <li class="page-item">
                    <button wire:click="nextPage"  rel="next" class="page-link"><i class="fas fa-chevron-right"></i></button>
                  </li>
                @else
                <li class="page-item disabled">
                    <span class="page-link"><i class="fas fa-chevron-right"></i></span>
                  </li>
                @endif
                
              </ul>
              
            
        </nav>
    @endif
</div>