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
        @slot('title') {{Session::get('locale') == 'id' ? 'Presentasi' : 'Presentation'}} @endslot
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
                                {{Session::get('locale') == 'id' ? 'Presentasi' : 'Presentation'}}
                            </li>
                        </ol>
                    </div>
                    <div class="row">


                        <div class="col-xs-12 col-sm-12 col-md-12 entry service widget-grid service-6">

                            <div class="entry-content pull-report">
                                @foreach ($presentations as $item)

                                    @php
                                        $title = json_decode($item->title);
                                    @endphp

                                    <div class="col-xs-12 col-sm-6 col-md-4 space-report">
                                        <div class="area-ar cl-default">
                                            <div class="caption-ar sz-caption-pr">
                                                <span class="name-pr">{{Session::get('locale') == 'id' ? $title->id ?? '' : $title->en ?? ''}}</span>
                                                {{-- <span class="date-pr">{{date('d F Y', strtotime($item->created_at))}}</span> --}}
                                            </div>
                                            <div class="img-full h-100">
                                                <img src="{{asset('storage/'.$item->image)}}" alt="">
                                            </div>
                                            <div class="d-flex mt-xs mb-xs">
                                                <div class="show-action show-color flex-1">
                                                    <a href="{{asset('storage/'.$item->pdf)}}" target="_blank" class="download-pdf"><i class="fa fa-download"></i> PDF</a>
                                                    <a data-pdf="{{asset('storage/'.$item->pdf)}}" class="view-pdf"><i class="fa fa-eye"></i> PDF</a>
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

