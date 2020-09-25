@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 animate__animated animate__fadeInDown">
        <h1 class="h3 mb-0 text-gray-800">Update User : {{$user->name}}</h1>

        <a href="{{route('users.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back To Users</a>
    </div>

    @include('administrator.components.alert')

    <!-- Content Row -->
    <div class="row animate__animated animate__fadeInUp">

        <!-- Content Column -->
        <div class="col-lg-6 mb-4">

            <form action="{{route('users.update', ['user' => $user->id])}}" method="POST">
                @csrf
                @method('PUT')

                @component('administrator.components.input_text')
                    @slot('name') name @endslot
                    @slot('value') {{$user->name}} @endslot
                    @slot('required') required @endslot
                @endcomponent

                @component('administrator.components.input_text')
                    @slot('name') email @endslot
                    @slot('type') email @endslot
                    @slot('value') {{$user->email}} @endslot
                    @slot('required') required @endslot
                @endcomponent

                <hr>
                <p>
                    <small class="text-primary">Gantilah password dengan berkala, untuk keamanan lebih.</small>
                </p>


                @component('administrator.components.input_text')
                    @slot('name') password @endslot
                    @slot('type') password @endslot
                @endcomponent

                @component('administrator.components.input_text')
                    @slot('name') password_confirmation @endslot
                    @slot('type') password @endslot
                @endcomponent

                <button type="submit" class="d-none d-sm-inline-block btn btn-primary shadow-sm" >{{__('Update')}}</button>
            </form>
        </div>

    </div>
</div>

@endsection
