<ul id="main-menu" class="main-menu">
        <li class="root-level  @yield('dashboard')">
            <a href="/home" >
                <i class="entypo-gauge"></i>
                <span class="title"> @lang('lang.dashboard')</span>
            </a>
        </li>
        @if (Auth::user()->isAdmin())

        <li class="@yield('settings') @yield('profile') @yield('users') has-sub root-level">
            <a href="">
                <i class="entypo-cog"></i>
                <span class="title">@lang('lang.settings')</span>
            </a>
            <ul class="@yield('settings') @yield('profile') @yield('users')">
                    <li class="root-level  @yield('settings')">
                        <a href="/admin/settings" >
                            <i class="entypo-cog"></i>
                            <span class="title"> @lang('lang.settings')</span>
                        </a>
                    </li>
                <li class="root-level  @yield('profile')">
                    <a href="/profile" >
                        <i class="entypo-user"></i>
                        <span class="title"> @lang('lang.profile')</span>
                    </a>
                </li>

                <li class="root-level  @yield('users')">
                    <a href="/admin/users" >
                        <i class="entypo-users"></i>
                        <span class="title"> @lang('lang.users')</span>
                    </a>
                </li>

            </ul>
        </li>

        <li class="root-level  @yield('destinations')">
            <a href="/admin/destinations" >
                <i class="entypo-address"></i>
                <span class="title">Destinations</span>
            </a>
        </li>

        <li class="has-sub root-level">
            <a href="">
                <i class="entypo-cog"></i>
                <span class="title">@lang('Pricing Tamplates')</span>
            </a>
            <ul class="@yield('pricingTempaltes')">
                    <li class="root-level  @yield('pricingTempaltes')">
                        <a href="/pricing_template" >
                            <i class="entypo-cog"></i>
                            <span class="title"> @lang('All Pricing Templates')</span>
                        </a>
                    </li>
                <li class="root-level  @yield('pricingTempaltes')">
                    <a href="/pricing_template/create" >
                        <i class="entypo-user"></i>
                        <span class="title"> @lang('Add Pricing Templates')</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="root-level  @yield('packages')">
            <a href="/admin/packages" >
                <i class="entypo-picture"></i>
                <span class="title"> @lang('lang.packages')</span>
            </a>
        </li>

        <li class="root-level  @yield('hotels')">
            <a href="/hotels" >
                <i class="entypo-picture"></i>
                <span class="title"> @lang('Hotels')</span>
            </a>
        </li>

        <li class="root-level  @yield('generals')">
            <a href="/admin/generals" >
                <i class="entypo-info"></i>
                <span class="title"> General Info</span>
            </a>
        </li>

        <li class="root-level  @yield('sliders')">
            <a href="/admin/sliders" >
                <i class="entypo-monitor"></i>
                <span class="title"> @lang('lang.sliders')</span>
            </a>
        </li>


        <li class="root-level  @yield('blogs')">
            <a href="/admin/blog" >
                <i class="entypo-book-open"></i>
                <span class="title"> @lang('lang.blogs')</span>
            </a>
        </li>

        <li class="root-level  @yield('wikis')">
            <a href="/admin/wikis" >
                <i class="entypo-bookmark"></i>
                <span class="title"> Wikis</span>
            </a>
        </li>

        <li class="root-level  @yield('faqs')">
            <a href="/admin/faqs" >
                <i class="entypo-help"></i>
                <span class="title"> @lang('lang.faqs')</span>
            </a>
        </li>

        <li class="root-level  @yield('reviews')">
            <a href="/admin/reviews" >
                <i class="entypo-chat"></i>
                <span class="title"> @lang('lang.reviews')</span>
            </a>
        </li>

        <li class="@yield('overview') @yield('reasons') has-sub root-level">
            <a href="">
                <i class="entypo-cog"></i>
                <span class="title">@lang('Overview')</span>
            </a>
            <ul class="@yield('overview') @yield('reasons')">
                    <li class="root-level  @yield('reasons')">
                        <a href="/reasons" >
                            <i class="entypo-cog"></i>
                            <span class="title"> @lang('Reasons')</span>
                        </a>
                    </li>
                    <li class="root-level  @yield('tailor')">
                        <a href="/tailors" >
                            <i class="entypo-cog"></i>
                            <span class="title"> @lang('Tailor')</span>
                        </a>
                    </li>
                    <li class="root-level  @yield('about')">
                        <a href="/about" >
                            <i class="entypo-cog"></i>
                            <span class="title"> @lang('about')</span>
                        </a>
                    </li>
                    <li class="root-level  @yield('newsletter')">
                        <a href="/newsletter" >
                            <i class="entypo-cog"></i>
                            <span class="title"> @lang('Newsletter')</span>
                        </a>
                    </li>

            </ul>
        </li>

        <li class="@yield('contacts') @yield('socials')  has-sub root-level">
            <a href="">
                <i class="entypo-map"></i>
                <span class="title">@lang('lang.contacts')</span>
            </a>
            <ul class="@yield('contacts')  @yield('socials') ">

                <li class="root-level  @yield('contacts')">
                    <a href="/admin/contacts" >
                        <i class="entypo-map"></i>
                        <span class="title"> @lang('lang.contacts')</span>
                    </a>
                </li>
                <li class="root-level  @yield('socials')">
                    <a href="/admin/socials" >
                        <i class="entypo-network"></i>
                        <span class="title"> @lang('lang.socials')</span>
                    </a>
                </li>
            </ul>
        </li>
        @endif

        @if (Auth::user()->isUser())
        <li class="root-level  @yield('profile')">
            <a href="/profile" >
                <i class="entypo-user"></i>
                <span class="title"> @lang('lang.profile')</span>
            </a>
        </li>
        @endif

    </ul>
