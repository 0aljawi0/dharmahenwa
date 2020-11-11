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
        @slot('title') {{Session::get('locale') == 'id' ? 'Pencarian' : 'Search'}} @endslot
    @endcomponent

    <section class="single-post pt-0">
        <div class="container">
            <div class="row">

                <div class="col-xs-12 col-sm-12">
                    <div class="content-breadcrumb pb-sm">
                        <ol class="breadcrumb">
                            <li>
                                {{Session::get('locale') == 'id' ? 'Pencarian' : 'Search'}}
                            </li>

                            <li class="active">
                                {{$q}}
                            </li>
                        </ol>
                    </div>
                    <div class="row">

                        <div class="col-12">
                            <ul>
                                @if ($blogs)
                                    @foreach ($blogs as $item)
                                        @php
                                            $title = json_decode($item->title);
                                        @endphp

                                        <li>
                                            <a href="{{route('press_release_detail', ['id' => $item->id, 'title' => $title->en])}}">Press Release : {{Session::get('locale') == 'id' ? $title->id : $title->en}}</a>
                                        </li>
                                    @endforeach
                                @endif

                                @if ($newsletters)
                                    @foreach ($newsletters as $item)
                                        @php
                                            $title = json_decode($item->title);
                                        @endphp
                                        <li>
                                            <a href="{{asset('storage/'.$item->pdf)}}">Quarterly Newsletter : {{Session::get('locale') == 'id' ? $title->id ?? '' : $title->en ?? ''}}</a>
                                        </li>
                                    @endforeach
                                @endif

                                @if ($annual_reports)
                                    @foreach ($annual_reports as $item)
                                        <li>
                                            <a href="{{asset('storage/'.$item->pdf)}}">Annual Report : {{$item->title}}</a>
                                        </li>
                                    @endforeach
                                @endif

                                @if ($sustainabilities)
                                    @foreach ($sustainabilities as $item)
                                        <li>
                                            <a href="{{asset('storage/'.$item->pdf)}}">Sustainability Report : {{$item->title}}</a>
                                        </li>
                                    @endforeach
                                @endif

                                @if ($monthly_reports)
                                    @foreach ($monthly_reports as $item)
                                        @php
                                            $title = json_decode($item->title);
                                        @endphp
                                        <li>
                                            <a href="{{asset('storage/'.$item->pdf)}}">Monthly Report : {{Session::get('locale') == 'id' ? $title->id ?? '' : $title->en ?? ''}}</a>
                                        </li>
                                    @endforeach
                                @endif

                                @if ($financials)
                                    @foreach ($financials as $item)
                                        @php
                                            $title = json_decode($item->title);
                                        @endphp
                                        <li>
                                            <a href="{{asset('storage/'.$item->pdf)}}">Financial Statement : {{Session::get('locale') == 'id' ? $title->id ?? '' : $title->en ?? ''}}</a>
                                        </li>
                                    @endforeach
                                @endif

                            </ul>
                        </div>

                    </div>
                </div>



            </div>
        </div>
    </section>

    @include('web.components.footer')
@endsection

