@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 animate__animated animate__fadeInDown">
        <h1 class="h3 mb-0 text-gray-800">Manage Company Profile</h1>

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

            <form action="{{ $data ? route('manage-company-profile.update', ['key' => $data->key]) : route('manage-company-profile.store') }}" method="POST">
                @csrf

                @if ($data)
                    @method('PUT')
                @endif

                @component('administrator.components.input_filemanager')
                    @slot('filetype') image @endslot
                    @slot('name') image @endslot
                    @slot('required') required @endslot

                    @if ($data)
                        @slot('value') {{$value->image}} @endslot
                        @slot('image') <img src="{{asset('storage/'.$value->image)}}" alt="preview" width="200"> @endslot
                    @endif

                @endcomponent

                <div class="row">
                    <div class="col-lg-6">
                        @component('administrator.components.input_text')
                            @slot('name') title_en @endslot
                            @slot('value') {{$data ? $value->title_en : ''}} @endslot
                            @slot('required') required @endslot
                        @endcomponent
                    </div>
                    <div class="col-lg-6">
                        @component('administrator.components.input_text')
                            @slot('name') title_id @endslot
                            @slot('value') {{$data ? $value->title_id : ''}} @endslot
                            @slot('required') required @endslot
                        @endcomponent
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        @component('administrator.components.input_summernote')
                            @slot('name') description_en @endslot
                            @slot('value') {{$data ? $value->description_en : ''}} @endslot
                            @slot('summernote') summernote-en @endslot
                            @slot('required') required @endslot
                        @endcomponent
                    </div>
                    <div class="col-lg-6">
                        @component('administrator.components.input_summernote')
                            @slot('name') description_id @endslot
                            @slot('value') {{$data ? $value->description_id : ''}} @endslot
                            @slot('summernote') summernote-id @endslot
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

@push('script')
<script>
    $(function () {
        $('#summernote-en').summernote({
            height: 300,
            dialogsInBody: true,
            callbacks: {
                onImageUpload: function(files) {
                    sendFile(files, '#summernote-en');
                }
            }
        });

        $('#summernote-id').summernote({
            height: 300,
            dialogsInBody: true,
            callbacks: {
                onImageUpload: function(files) {
                    sendFile(files, '#summernote-id');
                }
            }
        });
    });
</script>
@endpush
