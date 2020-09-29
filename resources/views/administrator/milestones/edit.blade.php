@extends('layouts.app')

@section('content')

@php
    $title = json_decode($milestone->title);
    $description = json_decode($milestone->description);
@endphp

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 animate__animated animate__fadeInDown">
        <h1 class="h3 mb-0 text-gray-800">Edit Milestone: {{ $title->en }}</h1>

        <a href="{{route('manage-milestones.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back To Milestone</a>
    </div>

    @include('administrator.components.alert')

    <!-- Content Row -->
    <div class="row animate__animated animate__fadeInUp">

        <!-- Content Column -->
        <div class="col-lg-12 mb-4">

            <form action="{{route('manage-milestones.update', ['manage_milestone' => $milestone->id])}}" method="POST">
                @csrf

                @method('PUT')

                <div class="row">
                    <div class="col-lg-6">
                        @component('administrator.components.input_text')
                            @slot('name') title_en @endslot
                            @slot('value') {{$title->en}} @endslot
                            @slot('required') required @endslot
                        @endcomponent
                    </div>
                    <div class="col-lg-6">
                        @component('administrator.components.input_text')
                            @slot('name') title_id @endslot
                            @slot('value') {{$title->id}} @endslot
                            @slot('required') required @endslot
                        @endcomponent
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        @component('administrator.components.input_textarea')
                            @slot('name') description_en @endslot
                            @slot('value') {{$description->en}} @endslot
                            @slot('required') required @endslot
                        @endcomponent
                    </div>
                    <div class="col-lg-6">
                        @component('administrator.components.input_textarea')
                            @slot('name') description_id @endslot
                            @slot('value') {{$description->id}} @endslot
                            @slot('required') required @endslot
                        @endcomponent
                    </div>
                </div>

                @component('administrator.components.input_text')
                    @slot('name') year @endslot
                    @slot('type') num @endslot
                    @slot('value') {{$milestone->year}} @endslot
                    @slot('required') required @endslot
                @endcomponent

                @component('administrator.components.input_filemanager')
                    @slot('filetype') image @endslot
                    @slot('name') image @endslot
                    @slot('required') required @endslot

                    @slot('value') {{$milestone->image}} @endslot
                    @slot('image') <img src="{{asset('storage/'.$milestone->image)}}" alt="preview" width="200"> @endslot
                @endcomponent



                <button type="submit" class="d-none d-sm-inline-block btn btn-primary shadow-sm" >{{__('Update')}}</button>
            </form>
        </div>

    </div>
</div>

@include('administrator.components.modal_filemanager')

@endsection
