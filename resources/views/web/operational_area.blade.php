@extends('layouts.web')

@php
    $website = json_decode($website->value);
    $operational_area = json_decode($operational_area->value);
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
        @slot('title') {{Session::get('locale') == 'id' ? 'Wilayan Operasional' : 'Operational Area'}} @endslot
    @endcomponent

    @component('web.components.page_single')
        @slot('route_back') <a href="{{route('coal')}}">Business</a> @endslot
        @slot('title') {{Session::get('locale') == 'id' ? 'Wilayah Operasional' : 'Operational Area'}} @endslot

        @if (Session::get('locale') == 'id')
            {!! $operational_area->description_id !!}
        @else
            {!! $operational_area->description_en !!}
        @endif
    @endcomponent

    @include('web.components.footer')
@endsection
