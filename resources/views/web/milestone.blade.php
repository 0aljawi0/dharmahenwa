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
        @slot('title') {{Session::get('locale') == 'id' ? 'Tonggak Sejarah' : 'Milestone'}} @endslot
    @endcomponent

    <section class="single-post pt-0">
        <div class="container">
           <div class="row">

              <div class="col-xs-12 col-sm-12">
                 <div class="content-breadcrumb pb-sm">
                    <ol class="breadcrumb">
                       <li>
                          <a href="{{route('about-company-profile')}}">About</a>
                       </li>
                       <li class="active">
                            {{Session::get('locale') == 'id' ? 'Tonggak Sejarah' : 'Milestone'}}
                       </li>
                    </ol>
                 </div>
                 <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12 entry">
                       <div class="col-md-8 col-sm-12 p-0 mb-15">
                          <p>
                            PT Darma Henwa Tbk (Perseroan) didirikan sebagai perusahaan berstatus Penanaman Modal Dalam Negeri (PMDN) dengan nama PT Darma Henwa berdasarkan Undang-Undang Republik Indonesia dengan Akta No. 54, tanggal 8 Oktober 1991.
                          </p>
                       </div>
                       <div class="col-xs-12 col-sm-12 col-md-12 milestone-company p-0">
                             <ul class="list-history medium-block-grid-2">
                                @foreach ($milestones as $item)

                                    @php
                                        $title = json_decode($item->title);
                                        $description = json_decode($item->description);
                                    @endphp

                                    <li>
                                        <span class="range-year">{{$item->year}}</span>
                                        <div class="small-12 detail-history">
                                            <p><strong>{{Session::get('locale') == 'id' ? $title->id : $title->en}}</strong></p>
                                            <p>{{Session::get('locale') == 'id' ? $description->id : $description->en}}</p>
                                            <img src="{{asset('storage/'.$item->image)}}" alt="{{Session::get('locale') == 'id' ? $title->id : $title->en}}"/>
                                        </div>
                                    </li>
                                @endforeach
                             </ul>
                       </div>
                    </div>

                 </div>
              </div>

           </div>
        </div>
     </section>

    @include('web.components.footer')
@endsection
