<div class="header-actions-container">

	<!-- Search container start -->
	<div class="search-container">

		<!-- Search input group start -->
		<div class="input-group">
			<input type="text" class="form-control" placeholder="Search anything">
			<button class="btn" type="button">
				<i class="bi bi-search"></i>
			</button>
		</div>
		<!-- Search input group end -->

	</div>
	<!-- Search container end -->

	<!-- Leads start -->
	<a href="orders.html" class="leads d-none d-xl-flex">
		<div class="lead-details">You have <span class="count"> 21 </span> new leads </div>
		<span class="lead-icon"><i
				class="bi bi-bell-fill animate__animated animate__swing animate__infinite infinite"></i><b
				class="dot animate__animated animate__heartBeat animate__infinite"></b></span>
	</a>
	<!-- Leads end -->

	<!-- Header actions start -->
	<ul class="header-actions">
		<li class="dropdown d-none d-md-block">
			<a href="#" id="countries" data-toggle="dropdown" aria-haspopup="true">
				<img src="{{asset('assets/images/flags/1x1/gb.svg')}}" class="flag-img" alt="AI Admin Dashboards" />
			</a>
			<div class="dropdown-menu dropdown-menu-end mini" aria-labelledby="countries">
				<div class="country-container">
					<a href="index.html">
						<img src="{{asset('assets/images/flags/1x1/us.svg')}}" alt="Clean Admin Dashboards" />
					</a>
					<a href="index.html">
						<img src="{{asset('assets/images/flags/1x1/in.svg')}}" alt="Google Dashboards" />
					</a>
					<a href="index.html">
						<img src="{{asset('assets/images/flags/1x1/br.svg')}}" alt="Admin Panels" />
					</a>
					<a href="index.html">
						<img src="{{asset('assets/images/flags/1x1/tr.svg')}}" alt="Modern Dashboards" />
					</a>
					<a href="index.html">
						<img src="{{asset('assets/images/flags/1x1/ca.svg')}}" alt="Best Admin Dashboards" />
					</a>
				</div>
			</div>
		</li>
		<li class="dropdown">
			<a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
				<span class="user-name d-none d-md-block">{{Auth::user()?->name}}</span>
				<span class="avatar">
					<img src="{{asset('assets/images/user.png')}}" alt="Admin Templates">
					<span class="status online"></span>
				</span>
			</a>
			<div class="dropdown-menu dropdown-menu-end" aria-labelledby="userSettings">
				<div class="header-profile-actions">
					<a href="{{route('Profile')}}">Profile</a>
					<a href="{{route('SettingShow')}}">Settings</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-danger btn-sm mt-2" type="submit">Logout</button>
                    </form>
				</div>
			</div>
		</li>
	</ul>
	<!-- Header actions end -->

</div>
