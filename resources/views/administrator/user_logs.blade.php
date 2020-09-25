@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 animate__animated animate__fadeInDown">
        <h1 class="h3 mb-0 text-gray-800">User Activity Logs</h1>
        <a href="{{route('dashboard')}}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Go To Dashboard</a>
    </div>

    <!-- Content Row -->
    <div class="row animate__animated animate__fadeInUp">

        <!-- Content Column -->
        <div class="col-lg-6 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Logs</h6>
                </div>
                <div class="card-body">
                    @if (!$user_logs->isEmpty())
                        @foreach ($user_logs as $item)
                            <h4 class="small font-weight-bold mb-2">{{$item->name}} <span class="float-right">{{date('d F Y H:i:s', strtotime($item->created_at))}}</span></h4>
                        @endforeach
                    @else
                        <h4 class="text-center font-weight-bold muted">Belum ada log aktifitas</h4>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
