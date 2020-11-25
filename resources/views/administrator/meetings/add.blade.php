@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 animate__animated animate__fadeInDown">
        <h1 class="h3 mb-0 text-gray-800">Create New Meeting</h1>

        <a href="{{route('meetings.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back To Meetings</a>
    </div>

    @include('administrator.components.alert')

    <!-- Content Row -->
    <div class="row animate__animated animate__fadeInUp">

        <!-- Content Column -->
        <div class="col-lg-8 mb-4">

            <form action="{{route('meetings.store')}}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        @component('administrator.components.input_text')
                            @slot('name') title_id @endslot
                            @slot('value') {{old('title_id')}} @endslot
                            @slot('required') required @endslot
                        @endcomponent
                    </div>

                    <div class="col-md-6">
                        @component('administrator.components.input_text')
                            @slot('name') title_en @endslot
                            @slot('value') {{old('title_en')}} @endslot
                            @slot('required') required @endslot
                        @endcomponent
                    </div>
                </div>

                @component('administrator.components.input_text')
                    @slot('name') year @endslot
                    @slot('type') number @endslot
                    @slot('value') {{old('year')}} @endslot
                    @slot('required') required @endslot
                @endcomponent

                @component('administrator.components.input_filemanager')
                    @slot('filetype') document @endslot
                    @slot('name') pdf @endslot
                    @slot('required') required @endslot
                @endcomponent

                <button type="submit" class="d-none d-sm-inline-block btn btn-primary shadow-sm" >{{__('Create')}}</button>
            </form>
        </div>

    </div>
</div>

@include('administrator.components.modal_filemanager')

@endsection
