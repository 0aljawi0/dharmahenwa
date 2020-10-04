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
			<div class="col-xs-12 col-sm-12 col-md-5 col-StockPrice col-img">
				<div class="grid-relation relation">
		            <h3 class="s-24 mb-0">PT. DARMA HENWA TBK</h3>
		            <span class="s-19 t-white font-semibold">IDX: DEWA - 01 JUNI 2020</span>
		            <div class="chart">
		                <span class="s-38 font-bold t-green mr-sm">50</span><label class="s-17 t-white"> 0.00 (0.00%) </label>
		                <div id="chart-relation" style="height: 400px; min-width: 310px;width: 100%;"></div>
		                <div class="list-chart d-flex">
			                <ul class="chart-list first-chartslist">
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
			                </ul>
		                </div>
		        	</div>
		        </div>
		        <div class="col-bg">
					<img src="{{asset('web/background/home-as.jpg')}}" alt="Background"/>
				</div>
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
