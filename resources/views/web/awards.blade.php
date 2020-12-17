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
        @slot('title') {{Session::get('locale') == 'id' ? 'Penghargaan & Sertifikasi' : 'Awards & Certifications'}} @endslot
    @endcomponent

    <section class="single-post">
        <div class="container">
            <div class="row">

                <div class="col-xs-12 col-sm-12">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 link-head">
                            <ul class="link-center-abt">
                                <li class="current"><a href="{{ route('awards') }}">{{Session::get('locale') == 'id' ? 'Penghargaan' : 'Awards'}}</a></li>
                                <li><a href="{{ route('certification') }}">{{Session::get('locale') == 'id' ? 'Sertifikasi' : 'Certifications'}}</a></li>
                            </ul>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 projects-filter">
                            <ul class="list-inline">
                                <li>
                                    <a class="active-filter" href="#" data-filter="*">All Awards</a>
                                </li>

                                @foreach ($year as $item)
                                <li>
                                    <a href="#" data-filter=".{{ $item }}">{{ $item }}</a>
                                </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>

                    <div id="projects-all" class="row showCaption">
                        @foreach ($awards as $item)
                        <div class="col-xs-12 col-sm-6 col-md-4 project-item sertification-item {{ $item->year }}">
                            <div class="project-img">
                                <a class="img-popup" href="{{ asset('storage/'.$item->image) }}" title="{{ $item->description }}">
                                    <img class="img-responsive" src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->description }}"/>
                                </a>
                            </div>

                            <div class="project-hover hei-218">
                                <div class="project-meta hei-125">
                                    <a class="img-popup" href="{{ asset('storage/'.$item->image) }}" title="{{ $item->description }}">
                                        <h4>{{ $item->description }}</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('web.components.footer')
@endsection
