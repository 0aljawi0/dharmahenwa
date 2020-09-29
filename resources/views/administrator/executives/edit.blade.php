@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 animate__animated animate__fadeInDown">
        <h1 class="h3 mb-0 text-gray-800">Edit Executive: {{ $executive->name }}</h1>

        <a href="{{route('manage-executives.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back To Milestone</a>
    </div>

    @include('administrator.components.alert')

    <!-- Content Row -->
    <div class="row animate__animated animate__fadeInUp">

        <!-- Content Column -->
        <div class="col-lg-12 mb-4">

            <form action="{{route('manage-executives.update', ['manage_executive' => $executive->id])}}" method="POST">
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

                @component('administrator.components.input_text')
                    @slot('name') position @endslot
                    @slot('value') {{$executive->position}} @endslot
                    @slot('required') required @endslot
                @endcomponent

                @component('administrator.components.input_textarea')
                    @slot('name') bio @endslot
                    @slot('value') {{$executive->bio}} @endslot
                    @slot('required') required @endslot
                @endcomponent

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
