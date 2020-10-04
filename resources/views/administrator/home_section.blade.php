@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 animate__animated animate__fadeInDown">
        <h1 class="h3 mb-0 text-gray-800">Home Section</h1>

        <a href="{{route('dashboard')}}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back To Dashboard</a>
    </div>

    @include('administrator.components.alert')

    <!-- Content Row -->
    <div class="row animate__animated animate__fadeInUp">

        <!-- Content Column -->
        <div class="col-lg-6 mb-4">

            @php
                if($data) {
                    $value = json_decode($data->value);
                }
            @endphp

            <form action="{{ $data ? route('home-section.update', ['key' => $data->key]) : route('home-section.store') }}" method="POST">
                @csrf

                @if ($data)
                    @method('PUT')
                @endif

                <h4>Home Section : Services</h4>

                @component('administrator.components.input_filemanager')
                    @slot('filetype') image @endslot
                    @slot('name') image_1 @endslot
                    @slot('required') required @endslot

                    @if ($data)
                        @slot('value') {{$value->image_1}} @endslot
                        @slot('image') <img src="{{asset('storage/'.$value->image_1)}}" alt="preview" width="200"> @endslot
                    @endif

                @endcomponent

                @component('administrator.components.input_filemanager')
                    @slot('filetype') image @endslot
                    @slot('name') image_2 @endslot
                    @slot('required') required @endslot

                    @if ($data)
                        @slot('value') {{$value->image_2}} @endslot
                        @slot('image') <img src="{{asset('storage/'.$value->image_2)}}" alt="preview" width="200"> @endslot
                    @endif

                @endcomponent

                @component('administrator.components.input_filemanager')
                    @slot('filetype') image @endslot
                    @slot('name') image_3 @endslot
                    @slot('required') required @endslot

                    @if ($data)
                        @slot('value') {{$value->image_3}} @endslot
                        @slot('image') <img src="{{asset('storage/'.$value->image_3)}}" alt="preview" width="200"> @endslot
                    @endif

                @endcomponent

                <hr>

                <h4>Home Section : Video</h4>

                @component('administrator.components.input_text')
                    @slot('name') video @endslot
                    @slot('value') {{$data ? $value->video : ''}} @endslot
                    @slot('required') required @endslot
                @endcomponent

                <button type="submit" class="d-none d-sm-inline-block btn btn-primary shadow-sm" >{{__('Update')}}</button>
            </form>
        </div>

    </div>
</div>

@include('administrator.components.modal_filemanager')

@endsection
