@extends('admin_template')

@section('content')

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Create User</h3>
                        <div class="card-tools">
                            <a href="{{ url('users') }}" class="btn btn-tool bg-primary">
                                <i class="fas fa-chevron-left"></i>&nbsp; Back
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{ url('users/store') }}">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                                    placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email<span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email') }}" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password<span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="password" name="password"
                                    value="" placeholder="Enter password">
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation ">Confirm Password<span
                                        class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="password_confirmation "
                                    name="password_confirmation" value=""
                                    placeholder="Enter confirm password">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection