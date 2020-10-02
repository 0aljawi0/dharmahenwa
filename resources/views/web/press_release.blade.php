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
        @slot('title') {{Session::get('locale') == 'id' ? 'Jumpa Pers' : 'Press Release'}} @endslot
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
                                {{Session::get('locale') == 'id' ? 'Jumpa Pers' : 'Press Release'}}
                            </li>
                        </ol>
                    </div>
                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 service widget-grid service-6">

                            <div class="entry-content">
                                <section class="projects-grid projects-3col">
                                    @foreach ($blogs as $item)

                                    @php
                                        $title = json_decode($item->title);
                                        $description = json_decode($item->description);

                                        if (Session::get('locale') == 'id') {
                                            $description = strip_tags($description->id);
                                            $description = substr($description, 0, 200).'[...]';
                                        } else {
                                            $description = strip_tags($description->en);
                                            $description = substr($description, 0, 200).'[...]';
                                        }

                                    @endphp

                                    <div class="col-xs-12 col-sm-6 col-md-4 entry hei-press">
                                        <div class="entry-img block-center bg-dark">
                                            <a href="{{route('press_release_detail', ['id' => $item->id, 'title' => $title->en])}}">
                                                <img src="{{asset('storage/'.$item->image)}}" alt="{{Session::get('locale') == 'id' ? $title->id : $title->en }}"/>
                                            </a>
                                        </div>
                                        <div class="entry-title">
                                            <br />
                                            <h3>
                                                <a href="{{route('press_release_detail', ['id' => $item->id, 'title' => $title->en])}}">
                                                    {{Session::get('locale') == 'id' ? $title->id : $title->en }}
                                                </a>
                                            </h3>
                                        </div>
                                        <!-- .entry-title end -->
                                        <div class="entry-content">
                                            <p>{{$description}}</p>
                                            <a class="entry-more" href="{{route('press_release_detail', ['id' => $item->id, 'title' => $title->en])}}"><i class="fa fa-plus"></i>
                                                <span>read more</span>
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach

                                    {{ $blogs->links() }}
                                </section>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('web.components.footer')
@endsection

