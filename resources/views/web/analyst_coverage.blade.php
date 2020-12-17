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
        @slot('title') {{Session::get('locale') == 'id' ? 'Laporan Analis' : 'Analyst Coverage'}} @endslot
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
                                {{Session::get('locale') == 'id' ? 'Laporan Analis' : 'Analyst Coverage'}}
                            </li>
                        </ol>
                    </div>
                    <div class="row">


                        <div class="col-xs-12 col-sm-12 col-md-12 entry">
                            <div class="entry-content">

                                <table class="tftable">
                                    <thead>
                                        <tr>
                                            <th style="text-align:left">No</th>
                                            <th style="text-align:left">Firm</th>
                                            <th style="text-align:left">Analyst</th>
                                            <th style="text-align:left">Report</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($analyst_coverages as $key => $item)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$item->firm}}</td>
                                                <td>{{$item->analyst}}</td>
                                                <td><a href="{{asset('storage/'.$item->pdf)}}" target="_blank" class="open">Open</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('web.components.footer')
@endsection

