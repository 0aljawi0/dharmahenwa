@extends('layouts.web')

@php
    $website = json_decode($website->value);
    $mvv = json_decode($mvv->value);
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
        @slot('title') {{Session::get('locale') == 'id' ? 'Misi, Visi, Nilai' : 'Mission, Vision, Values'}} @endslot
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
                                {{Session::get('locale') == 'id' ? 'Misi, Visi, Nilai' : 'Mission, Vision, Values'}}
                            </li>
                        </ol>
                    </div>

                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 entry toogle-caption">
                            <div class="row">
                                <div class="area-hover-toogle col-xs-12 col-md-6">
                                    <div class="o-hide col-xs-12 p-0">
                                        <div class="img-vmv-layer">
                                            <img src="{{asset('storage/'.$mvv->vision_image)}}" alt="{{Session::get('locale') == 'id' ? 'Visi Kami' : 'Out Vision'}}">
                                        </div>
                                        <div class="content-layer">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    {{Session::get('locale') == 'id' ? 'Visi Kami' : 'Our Vision'}}
                                                </h4>
                                            </div>
                                            <div class="panel-body">
                                                {!! Session::get('locale') == 'id' ? $mvv->vision_id : $mvv->vision_en !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="area-hover-toogle col-xs-12 col-md-6">
                                    <div class="o-hide col-xs-12 p-0">
                                        <div class="img-vmv-layer">
                                            <img src="{{asset('storage/'.$mvv->mission_image)}}" alt="{{Session::get('locale') == 'id' ? 'Misi Kami' : 'Out Mission'}}">
                                        </div>
                                        <div class="content-layer">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    {!! Session::get('locale') == 'id' ? 'Misi Kami' : 'Our Mission' !!}
                                                </h4>
                                            </div>
                                            <div class="panel-body">
                                                {!! Session::get('locale') == 'id' ? $mvv->mission_id : $mvv->mission_en !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="shortcode-6" class="shortcode-6 bg-gray text-center-xs col-our-value">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="heading heading-3 t-center">
                            <h2>{{ Session::get('locale') == 'id' ? 'Nilai Perusahaan' : 'Corporate Values' }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-value"></div>
                <ul class="list-ourvalue">

                    <li>
                        <div class="bullet-list"></div>
                        <div class="arrow-list"></div>
                        <div class="feature feature-2 t-center">
                            <h4 class="text-uppercase font-16">{{ Session::get('locale') == 'id' ? $mvv->corporate_value_1_id : $mvv->corporate_value_1_en }}</h4>
                            <div class="feature-icon">
                                <img src="{{asset('storage/'.$mvv->corporate_value_1_icon)}}" alt="{{ Session::get('locale') == 'id' ? $mvv->corporate_value_1_id : $mvv->corporate_value_1_en }}">
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="bullet-list"></div>
                        <div class="arrow-list"></div>
                        <div class="feature feature-2 t-center">
                            <h4 class="text-uppercase font-16">{{ Session::get('locale') == 'id' ? $mvv->corporate_value_2_id : $mvv->corporate_value_2_en }}</h4>
                            <div class="feature-icon">
                                <img src="{{asset('storage/'.$mvv->corporate_value_2_icon)}}" alt="{{ Session::get('locale') == 'id' ? $mvv->corporate_value_2_id : $mvv->corporate_value_1_en }}">
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="bullet-list"></div>
                        <div class="arrow-list"></div>
                        <div class="feature feature-2 t-center">
                            <h4 class="text-uppercase font-16">{{ Session::get('locale') == 'id' ? $mvv->corporate_value_3_id : $mvv->corporate_value_3_en }}</h4>
                            <div class="feature-icon">
                                <img src="{{asset('storage/'.$mvv->corporate_value_3_icon)}}" alt="{{ Session::get('locale') == 'id' ? $mvv->corporate_value_3_id : $mvv->corporate_value_1_en }}">
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="bullet-list"></div>
                        <div class="arrow-list"></div>
                        <div class="feature feature-2 t-center">
                            <h4 class="text-uppercase font-16">{{ Session::get('locale') == 'id' ? $mvv->corporate_value_4_id : $mvv->corporate_value_4_en }}</h4>
                            <div class="feature-icon">
                                <img src="{{asset('storage/'.$mvv->corporate_value_4_icon)}}" alt="{{ Session::get('locale') == 'id' ? $mvv->corporate_value_4_id : $mvv->corporate_value_1_en }}">
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="bullet-list"></div>
                        <div class="arrow-list"></div>
                        <div class="feature feature-2 t-center">
                            <h4 class="text-uppercase font-16">{{ Session::get('locale') == 'id' ? $mvv->corporate_value_5_id : $mvv->corporate_value_5_en }}</h4>
                            <div class="feature-icon">
                                <img src="{{asset('storage/'.$mvv->corporate_value_5_icon)}}" alt="{{ Session::get('locale') == 'id' ? $mvv->corporate_value_5_id : $mvv->corporate_value_1_en }}">
                            </div>
                        </div>
                    </li>

                </ul>

                <div class="col-xs-12 col-sm-6 col-md-2 text-center-sm mb-30-sm">
                </div>

                <div class="col-xs-12 col-sm-6 col-md-2 text-center-sm mb-30-sm">
                </div>

                <div class="col-xs-12 col-sm-6 col-md-2 text-center-sm mb-30-sm">
                </div>

                <div class="col-xs-12 col-sm-6 col-md-2 text-center-sm mb-30-sm">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 text-center-sm mb-30-sm">
                </div>
            </div>
        </div>
    </section>

    @include('web.components.footer')
@endsection
