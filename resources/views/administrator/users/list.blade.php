@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">User Management</h1>

        <div class="btn-group" role="group">
            <a href="{{route('dashboard')}}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Go To Dashboard</a>
            <a href="{{route('users.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-user fa-sm text-white-50"></i> Create New User</a>
        </div>

    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-12 mb-4">

            <table class="table table-striped shadow-sm" id="datatable">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ date('d F Y H:i:s', strtotime($item->created_at)) }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{route('users.edit', ['user' => $item->id])}}" class="btn btn-info btn-sm"> <i class="fas fa-pencil-alt fa-sm fa-fw"></i> <span>Edit</span></a>
                                    <button type="button" class="btn btn-danger btn-sm"> <i class="fas fa-trash fa-sm fa-fw"></i> <span>Delete</span></button>
                                </div>

                                <form id="destroy_{{$item->id}}" action="{{route('users.destroy', ['user' => $item->id])}}" method="POST"> @csrf @method('DELETE') </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

        </div>

    </div>
</div>

@endsection

@push('script')
<script type="text/javascript">
    $(function () {
        $('#datatable').DataTable();
    });
</script>
@endpush
