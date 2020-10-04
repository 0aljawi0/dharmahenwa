@extends('layouts.web')

@php
    $website = json_decode($website->value);
    $alamat = json_decode($address->value);
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
        @slot('title') {{Session::get('locale') == 'id' ? 'Kontak' : 'contact'}} @endslot
    @endcomponent

    <section id="contact" class="contact">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="heading heading-4">
                        <div class="heading-bg heading-right">
                            <p class="mb-0">We Wanna Hear From You !</p>
                            <h2>Contact Us</h2>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-4 widgets-contact mb-60-xs">
                            <div class="widget">
                                <div class="widget-contact-icon pull-left">
                                    <i class="lnr lnr-map"></i>
                                </div>
                                <div class="widget-contact-info">
                                    <p class="text-capitalize">visit us</p>
                                    <p class="text-capitalize font-heading">{{$alamat->head_office}}</p>
                                </div>
                            </div>
                            <!-- .widget end -->
                            <div class="clearfix">
                            </div>
                            <div class="widget">
                                <div class="widget-contact-icon pull-left">
                                    <i class="lnr lnr-envelope"></i>
                                </div>
                                <div class="widget-contact-info">
                                    <p class="text-capitalize ">email us</p>
                                    <p class="text-capitalize font-heading">{{$website->email}}</p>
                                </div>
                            </div>
                            <!-- .widget end -->
                            <div class="clearfix">
                            </div>
                            <div class="widget">
                                <div class="widget-contact-icon pull-left">
                                    <i class="lnr lnr-phone"></i>
                                </div>
                                <div class="widget-contact-info">
                                    <p class="text-capitalize">call us</p>
                                    <p class="text-capitalize font-heading">{{$website->phone}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8">
                            <div class="row">
                                <form action="{{route('message.store')}}" method="POST">
                                    @csrf

                                    <div class="col-md-6">
                                        <input type="text" class="form-control mb-30" name="name" id="name" placeholder="Your Name" required/>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control mb-30" name="email" id="email" placeholder="Your Email" required/>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control mb-30" name="phone" id="telephone" placeholder="Telephone" required/>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control mb-30" name="subject" id="subject" placeholder="Subject" required/>
                                    </div>
                                    <div class="col-md-12">
                                        <textarea class="form-control mb-30" name="message" id="message" rows="2" placeholder="Message Details" required></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" id="submit-message" class="btn btn-primary btn-black btn-block">Send Message</button>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 mt-xs">
                                        <div id="contact-result">
                                            @if (Session::has('message'))
                                                <div class="alert alert-{{Session::get('type')}} animate__animated animate__fadeInDown" role="alert">
                                                    {{Session::get('message')}}

                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="google-maps pb-0 pt-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 pr-0 pl-0">
                    <div style="overflow:hidden;width: 100%;position: relative;">
                        {!!$website->map!!}
                        <div style="position: absolute;width: 80%;bottom: 10px;left: 0;right: 0;margin-left: auto;margin-right: auto;color: #000;text-align: center;">
                            <small style="line-height: 1.8;font-size: 0px;background: #fff;"> <a href="https://googlemapsembed.net/">Embed Google Map</a> </small>
                        </div>
                        <style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('web.components.footer')
@endsection
