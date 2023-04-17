@extends('layouts.app')
@section('css')
@endsection
@section('title', 'Viajes Egipto')

@section('meta')
	<meta name="title" content="Viajes Egipto">
	<meta name="keywords" content="Viajes Egipto">
	<meta name="description" content="No pierda la oportunidad de hacer un viaje inolvidable en uno de los paquetes de Vamos Viajando con guia de habla hispana y mejor precio. Reserve ahora!">
@endsection
@section('content')

<section class="parallax-window" data-parallax="scroll" data-image-src="{{ asset('/images/packages.jpg')}}" data-natural-width="1400" data-natural-height="470">
	<div class="parallax-content-1">
			{{-- <div class="d-lg-none">
			<img src="{{ asset('/images/1.png')}}" style="z-index: 15000;width: 50px;position: absolute;right: 0%;top: 30%;" alt="Nile Cruises" data-retina="true">
			</div>
			<div class="d-none d-lg-block">
				<img src="{{ asset('/images/1.png')}}" style="z-index: 15000;width: 100px;position: absolute;right: 0%;top: 20%;" alt="Nile Cruises" data-retina="true">
			</div> --}}
		<div class="animated fadeInDown">
			<h1>Viajes Egipto</h1>
			<p>
				No pierda la oportunidad de hacer un viaje inolvidable en uno de los paquetes de Vamos Viajando. Ven a visitar los encantos
 de las principales ciudades turísticas del país como El Cairo, Giza, Luxor, Asuán, Alejandría, Sharm El Sheikh y Hurghada.
 Además de los inigualables cruceros por el río Nilo y más. ¡Reserve uno de nuestros paquetes de Egipto y prepárese para la aventura!
			</p>
		</div>
	</div>
</section>
<!-- End section -->

