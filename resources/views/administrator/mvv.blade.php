@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 animate__animated animate__fadeInDown">
        <h1 class="h3 mb-0 text-gray-800">Manage Mission Vision Values</h1>

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

            <form action="{{ $data ? route('mvv.update', ['key' => $data->key]) : route('mvv.store') }}" method="POST">
                @csrf

                @if ($data)
                    @method('PUT')
                @endif

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="mission-tab" data-toggle="tab" href="#mission" role="tab" aria-controls="mission" aria-selected="true">Corporate Mission</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="vision-tab" data-toggle="tab" href="#vision" role="tab" aria-controls="vision" aria-selected="false">Corporate Vision</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="value-tab" data-toggle="tab" href="#value" role="tab" aria-controls="value" aria-selected="false">Corporate Values</a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active p-3 animate__animated animate__fade" id="mission" role="tabpanel" aria-labelledby="mission-tab">
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
                                @component('administrator.components.input_summernote')
                                    @slot('name') mission_en @endslot
                                    @slot('value') {{$data ? $value->mission_en : ''}} @endslot
                                    @slot('summernote') mission-en @endslot
                                    @slot('required') required @endslot
                                @endcomponent
                            </div>
                            <div class="col-lg-4">
                                @component('administrator.components.input_summernote')
                                    @slot('name') mission_id @endslot
                                    @slot('value') {{$data ? $value->mission_id : ''}} @endslot
                                    @slot('summernote') mission-id @endslot
                                    @slot('required') required @endslot
                                @endcomponent
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade p-3 animate__animated animate__fade" id="vision" role="tabpanel" aria-labelledby="vision-tab">
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
                                @component('administrator.components.input_summernote')
                                    @slot('name') vision_en @endslot
                                    @slot('value') {{$data ? $value->vision_en : ''}} @endslot
                                    @slot('summernote') vision-en @endslot
                                    @slot('required') required @endslot
                                @endcomponent
                            </div>
                            <div class="col-lg-4">
                                @component('administrator.components.input_summernote')
                                    @slot('name') vision_id @endslot
                                    @slot('value') {{$data ? $value->vision_id : ''}} @endslot
                                    @slot('summernote') vision-id @endslot
                                    @slot('required') required @endslot
                                @endcomponent
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade p-3 animate__animated animate__fade" id="value" role="tabpanel" aria-labelledby="value-tab">
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
                    </div>
                </div>


                <button type="submit" class="d-none d-sm-inline-block btn btn-primary shadow-sm" >{{__('Update')}}</button>
            </form>
        </div>

    </div>
</div>

@include('administrator.components.modal_filemanager')

@endsection

@push('script')
<script>
    $(function () {
        $('#mission-en').summernote({
            height: 300,
            dialogsInBody: true,
            callbacks: {
                onImageUpload: function(files) {
                    sendFile(files, '#mission-en');
                }
            }
        });

        $('#mission-id').summernote({
            height: 300,
            dialogsInBody: true,
            callbacks: {
                onImageUpload: function(files) {
                    sendFile(files, '#mission-id');
                }
            }
        });

        $('#vision-en').summernote({
            height: 300,
            dialogsInBody: true,
            callbacks: {
                onImageUpload: function(files) {
                    sendFile(files, '#vision-en');
                }
            }
        });

        $('#vision-id').summernote({
            height: 300,
            dialogsInBody: true,
            callbacks: {
                onImageUpload: function(files) {
                    sendFile(files, '#vision-id');
                }
            }
        });
    });
</script>
@endpush
