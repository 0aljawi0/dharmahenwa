@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 animate__animated animate__fadeInDown">
        <h1 class="h3 mb-0 text-gray-800">Edit Shareholder</h1>

        <a href="{{route('shareholders.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back To Shareholder</a>
    </div>

    @include('administrator.components.alert')

    <!-- Content Row -->
    <div class="row animate__animated animate__fadeInUp">

        <!-- Content Column -->
        <div class="col-lg-12 mb-4">

            <form action="{{route('shareholders.update', ['shareholder' => $shareholder->id])}}" method="POST">
                @csrf

                @method('PUT')

                @component('administrator.components.input_text')
                    @slot('name') name @endslot
                    @slot('value') {{$shareholder->name}} @endslot
                    @slot('required') required @endslot
                @endcomponent

                @component('administrator.components.input_text')
                    @slot('name') share @endslot
                    @slot('data_attr') data-mask="000.000.000.000.000" data-mask-reverse="true" @endslot
                    @slot('value') {{$shareholder->share}} @endslot
                    @slot('required') required @endslot
                @endcomponent

                @component('administrator.components.input_text')
                    @slot('name') percent @endslot
                    @slot('type') number @endslot
                    @slot('value') {{$shareholder->percent}} @endslot
                    @slot('required') required @endslot
                @endcomponent

                <button type="submit" class="d-none d-sm-inline-block btn btn-primary shadow-sm" >{{__('Update')}}</button>
            </form>
        </div>

    </div>
</div>

@include('administrator.components.modal_filemanager')

@endsection
