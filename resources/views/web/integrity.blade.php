@extends('layouts.web')

@php
    $website = json_decode($website->value);
    $integrity = json_decode($integrity->value);
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
        @slot('title') {{Session::get('locale') == 'id' ? 'Pakta Integritas' : 'Integrity Pact'}} @endslot
    @endcomponent

    @component('web.components.page_single')
        @slot('route_back') <a href="{{route('gcg')}}">Corporate Governance</a> @endslot
        @slot('title') {{Session::get('locale') == 'id' ? 'Pakta Integritas' : 'Integrity Pact'}} @endslot

        @if (Session::get('locale') == 'id')
            {!! $integrity->description_id !!}
        @else
            {!! $integrity->description_en !!}
        @endif
    @endcomponent

    @include('web.components.footer')
@endsection
