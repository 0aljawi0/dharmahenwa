@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 animate__animated animate__fadeInDown">
        <h1 class="h3 mb-0 text-gray-800">Address</h1>

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

            <form action="{{ $data ? route('address.update', ['key' => $data->key]) : route('address.store') }}" method="POST">
                @csrf

                @if ($data)
                    @method('PUT')
                @endif

                @component('administrator.components.input_textarea')
                    @slot('name') head_office @endslot
                    @slot('value') {{$data ? $value->head_office : ''}} @endslot
                    @slot('required') required @endslot
                @endcomponent

                @component('administrator.components.input_text')
                    @slot('name') operational_title_1 @endslot
                    @slot('value') {{$data ? $value->operational_title_1 : ''}} @endslot
                    @slot('required') required @endslot
                @endcomponent

                @component('administrator.components.input_textarea')
                    @slot('name') operational_address_1 @endslot
                    @slot('value') {{$data ? $value->operational_address_1 : ''}} @endslot
                    @slot('required') required @endslot
                @endcomponent

                @component('administrator.components.input_text')
                    @slot('name') operational_title_2 @endslot
                    @slot('value') {{$data ? $value->operational_title_2 : ''}} @endslot
                    @slot('required') required @endslot
                @endcomponent

                @component('administrator.components.input_textarea')
                    @slot('name') operational_address_2 @endslot
                    @slot('value') {{$data ? $value->operational_address_2 : ''}} @endslot
                    @slot('required') required @endslot
                @endcomponent

                @component('administrator.components.input_text')
                    @slot('name') operational_title_3 @endslot
                    @slot('value') {{$data ? $value->operational_title_3 : ''}} @endslot
                    @slot('required') required @endslot
                @endcomponent

                @component('administrator.components.input_textarea')
                    @slot('name') operational_address_3 @endslot
                    @slot('value') {{$data ? $value->operational_address_3 : ''}} @endslot
                    @slot('required') required @endslot
                @endcomponent

                @component('administrator.components.input_text')
                    @slot('name') operational_title_4 @endslot
                    @slot('value') {{$data ? $value->operational_title_4 : ''}} @endslot
                    @slot('required') required @endslot
                @endcomponent

                @component('administrator.components.input_textarea')
                    @slot('name') operational_address_4 @endslot
                    @slot('value') {{$data ? $value->operational_address_4 : ''}} @endslot
                    @slot('required') required @endslot
                @endcomponent

                <button type="submit" class="d-none d-sm-inline-block btn btn-primary shadow-sm" >{{__('Update')}}</button>
            </form>
        </div>

    </div>
</div>

@include('administrator.components.modal_filemanager')

@endsection
