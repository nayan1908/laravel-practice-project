@extends('admin_template')

@section('content')


<div class="container-fluid">
    @if($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Users</h3>
                    <div class="card-tools">
                        <a href="{{ url('users/create') }}" class="btn btn-tool bg-primary">
                            <i class="fas fa-plus"></i>&nbsp; Add New
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sr. No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i = 0)
                            @foreach($users as $user)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <form action="{{ url('users/delete/'.$user->id) }}" method="post">
                                        <a href="{{ url('users/view/'.$user->id) }}" class="btn btn-secondary btn-xs"
                                            title="view">View</a>
                                        <a href="{{ url('users/edit/'.$user->id) }}" class="btn btn-primary btn-xs"
                                            title="edit">Edit</a>
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-danger btn-xs" title="delete">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
    });
});
</script>
@endpush