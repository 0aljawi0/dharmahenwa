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
        @slot('title') {{Session::get('locale') == 'id' ? 'Bulanan' : 'Monthly Report'}} @endslot
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
                                {{Session::get('locale') == 'id' ? 'Bulanan' : 'Monthly Report'}}
                            </li>
                        </ol>
                    </div>
                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 entry">
                            <h2>
                                {{Session::get('locale') == 'id' ? 'Laporan Bulanan' : 'Monthly Report'}}
                            </h2>
                            <div class="entry-content">

                                <div class="clear-l showCaption ">
                                    <div class="d-flex">
                                        @foreach ($monthly_reports as $item)
                                            @php
                                                $title = json_decode($item->title);
                                            @endphp

                                            <div class="col-xs-12 col-lg-3 col-md-6 gms-list align-center border-bg hv-green">
                                                <div class="col-md-12">
                                                    <div class="cnt-list flex-85">
                                                        <p><strong>{{Session::get('locale') == 'id' ? $title->id ?? '' : $title->en ?? ''}}</strong></p>
                                                    </div>
                                                    <div class="link-list flex-1 mt-sm btn-kecil">
                                                        <a href="#" data-pdf="{{asset('storage/'.$item->pdf)}}" class="open view-pdf">Open</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-12 text-center">
                                        {{$monthly_reports->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- <div class="col-xs-12 col-sm-12 col-md-12 entry">
                            <h2>
                                Monthly Report
                            </h2>
                            <div class="entry-content">

                                <div class="clear-l showCaption ">

                                    <div class="d-flex">
                                        @foreach ($year as $item)
                                            <div class="col-xs-12 col-lg-4 col-md-6 gms-list align-center border-bg hv-green">
                                                <div class="col-md-12">
                                                    <div class="cnt-list flex-85">
                                                        <h5 class="mb-xs">{{$item}}</h5>
                                                        <ul class="two-line">
                                                            @foreach ($monthly_reports as $m)
                                                                @if ($m->year == $item)
                                                                    <li>
                                                                        <a href="#" data-pdf="{{asset('storage/'.$m->pdf)}} class="view-pdf block">{{Month::lang($m->month)}}</a>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>

                                </div>
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('web.components.footer')

    <div class="popup-pdf">
        <div class="bg-layer"></div>
        <a href="#" class="close-pdf"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a>
        <div class="main-pdf">
            <object type="application/pdf" class="test-pdf" data="" width="100%" height="500" style="height: 100vh">No Support</object>
        </div>
    </div>
@endsection

@push('script')
<script>
	$(document).ready(function(){

		$('.view-pdf').click(function(e){
			e.preventDefault();
			var ss = $(this).attr('data-pdf');
			$('.popup-pdf').addClass('open').fadeIn();
			$('.popup-pdf .main-pdf .test-pdf').attr({
			   data: ss
			});
		});
		$('.close-pdf, .bg-layer').click(function(e){
			e.preventDefault();
			$('.popup-pdf').removeClass('open').fadeOut();
			$('.popup-pdf .main-pdf .test-pdf').attr({
			   data: ''
			});
		});
	});
</script>
@endpush

