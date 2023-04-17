  <div class="container">
    <div class="row">
        <div class="col-3">
            <a style="" class="cmn-toggle-switch cmn-toggle-switch__htx open_close" id="menu" href="javascript:void(0);">
                <span>Menu mobile</span></a>
        </div>
        {{-- <div class="col-3">
            <div id="logo_home">
                <a hreflang="es" href="/">
                    <img src="{{ asset('/images/'.meta()->logo)}}" alt="" height="45px">
                </a>
            </div>
        </div> --}}
        <nav class="col-9">
            <div id="logo_home">
                <a hreflang="es" href="/">
                    {{-- <img src="{{ asset('/images/'.meta()->logo)}}" alt="" height="45px"> --}}
                    <img src="{{ asset('/images/cover.png')}}" alt="" height="45px">

                </a>
            </div>
            <div class="main-menu">
                <div id="header_menu">
                    <img src="{{ asset('/images/'.meta()->logo)}}" width="160" height="34" alt="" data-retina="true">
                </div>
                <a href="#"  class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li class="submenu">
                        <a href="javascript:void(0);" class="show-submenu">Destinations <i class="icon-right-open d-lg-none d-sm-block d-block d-md-block d-sm-none"></i></a>
                        <ul>
                            @foreach ($destinationss as $dest)
                            <li><a href="/{{$dest->slug}}">{{$dest->name}}</a></li>
                            @endforeach
                        </ul>

                    </li>
                    <li><a hreflang="es" href="/nile-cruise">Nile Cruises</a></li>
                    <li><a hreflang="es" href="/Egypt/Camping-tour">Tours Camping</a></li>
                    {{-- <li><a hreflang="es" href="/ofertas-de-viajes">Ofertas de Viajes</a></li> --}}

                    <li class="submenu">
                        <a href="javascript:void(0);" class="show-submenu2">More
                        <i class="icon-right-open d-lg-none d-sm-block d-block d-md-block d-sm-none"></i></a>
                        <ul class="d-xl-block d-none d-md-none d-sm-none">
                            @if (count($wikiss)>0)
                            <li><a hreflang="es" href="/wiki">Wikis</a></li>
                            @endif
                            @if (count($blogss)>0)
                            <li><a hreflang="es" href="/blogs">Blogs</a></li>
                            @endif
                            <li><a hreflang="es" href="/contact-us">Contact Us</a></li>
                            <li><a hreflang="es" href="/about-us">About us</a></li>
                        </ul>
                    </li>
                    @php
                    $defaultCurrency = NULL;

                @endphp
                {{-- Currency Dropdown --}}

                </ul>
                <div class="regions_body  d-sm-none" id="regions_body">
                    <i class="icon-left-open back"></i>
                    <ul>
                        @foreach ($destinationss as $dest)
                        <li><a href="/{{$dest->slug}}">{{$dest->name}}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="mini_menu_body d-sm-none" id="mini_menu_body">
                    <i class="icon-left-open back2"></i>
                    <ul>
                        {{-- @if (count($wikiss)>0)
                        <li><a hreflang="es" href="/guia-de-viajes">Guía de Viajes</a></li>
                        @endif
                        @if (count($blogss)>0)
                        <li><a hreflang="es" href="/blog-de-viajes">Blog de Viajes</a></li>
                        @endif --}}
                        @if (count($blogss)>0)
                            <li><a hreflang="es" href="/blogs">Blogs</a></li>
                        @endif
                        <li><a hreflang="es" href="/contact-us">Contact Us</a></li>
                        <li><a hreflang="es" href="/about-us">About us</a></li>
                    </ul>
                </div>




            </div><!-- End main-menu -->

            <ul id="top_tools" class="d-lg-block">
            <li class="currency-dropdown" style="margin-top: -13px;">
                    <div class="dropdown">
                        {{-- @if ($currencies['id'] == $selectedCurrency) { --}}
                        @php
                            Helper::currency_load();
                            $currency_abbrev = session('currency_abbrev');
                            $currency_name = session('currency_name');
                            $currency_symbol=session('currency_symbol');
                            if ($currency_symbol == "") {
                                $system_default_currency_info=session('system_default_currency_info');
                                $currency_abbrev=$system_default_currency_info->abbrev;
                                $currency_name=$system_default_currency_info->name;
                                $currency_symbol=$system_default_currency_info->symbol;
                            }
                        @endphp
                        {{-- } --}}
                        <a href="#" class="btn btn-sm dropdown-toggle" role="button" id="dropdownMenu2"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="box-shadow: none; font-size: 13px; font-weight: 700; ">
                       {{-- {{ $defaultCurrency = $currencies['abbrev'] . " (".$currencies['symbol'].")" }} --}}
                       {{ $currency_abbrev }}
                    </a>
                    {{-- @endif --}}

                    <div id="currency" class="dropdown-menu dropdown-menu-center" aria-labelledby="dropdownMenu2" style=" border-top: 0px; border-radius: 0px">
                        @foreach ($currencies as $currency)
                       <a id="e{{ $currency->id }}" href="javascript:void(0);" style="font-size: 13px; font-weight: bold; padding: 5px; color: #000;"  class="dropdown-item" onclick="currency_change('{{ $currency->abbrev }}', '{{ $currency->name }}');">{{ $currency->name }} - <b style="color: #C6C0BE;">{{ $currency->symbol }}</b></a>
                       @endforeach
                         {{-- <a href="#" class="dropdown-item">GBP (€)</a>  --}}
                     </div>
                    </div>
                </li>
                <li>
                    <a href="/customize-your-trip" class="nav-link login" style="color: #fff" id="tailor">Custom Tour</a>
                </li>
            </ul>
        </nav>


    </div>
</div><!-- container -->
