@extends('layouts.web')

@php
    $website = json_decode($website->value);
@endphp

@section('favicon', asset('storage/'.$website->favicon))
@section('title', $website->title)
@section('description', $website->description)
@section('keyword', $website->keyword)
@section('author', $website->author)
@section('sitename', $website->sitename)

@section('content')
    @include('web.components.header')

    @component('web.components.page_title')
        @slot('image') {{asset('storage/'.$website->page_title_image)}} @endslot
        @slot('title') {{Session::get('locale') == 'id' ? 'Jasa Pertambangan Batubara & Mineral' : 'Coal & Mineral Mining Services'}} @endslot
    @endcomponent

    <section class="single-post pt-0">
        <div class="container">
           <div class="row">

                <div class="col-xs-12 col-sm-12">
                    <div class="content-breadcrumb pb-sm">
                        <ol class="breadcrumb">
                            <li>
                                <a href="{{route('coal')}}">Business</a>
                            </li>
                            <li>
                                    {{Session::get('locale') == 'id' ? 'Kegiatan Operasional' : 'Operational Activities'}}
                            </li>
                            <li class="active">
                                    {{Session::get('locale') == 'id' ? 'Jasa Pertambangan Batubara & Mineral' : 'Coal & Mineral Mining Services'}}
                            </li>
                        </ol>
                    </div>
                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 p-0">
                            @foreach ($coals as $key => $item)

                                @php
                                    $title = json_decode($item->title);
                                    $description = json_decode($item->description);
                                @endphp

                                @if ($key % 2 == 0)
                                    <div class="d-flex financial-state block-page-image mb-sm">
                                        <div class="col-xs-12 col-sm-6 col-md-6 parent-col-img p-0">
                                            <div class="col-img trans-layer">
                                                <div class="col-bg">
                                                    <img src="{{asset('storage/'.$item->image)}}" alt="Background"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6 bg-theme box-green">
                                                <div class="col-xs-12 service-block p-0 text-white">
                                                    <h4 class="titlePain">{{Session::get('locale') == 'id' ? $title->id : $title->en }}</h4>
                                                    <p>{{Session::get('locale') == 'id' ? $description->id : $description->en }}</p>
                                                </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="d-flex financial-state block-page-image mb-sm">
                                        <div class="col-xs-12 col-sm-6 col-md-6 bg-theme box-green">
                                                <div class="col-xs-12 service-block p-0 text-white">
                                                    <h4 class="titlePain">{{Session::get('locale') == 'id' ? $title->id : $title->en }}</h4>
                                                    <p>{{Session::get('locale') == 'id' ? $description->id : $description->en }}</p>
                                                </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6 parent-col-img p-0">
                                            <div class="col-img trans-layer">
                                                <div class="col-bg">
                                                    <img src="{{asset('storage/'.$item->image)}}" alt="Background"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif


                            @endforeach

                        </div>

                    </div>
                </div>

           </div>
        </div>
     </section>

    @include('web.components.footer')
@endsection
