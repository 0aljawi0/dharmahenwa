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
        @slot('title') {{Session::get('locale') == 'id' ? 'Manual Kebijakan Perusahaan' : 'Code Of Conduct'}} @endslot
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
                            <li class="active">
                                {{Session::get('locale') == 'id' ? 'Manual Kebijakan Perusahaan' : 'Corporate Policy Manual'}}
                            </li>
                        </ol>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 entry">
						<div class="entry-content">

                            @foreach ($policy as $item)
                                @php
                                    $title = json_decode($item->title);
                                    $description = json_decode($item->description);
                                @endphp

                                <h2 class="text-main">{{Session::get('locale') == 'id' ? $title->id : $title->en}}</h2>
                                <p>
                                    @if (Session::get('locale') == 'id')
                                        {!! $description->id !!}
                                    @else
                                        {!! $description->en !!}
                                    @endif
                                </p>
                                <p>
                                    The substances of the charter can be seen in the following document <br>
                                    <a href="{{asset('storage/'.$item->pdf)}}" target="_blank">{{Session::get('locale') == 'id' ? $title->id : $title->en}}</a>
                                </p>
                                <br />
                                <hr class="b-all" />
                            @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    @include('web.components.footer')
@endsection
