@extends('layouts.web')

@php
    $website = json_decode($website->value);
    $title = json_decode($blog->title);
    $description = json_decode($blog->description);
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
        @slot('title') {{Session::get('locale') == 'id' ? 'Siaran Pers' : 'Press Release'}} @endslot
    @endcomponent

    <section class="single-post pt-0">
        <div class="container">
            <div class="row">

                <div class="col-xs-12 col-sm-12">
                    <div class="content-breadcrumb pb-sm">
                        <ol class="breadcrumb">
                            <li>
                                <a href="{{route('profile')}}">Corporate Secretary</a>
                            </li>
                            <li class="active">
                                {{Session::get('locale') == 'id' ? 'Siaran Pers' : 'Press Release'}}
                            </li>
                        </ol>
                    </div>
                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 entry">
                            <h2>
                                {{Session::get('locale') == 'id' ? $title->id : $title->en}}
                            </h2>
                            <div class="entry-content">
                                <p>
                                    <img src="{{asset('storage/'.$blog->image)}}" alt="{{Session::get('locale') == 'id' ? $title->id : $title->en}}" style="width: 100%;" />
                                </p>

                                @if (Session::get('locale') == 'id')
                                    {!! $description->id !!}
                                @else
                                    {!! $description->en !!}
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('web.components.footer')
@endsection

