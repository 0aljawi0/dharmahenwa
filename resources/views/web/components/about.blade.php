<section id="service-2" class="pb-0 pt-sm bd-top">

	<div class="container service service-2">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
				<div class="row">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<!-- Nav Tab #1 -->
						<li class="col-md-6 col-xs-6 active" role="presentation">
							<a href="#tiling" aria-controls="tiling" role="tab" data-toggle="tab">
								<div class="service-icon">
									<img src="{{asset('web/icons/icons/i48/1.png')}}" alt="icon"/>
									<img src="{{asset('web/icons/icons/i48/1w.png')}}" alt="icon"/>
								</div>
								PERFORMANCE HIGHLIGHT </a>
						</li>
						<!-- Nav Tab #3 -->
						<li class="col-md-6 col-xs-6" role="presentation">
							<a href="#financial-statement" aria-controls="financial-statement" role="tab" data-toggle="tab">
								<div class="service-icon">
									<img src="{{asset('web/icons/icons/i48/3.png')}}" alt="icon"/>
									<img src="{{asset('web/icons/icons/i48/3w.png')}}" alt="icon"/>
								</div>
								FINANCIAL STATEMENT </a>
						</li>
					</ul>
				</div>
			</div>
			<!-- .col-md-12 end-->
		</div>
		<!-- .row end -->
	</div>
	<!-- .container end -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 financial-tab b-b bs-2">
				<div class="row">
					<!-- Tab panes -->
					<div class="tab-content">
						<!-- Panel #1 -->
						<div role="tabpanel" class="tab-pane fade in active" id="tiling">
							<div class="d-flex financial-state">
								<div class="flex-6 performance-hlg text-white col-img">

									<div class="col-bg">
										<img src="{{ asset('storage/'.$home_section->image_background_peformance_highlight)}}" alt="Coal Barging"/>
									</div>
									<div class="title-headline">
										monthly production report
									</div>
									<div class="d-flex">
										<!--- service block #1 -->
										<div class="col-xs-12 service-block list-green">
                                            @foreach ($monthly_reports as $item)
                                                @php
                                                    $title = json_decode($item->title);
                                                @endphp
                                                <div class="service-desc">
                                                    <h4 class="titlePain">{{Session::get('locale') == 'id' ? $title->id ?? '' : $title->en ?? ''}}</h4>
                                                    <a href="#" data-pdf="{{asset('storage/'.$item->pdf)}}" class="open view-pdf">Open</a>
                                                    {{-- <a href="{{asset('storage/'.$item->pdf)}}" class="open">Open</a> --}}
                                                </div>
                                            @endforeach
										</div>
										<!-- .col-xs-12 end -->
									</div>
									<a href="{{route('monthly_report')}}" class="show-more-ar">
										show more >>
									</a>
									<!-- .row end -->
								</div>
								<div class="flex-6 performance-hlg text-white col-img">

									<div class="col-bg">
										<img src="{{ asset('storage/'.$home_section->image_background_peformance_highlight)}}" alt="Coal Barging"/>
									</div>
									<div class="title-headline">
										Quarterly Newsletter
									</div>
									<div class="d-flex">
										<!--- service block #1 -->
										<div class="col-xs-12 service-block list-green">
                                            @foreach ($newsletters as $item)
                                                @php
                                                    $title = json_decode($item->title);
                                                @endphp
                                                <div class="service-desc">
                                                    <h4 class="titlePain">{{Session::get('locale') == 'id' ? $title->id ?? '' : $title->en ?? ''}}</h4>
                                                    <a href="#" data-pdf="{{asset('storage/'.$item->pdf)}}" class="open view-pdf">Open</a>
                                                    {{-- <a href="{{asset('storage/'.$item->pdf)}}" class="open">Open</a> --}}
                                                </div>
                                            @endforeach
										</div>
										<!-- .col-xs-12 end -->
									</div>
									<a href="{{route('newsletter')}}" class="show-more-ar">
										show more >>
									</a>
									<!-- .row end -->
								</div>
							</div>
						</div>
						<!-- .tab-pane end -->

						<!-- Panel #2 -->
						<div role="tabpanel" class="tab-pane fade" id="financial-statement">
							<div class="d-flex financial-state">
								<div class="flex-6 performance-hlg text-white col-img">

									<div class="col-bg">
										<img src="{{ asset('storage/'.$home_section->image_background_financial_statement)}}" alt="Coal Barging"/>
									</div>
									<div class="title-headline">
										Financial Statement
									</div>
									<div class="d-flex">
										<!--- service block #1 -->
										<div class="col-xs-12 service-block list-green">
                                            @foreach ($financials as $item)
                                                @php
                                                    $title = json_decode($item->title);
                                                @endphp
                                                <div class="service-desc">
                                                    <h4 class="titlePain">{{Session::get('locale') == 'id' ? $title->id ?? '' : $title->en ?? ''}}</h4>
                                                    <a href="{{asset('storage/'.$item->pdf)}}" target="_blank" class="open">Open</a>
                                                </div>
                                            @endforeach
										</div>
										<!-- .col-xs-12 end -->
									</div>
									<a href="{{route('newsletter')}}" class="show-more-ar">
										show more >>
									</a>
									<!-- .row end -->
								</div>
								<!-- .col-md-6 end -->
								<div class="col-xs-12 col-sm-6 col-md-6 col-img trans-layer">
									<div class="col-bg">
										<img src="{{ asset('storage/'.$home_section->image_background_financial_statement)}}" alt="Background"/>
									</div>
								</div>
								<!-- .col-md-6 end -->
							</div>
						</div>
						<!-- .tab-pane end -->
					</div>
					<!-- .tab-content end -->
				</div>
				<!-- .row end -->
			</div>
			<!-- .col-md-12 -->
		</div>
		<!-- .row end -->
	</div>
	<!-- .container-fluid end -->
</section>
