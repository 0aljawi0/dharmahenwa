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
        @slot('title') {{Session::get('locale') == 'id' ? 'Infrastruktur Pertambangan & Jasa Lainnya' : 'Mining Infrastructure & Other Services'}} @endslot
    @endcomponent

    <section class="single-post pt-0">
        <div class="container">
           <div class="row">

              <div class="col-xs-12 col-sm-12">
                 <div class="content-breadcrumb pb-sm">
                    <ol class="breadcrumb">
                       <li>
                          <a href="{{route('coal')}}">Business</a>
                       </li>
                       <li>
                            {{Session::get('locale') == 'id' ? 'Kegiatan Operasional' : 'Operational Activities'}}
                       </li>
                       <li class="active">
                            {{Session::get('locale') == 'id' ? 'Infrastruktur Pertambangan & Jasa Lainnya' : 'Mining Infrastructure & Other Services'}}
                       </li>
                    </ol>
                 </div>
                 <div class="row">

                    <div id="projects-all" class="row showCaption d-flex page-infra-services">

                        @foreach ($infrastructures as $item)

                            @php
                                $title = json_decode($item->title)
                            @endphp

                            <div class="col-xs-12 col-sm-6 col-md-4 project-item">
                                <div class="project-img">
                                    <img class="img-responsive" src="{{asset('storage/'.$item->image)}}" alt="{{ Session::get('locale') == 'id' ? $title->id : $title->en }}"/>
                                    <div class="project-hover">
                                        <div class="project-meta">
                                            <h4>
                                                {{ Session::get('locale') == 'id' ? $title->id : $title->en }}
                                            </h4>
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
