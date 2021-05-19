<section id="shortcode-7" class="shortcode-7 section-img">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-7 col-img">
				<div class="col-captionVideo">
					<div class="linkToPlay text-center">
						<a href="#" class="untukMemulai">
							<i class="fa fa-play"></i>
						</a>
					</div>
				</div>
				<div class="col-bg">
					<img src="{{asset('web/background/1.jpg')}}" alt="Background"/>
				</div>
			</div>
			<!-- .col-md-4 end -->
			<div class="stockprice-wrapper col-xs-12 col-sm-12 col-md-5 col-StockPrice col-img" style="padding: 0 !important">
                <iframe src='https://investor3.rti.co.id/rtirelation/dewa/stkDetail_dewa.jsp?prd=YTD&width=100%&height=310' width='100%' height='100%' style='background: URL("{{asset('web/background/home-as.jpg')}}") no-repeat; background-size: 100% 100%' scrolling="no"></iframe>
                {{-- <iframe src="https://investor3.rti.co.id/rtirelation/dewa/stkDetail_dewa.jsp?chart_hgt=500&prd=YTD" frameborder="0" width="100%" height="100%" scrolling="yes"></iframe> --}}
				{{-- <div class="grid-relation relation"> --}}
                    {{-- <h3 class="s-24 mb-0">PT. DARMA HENWA TBK</h3> --}}
                    {{-- <span class="s-19 t-white font-semibold">IDX: {{$sp->stock->stock_code}} - {{$sp->stock->time}}</span> --}}
                    {{-- <span class="s-19 t-white font-semibold">IDX: DEWA - 01 JUNI 2020</span>
                    <br><br>
		            <div class="chart">
                        <span class="s-38 font-bold t-green mr-sm">50</span><label class="s-17 t-white"> 0.00 (0.00%) </label>
		                <div id="chart-relation" style="height: 400px; min-width: 310px;width: 100%;"></div>
		                <div class="list-chart d-flex"> --}}

                        {{-- <table style="width:100%">
                            <tr>
                                <td>
                                    <span class="s-17 font-bold t-green mr-sm">JCI</span>
                                </td>
                                <td>
                                    <label class="s-38 t-white"> {{$sp->stock->jci}} </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="s-17 font-bold t-green mr-sm">Previous</span>
                                </td>
                                <td>
                                    <label class="s-38 t-white"> {{$sp->stock->previous}} </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="s-17 font-bold t-green mr-sm">High</span>
                                </td>
                                <td>
                                    <label class="s-38 t-white"> {{$sp->stock->high}} </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="s-17 font-bold t-green mr-sm">Low</span>
                                </td>
                                <td>
                                    <label class="s-38 t-white"> {{$sp->stock->low}} </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="s-17 font-bold t-green mr-sm">Volume</span>
                                </td>
                                <td>
                                    <label class="s-38 t-white"> {{$sp->stock->volume}} </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="s-17 font-bold t-green mr-sm">Last</span>
                                </td>
                                <td>
                                    <label class="s-38 t-white"> {{$sp->stock->last}} </label>
                                </td>
                            </tr>
                        </table> --}}

		                {{-- <span class="s-17 font-bold t-green mr-sm">Last</span> <label class="s-38 t-white"> {{$sp->stock->last}} </label>
		                <div id="chart-relation" style="height: 400px; min-width: 310px;width: 100%;"></div>
		                <div class="list-chart d-flex"> --}}
			                {{-- <ul class="chart-list first-chartslist">
			                    <li>
			                        <h2>Open</h2>
			                        <span>50.00</span>
			                    </li>
			                    <li>
			                        <h2>High</h2>
			                        <span>50.00</span>
			                    </li>
			                    <li>
			                        <h2>Low</h2>
			                        <span>50.00</span>
			                    </li>
			                </ul>
			                <ul class="chart-list">
			                    <li>
			                        <h2>Market Cap	</h2>
			                        <span>3.27T</span>
			                    </li>
			                    <li>
			                        <h2>PE Ratio</h2>
			                        <span>N/A</span>
			                    </li>
			                    <li>
			                        <h2>Div. yield</h2>
			                        <span>-</span>
			                    </li>
			                </ul> --}}
		                {{-- </div> --}}
		        	{{-- </div> --}}
		        {{-- </div> --}}
		        {{-- <div class="col-bg">
					<img src="{{asset('web/background/home-as.jpg')}}" alt="Background"/>
				</div> --}}
			</div>
			<!-- .col-md-4 end -->
		</div>
	</div>
</section>
<div class="popupVideo columns no-padding">
	<div class="bgVideo"></div>
	<div class="boxVideoHome">

        @php
            $youtube = str_replace('watch?v=', 'embed/', $home_section->video)
        @endphp

		<iframe width="900" height="560" src="{{$youtube}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		<span class="close"></span>
	</div>
</div>
