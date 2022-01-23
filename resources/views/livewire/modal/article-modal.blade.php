<div>
    <div class="col-12 col-md-6 col-lg-12">
        <div class="card">

            <div class="card-header d-flex justify-content-between">
                <div class="card-header-form">
                    {{-- <form> --}}
                    <div class="input-group">

                        <input wire:model.debounce.500ms="search" type="text" class="form-control"
                            placeholder="Search">
                        {{-- <input type="text" class="form-control" placeholder="Search">
                            <div class="input-group-btn">
                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div> --}}
                    </div>
                    {{-- </form> --}}
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>category</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-action btn-choice mr-1"
                                        data-title="{{ $item->title }}"
                                        data-url="{{ env('WEBSITE_URL') . $item->category->slug }}/{{ $item->id }}/{{ Carbon\Carbon::parse($item->created_at)->format('dmY') }}/{{ $item->slug }}"
                                        name="button"><i class="fas fa-plus"></i></button>
                                </td>
                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>
            <div class="card-footer text-right">
                {{ $data->links('layouts.custom-pagination') }}
            </div>
        </div>
    </div>

</div>
