<header id="navbar-spy" class="transparent-header">
	<nav id="primary-menu" class="navbar navbar-fixed-top style-1">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a class="logo" href="{{route('home')}}">
					<img src="{{asset('storage/'.$website->logo)}}" alt="DarmaHenwa">
				</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1">

				<ul class="nav navbar-nav navbar-left">
					<li class="has-dropdown">
						<a href="{{route('about-company-profile')}}" data-toggle="dropdown" class="dropdown-toggle">{{Session::get('locale') == 'id' ? 'Tentang Kami' : 'About Us'}}</a>
						<ul class="dropdown-menu">
							<li>
								<a href="{{route('about-company-profile')}}">{{Session::get('locale') == 'id' ? 'Profil Perusahaan' : 'Company Profile'}}</a>
							</li>
							<li>
								<a href="{{route('mission-vision-value')}}">{{Session::get('locale') == 'id' ? 'Misi, Visi, Nilai' : 'Mission, Vision, Value'}}</a>
							</li>
							<li>
								<a href="{{route('company-milestone')}}">{{Session::get('locale') == 'id' ? 'Tonggak Sejarah' : 'Milestone'}}</a>
							</li>
							<li class="dropdown-submenu">
								<a href="#" data-toggle="dropdown" class="dropdown-toggle">{{Session::get('locale') == 'id' ? 'Eksekutif' : 'Executives'}}</a>
								<ul class="dropdown-menu">
									<li>
										<a href="{{ route('commissioners') }}">{{Session::get('locale') == 'id' ? 'Dewan Komisaris' : 'Board Of Commisioners'}}</a>
									</li>
									<li>
										<a href="{{ route('directors') }}">{{Session::get('locale') == 'id' ? 'Jajaran Direktur' : 'Board Of Directors'}}</a>
									</li>
									<li>
										<a href="{{ route('management') }}">{{Session::get('locale') == 'id' ? 'Dewan Manajemen' : 'Board Of Management'}}</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="{{ route('awards') }}">{{Session::get('locale') == 'id' ? 'Penghargaan & Sertifikasi' : 'Awards & Certification'}}</a>
							</li>
						</ul>
					</li>
					<li class="has-dropdown">
						<a href="{{ route('coal') }}" data-toggle="dropdown" class="dropdown-toggle">{{Session::get('locale') == 'id' ? 'Bisnis' : 'Business'}}</a>
						<ul class="dropdown-menu">
							<li class="dropdown-submenu">
								<a href="#" data-toggle="dropdown" class="dropdown-toggle">{{Session::get('locale') == 'id' ? 'Kegiatan Operational' : 'Operational Activities'}}</a>
								<ul class="dropdown-menu">
									<li>
										<a href="{{route('coal')}}">{{Session::get('locale') == 'id' ? 'Layanan Batubara & Pertambangan' : 'Coal & Mining Service'}}</a>
									</li>
									<li>
										<a href="{{route('infrastructure')}}">{{Session::get('locale') == 'id' ? 'Infrastruktur Pertambangan & Layanan Lainnya' : 'Mining Infrastructure & Other Service'}}</a>
									</li>
									<li>
										<a href="{{route('port')}}">{{Session::get('locale') == 'id' ? 'Layanan Management Pelabuhan' : 'Port Management Service'}}</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="{{route('operational')}}">{{Session::get('locale') == 'id' ? 'Wilayah Operasional' : 'Operational Area'}}</a>
							</li>
						</ul>
					</li>
					<li class="has-dropdown">
						<a href="{{route('gcg')}}" data-toggle="dropdown" class="dropdown-toggle">{{Session::get('locale') == 'id' ? 'Tata Kelola Perusahaan' : 'Corporate Governance'}}</a>
						<ul class="dropdown-menu">
							<li>
								<a href="{{route('gcg')}}">{{Session::get('locale') == 'id' ? 'Praktik GCG' : 'GCG Practice'}}</a>
							</li>
							<li>
								<a href="{{route('ethics')}}">{{Session::get('locale') == 'id' ? 'Etika Bisnis' : 'Business Ethics'}}</a>
							</li>
							<li>
								<a href="{{route('coc')}}">{{Session::get('locale') == 'id' ? 'Kode Etik' : 'Code Of Conduct'}}</a>
							</li>
							<li>
								<a href="{{route('integrity')}}">{{Session::get('locale') == 'id' ? 'Pakta Integritas' : 'Integrity Pact'}}</a>
							</li>
							<li>
								<a href="{{route('policy')}}">{{Session::get('locale') == 'id' ? 'Manual Kebijakan Perusahaan' : 'Corporate Policy Manual'}}</a>
							</li>
							<li>
								<a href="{{route('whistleblowing')}}">{{Session::get('locale') == 'id' ? 'Sistem Pelaporan Pelanggaran' : 'Whistleblowing System'}}</a>
							</li>
							<li class="dropdown-submenu">
								<a href="#" data-toggle="dropdown" class="dropdown-toggle">{{Session::get('locale') == 'id' ? 'Komite' : 'Committee'}}</a>
								<ul class="dropdown-menu">
									<li>
										<a href="{{route('audit')}}">{{Session::get('locale') == 'id' ? 'Komite Audit' : 'Audit Committee'}}</a>
									</li>
									<li>
										<a href="{{route('nomination')}}">{{Session::get('locale') == 'id' ? 'Komite Nominasi & Remunerasi' : 'Nomination & Remuneration Committee'}}</a>
									</li>
									<li>
										<a href="{{route('risk')}}">{{Session::get('locale') == 'id' ? 'Komite Manajemen Risiko' : 'Risk Management Committee'}}</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="has-dropdown">
						<a href="corporate-secretary.php" data-toggle="dropdown" class="dropdown-toggle">Corporate Secretary</a>
						<ul class="dropdown-menu">
							<li>
								<a href="corporate-secretary.php">Profile</a>
							</li>
							<li>
								<a href="shareholders-information.php">Shareholders Information</a>
							</li>
							<li>
								<a href="gms.php">General Meeting Of Shareholders</a>
							</li>
							<li>
								<a href="presentation.php">Presentation</a>
							</li>
							<li>
								<a href="annual-report.php">Annual Report</a>
							</li>
							<li>
								<a href="financial-statement.php">Financial Statement</a>
							</li>
							<li class="dropdown-submenu">
								<a href="#" data-toggle="dropdown" class="dropdown-toggle">Production Highlights</a>
								<ul class="dropdown-menu">
									<li>
										<a href="quarterly-newsletter.php">Quarterly Newsletter</a>
									</li>
									<li>
										<a href="monthly-report.php">Monthly Report</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="analyst-coveragre.php">Analyst Coverage</a>
							</li>
							<li>
								<a href="press-release.php">Press Release</a>
							</li>
						</ul>
					</li>
					<li class="has-dropdown">
						<a href="sustainability-report.php" data-toggle="dropdown" class="dropdown-toggle">Sustainability</a>
						<ul class="dropdown-menu">
							<li>
								<a href="sustainability-report.php">Sustainability Report</a>
							</li>
							<li>
								<a href="hse.php">Health, Safety, Environment</a>
							</li>
							<li>
								<a href="csr.php">Corporate Social Responsibility</a>
							</li>
						</ul>
					</li>
				</ul>
				<div class="module module-search">
					<div class="search-icon">
						<i class="text-c--main mr--8 fa fa-globe"></i><span class="caret"></span>
					</div>
					<div class="search-box">
						<ul class="menu-dropdown">
					        <li><a href="#">Indonesia</a></li>
					        <li><a href="#">English</a></li>
					    </ul>
					</div>
				</div>
				<!-- Mod-->
				<div class="module module-search sizeSearch">
					<div class="search-icon">
						<i class="fa fa-search"></i>
						<span class="title">search</span>
					</div>
					<div class="search-box">
						<form class="search-form">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Search...">
								<span class="input-group-btn">
								<button class="btn" type="button"><i class="fa fa-search"></i></button>
								</span>
							</div>
							<!-- /input-group -->
						</form>
					</div>
				</div>
				<!-- .module-search-->

			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>
</header>
