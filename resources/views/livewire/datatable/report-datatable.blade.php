<div>
    <h2 class="section-title">{{ $report[$reportSelected] }}</h2>
    <p class="section-lead">
        You can export all report.
    </p>

    <div class="row">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-body">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link {{ $reportSelected == 0 ? 'active' : '' }}" wire:click="setSelectReport(0)" href="#">Article</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $reportSelected == 1 ? 'active' : '' }}" wire:click="setSelectReport(1)" href="#">Author</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h4>All Posts</h4>
                </div> --}}
                <div class="card-body">
                    <div class="float-left">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-calendar"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control daterange-cus" name="daterange-cus[]" value="{{ $start }} - {{ $end }}">
                        </div>
                    </div>
                    <div class="float-right">
                        <a href="{{ route('export', [$report[$reportSelected], $start, $end]) }}" class="btn btn-primary">Export</a>
                        {{-- <form>
                            <div class="input-group">

                                <input wire:model.debounce.500ms="search" type="text" class="form-control"
                                    placeholder="Search">
                                <input type="text" class="form-control" placeholder="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form> --}}
                    </div>

                    <div class="clearfix mb-3"></div>

                    <div class="table-responsive">
                        @if ($reportSelected == 0)
                            <table class="table table-striped">
                                <tr>
                                    <th>Status</th>
                                    <th>Total</th>
                                </tr>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>
                                            <div class="badge badge-primary">{{ $item['status'] }}</div>
                                        </td>
                                        <td>{{ $item['total'] }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            <table class="table table-striped">
                                <tr>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Total Article</th>
                                </tr>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>
                                            <a href="#">{{ $item->name }}</a>
                                        </td>
                                        <td>
                                            @foreach ($item->roles as $role)
                                                <div class="badge badge-info">{{ $role->name }}</div>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $item->author_post_count }}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @endif
                    </div>
                    {{-- <div class="float-right">
                        <nav>
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

</div>
