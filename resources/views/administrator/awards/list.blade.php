@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 animate__animated animate__fadeInDown">
        <h1 class="h3 mb-0 text-gray-800">Awards and Certification</h1>

        <div class="btn-group" role="group">
            <a href="{{route('dashboard')}}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Go To Dashboard</a>
            <a href="{{route('awards.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-user fa-sm text-white-50"></i> Create New Awards</a>
        </div>
    </div>

    @include('administrator.components.alert')

    <!-- Content Row -->
    <div class="row animate__animated animate__fadeInUp">

        <!-- Content Column -->
        <div class="col-12 mb-4">

            <table class="table table-striped shadow-sm" id="datatable">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Type</th>
                        <th>Year</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($awards as $key => $item)

                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td><img src="{{asset('storage/'.$item->image)}}" alt="image" width="100"></td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->type }}</td>
                            <td>{{ $item->year }}</td>
                            <td>{{ date('d F Y H:i:s', strtotime($item->created_at)) }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{route('awards.edit', ['award' => $item->id])}}" class="btn btn-info btn-sm"> <i class="fas fa-pencil-alt fa-sm fa-fw"></i> <span>Edit</span></a>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="destroy({{$item->id}}, '{{$item->type}}')"> <i class="fas fa-trash fa-sm fa-fw"></i> <span>Delete</span></button>
                                </div>

                                <form id="destroy_{{$item->id}}" action="{{route('awards.destroy', ['award' => $item->id])}}" method="POST"> @csrf @method('DELETE') </form>
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

    function destroy(id, title) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: title+" akan dihapus permanen.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Hapus saja!',
            showClass: {
                popup: 'animate__animated animate__flipInX'
            },
            hideClass: {
                popup: 'animate__animated animate__flipOutX'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                var form = document.getElementById('destroy_'+id);
                form.submit();
                Swal.fire(
                    'Terhapus!',
                    'File sudah dihapus.',
                    'success'
                )
            }
        })
    }
</script>
@endpush
