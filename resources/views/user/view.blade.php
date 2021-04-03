@extends('admin_template')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">View User</h3>
                        <div class="card-tools">
                            <a href="{{ url('users') }}" class="btn btn-tool bg-primary">
                                <i class="fas fa-chevron-left"></i>&nbsp; Back
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}"
                                readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection