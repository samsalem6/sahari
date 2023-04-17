<header class="header trans_300">

		<!-- Top Navigation -->

		<div class="top_nav">
			<div class="container">
				<div class="row">
					<div class="col-md-6" style="padding-top: 7px;">
						{{--  <div class="top_nav_left">  --}}
							<form role="form" action="{{ route('search') }}" method="GET">
								{{ csrf_field() }}
								<div class="  align-items-center justify-content-lg-end justify-content-center">
									<input  style="height: 33px;" id="newsletter_email" name="query" value="{{ request()->input('query') }}" type="search" placeholder="@lang('lang.Search') . . ." required="required">
									<button id="newsletter_submit" type="submit" style="width: 120px;
									height: 35px;" class="newsletter_submit_btn trans_300" value="Submit">@lang('lang.Search') </button>
								</div>
							</form>

					</div>
					<div class="col-md-6
					@if (LaravelLocalization::getCurrentLocale() == 'ar')
					@endif
					@if (LaravelLocalization::getCurrentLocale() == 'en')
					text-right
					@endif">
						<div class="top_nav_right">
							<ul class="top_nav_menu">

								<!-- Currency / Language / My Account -->

									@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
										@if (app()->getLocale() == $localeCode )
										@else
										<li class="language">
											<a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
											{{ $properties['native'] }}
											</a>
										</li>
										@endif
									@endforeach

								<li class="account">
                                    @guest
									<a href="#">
										<i class="fa fa-user-plus" aria-hidden="true"></i>
										@lang('lang.Register')
										<i class="fa fa-angle-down"></i>
									</a>
                                        <ul class="account_selection">
                                            <li>
                                                <a href="{{ route('login') }}">
                                                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                                                    @lang('lang.LoginIn')
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('register') }}">
													<i class="fa fa-user-plus" aria-hidden="true"></i>
                                                    @lang('lang.Register')
                                                </a>
                                            </li>
                                        </ul>
                                    @else
                                        <a href="#">
                                            {{ Auth::user()->name }}
                                            <i class="fa fa-angle-down"></i>
                                        </a>

                                        <ul class="account_selection" style="width: 150px;">
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();"><i class="fa fa-sign-in" aria-hidden="true"></i>
                                                    {{ __('lang.Logout') }}
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </li>
                                            <li>
                                                <a href="{{ route('profile') }}">
													<i class="fa fa-user" aria-hidden="true"></i>
													{{ __('lang.profile') }}
                                                </a>
                                            </li>
                                        </ul>
                                    @endguest
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Main Navigation -->

		<div class="main_nav_container">
			<div class="container">
				<div class="row" style="
				height: 100px;
			">
					<div class="col-lg-12 text-right">
						<div class="logo_container">
							 <img style="width:100px" src="/images/logo.png" alt="">
                        </div>

						<nav class="navbar">
							<ul class="navbar_menu">
								<li><a href="/">@lang('lang.home')</a></li>
								<li><a href="/products">@lang('lang.shop')</a></li>
								<li><a href="/aboutus">@lang('lang.abouts')</a></li>
								<li><a href="/markets">@lang('lang.markets')</a></li>
								<li><a href="/technologies">@lang('lang.technologies')</a></li>
								<li><a href="/wheres">@lang('lang.wheres')</a></li>
								<li><a href="/contactus">@lang('lang.contacts')</a></li>
							</ul>

							<ul class="navbar_user">
								@auth
									<li class="checkout">
										<a href="/cart">
											<i class="fa fa-shopping-cart" aria-hidden="true"></i>
											@if (Cart::session(Auth::user()->id)->getContent()->count() > 0)
											<span id="checkout_items" class="checkout_items">
													{{ Cart::session(Auth::user()->id)->getContent()->count() }}
											</span>
											@endif
										</a>
									</li>
								@endauth

                            </ul>

							<div class="hamburger_container">
								<i class="fa fa-bars" aria-hidden="true"></i>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>

	</header>

	<div class="hamburger_menu">
		<div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
		<div class="hamburger_menu_content text-right">
			<ul class="menu_top_nav">

					@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
					@if (app()->getLocale() == $localeCode )
					@else
					<li class="menu_item">
						<a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
						{{ $properties['native'] }}
						</a>
					</li>
					@endif
					@endforeach

				<li class="menu_item has-children">
						@guest
						<a href="#">
							<i class="fa fa-user-plus" aria-hidden="true"></i>
							@lang('lang.Register')
							<i class="fa fa-angle-down"></i>
						</a>
							<ul class="menu_selection">
								<li>
									<a href="{{ route('login') }}">
										<i class="fa fa-sign-in" aria-hidden="true"></i>
										@lang('lang.LoginIn')
									</a>
								</li>
								<li>
									<a href="{{ route('register') }}">
										<i class="fa fa-user-plus" aria-hidden="true"></i>
										@lang('lang.Register')
									</a>
								</li>
							</ul>
						@else
							<a href="#">
								{{ Auth::user()->name }}
								<i class="fa fa-angle-down"></i>
							</a>

							<ul class="menu_selection">
								<li>
									<a href="{{ route('logout') }}"
									onclick="event.preventDefault();
													document.getElementById('logout-form').submit();"><i class="fa fa-sign-in" aria-hidden="true"></i>
										{{ __('lang.Logout') }}
									</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										@csrf
									</form>
								</li>
								<li>
									<a href="{{ route('profile') }}">
										<i class="fa fa-user" aria-hidden="true"></i>
										{{ __('lang.profile') }}
									</a>
								</li>
							</ul>
						@endguest
					</li>

					<li class="menu_item" ><a href="/">@lang('lang.home')</a></li>
					<li class="menu_item" ><a href="/products">@lang('lang.shop')</a></li>
					<li class="menu_item" ><a href="/aboutus">@lang('lang.abouts')</a></li>
					<li class="menu_item" ><a href="/markets">@lang('lang.markets')</a></li>
					<li class="menu_item" ><a href="/technologies">@lang('lang.technologies')</a></li>
					<li class="menu_item" ><a href="/wheres">@lang('lang.wheres')</a></li>
					<li class="menu_item" ><a href="/contactus">@lang('lang.contacts')</a></li>

			</ul>
		</div>
	</div>