<main>

	<div id="position">
		<div class="container">
			<ul>
				<li><a href="/">Inicio</a>
				</li>
				<li>Paquetes</li>
			</ul>
		</div>
	</div>
	<!-- Position -->

	<div class="container margin_60">
		<div class="row">
			<div class="col-lg-8">
				@foreach ($packages as $package)
					<div class="strip_all_tour_list wow fadeIn" data-wow-delay="0.1s">
						<div class="row">
								<div class="col-lg-4 col-md-4">

									@switch($package->popular)
										@case('popular')
											<div class="ribbon_3 popular"><span>Popular</span></div>
											@break
										@case('toprated')
											<div class="ribbon_3"><span>Destacado</span></div>
											@break
										@default
									@endswitch

                                    <a href="/{{ $package->slug }}">
                                        <div class="img_list" style="background-image: url({{ asset('/images/packages/'.$package->shortImage)}}); background-size: cover; background-position: center; width: 100%;height: 100%;" title="{{ $package->altShort }}">
                                        </div>
                                    </a>
								</div>

								<div class="col-lg-6 col-md-6">
									<div class="tour_list_desc">
										<div class="rating">
											<i class="icon-smile {{ $package->stars >= 1 ? ' voted' : '' }}"></i>
											<i class="icon-smile {{ $package->stars >= 2 ? ' voted' : '' }}"></i>
											<i class="icon-smile {{ $package->stars >= 3 ? ' voted' : '' }}"></i>
											<i class="icon-smile {{ $package->stars >= 4 ? ' voted' : '' }}"></i>
											<i class="icon-smile {{ $package->stars >= 5 ? ' voted' : '' }}"></i>
											<small>({{ $package->starsNum }})</small>
										</div>
										<a href="/{{ $package->slug }}">
										<h3>{{ $package->name}}</h3>
										</a>
										<p style="margin: 0 0 1px 0;!important">
											@if ($package->shortDescription)
											{!! substr (strip_tags($package->shortDescription), 0, 150) !!} ...
											@else
											{!! substr (strip_tags($package->description), 0, 150) !!} ...
											@endif
										</p>
										<div class="row">
											@foreach ($package->icons as $index => $item)
												@if($index < 4)
												<div class=" col-lg-6 other_tours" >
												<ul  class="">
													<li><a style="font-weight: bold;color: #e9b131" href="#"><i style="color: #e9b131" class="{{$item->icon}}"></i>{{$item->title}}</a>
													</li>
												</ul>
												</div>
												@endif
											@endforeach
										</div>
									</div>
								</div>

								<div class="col-lg-2 col-md-2">
									<div class="price_list">
										<div>{{Helper::currency_converter($package->startPrice)}}*<span class="normal_price_list"></span><small>*Per persona</small>
											<p><a href="/{{ $package->slug }}" style="background: #ec661d;color:#fff" class="btn_1">Detalles</a>
											</p>
										</div>

									</div>
								</div>

							</div>
					</div>
				@endforeach
				<hr>
			</div>
			<aside class="col-lg-4" id="sidebar">
				<div class="text-right" style="margin-bottom: 10px;">
					<a href="https://www.feefo.com/reviews/vamos-viajando" target="_blank"><img alt="Feefo logo" border="0" src="https://api.feefo.com/api/logo?merchantidentifier=vamos-viajando" title="See what our customers say about us"/></a>
				</div>
				<div class="theiaStickySidebar">
					<div class="box_style_1 expose" id="booking_box">
						<h3 style="background-color: #ec661d;" class="inner">Envía Tu Solicitud</h3>

						<form action="/tailor" method="post">
							@csrf
							<input name="terms" type="hidden" value="{{ request()->terms }}">
							<input name="source" type="hidden" value="{{ request()->source }}">
							<input name="previous" type="hidden" value="{{ URL::previous() }}">
							<input name="utm_campaign" type="hidden" value="{{ request()->utm_campaign }}">
							<input name="utm_term" type="hidden" value="{{ request()->utm_term }}">
							<input name="package" type="hidden" value="{{ $package->name }}">

							<div class="row ">

								<div class="col-sm-6">
									<div class="form-group ">
									<input
									required=""
									oninvalid="this.setCustomValidity('Este Campo es requerido')"
									oninput="setCustomValidity('')"
									 type="text" class="form-control  {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name_contact" name="name" value="{{old('name')}}" placeholder="Nombre *">
									</div>
								</div>

								<div class="col-sm-6">
									<div class="form-group">
										<input required=""
										oninvalid="this.setCustomValidity('Este Campo es requerido')"
										oninput="setCustomValidity('')" type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" value="{{old('email')}}" name="email" placeholder="Email *">
									</div>
								</div>

								<div class="col-sm-6">
									<div class="form-group">
										<input
										required=""
										readonly='true'
										oninvalid="this.setCustomValidity('Este Campo es requerido')"
										oninput="setCustomValidity('')"
										 name="Arrival"   class="date-pick form-control {{ $errors->has('Arrival') ? ' is-invalid' : '' }}" data-date-format="d/m/yyyy" placeholder="d/m/aaaa" type="text">

										{{-- <input
										required=""
										oninvalid="this.setCustomValidity('Este Campo es requerido')"
										oninput="setCustomValidity('')"
										 class="form-control" data-date-format="d/m/yyyy" name="Arrival" type="text" id="check_in" placeholder="llegada d/m/yyyy"> --}}
									</div>
								</div>

								<div class="form-group col-md-6 col-sm-6 col-xs-12">
									<select required name="nationality" class="form-control {{ $errors->has('nationality') ? ' is-invalid' : '' }}">
										<option value="">Nacionalidad <sup>*</sup></option>
										<option value="American">American</option>
										<option value="Afghan">Afghan</option>
										<option value="Albanian">Albanian</option>
										<option value="Algerian">Algerian</option>
										<option value="Andorran">Andorran</option>
										<option value="Angolan">Angolan</option>
										<option value="Argentinian">Argentinian</option>
										<option value="Armenian">Armenian</option>
										<option value="Australian">Australian</option>
										<option value="Austrian">Austrian</option>
										<option value="Azerbaijani">Azerbaijani</option>
										<option value="Bahamian">Bahamian</option>
										<option value="Bahraini">Bahraini</option>
										<option value="Bangladeshi">Bangladeshi</option>
										<option value="Barbadian">Barbadian</option>
										<option value="Belarusian">Belarusian</option>
										<option value="Belgian">Belgian</option>
										<option value="Belizean">Belizean</option>
										<option value="Beninese">Beninese</option>
										<option value="Bhutanese">Bhutanese</option>
										<option value="Bolivian">Bolivian</option>
										<option value="Bosnian">Bosnian</option>
										<option value="Botswanan">Botswanan</option>
										<option value="Brazilian">Brazilian</option>
										<option value="British Indian Ocean">British Indian Ocean</option>
										<option value="British Virgin">British Virgin</option>
										<option value="Bruneian">Bruneian</option>
										<option value="Bulgarian">Bulgarian</option>
										<option value="Burkinese">Burkinese</option>
										<option value="Burundian">Burundian</option>
										<option value="Cambodian">Cambodian</option>
										<option value="Cameroonian">Cameroonian</option>
										<option value="Canadian">Canadian</option>
										<option value="Cape Verdean">Cape Verdean</option>
										<option value="Chadian">Chadian</option>
										<option value="Chilean">Chilean</option>
										<option value="Chinese">Chinese</option>
										<option value="Colombian">Colombian</option>
										<option value="Congolese">Congolese</option>
										<option value="Costa Rican">Costa Rican</option>
										<option value="Croatian">Croatian</option>
										<option value="Cuban">Cuban</option>
										<option value="Cypriot">Cypriot</option>
										<option value="Czech">Czech</option>
										<option value="Danish">Danish</option>
										<option value="Djiboutian">Djiboutian</option>
										<option value="Dominican">Dominican</option>
										<option value="East Timorese">East Timorese</option>
										<option value="Ecuadorean">Ecuadorean</option>
										<option value="Egyptian">Egyptian</option>
										<option value="Salvadorean">Salvadorean</option>
										<option value="Guinean">Guinean</option>
										<option value="Eritrean">Eritrean</option>
										<option value="Estonian">Estonian</option>
										<option value="Ethiopian">Ethiopian</option>
										<option value="Fijian">Fijian</option>
										<option value="Finnish">Finnish</option>
										<option value="French">French</option>
										<option value="Guyanese">Guyanese</option>
										<option value="Gabonese">Gabonese</option>
										<option value="Gambian">Gambian</option>
										<option value="Georgian">Georgian</option>
										<option value="German">German</option>
										<option value="Ghanaian">Ghanaian</option>
										<option value="Greek">Greek</option>
										<option value="Grenadian">Grenadian</option>
										<option value="Guatemalan">Guatemalan</option>
										<option value="Guinean">Guinean</option>
										<option value="Haitian">Haitian</option>
										<option value="Honduran">Honduran</option>
										<option value="Hungarian">Hungarian</option>
										<option value="Icelander">Icelander</option>
										<option value="Indian">Indian</option>
										<option value="Indonesian">Indonesian</option>
										<option value="Iranian">Iranian</option>
										<option value="Iraqi">Iraqi</option>
										<option value="Irish">Irish</option>
										<option value="Israeli">Israeli</option>
										<option value="Italian">Italian</option>
										<option value="Jamaican">Jamaican</option>
										<option value="Japanese">Japanese</option>
										<option value="Jordanian">Jordanian</option>
										<option value="Kazakh">Kazakh</option>
										<option value="Kenyan">Kenyan</option>
										<option value="Kuwaiti">Kuwaiti</option>
										<option value="Laotian">Laotian</option>
										<option value="Latvian">Latvian</option>
										<option value="Lebanese">Lebanese</option>
										<option value="Liberian">Liberian</option>
										<option value="Libyan">Libyan</option>
										<option value="Lithuanian">Lithuanian</option>
										<option value="Macedonian">Macedonian</option>
										<option value="Madagascan">Madagascan</option>
										<option value="Malawian">Malawian</option>
										<option value="Malaysian">Malaysian</option>
										<option value="Maldivian">Maldivian</option>
										<option value="Malian">Malian</option>
										<option value="Maltese">Maltese</option>
										<option value="Mauritanian">Mauritanian</option>
										<option value="Mauritian">Mauritian</option>
										<option value="Mexican">Mexican</option>
										<option value="Moldovan">Moldovan</option>
										<option value="Monacan">Monacan</option>
										<option value="Mongolian">Mongolian</option>
										<option value="Moroccan">Moroccan</option>
										<option value="Mozambican">Mozambican</option>
										<option value="Namibian">Namibian</option>
										<option value="Nepalese">Nepalese</option>
										<option value="Dutch">Dutch</option>
										<option value="New Zealand">New Zealand</option>
										<option value="Nicaraguan">Nicaraguan</option>
										<option value="Nigerien">Nigerien</option>
										<option value="Nigerian">Nigerian</option>
										<option value="North Korean">North Korean</option>
										<option value="Norwegian">Norwegian</option>
										<option value="Omani">Omani</option>
										<option value="Pakistani">Pakistani</option>
										<option value="Panamanian">Panamanian</option>
										<option value="Guinean">Guinean</option>
										<option value="Paraguayan">Paraguayan</option>
										<option value="Peruvian">Peruvian</option>
										<option value="Filipino">Filipino</option>
										<option value="Polish">Polish</option>
										<option value="Portuguese">Portuguese</option>
										<option value="Qatari">Qatari</option>
										<option value="Romanian">Romanian</option>
										<option value="Russian">Russian</option>
										<option value="Rwandan">Rwandan</option>
										<option value="Saudi">Saudi</option>
										<option value="Senegalese">Senegalese</option>
										<option value="Serbian">Serbian</option>
										<option value="Sierra Leonian">Sierra Leonian</option>
										<option value="Singaporean">Singaporean</option>
										<option value="Slovak">Slovak</option>
										<option value="Slovenian">Slovenian</option>
										<option value="Somali">Somali</option>
										<option value="South African">South African</option>
										<option value="South Korean">South Korean</option>
										<option value="Spanish">Spanish</option>
										<option value="Sri Lankan">Sri Lankan</option>
										<option value="Sudanese">Sudanese</option>
										<option value="Surinamese">Surinamese</option>
										<option value="Swazi">Swazi</option>
										<option value="Swedish">Swedish</option>
										<option value="Swiss">Swiss</option>
										<option value="Syrian">Syrian</option>
										<option value="Taiwanese">Taiwanese</option>
										<option value="Tajik">Tajik</option>
										<option value="Tanzanian">Tanzanian</option>
										<option value="Thai">Thai</option>
										<option value="Togolese">Togolese</option>
										<option value="Trinidadian">Trinidadian</option>
										<option value="Tunisian">Tunisian</option>
										<option value="Turkish">Turkish</option>
										<option value="Turkmen">Turkmen</option>
										<option value="Tuvaluan">Tuvaluan</option>
										<option value="Ugandan">Ugandan</option>
										<option value="Ukrainian">Ukrainian</option>
										<option value="Emirati">Emirati</option>
										<option value="British">British</option>
										<option value="Uruguayan">Uruguayan</option>
										<option value="Uzbek">Uzbek</option>
										<option value="Vanuatuan">Vanuatuan</option>
										<option value="Venezuelan">Venezuelan</option>
										<option value="Vietnamese">Vietnamese</option>
										<option value="Yemeni">Yemeni</option>
										<option value="Zambian">Zambian</option>
										<option value="Zimbabwean">Zimbabwean</option>
									</select>
								</div>

								<div class="form-group col-md-12 col-sm-12 col-xs-12">
									<select required=""
									oninvalid="this.setCustomValidity('Este Campo es requerido')"
									oninput="setCustomValidity('')" name="TourType" class="form-control {{ $errors->has('TourType') ? ' is-invalid' : '' }}">
										<option value="">Tipo del tour<sup>*</sup></option>
										<option value="Crucero Nilo">Crucero Nilo</option>
										<option value="Cairo & Crucero Nilo">Cairo & Crucero Nilo</option>
										<option value="Egipto & Jordania">Egipto & Jordania</option>
										<option value="Egipto & Dubai">Egipto & Dubai</option>
										<option value="Egipto & Turquía">Egipto & Turquía</option>
										<option value="Egipto & Marruecos">Egipto & Marruecos</option>
									</select>
								</div>

								<div class="form-group col-md-5 col-sm-5 col-xs-5">
									<select required name="countryCode" class="form-control {{ $errors->has('countryCode') ? ' is-invalid' : '' }}">
										<option data-countryCode="DZ" value="" >Código *</option>
										<option data-countryCode="DZ" value="213">Algeria (+213)</option>
										<option data-countryCode="AD" value="376">Andorra (+376)</option>
										<option data-countryCode="AO" value="244">Angola (+244)</option>
										<option data-countryCode="AI" value="1264">Anguilla (+1264)</option>
										<option data-countryCode="AG" value="1268">Antigua &amp; Barbuda (+1268)</option>
										<option data-countryCode="AR" value="54">Argentina (+54)</option>
										<option data-countryCode="AM" value="374">Armenia (+374)</option>
										<option data-countryCode="AW" value="297">Aruba (+297)</option>
										<option data-countryCode="AU" value="61">Australia (+61)</option>
										<option data-countryCode="AT" value="43">Austria (+43)</option>
										<option data-countryCode="AZ" value="994">Azerbaijan (+994)</option>
										<option data-countryCode="BS" value="1242">Bahamas (+1242)</option>
										<option data-countryCode="BH" value="973">Bahrain (+973)</option>
										<option data-countryCode="BD" value="880">Bangladesh (+880)</option>
										<option data-countryCode="BB" value="1246">Barbados (+1246)</option>
										<option data-countryCode="BY" value="375">Belarus (+375)</option>
										<option data-countryCode="BE" value="32">Belgium (+32)</option>
										<option data-countryCode="BZ" value="501">Belize (+501)</option>
										<option data-countryCode="BJ" value="229">Benin (+229)</option>
										<option data-countryCode="BM" value="1441">Bermuda (+1441)</option>
										<option data-countryCode="BT" value="975">Bhutan (+975)</option>
										<option data-countryCode="BO" value="591">Bolivia (+591)</option>
										<option data-countryCode="BA" value="387">Bosnia Herzegovina (+387)</option>
										<option data-countryCode="BW" value="267">Botswana (+267)</option>
										<option data-countryCode="BR" value="55">Brazil (+55)</option>
										<option data-countryCode="BN" value="673">Brunei (+673)</option>
										<option data-countryCode="BG" value="359">Bulgaria (+359)</option>
										<option data-countryCode="BF" value="226">Burkina Faso (+226)</option>
										<option data-countryCode="BI" value="257">Burundi (+257)</option>
										<option data-countryCode="KH" value="855">Cambodia (+855)</option>
										<option data-countryCode="CM" value="237">Cameroon (+237)</option>
										<option data-countryCode="CA" value="1">Canada (+1)</option>
										<option data-countryCode="CV" value="238">Cape Verde Islands (+238)</option>
										<option data-countryCode="KY" value="1345">Cayman Islands (+1345)</option>
										<option data-countryCode="CF" value="236">Central African Republic (+236)</option>
										<option data-countryCode="CL" value="56">Chile (+56)</option>
										<option data-countryCode="CN" value="86">China (+86)</option>
										<option data-countryCode="CO" value="57">Colombia (+57)</option>
										<option data-countryCode="KM" value="269">Comoros (+269)</option>
										<option data-countryCode="CG" value="242">Congo (+242)</option>
										<option data-countryCode="CK" value="682">Cook Islands (+682)</option>
										<option data-countryCode="CR" value="506">Costa Rica (+506)</option>
										<option data-countryCode="HR" value="385">Croatia (+385)</option>
										<option data-countryCode="CU" value="53">Cuba (+53)</option>
										<option data-countryCode="CY" value="90392">Cyprus North (+90392)</option>
										<option data-countryCode="CY" value="357">Cyprus South (+357)</option>
										<option data-countryCode="CZ" value="42">Czech Republic (+42)</option>
										<option data-countryCode="DK" value="45">Denmark (+45)</option>
										<option data-countryCode="DJ" value="253">Djibouti (+253)</option>
										<option data-countryCode="DM" value="1809">Dominica (+1809)</option>
										<option data-countryCode="DO" value="1809">Dominican Republic (+1809)</option>
										<option data-countryCode="EC" value="593">Ecuador (+593)</option>
										<option data-countryCode="EG" value="20">Egypt (+20)</option>
										<option data-countryCode="SV" value="503">El Salvador (+503)</option>
										<option data-countryCode="GQ" value="240">Equatorial Guinea (+240)</option>
										<option data-countryCode="ER" value="291">Eritrea (+291)</option>
										<option data-countryCode="EE" value="372">Estonia (+372)</option>
										<option data-countryCode="ET" value="251">Ethiopia (+251)</option>
										<option data-countryCode="FK" value="500">Falkland Islands (+500)</option>
										<option data-countryCode="FO" value="298">Faroe Islands (+298)</option>
										<option data-countryCode="FJ" value="679">Fiji (+679)</option>
										<option data-countryCode="FI" value="358">Finland (+358)</option>
										<option data-countryCode="FR" value="33">France (+33)</option>
										<option data-countryCode="GF" value="594">French Guiana (+594)</option>
										<option data-countryCode="PF" value="689">French Polynesia (+689)</option>
										<option data-countryCode="GA" value="241">Gabon (+241)</option>
										<option data-countryCode="GM" value="220">Gambia (+220)</option>
										<option data-countryCode="GE" value="7880">Georgia (+7880)</option>
										<option data-countryCode="DE" value="49">Germany (+49)</option>
										<option data-countryCode="GH" value="233">Ghana (+233)</option>
										<option data-countryCode="GI" value="350">Gibraltar (+350)</option>
										<option data-countryCode="GR" value="30">Greece (+30)</option>
										<option data-countryCode="GL" value="299">Greenland (+299)</option>
										<option data-countryCode="GD" value="1473">Grenada (+1473)</option>
										<option data-countryCode="GP" value="590">Guadeloupe (+590)</option>
										<option data-countryCode="GU" value="671">Guam (+671)</option>
										<option data-countryCode="GT" value="502">Guatemala (+502)</option>
										<option data-countryCode="GN" value="224">Guinea (+224)</option>
										<option data-countryCode="GW" value="245">Guinea - Bissau (+245)</option>
										<option data-countryCode="GY" value="592">Guyana (+592)</option>
										<option data-countryCode="HT" value="509">Haiti (+509)</option>
										<option data-countryCode="HN" value="504">Honduras (+504)</option>
										<option data-countryCode="HK" value="852">Hong Kong (+852)</option>
										<option data-countryCode="HU" value="36">Hungary (+36)</option>
										<option data-countryCode="IS" value="354">Iceland (+354)</option>
										<option data-countryCode="IN" value="91">India (+91)</option>
										<option data-countryCode="ID" value="62">Indonesia (+62)</option>
										<option data-countryCode="IR" value="98">Iran (+98)</option>
										<option data-countryCode="IQ" value="964">Iraq (+964)</option>
										<option data-countryCode="IE" value="353">Ireland (+353)</option>
										<option data-countryCode="IL" value="972">Israel (+972)</option>
										<option data-countryCode="IT" value="39">Italy (+39)</option>
										<option data-countryCode="JM" value="1876">Jamaica (+1876)</option>
										<option data-countryCode="JP" value="81">Japan (+81)</option>
										<option data-countryCode="JO" value="962">Jordan (+962)</option>
										<option data-countryCode="KZ" value="7">Kazakhstan (+7)</option>
										<option data-countryCode="KE" value="254">Kenya (+254)</option>
										<option data-countryCode="KI" value="686">Kiribati (+686)</option>
										<option data-countryCode="KP" value="850">Korea North (+850)</option>
										<option data-countryCode="KR" value="82">Korea South (+82)</option>
										<option data-countryCode="KW" value="965">Kuwait (+965)</option>
										<option data-countryCode="KG" value="996">Kyrgyzstan (+996)</option>
										<option data-countryCode="LA" value="856">Laos (+856)</option>
										<option data-countryCode="LV" value="371">Latvia (+371)</option>
										<option data-countryCode="LB" value="961">Lebanon (+961)</option>
										<option data-countryCode="LS" value="266">Lesotho (+266)</option>
										<option data-countryCode="LR" value="231">Liberia (+231)</option>
										<option data-countryCode="LY" value="218">Libya (+218)</option>
										<option data-countryCode="LI" value="417">Liechtenstein (+417)</option>
										<option data-countryCode="LT" value="370">Lithuania (+370)</option>
										<option data-countryCode="LU" value="352">Luxembourg (+352)</option>
										<option data-countryCode="MO" value="853">Macao (+853)</option>
										<option data-countryCode="MK" value="389">Macedonia (+389)</option>
										<option data-countryCode="MG" value="261">Madagascar (+261)</option>
										<option data-countryCode="MW" value="265">Malawi (+265)</option>
										<option data-countryCode="MY" value="60">Malaysia (+60)</option>
										<option data-countryCode="MV" value="960">Maldives (+960)</option>
										<option data-countryCode="ML" value="223">Mali (+223)</option>
										<option data-countryCode="MT" value="356">Malta (+356)</option>
										<option data-countryCode="MH" value="692">Marshall Islands (+692)</option>
										<option data-countryCode="MQ" value="596">Martinique (+596)</option>
										<option data-countryCode="MR" value="222">Mauritania (+222)</option>
										<option data-countryCode="YT" value="269">Mayotte (+269)</option>
										<option data-countryCode="MX" value="52">Mexico (+52)</option>
										<option data-countryCode="FM" value="691">Micronesia (+691)</option>
										<option data-countryCode="MD" value="373">Moldova (+373)</option>
										<option data-countryCode="MC" value="377">Monaco (+377)</option>
										<option data-countryCode="MN" value="976">Mongolia (+976)</option>
										<option data-countryCode="MS" value="1664">Montserrat (+1664)</option>
										<option data-countryCode="MA" value="212">Morocco (+212)</option>
										<option data-countryCode="MZ" value="258">Mozambique (+258)</option>
										<option data-countryCode="MN" value="95">Myanmar (+95)</option>
										<option data-countryCode="NA" value="264">Namibia (+264)</option>
										<option data-countryCode="NR" value="674">Nauru (+674)</option>
										<option data-countryCode="NP" value="977">Nepal (+977)</option>
										<option data-countryCode="NL" value="31">Netherlands (+31)</option>
										<option data-countryCode="NC" value="687">New Caledonia (+687)</option>
										<option data-countryCode="NZ" value="64">New Zealand (+64)</option>
										<option data-countryCode="NI" value="505">Nicaragua (+505)</option>
										<option data-countryCode="NE" value="227">Niger (+227)</option>
										<option data-countryCode="NG" value="234">Nigeria (+234)</option>
										<option data-countryCode="NU" value="683">Niue (+683)</option>
										<option data-countryCode="NF" value="672">Norfolk Islands (+672)</option>
										<option data-countryCode="NP" value="670">Northern Marianas (+670)</option>
										<option data-countryCode="NO" value="47">Norway (+47)</option>
										<option data-countryCode="OM" value="968">Oman (+968)</option>
										<option data-countryCode="PW" value="680">Palau (+680)</option>
										<option data-countryCode="PA" value="507">Panama (+507)</option>
										<option data-countryCode="PG" value="675">Papua New Guinea (+675)</option>
										<option data-countryCode="PY" value="595">Paraguay (+595)</option>
										<option data-countryCode="PE" value="51">Peru (+51)</option>
										<option data-countryCode="PH" value="63">Philippines (+63)</option>
										<option data-countryCode="PL" value="48">Poland (+48)</option>
										<option data-countryCode="PT" value="351">Portugal (+351)</option>
										<option data-countryCode="PR" value="1787">Puerto Rico (+1787)</option>
										<option data-countryCode="QA" value="974">Qatar (+974)</option>
										<option data-countryCode="RE" value="262">Reunion (+262)</option>
										<option data-countryCode="RO" value="40">Romania (+40)</option>
										<option data-countryCode="RU" value="7">Russia (+7)</option>
										<option data-countryCode="RW" value="250">Rwanda (+250)</option>
										<option data-countryCode="SM" value="378">San Marino (+378)</option>
										<option data-countryCode="ST" value="239">Sao Tome &amp; Principe (+239)</option>
										<option data-countryCode="SA" value="966">Saudi Arabia (+966)</option>
										<option data-countryCode="SN" value="221">Senegal (+221)</option>
										<option data-countryCode="CS" value="381">Serbia (+381)</option>
										<option data-countryCode="SC" value="248">Seychelles (+248)</option>
										<option data-countryCode="SL" value="232">Sierra Leone (+232)</option>
										<option data-countryCode="SG" value="65">Singapore (+65)</option>
										<option data-countryCode="SK" value="421">Slovak Republic (+421)</option>
										<option data-countryCode="SI" value="386">Slovenia (+386)</option>
										<option data-countryCode="SB" value="677">Solomon Islands (+677)</option>
										<option data-countryCode="SO" value="252">Somalia (+252)</option>
										<option data-countryCode="ZA" value="27">South Africa (+27)</option>
										<option data-countryCode="ES" value="34">Spain (+34)</option>
										<option data-countryCode="LK" value="94">Sri Lanka (+94)</option>
										<option data-countryCode="SH" value="290">St. Helena (+290)</option>
										<option data-countryCode="KN" value="1869">St. Kitts (+1869)</option>
										<option data-countryCode="SC" value="1758">St. Lucia (+1758)</option>
										<option data-countryCode="SD" value="249">Sudan (+249)</option>
										<option data-countryCode="SR" value="597">Suriname (+597)</option>
										<option data-countryCode="SZ" value="268">Swaziland (+268)</option>
										<option data-countryCode="SE" value="46">Sweden (+46)</option>
										<option data-countryCode="CH" value="41">Switzerland (+41)</option>
										<option data-countryCode="SI" value="963">Syria (+963)</option>
										<option data-countryCode="TW" value="886">Taiwan (+886)</option>
										<option data-countryCode="TJ" value="7">Tajikstan (+7)</option>
										<option data-countryCode="TH" value="66">Thailand (+66)</option>
										<option data-countryCode="TG" value="228">Togo (+228)</option>
										<option data-countryCode="TO" value="676">Tonga (+676)</option>
										<option data-countryCode="TT" value="1868">Trinidad &amp; Tobago (+1868)</option>
										<option data-countryCode="TN" value="216">Tunisia (+216)</option>
										<option data-countryCode="TR" value="90">Turkey (+90)</option>
										<option data-countryCode="TM" value="7">Turkmenistan (+7)</option>
										<option data-countryCode="TM" value="993">Turkmenistan (+993)</option>
										<option data-countryCode="TC" value="1649">Turks &amp; Caicos Islands (+1649)</option>
										<option data-countryCode="TV" value="688">Tuvalu (+688)</option>
										<option data-countryCode="UG" value="256">Uganda (+256)</option>
										<option data-countryCode="GB" value="44">UK (+44)</option>
										<option data-countryCode="UA" value="380">Ukraine (+380)</option>
										<option data-countryCode="AE" value="971">United Arab Emirates (+971)</option>
										<option data-countryCode="UY" value="598">Uruguay (+598)</option>
										<option data-countryCode="US" value="1">USA (+1)</option>
										<option data-countryCode="UZ" value="7">Uzbekistan (+7)</option>
										<option data-countryCode="VU" value="678">Vanuatu (+678)</option>
										<option data-countryCode="VA" value="379">Vatican City (+379)</option>
										<option data-countryCode="VE" value="58">Venezuela (+58)</option>
										<option data-countryCode="VN" value="84">Vietnam (+84)</option>
										<option data-countryCode="VG" value="84">Virgin Islands - British (+1284)</option>
										<option data-countryCode="VI" value="84">Virgin Islands - US (+1340)</option>
										<option data-countryCode="WF" value="681">Wallis &amp; Futuna (+681)</option>
										<option data-countryCode="YE" value="969">Yemen (North)(+969)</option>
										<option data-countryCode="YE" value="967">Yemen (South)(+967)</option>
										<option data-countryCode="ZM" value="260">Zambia (+260)</option>
										<option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
									</select>
								</div>

								<div class="col-sm-7">
									<div class="form-group">
										<input required=""
										oninvalid="this.setCustomValidity('Este Campo es requerido')"
										oninput="setCustomValidity('')" value="{{old('whats')}}" type="text" class="form-control {{ $errors->has('whats') ? ' is-invalid' : '' }}" id="whats" name="whats" placeholder="Número de whatsapp *">
									</div>
								</div>

							</div>
							<div class="row">
								<div class="col-6">
									<label>Adultos * ( +12 )</label>
									<div class="input-group">
										<div class="input-group-prepend">
										<button type="button" class="btn-number book_all" data-type="minus" data-field="adults_book">
											<span class="icon-minus"></span>
										</button>
										</div>
										<input id="adults_book" type="text" name="adults" class="form-control input-number book_all" value="2" min="1" max="100" >
										<div class="input-group-append">
											<button type="button" class="btn-number book_all" data-type="plus" data-field="adults_book">
												<span class="icon-plus"></span>
											</button>
										</div>
									</div>
								</div>
								<div class="col-6 ">
									<label>Niños * ( 0 a 12 )</label>
									<div class="input-group">
										<span class="input-group-btn">
											<button type="button" class="btn-number book_all" disabled="disabled" data-type="minus" data-field="children_book">
											<span class="icon-minus"></span>
											</button>
										</span>
										<input id="children_book" type="text" name="children" class="form-control input-number book_all" value="0" min="0" max="10"  onchange="paxOnChangeAll('1', this.value, 'Child', this, 9);">
										<span class="input-group-btn">
											<button type="button" class="btn-number book_all" data-type="plus" data-field="children_book">
											<span class="icon-plus"></span>
											</button>
										</span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<div class="checkbox mt-3">
											<label>
												<input class="flight" name="InternationalFlight"
													type="checkbox" value="Yes" onchange="valueChanged()">
												Agregue la oferta de vuelos a su paquete
											</label>
										</div>
									</div>
									<div class="col-12">
										<div class="flight_from" style="display:none">
											<div class="form-group label-floating">
												<input id="departure_airport" class="form-control"
													name="departure_airport" value=""
													placeholder="Aeropuerto de Salida" />
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="childAll">
								<div id="ageInputDiv" class="form-group label-floating hidden">
									<div class="unit size4of7">
										<div class="mrm mts div-0"> </div>
									</div>
									<div id="input" class="unit size3of7 lastUnit div-1"> </div>
								</div>
								<div class="row" id="1" ageDesc="child"> </div>
								<div id="1" ageDesc="infant"> </div>
							</div>
							<br>

							{!! app('captcha')->render(); !!}
							<div class="form-group">
                                <input
                                required=""
                                oninvalid="this.setCustomValidity('Este Campo es requerido')"
                                oninput="setCustomValidity('')"
                                type="text" class="form-control" id="comment" name="comment" placeholder="Por favor, describa: Si desea paquete, Cuántos días y fecha de viaje.">
							</div>

							<button type="submit" style="background: #ec661d;color:#fff" class="btn_full">Envía</button>
						</form>
					</div>
					<!--/box_style_1 -->
				</div>
				<!--/sticky -->

			</aside>
			<!-- End col lg-9 -->
		</div>

		<!-- End row -->
		{{-- @include('layouts.Reviews') --}}
		@include('layouts.faq')
	</div>
	<!-- End container -->
