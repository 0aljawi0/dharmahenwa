<div class="bussinesPage shadow-line">
	<div class="container mb-md mt-md">
		<div class="row">
			<div class="col-md-2 col-sm-12">
				<h2 class="title t-black s-32 lh-1-3">
					{{Session::get('locale') == 'id' ? 'Layanan' : 'Integrated'}} <br>
					{{Session::get('locale') == 'id' ? 'Pertambangan' : 'Mining'}} <br>
					{{Session::get('locale') == 'id' ? 'Terintegrasi' : 'Service'}}
				</h2>
			</div>
			<div class="col-md-10 col-sm-12 panel-about-line">
				<div class="area-hover-toogle col-xs-12 col-md-4">
					<div class="o-hide col-xs-12 p-0">
						<div class="img-vmv-layer">
							<img src="{{asset('storage/'.$home_section->image_1)}}" alt="service">
						</div>
						<!-- <div class="panel-heading" style="background-image: url(assets/images/about/visi.jpg)"> -->
						<div class="panel-heading">
							<a href="{{route('coal')}}" class="panel-title t-center">
								<span>{{Session::get('locale') == 'id' ? 'Layanan Batubara & Pertambangan' : 'Coal & Mining Service'}}</span>
							</a>
							<a href="{{route('coal')}}" class="show-more-ar">
								show more >>
							</a>
						</div>
					</div>
				</div>
				<div class="area-hover-toogle col-xs-12 col-md-4">
					<div class="o-hide col-xs-12 p-0">
						<div class="img-vmv-layer">
							<img src="{{asset('storage/'.$home_section->image_2)}}" alt="service">
						</div>
						<!-- <div class="panel-heading" style="background-image: url(assets/images/about/misi.jpg)"> -->
						<div class="panel-heading">
							<a href="{{route('port')}}" class="panel-title t-center">
								<span>{{Session::get('locale') == 'id' ? 'Layanan Management Pelabuhan' : 'Port Management Service'}}</span>
							</a>
							<a href="{{route('port')}}" class="show-more-ar">
								show more >>
							</a>
						</div>
					</div>
				</div>
				<div class="area-hover-toogle col-xs-12 col-md-4">
					<div class="o-hide col-xs-12 p-0">
						<div class="img-vmv-layer">
							<img src="{{asset('storage/'.$home_section->image_3)}}" alt="service">
						</div>
						<!-- <div class="panel-heading" style="background-image: url(assets/images/home/home-1.jpg)"> -->
						<div class="panel-heading">
							<a href="{{route('infrastructure')}}" class="panel-title t-center">
								<span>{{Session::get('locale') == 'id' ? 'Infrastruktur Pertambangan & Layanan Lainnya' : 'Mining Infrastructure & Other Service'}}</span>
							</a>
							<a href="{{route('infrastructure')}}" class="show-more-ar">
								show more >>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
