@extends('layouts.app')

@section('content')

@php
    $title = json_decode($slider->title);
    $subtitle = json_decode($slider->subtitle);
@endphp

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 animate__animated animate__fadeInDown">
        <h1 class="h3 mb-0 text-gray-800">Edit Slider: {{$title->en}}</h1>

        <a href="{{route('sliders.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back To Sliders</a>
    </div>

    @include('administrator.components.alert')

    <!-- Content Row -->
    <div class="row animate__animated animate__fadeInUp">

        <!-- Content Column -->
        <div class="col-lg-6 mb-4">

            <form action="{{route('sliders.update', ['slider' => $slider->id])}}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-lg-6">
                        @component('administrator.components.input_text')
                            @slot('name') title_english @endslot
                            @slot('value') {{$title->en}} @endslot
                            @slot('required') required @endslot
                        @endcomponent
                    </div>
                    <div class="col-lg-6">
                        @component('administrator.components.input_text')
                            @slot('name') title_indonesia @endslot
                            @slot('value') {{$title->id}} @endslot
                            @slot('required') required @endslot
                        @endcomponent
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        @component('administrator.components.input_textarea')
                            @slot('name') subtitle_english @endslot
                            @slot('value') {{$subtitle->en}} @endslot
                            @slot('required') required @endslot
                        @endcomponent
                    </div>
                    <div class="col-lg-6">
                        @component('administrator.components.input_textarea')
                            @slot('name') subtitle_indonesia @endslot
                            @slot('value') {{$subtitle->id}} @endslot
                            @slot('required') required @endslot
                        @endcomponent
                    </div>
                </div>

                @component('administrator.components.input_text')
                    @slot('name') link @endslot
                    @slot('value') {{$slider->link}} @endslot
                @endcomponent

                @component('administrator.components.input_filemanager')
                    @slot('filetype') image @endslot
                    @slot('name') image @endslot
                    @slot('required') required @endslot
                    @slot('value') {{$slider->image}} @endslot
                    @slot('image') <img src="{{asset('storage/'.$slider->image)}}" alt="preview" width="200"> @endslot
                @endcomponent

                <button type="submit" class="d-none d-sm-inline-block btn btn-primary shadow-sm" >{{__('Update')}}</button>
            </form>
        </div>

    </div>
</div>

@include('administrator.components.modal_filemanager')

@endsection
