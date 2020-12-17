<div class="bussinesPage shadow-line">
	<div class="container mb-md mt-md">
		<div class="row">
			<div class="col-md-3 col-sm-12">
				<h2 class="title t-black s-32 lh-1-3 ">

                    @php
                        $title_section_1_en = explode(' ', $home_section->title_section_1_en ?? '');
                        $title_section_1_id = explode(' ', $home_section->title_section_1_id ?? '');
                    @endphp

                    @if (Session::get('locale') == 'id')
                        @foreach ($title_section_1_id as $item)
                            {{$item}} <br>
                        @endforeach
                    @else
                        @foreach ($title_section_1_en as $item)
                            {{$item}} <br>
                        @endforeach
                    @endif

				</h2>
			</div>
			<div class="col-md-9 col-sm-12 panel-about-line">
				<div class="area-hover-toogle col-xs-12 col-md-4">
					<div class="o-hide col-xs-12 p-0">
						<div class="img-vmv-layer">
							<img src="{{asset('storage/'.$home_section->image_1)}}" alt="service">
						</div>
						<!-- <div class="panel-heading" style="background-image: url(assets/images/about/visi.jpg)"> -->
						<div class="panel-heading">
							<a href="{{route('coal')}}" class="panel-title t-center">
								<span>{{Session::get('locale') == 'id' ? $home_section->title_section_1a_id ?? '' : $home_section->title_section_1a_en ?? '' }}</span>
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
								<span>{{Session::get('locale') == 'id' ? $home_section->title_section_1b_id ?? '' : $home_section->title_section_1b_en ?? '' }}</span>
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
								<span>{{Session::get('locale') == 'id' ? $home_section->title_section_1c_id ?? '' : $home_section->title_section_1c_en ?? '' }}</span>
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