</main>
<!-- End main -->

@endsection

@section('js')

<!-- Date and time pickers -->
<script src="{{ asset('/front/js/jquery.sliderPro.min.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function ($) {
		$('#Img_carousel').sliderPro({
			width: 960,
			height: 500,
			fade: true,
			arrows: true,
			buttons: false,
			fullScreen: false,
			smallSize: 500,
			startSlide: 0,
			mediumSize: 1000,
			largeSize: 3000,
			thumbnailArrows: true,
			autoplay: false
		});
	});
</script>

<!-- Date and time pickers -->
<script src="{{ asset('/front/js/datepicker_advanced.js')}}"></script>

<!-- Date and time pickers -->
<script>
	$(document).ready(function() {
        var date = new Date();
        var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
        var tomorrow = new Date(date.getFullYear(), date.getMonth(), (date.getDate() + 1));

        $('input.date-pick').datepicker({
            format: "dd/mm/yyyy",
            startDate: '+2d',
            autoclose: true
        });

        $('input.date-pick2').datepicker({
            format: "dd/mm/yyyy",
            startDate: '+2d',
            autoclose: true
        });
        var datepicker2 = (date.getDate() + 1) + '/' + (date.getMonth() + 1) + '/' +  date.getFullYear();


        // $('input.date-pick').datepicker('setDate', datepicker2);
        // $('input.date-pick2').datepicker('setDate', datepicker2);


        $('input.time-pick').timepicker({
            minuteStep: 15,
            showInpunts: false
        });

        $('input.date-pick').change(event => {
            const dateString = event.target.value;
            const dateArray = dateString.split('/').map(v => Number(v));
            const newStartDate = new Date(dateArray[2], dateArray[1] - 1, dateArray[0] + 4);

            // $('input.date-pick2').datepicker('setStartDate', newStartDate)
            // $('input.date-pick2').datepicker('setDate', newStartDate);
        })
	});
</script>


<!--Review modal validation -->
<script src="{{ asset('/front/assets/validate.js')}}"></script>

<!-- Fixed sidebar -->
<script src="{{ asset('/front/js/theia-sticky-sidebar.js')}}"></script>
<script>
	jQuery('#sidebar').theiaStickySidebar({
		additionalMarginTop: 80
	});
</script>

@endsection
