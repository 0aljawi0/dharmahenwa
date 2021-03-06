@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 animate__animated animate__fadeInDown">
        <h1 class="h3 mb-0 text-gray-800">Edit Sustainability Report</h1>

        <a href="{{route('sustainabilities.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back To Sustainability Reports</a>
    </div>

    @include('administrator.components.alert')

    <!-- Content Row -->
    <div class="row animate__animated animate__fadeInUp">

        <!-- Content Column -->
        <div class="col-lg-12 mb-4">

            <form action="{{route('sustainabilities.update', ['sustainability' => $sustainability->id])}}" method="POST">
                @csrf

                @method('PUT')

                @component('administrator.components.input_text')
                    @slot('name') title @endslot
                    @slot('value') {{$sustainability->title}} @endslot
                    @slot('required') required @endslot
                @endcomponent

                @component('administrator.components.input_filemanager')
                    @slot('filetype') image @endslot
                    @slot('name') image @endslot
                    @slot('required') required @endslot

                    @slot('value') {{$sustainability->image}} @endslot
                    @slot('image') <img src="{{asset('storage/'.$sustainability->image)}}" alt="preview" width="200"> @endslot
                @endcomponent

                @component('administrator.components.input_filemanager')
                    @slot('filetype') document @endslot
                    @slot('name') pdf @endslot
                    @slot('required') required @endslot

                    @slot('value') {{$sustainability->pdf}} @endslot
                @endcomponent

                <button type="submit" class="d-none d-sm-inline-block btn btn-primary shadow-sm" >{{__('Update')}}</button>
            </form>
        </div>

    </div>
</div>

@include('administrator.components.modal_filemanager')

@endsection
