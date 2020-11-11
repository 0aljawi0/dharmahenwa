@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 animate__animated animate__fadeInDown">
        <h1 class="h3 mb-0 text-gray-800">Milestone</h1>

        <div class="btn-group" role="group">
            <a href="{{route('dashboard')}}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Go To Dashboard</a>
            <a href="{{route('milestones.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-user fa-sm text-white-50"></i> Create New Milestone</a>
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
                        <th width="10%">No</th>
                        <th width="50%">Title</th>
                        <th width="10%">Year</th>
                        <th width="20%">Created At</th>
                        <th width="10%">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($milestones as $key => $item)
                        @php
                            $title = json_decode($item->title);
                        @endphp

                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $title->en ?? '' }}</td>
                            <td>{{ $item->year ?? '' }}</td>
                            <td>{{ date('d F Y H:i:s', strtotime($item->created_at)) }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{route('milestones.edit', ['milestone' => $item->id])}}" class="btn btn-info btn-sm"> <i class="fas fa-pencil-alt fa-sm fa-fw"></i> <span>Edit</span></a>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="destroy({{$item->id}}, '{{$title->en ?? ''}}')"> <i class="fas fa-trash fa-sm fa-fw"></i> <span>Delete</span></button>
                                </div>

                                <form id="destroy_{{$item->id}}" action="{{route('milestones.destroy', ['milestone' => $item->id])}}" method="POST"> @csrf @method('DELETE') </form>
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
