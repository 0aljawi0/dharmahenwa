@extends('layouts.web')

@php
    $website = json_decode($website->value);
    $port = json_decode($port->value);
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
        @slot('title') {{Session::get('locale') == 'id' ? 'Layanan Management Pelabuhan' : 'Port Management Service'}} @endslot
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
                            {{Session::get('locale') == 'id' ? 'Layanan Management Pelabuhan' : 'Port Management Service'}}
                       </li>
                    </ol>
                 </div>
                 <div class="row">

                    <div class="entry-content">
                        @if (Session::get('locale') == 'id')
                            {!! $port->description_id !!}
                        @else
                            {!! $port->description_en !!}
                        @endif
                    </div>

                 </div>
              </div>

           </div>
        </div>
     </section>

    @include('web.components.footer')
@endsection
