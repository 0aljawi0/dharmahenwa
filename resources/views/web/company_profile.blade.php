@extends('layouts.web')

@php
    $website = json_decode($website->value);
    $company_profile = json_decode($company_profile->value);
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
        @slot('image') {{asset('storage/'.$company_profile->image)}} @endslot
        @slot('title') {{Session::get('locale') == 'id' ? $company_profile->title_id : $company_profile->title_en}} @endslot
    @endcomponent

    @component('web.components.page_single')
        @slot('title') {{Session::get('locale') == 'id' ? $company_profile->title_id : $company_profile->title_en}} @endslot

        @if (Session::get('locale') == 'id')
            {!! $company_profile->description_id !!}
        @else
            {!! $company_profile->description_en !!}
        @endif
    @endcomponent

    @include('web.components.footer')
@endsection
