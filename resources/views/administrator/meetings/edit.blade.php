@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 animate__animated animate__fadeInDown">
        <h1 class="h3 mb-0 text-gray-800">Edit Meeting</h1>

        <a href="{{route('meetings.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back To Meetings</a>
    </div>

    @include('administrator.components.alert')

    <!-- Content Row -->
    <div class="row animate__animated animate__fadeInUp">

        <!-- Content Column -->
        <div class="col-lg-8 mb-4">

            <form action="{{route('meetings.update', ['meeting' => $meeting->id])}}" method="POST">
                @csrf

                @method('PUT')

                @php
                    $title = json_decode($meeting->title);
                @endphp

                <div class="row">
                    <div class="col-md-6">
                        @component('administrator.components.input_text')
                            @slot('name') title_id @endslot
                            @slot('value') {{$title->id ?? ''}} @endslot
                            @slot('required') required @endslot
                        @endcomponent
                    </div>

                    <div class="col-md-6">
                        @component('administrator.components.input_text')
                            @slot('name') title_en @endslot
                            @slot('value') {{$title->en ?? ''}} @endslot
                            @slot('required') required @endslot
                        @endcomponent
                    </div>
                </div>

                @component('administrator.components.input_text')
                    @slot('name') year @endslot
                    @slot('type') number @endslot
                    @slot('value') {{$meeting->year}} @endslot
                    @slot('required') required @endslot
                @endcomponent

                @component('administrator.components.input_filemanager')
                    @slot('filetype') document @endslot
                    @slot('name') pdf @endslot
                    @slot('required') required @endslot

                    @slot('value') {{$meeting->pdf}} @endslot
                @endcomponent

                <button type="submit" class="d-none d-sm-inline-block btn btn-primary shadow-sm" >{{__('Update')}}</button>
            </form>
        </div>

    </div>
</div>

@include('administrator.components.modal_filemanager')

@endsection
