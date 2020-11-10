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
        @slot('title') {{Session::get('locale') == 'id' ? 'Jajaran Direktur' : 'Board Of Directors'}} @endslot
    @endcomponent

    <section class="single-post pt-0">
        <div class="container">
            <div class="row">

                <div class="col-xs-12 col-sm-12">

                    <div class="content-breadcrumb pb-sm">
                        <ol class="breadcrumb">
                            <li>
                                <a href="{{ route('about-company-profile') }}">About</a>
                            </li>
                            <li >
                                {{Session::get('locale') == 'id' ? 'Eksekutif' : 'Executives'}}
                            </li>
                            <li class="active">
                                {{Session::get('locale') == 'id' ? 'Jajaran Direktur' : 'Board Of Directors'}}
                            </li>
                        </ol>
                    </div>

                    <div class="col-xs-12 col-sm-12 p-0 pb-0">

                        <div class="contentmg p-0">
                            <ul class="list-management">
                                @foreach ($directors as $item)
                                    @php
                                        $position = json_decode($item->position);
                                        $bio = json_decode($item->bio);
                                    @endphp

                                    <li>
                                        <div class="imagemng col-md-4 col-sm-12 columns p-0">
                                            <img src="{{ asset('storage/'.$item->photo) }}" alt="{{ $item->name }}" />
                                        </div>
                                        <div class="detailmg col-md-8 col-sm-12 columns p-0">
                                            <h1>{{ $item->name }}</h1>
                                            <h2>{{ Session::get('locale') == 'id' ? $position->id ?? '' : $position->en ?? '' }}</h2>
                                            <p>{{ Session::get('locale') == 'id' ? $bio->id ?? '' : $bio->en ?? '' }}</p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('web.components.footer')
@endsection
