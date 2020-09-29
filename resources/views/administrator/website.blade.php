@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 animate__animated animate__fadeInDown">
        <h1 class="h3 mb-0 text-gray-800">Website Profile</h1>

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

            <form action="{{ $data ? route('website.update', ['key' => $data->key]) : route('website.store') }}" method="POST">
                @csrf

                @if ($data)
                    @method('PUT')
                @endif

                @component('administrator.components.input_filemanager')
                    @slot('filetype') image @endslot
                    @slot('name') logo @endslot
                    @slot('required') required @endslot

                    @if ($data)
                        @slot('value') {{$value->logo}} @endslot
                        @slot('image') <img src="{{asset('storage/'.$value->logo)}}" alt="preview" width="200"> @endslot
                    @endif

                @endcomponent

                @component('administrator.components.input_filemanager')
                    @slot('filetype') image @endslot
                    @slot('name') favicon @endslot
                    @slot('required') required @endslot

                    @if ($data)
                        @slot('value') {{$value->favicon}} @endslot
                        @slot('image') <img src="{{asset('storage/'.$value->favicon)}}" alt="preview" width="200"> @endslot
                    @endif

                @endcomponent

                @component('administrator.components.input_filemanager')
                    @slot('filetype') image @endslot
                    @slot('name') page_title_image @endslot
                    @slot('required') required @endslot

                    @if ($data)
                        @slot('value') {{$value->page_title_image}} @endslot
                        @slot('image') <img src="{{asset('storage/'.$value->page_title_image)}}" alt="preview" width="200"> @endslot
                    @endif

                @endcomponent

                @component('administrator.components.input_text')
                    @slot('name') title @endslot
                    @slot('value') {{$data ? $value->title : ''}} @endslot
                    @slot('required') required @endslot
                @endcomponent

                @component('administrator.components.input_textarea')
                    @slot('name') description @endslot
                    @slot('value') {{$data ? $value->description : ''}} @endslot
                    @slot('required') required @endslot
                @endcomponent

                @component('administrator.components.input_text')
                    @slot('name') keyword @endslot
                    @slot('value') {{$data ? $value->keyword : ''}} @endslot
                    @slot('required') required @endslot
                @endcomponent

                @component('administrator.components.input_text')
                    @slot('name') author @endslot
                    @slot('value') {{$data ? $value->author : ''}} @endslot
                    @slot('required') required @endslot
                @endcomponent

                @component('administrator.components.input_text')
                    @slot('name') sitename @endslot
                    @slot('value') {{$data ? $value->sitename : ''}} @endslot
                    @slot('required') required @endslot
                @endcomponent

                @component('administrator.components.input_text')
                    @slot('name') phone @endslot
                    @slot('value') {{$data ? $value->phone : ''}} @endslot
                    @slot('required') required @endslot
                @endcomponent

                @component('administrator.components.input_text')
                    @slot('name') email @endslot
                    @slot('value') {{$data ? $value->email : ''}} @endslot
                    @slot('type') email @endslot
                    @slot('required') required @endslot
                @endcomponent

                @component('administrator.components.input_textarea')
                    @slot('name') footer_description @endslot
                    @slot('value') {{$data ? $value->footer_description : ''}} @endslot
                    @slot('required') required @endslot
                @endcomponent

                <button type="submit" class="d-none d-sm-inline-block btn btn-primary shadow-sm" >{{__('Update')}}</button>
            </form>
        </div>

    </div>
</div>

@include('administrator.components.modal_filemanager')

@endsection
