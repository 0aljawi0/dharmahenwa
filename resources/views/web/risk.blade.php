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
        @slot('title') {{Session::get('locale') == 'id' ? 'Komite Manajemen Risiko' : 'Risk Management Committee'}} @endslot
    @endcomponent

    <section class="single-post pt-0">
        <div class="container">
            <div class="row">

                <div class="col-xs-12 col-sm-12">

                    <div class="content-breadcrumb pb-sm">
                        <ol class="breadcrumb">
                            <li>
                                <a href="{{ route('gcg') }}">Corporate Governance</a>
                            </li>
                            <li >
                                {{Session::get('locale') == 'id' ? 'Komite' : 'Committee'}}
                            </li>
                            <li class="active">
                                {{Session::get('locale') == 'id' ? 'Komite Manajemen Risiko' : 'Risk Management Committee'}}
                            </li>
                        </ol>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 entry">
                        <ul class="comitee">
                            @foreach ($risk as $item)
                                <li>
                                    <div class="row">
                                        <div class="col-md-4 col-xs-12">
                                            <img src="{{ asset('storage/'.$item->photo) }}" alt="{{ $item->name }}" />
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <span class="name-title">{{ $item->name }}</span>
                                            <p class="headline">{{ $item->position }}</p>
                                            <p>{{ $item->bio }}</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('web.components.footer')
@endsection
