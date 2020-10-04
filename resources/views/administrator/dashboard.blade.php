@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 animate__animated animate__fadeInDown">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    @include('administrator.components.alert')




    <div class="row animate__animated animate__fadeInUp">

        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Messages</h6>
                </div>
                <div class="card-body">
                    @if (!$messages)
                        <p>No messages found.</p>
                    @else
                        @foreach ($messages as $item)
                            <blockquote class="blockquote mb-0">
                                <p>{{$item->message}}</p>
                                <footer class="blockquote-footer text-gray-500">
                                    <small><i class="fas fa-user fa-sm fa-fw"></i> {{$item->name}}</small> |
                                    <small><i class="fas fa-envelope fa-sm fa-fw"></i> {{$item->email}}</small> |
                                    <small><i class="fas fa-phone fa-sm fa-fw"></i> {{$item->phone}}</small> |
                                    <small><i class="fas fa-clock fa-sm fa-fw"></i> {{date('d F Y H:i:s', strtotime($item->created_at))}}</small> |
                                    <button type="button" class="btn btn-sm btn-default text-danger" onclick="destroy_message({{$item->id}}, '{{$item->name}}')">Delete</button>
                                </footer>
                            </blockquote>

                            <form id="destroy_message_{{$item->id}}" action="{{route('message.destroy', ['id' => $item->id])}}" method="POST"> @csrf @method('DELETE') </form>

                            <hr>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Violation Reports</h6>
                </div>
                <div class="card-body">

                    <div class="row">
                        @if (!$violations)
                            <p>No messages found.</p>
                        @else
                            @foreach ($violations as $item)

                            @php
                                $evidence = json_decode($item->evidence);
                            @endphp

                                <div class="col-md-6">
                                    <div class="card">

                                        {{-- <img class="card-img-top" src="..." alt="{{$item->name}}"> --}}
                                        <div id="carousel{{$item->id}}" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                @foreach ($evidence as $k => $e)
                                                    <div class="carousel-item {{$k == 0 ? 'active' : ''}}">
                                                        <img class="d-block w-100" src="{{asset('storage/'.$e)}}" alt="{{$item->name}}">
                                                    </div>
                                                @endforeach
                                            </div>
                                            <a class="carousel-control-prev" href="#carousel{{$item->id}}" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carousel{{$item->id}}" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>

                                        <div class="card-body">
                                            <h5 class="card-title">{{$item->category_violation}}</h5>

                                            <small>Party Reported</small> <br>
                                            <p class="card-text">{{$item->party_reported}}</p>

                                            <small>Details</small> <br>
                                            <p class="card-text">{{$item->violation_detail}}</p>

                                            <small>Date</small> <br>
                                            <p class="card-text">{{date('d F Y H:i:s', strtotime($item->created_at))}}</p>
                                        </div>

                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">{{$item->name}}</li>
                                            <li class="list-group-item">{{$item->email}}</li>
                                            <li class="list-group-item">{{$item->phone}}</li>
                                        </ul>

                                        <div class="card-body">
                                            <button type="button" class="btn btn-sm btn-default text-danger" onclick="destroy_violation({{$item->id}}, '{{$item->name}}')">Delete</button>
                                        </div>
                                    </div>

                                    <form id="destroy_violation_{{$item->id}}" action="{{route('violation.destroy', ['id' => $item->id])}}" method="POST"> @csrf @method('DELETE') </form>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                            {{$violations->links()}}
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@push('script')
<script type="text/javascript">
    $(function () {
        $('#datatable').DataTable();
    });

    function destroy_message(id, title) {
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
                var form = document.getElementById('destroy_message_'+id);
                form.submit();
                Swal.fire(
                    'Terhapus!',
                    'File sudah dihapus.',
                    'success'
                )
            }
        })
    }

    function destroy_violation(id, title) {
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
                var form = document.getElementById('destroy_violation_'+id);
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

