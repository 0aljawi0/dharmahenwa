@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 animate__animated animate__fadeInDown">
        <h1 class="h3 mb-0 text-gray-800">Create New Committee</h1>

        <a href="{{route('committees.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back To Committees</a>
    </div>

    @include('administrator.components.alert')

    <!-- Content Row -->
    <div class="row animate__animated animate__fadeInUp">

        <!-- Content Column -->
        <div class="col-lg-6 mb-4">

            <form action="{{route('committees.store')}}" method="POST">
                @csrf

                @component('administrator.components.input_filemanager')
                    @slot('filetype') image @endslot
                    @slot('name') photo @endslot
                    @slot('required') required @endslot
                @endcomponent

                @component('administrator.components.input_text')
                    @slot('name') name @endslot
                    @slot('value') {{old('name')}} @endslot
                    @slot('required') required @endslot
                @endcomponent

                <div class="row">
                    <div class="col-md-6">
                        @component('administrator.components.input_text')
                            @slot('name') position_id @endslot
                            @slot('value') {{old('position_id')}} @endslot
                            @slot('required') required @endslot
                        @endcomponent

                        @component('administrator.components.input_textarea')
                            @slot('name') bio_id @endslot
                            @slot('value') {{old('bio_id')}} @endslot
                            @slot('required') required @endslot
                        @endcomponent
                    </div>

                    <div class="col-md-6">
                        @component('administrator.components.input_text')
                            @slot('name') position_en @endslot
                            @slot('value') {{old('position_en')}} @endslot
                            @slot('required') required @endslot
                        @endcomponent

                        @component('administrator.components.input_textarea')
                            @slot('name') bio_en @endslot
                            @slot('value') {{old('bio_en')}} @endslot
                            @slot('required') required @endslot
                        @endcomponent
                    </div>
                </div>

                @component('administrator.components.input_select')
                    @slot('name') type @endslot
                    @slot('required') required @endslot

                    <option value="">Choose Committee Of</option>
                    <option value="Audit">Audit</option>
                    <option value="Nomination & Remuneration">Nomination & Remuneration</option>
                    <option value="Risk Management">Risk Management</option>
                @endcomponent

                <button type="submit" class="d-none d-sm-inline-block btn btn-primary shadow-sm" >{{__('Create')}}</button>
            </form>
        </div>

    </div>
</div>

@include('administrator.components.modal_filemanager')

@endsection
