@extends('layouts.web')

@php
    $website = json_decode($website->value);
    $title = json_decode($csr_detail->title);
    $description = json_decode($csr_detail->description);
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
        @slot('title') {{Session::get('locale') == 'id' ? $title->id : $title->en}} @endslot
    @endcomponent

    @component('web.components.page_single')
    @slot('route_back') <a href="{{route('sustainability_report')}}">Sustainability</a> @endslot
        @slot('title') {{Session::get('locale') == 'id' ? $title->id : $title->en}} @endslot

        <img src="{{asset('storage/'.$csr_detail->image)}}" alt="{{$title->en}}" width="100%">
        <br>
        <br>

        @if (Session::get('locale') == 'id')
            {!! $description->id !!}
        @else
            {!! $description->en !!}
        @endif
    @endcomponent

    @include('web.components.footer')
@endsection
