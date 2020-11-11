@extends('layouts.web')

@php
    $website = json_decode($website->value);
    $csr_page = json_decode($csr_page->value);
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
        @slot('title') {{Session::get('locale') == 'id' ? 'Tanggung Jawab Sosial Perusahaan' : 'Corporate Social Responsibility'}} @endslot
    @endcomponent

    <section class="single-post pt-0">
        <div class="container">
            <div class="row">

                <div class="col-xs-12 col-sm-12">
                    <div class="content-breadcrumb pb-sm">
                        <ol class="breadcrumb">
                            <li>
                                Sustainability
                            </li>
                            <li class="active">
                                {{Session::get('locale') == 'id' ? 'Tanggung Jawab Sosial Perusahaan' : 'Corporate Social Responsibility'}}
                            </li>
                        </ol>
                    </div>

                    <div id="projects-all" class="row showCaption d-flex space-projectcsr">

                        @foreach ($csr as $item)

                        @php
                            $title = json_decode($item->title)
                        @endphp

                            <div class="col-xs-12 col-sm-6 col-md-3 project-item">
                                <div class="project-img">
                                    <img class="img-responsive" src="{{asset('storage/'.$item->image)}}" alt="{{$title->en}}"/>
                                    <div class="project-hover bg-theme caption-csr">
                                        <a href="{{route('web_csr_detail', ['id' => $item->id, 'title' => $title->en])}}"/>
                                            <h4>
                                                {{Session::get('locale') == 'id' ? $title->id : $title->en}}
                                            </h4>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 entry">
                        <div class="row entry-content">
                            @if (Session::get('locale') == 'id')
                                {!! $csr_page->description_id !!}
                            @else
                                {!! $csr_page->description_en !!}
                            @endif
                        </div>
                    </div>

                    <div class="row gallery-csr full-img">
                        <div class="col-xs-12">
                            <h2 class="text-main">
                                Gallery
                            </h2>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 csr-gallery p-0 projects-fullwidth">

                            @foreach ($csr_galleries as $item)
                                <div class="col-xs-12 col-sm-6 col-md-4 project-item">
                                    <div class="project-img">
                                        <img class="" src="{{asset('storage/'.$item->image)}}" alt=""/>
                                        <div class="project-hover">
                                            {{-- <div class="project-meta">
                                                <h6>Judul Image CSR</h6>
                                            </div> --}}
                                            <div class="project-zoom">
                                                <a class="img-popup" href="{{asset('storage/'.$item->image)}}" title="gallery"><i class="fa fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    @include('web.components.footer')
@endsection
