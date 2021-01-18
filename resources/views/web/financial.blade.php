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
        @slot('title') {{Session::get('locale') == 'id' ? 'Laporan Keuangan' : 'Financial Statement'}} @endslot
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
                                {{Session::get('locale') == 'id' ? 'Laporan Keuangan' : 'Financial Statement'}}
                            </li>
                        </ol>
                    </div>
                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 entry">
                            <h2>
                                {{Session::get('locale') == 'id' ? 'Laporan Keuangan' : 'Financial Statement'}}
                            </h2>
                            <div class="entry-content">

                                <div class="clear-l showCaption ">
                                    <div class="d-flex">
                                        @foreach ($financials as $item)
                                            @php
                                                $title = json_decode($item->title);
                                            @endphp

                                            <div class="col-xs-12 col-lg-3 col-md-6 gms-list align-center border-bg hv-green">
                                                <div class="col-md-12">
                                                    <div class="cnt-list flex-85">
                                                        <p><strong>{{Session::get('locale') == 'id' ? $title->id ?? '' : $title->en ?? ''}}</strong></p>
                                                    </div>
                                                    <div class="link-list flex-1 mt-sm btn-kecil">
                                                        <a href="{{asset('storage/'.$item->pdf)}}" target="_blank" class="open">Open</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-12 text-center">
                                        {{$financials->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- <div class="col-xs-12 box-report-white">
                            <h2>
                                Download Financial Report
                            </h2>
                            <div class="d-flex">
                                <div class="col-xs-12 service-block p-0">
                                    @foreach ($year as $item)
                                        <div class="list-report-white">
                                            <h4 class="titlePain">{{$item}}</h4>
                                            <div class="service-desc font-16">
                                                @foreach ($financials as $f)
                                                    @if ($f->year == $item)
                                                        <a href="#" class="open">Financial Statement {{$f->month}} {{$f->year}}</a>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('web.components.footer')
@endsection

