@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 animate__animated animate__fadeInDown">
        <h1 class="h3 mb-0 text-gray-800">Port Management Service</h1>

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

            <form action="{{ $data ? route('port.update', ['key' => $data->key]) : route('port.store') }}" method="POST">
                @csrf

                @if ($data)
                    @method('PUT')
                @endif

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
