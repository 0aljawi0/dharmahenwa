@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 animate__animated animate__fadeInDown">
        <h1 class="h3 mb-0 text-gray-800">Manage Mission Vision Value</h1>

        <a href="{{route('dashboard')}}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back To Dashboard</a>
    </div>

    @include('administrator.components.alert')

    <!-- Content Row -->
    <div class="row animate__animated animate__fadeInUp">

        <!-- Content Column -->
        <div class="col-12 mb-4">

            @php
                if($data) {
                    $value = json_decode($data->value);
                }
            @endphp

            <form action="{{ $data ? route('manage-mvv.update', ['key' => $data->key]) : route('manage-mvv.store') }}" method="POST">
                @csrf

                @if ($data)
                    @method('PUT')
                @endif

                <h4>Corporate Mission</h4>


                <div class="row">
                    <div class="col-lg-4">
                        @component('administrator.components.input_filemanager')
                            @slot('filetype') image @endslot
                            @slot('name') mission_image @endslot
                            @slot('required') required @endslot

                            @if ($data)
                                @slot('value') {{$value->mission_image}} @endslot
                                @slot('image') <img src="{{asset('storage/'.$value->mission_image)}}" alt="preview" width="200"> @endslot
                            @endif
                        @endcomponent
                    </div>
                    <div class="col-lg-4">
                        @component('administrator.components.input_textarea')
                            @slot('name') mission_en @endslot
                            @slot('value') {{$data ? $value->mission_en : ''}} @endslot
                            @slot('required') required @endslot
                        @endcomponent
                    </div>
                    <div class="col-lg-4">
                        @component('administrator.components.input_textarea')
                            @slot('name') mission_id @endslot
                            @slot('value') {{$data ? $value->mission_id : ''}} @endslot
                            @slot('required') required @endslot
                        @endcomponent
                    </div>
                </div>

                <h4>Corporate Vision</h4>

                <div class="row">
                    <div class="col-lg-4">
                        @component('administrator.components.input_filemanager')
                            @slot('filetype') image @endslot
                            @slot('name') vision_image @endslot
                            @slot('required') required @endslot

                            @if ($data)
                                @slot('value') {{$value->vision_image}} @endslot
                                @slot('image') <img src="{{asset('storage/'.$value->vision_image)}}" alt="preview" width="200"> @endslot
                            @endif
                        @endcomponent
                    </div>
                    <div class="col-lg-4">
                        @component('administrator.components.input_textarea')
                            @slot('name') vision_en @endslot
                            @slot('value') {{$data ? $value->vision_en : ''}} @endslot
                            @slot('required') required @endslot
                        @endcomponent
                    </div>
                    <div class="col-lg-4">
                        @component('administrator.components.input_textarea')
                            @slot('name') vision_id @endslot
                            @slot('value') {{$data ? $value->vision_id : ''}} @endslot
                            @slot('required') required @endslot
                        @endcomponent
                    </div>
                </div>

                <hr>

                <h4>Corporate Value</h4>

                <div class="row">
                    <div class="col-lg-4">
                        @component('administrator.components.input_filemanager')
                            @slot('filetype') image @endslot
                            @slot('name') corporate_value_1_icon @endslot
                            @slot('required') required @endslot

                            @if ($data)
                                @slot('value') {{$value->corporate_value_1_icon}} @endslot
                                @slot('image') <img src="{{asset('storage/'.$value->corporate_value_1_icon)}}" alt="preview" width="200"> @endslot
                            @endif
                        @endcomponent
                    </div>
                    <div class="col-lg-4">
                        @component('administrator.components.input_text')
                            @slot('name') corporate_value_1_en @endslot
                            @slot('value') {{$data ? $value->corporate_value_1_en : ''}} @endslot
                            @slot('required') required @endslot
                        @endcomponent
                    </div>
                    <div class="col-lg-4">
                        @component('administrator.components.input_text')
                            @slot('name') corporate_value_1_id @endslot
                            @slot('value') {{$data ? $value->corporate_value_1_id : ''}} @endslot
                            @slot('required') required @endslot
                        @endcomponent
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        @component('administrator.components.input_filemanager')
                            @slot('filetype') image @endslot
                            @slot('name') corporate_value_2_icon @endslot
                            @slot('required') required @endslot

                            @if ($data)
                                @slot('value') {{$value->corporate_value_2_icon}} @endslot
                                @slot('image') <img src="{{asset('storage/'.$value->corporate_value_2_icon)}}" alt="preview" width="200"> @endslot
                            @endif
                        @endcomponent
                    </div>
                    <div class="col-lg-4">
                        @component('administrator.components.input_text')
                            @slot('name') corporate_value_2_en @endslot
                            @slot('value') {{$data ? $value->corporate_value_2_en : ''}} @endslot
                            @slot('required') required @endslot
                        @endcomponent
                    </div>
                    <div class="col-lg-4">
                        @component('administrator.components.input_text')
                            @slot('name') corporate_value_2_id @endslot
                            @slot('value') {{$data ? $value->corporate_value_2_id : ''}} @endslot
                            @slot('required') required @endslot
                        @endcomponent
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        @component('administrator.components.input_filemanager')
                            @slot('filetype') image @endslot
                            @slot('name') corporate_value_3_icon @endslot
                            @slot('required') required @endslot

                            @if ($data)
                                @slot('value') {{$value->corporate_value_3_icon}} @endslot
                                @slot('image') <img src="{{asset('storage/'.$value->corporate_value_3_icon)}}" alt="preview" width="200"> @endslot
                            @endif
                        @endcomponent
                    </div>
                    <div class="col-lg-4">
                        @component('administrator.components.input_text')
                            @slot('name') corporate_value_3_en @endslot
                            @slot('value') {{$data ? $value->corporate_value_3_en : ''}} @endslot
                            @slot('required') required @endslot
                        @endcomponent
                    </div>
                    <div class="col-lg-4">
                        @component('administrator.components.input_text')
                            @slot('name') corporate_value_3_id @endslot
                            @slot('value') {{$data ? $value->corporate_value_3_id : ''}} @endslot
                            @slot('required') required @endslot
                        @endcomponent
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        @component('administrator.components.input_filemanager')
                            @slot('filetype') image @endslot
                            @slot('name') corporate_value_4_icon @endslot
                            @slot('required') required @endslot

                            @if ($data)
                                @slot('value') {{$value->corporate_value_4_icon}} @endslot
                                @slot('image') <img src="{{asset('storage/'.$value->corporate_value_4_icon)}}" alt="preview" width="200"> @endslot
                            @endif
                        @endcomponent
                    </div>
                    <div class="col-lg-4">
                        @component('administrator.components.input_text')
                            @slot('name') corporate_value_4_en @endslot
                            @slot('value') {{$data ? $value->corporate_value_4_en : ''}} @endslot
                            @slot('required') required @endslot
                        @endcomponent
                    </div>
                    <div class="col-lg-4">
                        @component('administrator.components.input_text')
                            @slot('name') corporate_value_4_id @endslot
                            @slot('value') {{$data ? $value->corporate_value_4_id : ''}} @endslot
                            @slot('required') required @endslot
                        @endcomponent
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        @component('administrator.components.input_filemanager')
                            @slot('filetype') image @endslot
                            @slot('name') corporate_value_5_icon @endslot
                            @slot('required') required @endslot

                            @if ($data)
                                @slot('value') {{$value->corporate_value_5_icon}} @endslot
                                @slot('image') <img src="{{asset('storage/'.$value->corporate_value_5_icon)}}" alt="preview" width="200"> @endslot
                            @endif
                        @endcomponent
                    </div>
                    <div class="col-lg-4">
                        @component('administrator.components.input_text')
                            @slot('name') corporate_value_5_en @endslot
                            @slot('value') {{$data ? $value->corporate_value_5_en : ''}} @endslot
                            @slot('required') required @endslot
                        @endcomponent
                    </div>
                    <div class="col-lg-4">
                        @component('administrator.components.input_text')
                            @slot('name') corporate_value_5_id @endslot
                            @slot('value') {{$data ? $value->corporate_value_5_id : ''}} @endslot
                            @slot('required') required @endslot
                        @endcomponent
                    </div>
                </div>


                <button type="submit" class="d-none d-sm-inline-block btn btn-primary shadow-sm" >{{__('Update')}}</button>
            </form>
        </div>

    </div>
</div>

@include('administrator.components.modal_filemanager')

@endsection
