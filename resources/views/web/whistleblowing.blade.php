@extends('layouts.web')

@php
    $website = json_decode($website->value);
    $whistleblowing = json_decode($whistleblowing->value);
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
        @slot('title') {{Session::get('locale') == 'id' ? 'Sistem Pelaporan Pelanggaran' : 'Whistleblowing System'}} @endslot
    @endcomponent

    @component('web.components.page_single')
        @slot('route_back') <a href="{{route('gcg')}}">Corporate Governance</a> @endslot
        @slot('title') {{Session::get('locale') == 'id' ? 'Sistem Pelaporan Pelanggaran' : 'Whistleblowing System'}} @endslot

        @if (Session::get('locale') == 'id')
            {!! $whistleblowing->description_id !!}
        @else
            {!! $whistleblowing->description_en !!}
        @endif
    @endcomponent

    <section class="single-post pt-0">
        <div class="container">
            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12 entry">
                    <h3 class="mt-lg mb-xs">
                        <i>Form</i>
                    </h3>
                    <div class="row">
                        <form id="contact-form" class="form-ws" action="assets/php/sendmail.php" method="post">
                            <div class="row">

                                <div class="col-sm-12">
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" class="form-control mb-sm" name="contact-name" id="name" placeholder="Name" required/>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="col-md-6">
                                        <input type="email" class="form-control mb-sm" name="contact-email" id="email" placeholder="Your Email" required/>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="col-md-6">
                                        <input type="email" class="form-control mb-sm" name="contact-phone" id="phone" placeholder="Mobile Number" required/>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="col-md-6">
                                        <div class="select form-control mb-sm">
                                            <select class="" name="contact-violation" id="">
                                                <option>Category of violation</option>
                                                <option>Corruption</option>
                                                <option>Fraud</option>
                                                <option>Violation of the applicable law</option>
                                                <option>Violation of company’s regulation</option>
                                                <option>Violation of Code of Conduct</option>
                                                <option>Conflict of Interest</option>
                                                <option>Gratification or bribery</option>
                                                <option>Extortion</option>
                                                <option>Act that harms health, safety, environment</option>
                                                <option>Act that causes company’s loss</option>
                                                <option>Violation of Standard Operating Procedure</option>
                                                <option>Document Falsification</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="col-md-8">
                                        <textarea class="form-control mb-sm" name="contact-reported" id="reported" rows="3" placeholder="Party’s reported" required></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="col-md-8">
                                        <textarea class="form-control mb-sm" name="contact-details" id="details" rows="3" placeholder="Violation details" required></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="col-md-8 col-sm-12">
                                        <div class="columns b-all mb-sm">
                                            <div class="judul-lampiran columns">
                                                Initial evidence of alleged violation
                                            </div>
                                            <div class="img-upload columns">
                                                <div class="images">
                                                    <div class="pic">
                                                        <input type="file" />
                                                        <span class="icon-hover"><i class="fa fa-plus-square-o"></i></span>
                                                    </div>
                                                </div>
                                                <div class="images">
                                                    <div class="pic">
                                                        <input type="file" />
                                                        <span class="icon-hover"><i class="fa fa-plus-square-o"></i></span>
                                                    </div>
                                                </div>
                                                <div class="images">
                                                    <div class="pic">
                                                        <input type="file" />
                                                        <span class="icon-hover"><i class="fa fa-plus-square-o"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="col-md-3 col-sm-12">
                                        <button type="submit" id="submit-message" class="btn btn-primary btn-black btn-block">Submit</button>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="col-xs-12 col-sm-12 col-md-12 mt-xs">
                                        <!--Alert Message-->
                                        <div id="contact-result">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

    @include('web.components.footer')
@endsection

@push('script')
<script>
	(function ($) {
		$(document).ready(function(){
			uploadImage();
			function uploadImage() {
				var pic = $('.images .pic');
				var button = $('.images .pic input');
				button.on('change', function () {
					var $this = $(this);
					var $pc = $(this).parent('.pic');
					var reader = new FileReader();
					reader.onload = function(event) {
						$pc.css({
		                    'background-image': 'url('+event.target.result+')'
		                });
					}
					reader.readAsDataURL($this[0].files[0])
				});
			}
		});
	})(jQuery);
</script>
@endpush
