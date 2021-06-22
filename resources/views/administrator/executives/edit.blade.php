@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 animate__animated animate__fadeInDown">
        <h1 class="h3 mb-0 text-gray-800">Edit Executive: {{ $executive->name }}</h1>

        <a href="{{route('executives.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back To Executives</a>
    </div>

    @include('administrator.components.alert')

    <!-- Content Row -->
    <div class="row animate__animated animate__fadeInUp">

        <!-- Content Column -->
        <div class="col-lg-6 mb-4">

            <form action="{{route('executives.update', ['executive' => $executive->id])}}" method="POST">
                @csrf

                @method('PUT')

                @component('administrator.components.input_filemanager')
                    @slot('filetype') image @endslot
                    @slot('name') photo @endslot
                    @slot('required') required @endslot

                    @slot('value') {{$executive->photo}} @endslot
                    @slot('image') <img src="{{asset('storage/'.$executive->photo)}}" alt="preview" width="200"> @endslot
                @endcomponent

                @component('administrator.components.input_text')
                    @slot('name') name @endslot
                    @slot('value') {{$executive->name}} @endslot
                    @slot('required') required @endslot
                @endcomponent

                @php
                    $position = json_decode($executive->position);
                    $bio = json_decode($executive->bio);
                @endphp

                <div class="row">
                    <div class="col-md-6">
                        @component('administrator.components.input_text')
                            @slot('name') position_en @endslot
                            @slot('value') {{$position->en ?? ''}} @endslot
                            @slot('required') required @endslot
                        @endcomponent

                        @component('administrator.components.input_textarea')
                            @slot('name') bio_en @endslot
                            @slot('value') {{$bio->en ?? ''}} @endslot
                            @slot('required') required @endslot
                        @endcomponent
                    </div>

                    <div class="col-md-6">
                        @component('administrator.components.input_text')
                            @slot('name') position_id @endslot
                            @slot('value') {{$position->id ?? ''}} @endslot
                            @slot('required') required @endslot
                        @endcomponent

                        @component('administrator.components.input_textarea')
                            @slot('name') bio_id @endslot
                            @slot('value') {{$bio->id ?? ''}} @endslot
                            @slot('required') required @endslot
                        @endcomponent
                    </div>
                </div>



                @component('administrator.components.input_select')
                    @slot('name') board @endslot
                    @slot('required') required @endslot

                    <option value="">Choose Board Of</option>
                    <option value="Commissioners" {{$executive->board == 'Commissioners' ? 'selected' : ''}}>Commissioners</option>
                    <option value="Directors" {{$executive->board == 'Directors' ? 'selected' : ''}}>Directors</option>
                    <option value="Management" {{$executive->board == 'Management' ? 'selected' : ''}}>Management</option>
                @endcomponent

                <button type="submit" class="d-none d-sm-inline-block btn btn-primary shadow-sm" >{{__('Update')}}</button>
            </form>
        </div>

    </div>
</div>

@include('administrator.components.modal_filemanager')

@endsection
