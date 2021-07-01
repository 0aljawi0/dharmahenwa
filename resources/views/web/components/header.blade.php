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
								<a href="{{route('mission-vision-value')}}">{{Session::get('locale') == 'id' ? 'Misi, Visi, Nilai' : 'Mission, Vision, Values'}}</a>
							</li>
							<li>
								<a href="{{route('company-milestone')}}">{{Session::get('locale') == 'id' ? 'Jejak Langkah' : 'Milestone'}}</a>
							</li>
							<li class="dropdown-submenu">
								<a href="#" data-toggle="dropdown" class="dropdown-toggle">{{Session::get('locale') == 'id' ? 'Eksekutif' : 'Executives'}}</a>
								<ul class="dropdown-menu">
									<li>
										<a href="{{ route('commissioners') }}">{{Session::get('locale') == 'id' ? 'Dewan Komisaris' : 'Board Of Commisioners'}}</a>
									</li>
									<li>
										<a href="{{ route('directors') }}">{{Session::get('locale') == 'id' ? 'Direksi' : 'Board Of Directors'}}</a>
									</li>
									<li>
										<a href="{{ route('management') }}">{{Session::get('locale') == 'id' ? 'Manajemen' : 'Board Of Management'}}</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="{{ route('awards') }}">{{Session::get('locale') == 'id' ? 'Penghargaan & Sertifikasi' : 'Awards & Certifications'}}</a>
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
										<a href="{{route('coal')}}">{{Session::get('locale') == 'id' ? 'Jasa Pertambangan Batubara & Mineral' : 'Coal & Mineral Mining Services'}}</a>
									</li>
									<li>
										<a href="{{route('infrastructure')}}">{{Session::get('locale') == 'id' ? 'Infrastruktur Pertambangan & Jasa Lainnya' : 'Mining Infrastructure & Other Services'}}</a>
									</li>
									<li>
										<a href="{{route('port')}}">{{Session::get('locale') == 'id' ? 'Jasa Manajemen Pelabuhan' : 'Port Management Services'}}</a>
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
								<a href="{{route('coc')}}">{{Session::get('locale') == 'id' ? 'Pedoman Perilaku' : 'Code Of Conduct'}}</a>
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
						<a href="{{route('profile')}}" data-toggle="dropdown" class="dropdown-toggle">{{Session::get('locale') == 'id' ? 'Investor' : 'Investor'}}</a>
						<ul class="dropdown-menu">
							<li>
								<a href="{{route('profile')}}">{{Session::get('locale') == 'id' ? 'Profile Chief Investor Relations & Corporate Secretary' : 'Profile Chief Investor Relations & Corporate Secretary'}}</a>
							</li>
							<li>
								<a href="{{route('shareholder')}}">{{Session::get('locale') == 'id' ? 'Informasi Pemegang Saham' : 'Shareholders Information'}}</a>
							</li>
							<li>
								<a href="{{route('meeting')}}">{{Session::get('locale') == 'id' ? 'Rapat Umum Pemegang Saham' : 'General Meeting Of Shareholders'}}</a>
							</li>
							<li>
								<a href="{{route('presentation')}}">{{Session::get('locale') == 'id' ? 'Presentasi' : 'Presentation'}}</a>
							</li>
							<li>
								<a href="{{route('annual_report')}}">{{Session::get('locale') == 'id' ? 'Laporan Tahunan' : 'Annual Report'}}</a>
							</li>
							<li>
								<a href="{{route('financial')}}">{{Session::get('locale') == 'id' ? 'Laporan Keuangan' : 'Financial Statement'}}</a>
							</li>
							<li class="dropdown-submenu">
								<a href="#" data-toggle="dropdown" class="dropdown-toggle">{{Session::get('locale') == 'id' ? 'Laporan Produksi' : 'Production Highlights'}}</a>
								<ul class="dropdown-menu">
									<li>
										<a href="{{route('newsletter')}}">{{Session::get('locale') == 'id' ? 'Kuartalan' : 'Quarterly Newsletter'}}</a>
									</li>
									<li>
										<a href="{{route('monthly_report')}}">{{Session::get('locale') == 'id' ? 'Bulanan' : 'Monthly Report'}}</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="{{route('analyst_coverage')}}">{{Session::get('locale') == 'id' ? 'Laporan Analis' : 'Analyst Coverage'}}</a>
							</li>
							<li>
								<a href="{{route('press_release')}}">{{Session::get('locale') == 'id' ? 'Siaran Pers' : 'Press Release'}}</a>
							</li>
						</ul>
					</li>
					<li class="has-dropdown">
						<a href="{{route('sustainability_report')}}" data-toggle="dropdown" class="dropdown-toggle">{{Session::get('locale') == 'id' ? 'Keberlanjutan' : 'Sustainability'}}</a>
						<ul class="dropdown-menu">
							<li>
								<a href="{{route('sustainability_report')}}">{{Session::get('locale') == 'id' ? 'Laporan Keberlanjutan' : 'Sustainability Report'}}</a>
							</li>
							<li>
								<a href="{{route('hse')}}">{{Session::get('locale') == 'id' ? 'Kesehatan, Keselamatan Kerja, Lingkungan' : 'Health, Safety, Environment'}}</a>
							</li>
							<li>
								<a href="{{route('web_csr')}}">{{Session::get('locale') == 'id' ? 'Tanggung Jawab Sosial Perusahaan' : 'Corporate Social Responsibility'}}</a>
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
					        <li><a href="{{route('change-language', ['lang' => 'id'])}}">Indonesia</a></li>
					        <li><a href="{{route('change-language', ['lang' => 'en'])}}">English</a></li>
					    </ul>
					</div>
				</div>
				<!-- Mod-->
				<div class="module module-search sizeSearch">
					<div class="search-icon">
						<i class="fa fa-search"></i>
						<span class="title">{{Session::get('locale') == 'id' ? 'Pencarian' : 'Search'}}</span>
					</div>
					<div class="search-box">
						<form class="search-form" action="{{route('search')}}" method="GET">
                            @csrf

							<div class="input-group">
								<input type="text" name="q" class="form-control" placeholder="Search...">
								<span class="input-group-btn">
								    <button class="btn" type="submit"><i class="fa fa-search"></i></button>
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
