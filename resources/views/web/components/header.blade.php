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
				<a class="logo" href="index.php">
					<img src="{{asset('storage/'.$website->logo)}}" alt="DarmaHenwa">
				</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1">

				<ul class="nav navbar-nav navbar-left">
					<li class="has-dropdown">
						<a href="{{route('company-profile')}}" data-toggle="dropdown" class="dropdown-toggle">{{Session::get('locale') == 'id' ? 'Tentang Kami' : 'About Us'}}</a>
						<ul class="dropdown-menu">
							<li>
								<a href="{{route('company-profile')}}">{{Session::get('locale') == 'id' ? 'Profil Perusahaan' : 'Company Profile'}}</a>
							</li>
							<li>
								<a href="{{route('mission-vision-value')}}">{{Session::get('locale') == 'id' ? 'Misi, Visi, Nilai' : 'Mission, Vision, Value'}}</a>
							</li>
							<li>
								<a href="{{route('milestone')}}">{{Session::get('locale') == 'id' ? 'Tonggak Sejarah' : 'Milestone'}}</a>
							</li>
							<li class="dropdown-submenu">
								<a href="#" data-toggle="dropdown" class="dropdown-toggle">Executives</a>
								<ul class="dropdown-menu">
									<li>
										<a href="boc.php">Board of Commissioners</a>
									</li>
									<li>
										<a href="bod.php">Board of Directors</a>
									</li>
									<li>
										<a href="bom.php">Board of Management</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="awards.php">Awards &amp; Certifications</a>
							</li>
						</ul>
					</li>
					<li class="has-dropdown">
						<a href="coal-mining.php" data-toggle="dropdown" class="dropdown-toggle">Business</a>
						<ul class="dropdown-menu">
							<li class="dropdown-submenu">
								<a href="#" data-toggle="dropdown" class="dropdown-toggle">Operational Activities</a>
								<ul class="dropdown-menu">
									<li>
										<a href="coal-mining.php">Coal &amp; Mining Services</a>
									</li>
									<!-- <li>
										<a href="mineral-mining.php">Mineral Mining</a>
									</li> -->
									<li>
										<a href="mining-infrasutrure.php">mining infrastructure &amp; other services</a>
									</li>
									<li>
										<a href="port-management-services.php">Port Management Services</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="operational-area.php">Operational Areas</a>
							</li>
						</ul>
					</li>
					<li class="has-dropdown">
						<a href="gcg-practices.php" data-toggle="dropdown" class="dropdown-toggle">Corporate Governance</a>
						<ul class="dropdown-menu">
							<li>
								<a href="gcg-practices.php">GCG Practices</a>
							</li>
							<li>
								<a href="bussiness-ethics.php">Business Ethics</a>
							</li>
							<li>
								<a href="code-conduct.php">Code of Conduct</a>
							</li>
							<li>
								<a href="integrity-pact.php">Integrity Pact</a>
							</li>
							<li>
								<a href="corporate-policy-manual.php">Corporate Policy Manual</a>
							</li>
							<li>
								<a href="whistleblowing-system.php">Whistleblowing System</a>
							</li>
							<li class="dropdown-submenu">
								<a href="#" data-toggle="dropdown" class="dropdown-toggle">committee</a>
								<ul class="dropdown-menu">
									<li>
										<a href="audit-committee.php">Audit Committee</a>
									</li>
									<li>
										<a href="nomination-remuneration-committee.php">Nomination &amp; Remuneration Commitee</a>
									</li>
									<li>
										<a href="risk-managemen-commitee.php">Risk Management Committee</a>
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
