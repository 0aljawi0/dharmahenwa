@extends('layouts.app')

@section('content')

@php
    $title = json_decode($policy->title);
    $description = json_decode($policy->description);
@endphp

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 animate__animated animate__fadeInDown">
        <h1 class="h3 mb-0 text-gray-800">Edit Policy</h1>

        <a href="{{route('policies.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back To Policies</a>
    </div>

    @include('administrator.components.alert')

    <!-- Content Row -->
    <div class="row animate__animated animate__fadeInUp">

        <!-- Content Column -->
        <div class="col-lg-12 mb-4">

            <form action="{{route('policies.update', ['policy' => $policy->id])}}" method="POST">
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
                        @component('administrator.components.input_summernote')
                            @slot('name') description_en @endslot
                            @slot('value') {{$description->en}} @endslot
                            @slot('summernote') summernote-en @endslot
                            @slot('required') required @endslot
                        @endcomponent
                    </div>
                    <div class="col-lg-6">
                        @component('administrator.components.input_summernote')
                            @slot('name') description_id @endslot
                            @slot('value') {{$description->id}} @endslot
                            @slot('summernote') summernote-id @endslot
                            @slot('required') required @endslot
                        @endcomponent
                    </div>
                </div>

                @component('administrator.components.input_filemanager')
                    @slot('filetype') document @endslot
                    @slot('name') pdf @endslot
                    @slot('required') required @endslot
                    @slot('value') {{$policy->pdf}} @endslot
                @endcomponent

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
