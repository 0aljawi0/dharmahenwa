@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 animate__animated animate__fadeInDown">
        <h1 class="h3 mb-0 text-gray-800">Create New CSR</h1>

        <a href="{{route('csr.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back To CSR</a>
    </div>

    @include('administrator.components.alert')

    <!-- Content Row -->
    <div class="row animate__animated animate__fadeInUp">

        <!-- Content Column -->
        <div class="col-lg-12 mb-4">

            <form action="{{route('csr.store')}}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-lg-6">
                        @component('administrator.components.input_text')
                            @slot('name') title_english @endslot
                            @slot('value') {{old('title_english')}} @endslot
                            @slot('required') required @endslot
                        @endcomponent
                    </div>
                    <div class="col-lg-6">
                        @component('administrator.components.input_text')
                            @slot('name') title_indonesia @endslot
                            @slot('value') {{old('title_indonesia')}} @endslot
                            @slot('required') required @endslot
                        @endcomponent
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        @component('administrator.components.input_summernote')
                            @slot('name') description_english @endslot
                            @slot('value') {{old('description_english')}} @endslot
                            @slot('summernote') summernote-en @endslot
                            @slot('required') required @endslot
                        @endcomponent
                    </div>
                    <div class="col-lg-6">
                        @component('administrator.components.input_summernote')
                            @slot('name') description_indonesia @endslot
                            @slot('value') {{old('description_indonesia')}} @endslot
                            @slot('summernote') summernote-id @endslot
                            @slot('required') required @endslot
                        @endcomponent
                    </div>
                </div>

                @component('administrator.components.input_filemanager')
                    @slot('filetype') image @endslot
                    @slot('name') image @endslot
                    @slot('required') required @endslot
                @endcomponent

                <button type="submit" class="d-none d-sm-inline-block btn btn-primary shadow-sm" >{{__('Create')}}</button>
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
