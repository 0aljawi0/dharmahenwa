@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 animate__animated animate__fadeInDown">
        <h1 class="h3 mb-0 text-gray-800">Edit Awards / Certification</h1>

        <a href="{{route('awards.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back To Awards</a>
    </div>

    @include('administrator.components.alert')

    <!-- Content Row -->
    <div class="row animate__animated animate__fadeInUp">

        <!-- Content Column -->
        <div class="col-lg-12 mb-4">

            <form action="{{route('awards.update', ['award' => $award->id])}}" method="POST">
                @csrf

                @method('PUT')

                @component('administrator.components.input_textarea')
                    @slot('name') description @endslot
                    @slot('value') {{$award->description}} @endslot
                    @slot('required') required @endslot
                @endcomponent

                @component('administrator.components.input_text')
                    @slot('name') year @endslot
                    @slot('type') number @endslot
                    @slot('value') {{$award->year}} @endslot
                    @slot('required') required @endslot
                @endcomponent

                @component('administrator.components.input_select')
                    @slot('name') type @endslot
                    @slot('required') required @endslot

                    <option value="">Choose</option>
                    <option value="Awards" {{$award->type == 'Awards' ? 'selected' : ''}}>Awards</option>
                    <option value="Certification" {{$award->type == 'Certification' ? 'selected' : ''}}>Certification</option>
                @endcomponent

                @component('administrator.components.input_filemanager')
                    @slot('filetype') image @endslot
                    @slot('name') image @endslot
                    @slot('required') required @endslot

                    @slot('value') {{$award->image}} @endslot
                    @slot('image') <img src="{{asset('storage/'.$award->image)}}" alt="preview" width="200"> @endslot
                @endcomponent

                <button type="submit" class="d-none d-sm-inline-block btn btn-primary shadow-sm" >{{__('Update')}}</button>
            </form>
        </div>

    </div>
</div>

@include('administrator.components.modal_filemanager')

@endsection
