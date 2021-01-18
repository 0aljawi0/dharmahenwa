<section id="service-6" class="service service-6 home-service bg-gray pt-0 pb-0">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-7 col-img posisi-ar">
				<a href="{{route('annual_report')}}" class="show-more-ar">
					show more >>
				</a>
				<div class="col-bg">
					<img src="{{asset('storage/'.$home_section->image_background_annual_report)}}" alt="Background"/>
				</div>
				<div class="center-ar">
					<div class="col-xs-12 col-sm-12">
						<div class="slider ar-3">

                            @foreach ($annual_reports as $item)
                                <div class="list-ar">
                                    <div class="area-ar">
                                        <div class="caption-ar">
                                            <span class="name-ar">{{$item->title}}</span>
                                        </div>
                                        <div class="fram-img-ar">
                                            <img src="{{asset('storage/'.$item->image)}}" alt="" width="200">
                                        </div>
                                        <div class="show-action">
                                            <a href="{{asset('storage/'.$item->pdf)}}" target="_blank" class="download-pdf"><i class="fa fa-download"></i> PDF</a>
                                            <a data-pdf="{{asset('storage/'.$item->pdf)}}" class="view-pdf"><i class="fa fa-eye"></i> PDF</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

						</div>
					</div>
				</div>
				<!-- .heading end -->
			</div>
			<div class="col-xs-12 col-sm-12 col-md-5 col-img posisi-ar-1">
				<a href="{{route('sustainability_report')}}" class="show-more-ar">
					show more >>
				</a>
				<div class="col-bg">
					<img src="{{asset('storage/'.$home_section->image_background_sustaihnability_report)}}" alt="Background"/>
				</div>
				<div class="center-ar">
					<div class="col-xs-12 col-sm-12">
						<div class="slider ar-1">

							@foreach ($sustainabilities as $item)
                                <div class="list-ar">
                                    <div class="area-ar">
                                        <div class="caption-ar">
                                            <span class="name-ar">{{$item->title}}</span>
                                        </div>
                                        <div class="fram-img-ar">
                                            <img src="{{asset('storage/'.$item->image)}}" alt="" width="200">
                                        </div>
                                        <div class="show-action">
                                            <a href="{{asset('storage/'.$item->pdf)}}" target="_blank" class="download-pdf"><i class="fa fa-download"></i> PDF</a>
                                            <a data-pdf="{{asset('storage/'.$item->pdf)}}" class="view-pdf"><i class="fa fa-eye"></i> PDF</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

						</div>
					</div>
				</div>
				<!-- .heading end -->
			</div>
			<!-- .col-md-5 end -->
		</div>
		<!-- .row end -->
	</div>
	<!-- .container end -->
</section>

<!-- POPUP PDF ANNUAL / SUSTAINABILITY Report
============================================= -->
<div class="popup-pdf">
	<div class="bg-layer"></div>
	<a href="#" class="close-pdf"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a>
	<div class="main-pdf">
		<object type="application/pdf" class="test-pdf" data="" width="100%" height="500" style="height: 100vh">No Support</object>
	</div>
</div>
