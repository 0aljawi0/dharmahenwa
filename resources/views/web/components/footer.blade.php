
@php
    $address = json_decode($address->value);
@endphp

<section id="cta-1" class="cta pb-0">
	<div class="container">
			<div class="col-xs-12 col-sm-12 col-md-12 bg-theme">
				<div class="row pre-footer">
					<div class="col-sm-12 p-0">
						<div class="col-md-3 col-sm-12 head-office">
							<div class="contact-box">
							    <div class="contact-details">
							        <h4 class="pre-footer-title"><i class="fa fa-map-marker" aria-hidden="true"></i>HEAD OFFICE</h4>
							        <p>
							        	{{$address->head_office}}
							        </p>
							        <p></p>
							    </div>
							</div>
						</div>
						<div class="col-md-9 col-sm-12 site-office">
							<div class="col-12 bg-semitheme heading-ft t-center">
								<h4 class="pre-footer-title">OPERATIONAL OFFICE</h4>
							</div>
							<div class="main-site-office">
								<div class="col-lg-3 col-md-6 add-office">
									<div class="contact-box">
									    <div class="contact-details">
									        <h4 class="pre-footer-title">
									        	<i class="fa fa-map-marker" aria-hidden="true"></i>
									        	{{$address->operational_title_1}}
									        </h4>
									        <p style="white-space: pre-wrap">{{$address->operational_address_1}}</p>
									    </div>
									</div>
								</div>
								<div class="col-lg-3 col-md-6 add-office">
									<div class="contact-box">
									    <div class="contact-details">
									        <h4 class="pre-footer-title">
									        	<i class="fa fa-map-marker" aria-hidden="true"></i>
									        	{{$address->operational_title_2}}
									        </h4>
									        <p style="white-space: pre-wrap">{{$address->operational_address_2}}</p>
									    </div>
									</div>
								</div>
								<div class="col-lg-3 col-md-6 add-office">
									<div class="contact-box">
									    <div class="contact-details">
									        <h4 class="pre-footer-title">
									        	<i class="fa fa-map-marker" aria-hidden="true"></i>
									        	{{$address->operational_title_3}}
									        </h4>
									        <p style="white-space: pre-wrap">{{$address->operational_address_3}}</p>
									    </div>
									</div>
								</div>
								<div class="col-lg-3 col-md-6 add-office">
									<div class="contact-box">
									    <div class="contact-details">
									        <h4 class="pre-footer-title">
									        	<i class="fa fa-map-marker" aria-hidden="true"></i>
									        	{{$address->operational_title_4}}
									        </h4>
									        <p style="white-space: pre-wrap">{{$address->operational_address_4}}</p>
									    </div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 t-center">
					    <div class="contact-bot contact-box bg-semitheme">
					    	<div class="contact-details">
					    	    <p><i class="fa fa-phone" aria-hidden="true"></i><b>PHONE</b>: {{$website->phone}}</p>
					    	</div>
					    </div>
					</div>

					<div class="col-md-6 t-center">
					    <div class="contact-bot contact-box bg-semitheme">
					    	<div class="contact-details">
					    	    <div class="contact-details">
					    	        <p><i class="fa fa-envelope" aria-hidden="true"></i><b>EMAIL US</b>: {{$website->email}}</p>
					    	    </div>
					    	</div>
					    </div>
					</div>
				</div>
			</div>
			<!-- .col-md-12 end -->
	</div>
	<!-- .container end -->
</section>
<!-- #cta-1 end -->

<!-- Footer #4
============================================= -->
<footer id="footer" class="footer-1">

	<!-- Widget Section
	============================================= -->
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 widgets-links">
				<div class="col-xs-12 col-sm-12 col-md-4 widget-about text-center-xs mb-30-xs">
					<!-- <div class="widget-about-logo pull-left pull-none-xs">
						<img src="assets/images/footer-logo.png" alt="logo"/>
					</div> -->
					<div class="widget-about-info">
						<h5 class="text-capitalize text-white">DarmaHenwa</h5>
						<p class="mb-0">{{$website->footer_description}}</p>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 widget-navigation text-center-xs mb-30-xs">
					<h5 class="text-capitalize text-white">navigation</h5>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<ul class="list-unstyled text-capitalize">
								<li>
									<a href="{{route('about-company-profile')}}">{{Session::get('locale') == 'id' ? 'Tentang Kami' : 'About Us'}}</a>
								</li>
								<li>
									<a href="{{route('coal')}}">{{Session::get('locale') == 'id' ? 'Bisnis' : 'Business'}}</a>
								</li>
								<li>
									<a href="{{route('gcg')}}">{{Session::get('locale') == 'id' ? 'Tata Kelola Perusahaan' : 'Corporate Governance'}}</a>
								</li>

							</ul>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<ul class="list-unstyled text-capitalize">
								<li>
									<a href="{{route('profile')}}">{{Session::get('locale') == 'id' ? 'Sekretaris Perusahaan' : 'Corporate Secretary'}}</a>
								</li>
								<li>
									<a href="{{route('hse')}}">{{Session::get('locale') == 'id' ? 'Keberlanjutan' : 'Sustainability'}}</a>
								</li>
								<li>
									<a href="{{route('contact')}}">{{Session::get('locale') == 'id' ? 'Kontak Kami' : 'Contact Us'}}</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3 widget-services text-center-xs">
					<h5 class="text-capitalize text-white">Other</h5>
					<div class="row">
						<div class="col-xs-12 col-sm-12">
							<ul class="list-unstyled text-capitalize">
								<li>
									<a href="{{route('whistleblowing')}}">{{Session::get('locale') == 'id' ? 'Sistem Pelaporan Pelanggaran' : 'Whistleblowing System'}}</a>
								</li>
								<li>
									<a href="{{route('career')}}">{{Session::get('locale') == 'id' ? 'Karir' : 'Career'}}</a>
								</li>
								<li>
									<a href="{{route('procurement')}}">{{Session::get('locale') == 'id' ? 'Pengadaan' : 'Procurement'}}</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Copyrights
	============================================= -->
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 copyrights text-center">
				<p class="text-capitalize"> <i class="fas fa-copyright fa-sm fa-fw"></i> {{date('Y')}} DarmaHenwa. all rights reserved</p>
			</div>
		</div>
	</div>
</footer>
