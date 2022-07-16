@extends('layouts.app')
@push('style')
@endpush
@section('body')
    <div class="section-header">
        <h1>Profile</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Profile</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="col-12 col-md-12 col-lg-7 m-auto">
            <div class="card">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
              <form method="POST" action="{{ route('profile.update', $user->id) }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
                @csrf
                <div class="card-header">
                  <h4>Edit Profile</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-12 text-center">
                            <figure class="avatar mr-2 avatar-xl">
                                <img src="{{ $user->image ? env('STORAGE').$user->image->thumbnail('medium', 'path') : 'https://ui-avatars.com/api/?name='.Auth::user()->name.'&color=7F9CF5&background=EBF4FF' }}" alt="...">
                            </figure>
                        </div>
                      </div>
                    <div class="row">
                      <div class="form-group col-12">
                        <label>Name</label>
                        <input type="text" class="form-control" value="{{ $user->name }}" name="name" required="">
                        <div class="invalid-feedback">
                          Please fill in the first name
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                          <label>email</label>
                          <input type="email" class="form-control" value="{{ $user->email }}" name="email" required="" disabled>
                          <div class="invalid-feedback">
                            Please fill in the email
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6 col-12">
                        <label>Password</label>
                        <input type="password" class="form-control" value="" name="password">
                        <div class="invalid-feedback">
                          Please fill in the password
                        </div>
                      </div>
                      <div class="form-group col-md-6 col-12">
                        <label>Password Confirmation</label>
                        <input type="password" class="form-control" value="" name="password_confirmation">
                      </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary">Save Changes</button>
                </div>
              </form>
            </div>
          </div>
    </div>
@endsection
@push('script')
@if (session('message'))
    <script>
        iziToast.success({
            title: '',
            message: "{{ session('message') }}",
            position: 'topRight' 
        });

    </script>
@endif
@endpush