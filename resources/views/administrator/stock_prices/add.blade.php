@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 animate__animated animate__fadeInDown">
        <h1 class="h3 mb-0 text-gray-800">Create New Stock Price</h1>

        <a href="{{route('stock-prices.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back To Stock Price</a>
    </div>

    @include('administrator.components.alert')

    <!-- Content Row -->
    <div class="row animate__animated animate__fadeInUp">

        <!-- Content Column -->
        <div class="col-lg-6 mb-4">

            <form action="{{route('stock-prices.store')}}" method="POST">
                @csrf

                @component('administrator.components.input_text')
                    @slot('name') value @endslot
                    @slot('type') number @endslot
                    @slot('value') {{old('value')}} @endslot
                    @slot('required') required @endslot
                @endcomponent

                <div class="row">
                    <div class="col-lg-4">
                        @component('administrator.components.input_select')
                            @slot('name') day @endslot
                            @slot('required') required @endslot

                            <option value="">Choose Month</option>

                            @for ($i = 1; $i < 32; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        @endcomponent
                    </div>
                    <div class="col-lg-4">
                        @component('administrator.components.input_select')
                            @slot('name') month @endslot
                            @slot('required') required @endslot

                            @php
                                $month = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                            @endphp

                            <option value="">Choose Month</option>
                            @foreach ($month as $key => $item)
                                <option value="{{$key+1}}">{{$item}}</option>
                            @endforeach
                        @endcomponent
                    </div>
                    <div class="col-lg-4">
                        @component('administrator.components.input_text')
                            @slot('name') year @endslot
                            @slot('type') number @endslot
                            @slot('value') {{old('year')}} @endslot
                            @slot('required') required @endslot
                        @endcomponent
                    </div>
                </div>

                <button type="submit" class="d-none d-sm-inline-block btn btn-primary shadow-sm" >{{__('Create')}}</button>
            </form>
        </div>

    </div>
</div>

@include('administrator.components.modal_filemanager')

@endsection
