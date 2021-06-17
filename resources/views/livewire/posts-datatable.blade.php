<div class="col-12 col-md-6 col-lg-12">
    <div class="card">

        <div class="card-header d-flex justify-content-between">
            {{-- <h4>Full Width</h4> --}}
            <a href="{{ route('post.add') }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i>
                Add</a>
            <div class="card-header-form">
                <form>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-md">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>category</th>
                        <th>Feature</th>
                        <th>Tags</th>
                        <th>Status</th>
                        <th>Author</th>
                        <th>Published</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->category->name }}</td>
                            <td>
                                <div class="badge badge-success">Active</div>
                            </td>
                            <td><a href="#" class="btn btn-secondary">Detail</a></td>
                        </tr>
                    @endforeach
                    {{-- <tr>
              <td>1</td>
              <td>Irwansyah Saputra</td>
              <td>2017-01-09</td>
              <td><div class="badge badge-success">Active</div></td>
              <td><a href="#" class="btn btn-secondary">Detail</a></td>
            </tr> --}}

                </table>
            </div>
        </div>
        <div class="card-footer text-right">
            <nav class="d-inline-block">
                <ul class="pagination mb-0">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1 <span
                                class="sr-only">(current)</span></a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
