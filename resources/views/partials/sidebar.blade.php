<nav class="sidebar-wrapper">

				<!-- Sidebar brand starts -->
				<div class="sidebar-brand">
					<a href="/" class="logo">
						<img src="{{asset('assets/images/logo.svg')}}" alt="Moonlight Admin Dashboard" />
					</a>
				</div>
				<!-- Sidebar brand starts -->

				<!-- Sidebar menu starts -->
				<div class="sidebar-menu">
					<div class="sidebarMenuScroll">
						<ul>
							{{-- Domicile --}}
                            @auth
							    <li class="sidebar-dropdown active">
								<a href="#">
									<i class="bi bi-house"></i>
									<span class="menu-text">Domicile</span>
								</a>
								<div class="sidebar-submenu">
									<ul>
										<li>
											<a href="/" class="current-page">Commerce électronique</a>
										</li>
										<li>
											<a href="/client.index">Site Client</a>
										</li>
									</ul>
								</div>
							    </li>
                            @endauth
							{{-- Produit --}}
                            @auth
							    <li class="sidebar-dropdown">
								<a href="#">
									<i class="bi bi-handbag"></i>
									<span class="menu-text">Produit</span>
								</a>
								<div class="sidebar-submenu">
									<ul>
										<li>
											<a href="{{route('produit.index')}}">Liste des Produits</a>
										</li>
										<li>
											<a href="{{route('Produit.create')}}">Ajouter Produit</a>
										</li>
										<li>
											<a href="{{route('EditeProduit')}}">Modifier Produit</a>
										</li>
										<li>
											<a href="{{route('produit.ventes')}}">Ventes Produit</a>
										</li>

									</ul>
								</div>
							    </li>
                            @endauth
							{{-- Catégorie --}}
                            @if (Auth::user() && Auth::user()->type_user == 'admin')
							    <li class="sidebar-dropdown">
								<a href="#">

									<i class="bi bi-folder"></i>

									<span class="menu-text">Catégorie</span>
								</a>
								<div class="sidebar-submenu">
									<ul>
										<li>
											<a href="{{route('catégorie.index')}}">Liste des catégories</a>
										</li>
										<li>

											<a href="{{route('catégorie.create')}}">Ajouter Catégorie</a>
										</li>

									</ul>
								</div>
							    </li>
							@endif
							{{-- Authentication --}}
							@if (Auth::user() && Auth::user()->type_user == 'admin')
								<li class="sidebar-dropdown">
								<a href="#">
									<i class="bi bi-x-diamond"></i>
									<span class="menu-text">Authentication</span>
								</a>
								<div class="sidebar-submenu">
									<ul>
                                        @guest
										<li>
											<a href="{{route('Seconnect')}}">Connexion</a>
										</li>
                                        @endguest
										    <li>
											    <a href="{{route('Inscription')}}">Inscription</a>
										    </li>
                                        @auth
										    <li>
											    <a href="{{route('ListeEmployes')}}">Employes</a>
										    </li>
                                        @endauth
									</ul>
								</div>
								</li>
							@endif
							{{-- Clientèle --}}
                            @auth
							    <li class="sidebar-dropdown">
								<a href="#">
									<i class="bi bi-people"></i>
									<span class="menu-text">Clientèle</span>
								</a>
								<div class="sidebar-submenu">
									<ul>
										<li>
											<a href="{{route('clientele.index')}}">Liste des clients</a>
										</li>
										<li>
											<a href="{{route('historique')}}">Historique D'achats</a>
										</li>
									</ul>
								</div>
							    </li>
                            @endauth
							{{-- Inventaire --}}
                            @auth
							    <li class="sidebar-dropdown">
								<a href="#">
									<i class="bi bi-bar-chart"></i>
									<span class="menu-text">Inventaire</span>
								</a>
								<div class="sidebar-submenu">
									<ul>
										<li>
											<a href="{{route('StocksListe')}}">Liste des stocks</a>
										</li>
										<li>
											<a href="{{route('StocksRetour')}}">Retours</a>
										</li>
									</ul>
								</div>
							    </li>
                            @endauth
							{{-- <li class="sidebar-dropdown">
								<a href="#">
									<i class="bi bi-collection"></i>
									<span class="menu-text">UI Elements</span>
								</a>
								<div class="sidebar-submenu">
									<ul>
										<li>
											<a href="accordions.html">Accordions</a>
										</li>
										<li>
											<a href="alerts.html">Alerts</a>
										</li>
										<li>
											<a href="buttons.html">Buttons</a>
										</li>
										<li>
											<a href="badges.html">Badges</a>
										</li>
										<li>
											<a href="cards.html">Cards</a>
										</li>
										<li>
											<a href="carousel.html">Carousel</a>
										</li>
										<li>
											<a href="dropdowns.html">Dropdowns</a>
										</li>
										<li>
											<a href="icons.html">Icons</a>
										</li>
										<li>
											<a href="modals.html">Modals</a>
										</li>
										<li>
											<a href="offcanvas.html">Off Canvas</a>
										</li>
										<li>
											<a href="progress.html">Progress Bars</a>
										</li>
										<li>
											<a href="spinners.html">Spinners</a>
										</li>
										<li>
											<a href="tabs.html">Tabs</a>
										</li>
										<li>
											<a href="tooltips.html">Tooltips</a>
										</li>
										<li>
											<a href="typography.html">Typography</a>
										</li>
									</ul>
								</div>
							</li> --}}
                            @auth
							    <li class="sidebar-dropdown">
								<a href="#">
									<i class="bi bi-stickies"></i>
									<span class="menu-text">Pages</span>
								</a>
								<div class="sidebar-submenu">
									<ul>
										<li>
											<a href="pricing.html">Profile</a>
										</li>
										<li>
											<a href="/Profile">Account Settings</a>
										</li>
										<li>
											<a href="/admin.clientele.liste">Clients</a>
										</li>
										<li>
											<a href="/Authentification.liste">Employes</a>
										</li>
										<li>
											<a href="/admin.stocks.liste">Stocks</a>
										</li>
										<li>
											<a href="/produit">Products</a>
										</li>
										<li>
											<a href="/catégorie">Categories</a>
										</li>
									</ul>
								</div>
							    </li>
                            @endauth
							{{-- <li class="sidebar-dropdown">
								<a href="#">
									<i class="bi bi-calendar4"></i>
									<span class="menu-text">Calendars</span>
								</a>
								<div class="sidebar-submenu">
									<ul>
										<li>
											<a href="calendar.html">Daygrid View</a>
										</li>
										<li>
											<a href="calendar-external-draggable.html">External Draggable</a>
										</li>
										<li>
											<a href="calendar-google.html">Google Calendar</a>
										</li>
										<li>
											<a href="calendar-list-view.html">List View</a>
										</li>
										<li>
											<a href="calendar-selectable.html">Selectable</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="sidebar-dropdown">
								<a href="#">
									<i class="bi bi-columns-gap"></i>
									<span class="menu-text">Forms</span>
								</a>
								<div class="sidebar-submenu">
									<ul>
										<li>
											<a href="form-inputs.html">Form Inputs</a>
										</li>
										<li>
											<a href="form-checkbox-radio.html">Checkbox &amp; Radio</a>
										</li>
										<li>
											<a href="form-file-input.html">File Input</a>
										</li>
										<li>
											<a href="form-validations.html">Validations</a>
										</li>
										<li>
											<a href="bs-select.html">Bootstrap Select</a>
										</li>
										<li>
											<a href="date-time-pickers.html">Date Time Pickers</a>
										</li>
										<li>
											<a href="input-mask.html">Input Masks</a>
										</li>
										<li>
											<a href="summernote.html">Summernote</a>
										</li>
										<li>
											<a href="form-layout1.html">Form Layout</a>
										</li>
										<li>
											<a href="form-layout2.html">Form Layout 2</a>
										</li>
										<li>
											<a href="form-layout3.html">Form Layout 3</a>
										</li>
										<li>
											<a href="form-layout4.html">Form Layout Horizontal</a>
										</li>
										<li>
											<a href="form-layout5.html">Form Layout Tabs</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="sidebar-dropdown">
								<a href="#">
									<i class="bi bi-window-split"></i>
									<span class="menu-text">Tables</span>
								</a>
								<div class="sidebar-submenu">
									<ul>
										<li>
											<a href="tables.html">Tables</a>
										</li>
										<li>
											<a href="data-tables.html">Data Tables</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="sidebar-dropdown">
								<a href="#">
									<i class="bi bi-layout-sidebar"></i>
									<span class="menu-text">Layouts</span>
								</a>
								<div class="sidebar-submenu">
									<ul>
										<li>
											<a href="layout.html">Default Layout</a>
										</li>
										<li>
											<a href="layout-grid.html">Grid Layout</a>
										</li>
										<li>
											<a href="layout-mega-menu.html">Mega Menu</a>
										</li>
										<li>
											<a href="layout-full-screen.html">Full Screen</a>
										</li>
										<li>
											<a href="layout-toggle-screen.html">Toggle Screen</a>
										</li>
										<li>
											<a href="layout-welcome.html">Welcome Layout</a>
										</li>
										<li>
											<a href="layout-dark-sidebar.html">Dark Sidebar</a>
										</li>
										<li>
											<a href="layout-logo-large.html">Full Logo</a>
										</li>
									</ul>
								</div>
							</li>

							<li>
								<a href="starter-page.html">
									<i class="bi bi-hand-index-thumb"></i>
									<span class="menu-text">Link</span>
								</a>
							</li>
						</ul>
					</div>
				</div> --}}
