<?php

use App\Http\Controllers\CurrencyController;
use App\Model\Package;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/gracias', function () {
    return view('thank');
});

// Route::get('vacacion-egipto', function () {
//     return view('vacacion');
// });

Route::get('/about-us', function () {
    return view('about');
});

Route::get('/terms', function () {
    return view('terms');
});

Route::get('/privacy-policy', function () {
    return view('policy');
});
Route::get('/customize-your-trip', function () {
    return view('tailormake');
});

Route::get('/ofertas-de-viajes', 'PackageController@allhotdeals');
Route::get('/ofertas-de-viajes/{slug?}', 'PackageController@slughotdeals');

// Route::get('/cruceros-por-el-nilo', function () {
//     return view('cruises');
// });

//Currency Section
//  Route::redirect('layouts.app', 'CurrencyController');
Route::post('currency_load', [CurrencyController::class, 'currencyLoad'])->name('currency.load');


Route::get('/nile-cruise', 'PackageController@allcruzeiro');
Route::get('/nile-cruise/{slug?}', 'PackageController@slugcruzeiro');


Route::get("/sitemap.xml", function() { return Redirect::to("sitemap.xml"); });

Route::post('/mail', 'UserController@mail');
Route::post('/packages', 'UserController@packages');
Route::post('/contact', 'UserController@Contact');
Route::post('/tailor', 'UserController@tailor');
Route::post('/newsletters', 'NewsletterController@store');


// Route::get('/Egipto/Viajes-Egipto', 'PackageController@tourPackages');
// Route::get('/Egipto', 'PackageController@tourPackages');
// Route::get('/Egipto/Viajes-Egipto/{slug?}', 'PackageController@tourPackagesSlug');

Route::get('/Egypt/Camping-tour', 'PackageController@combinedTour');
Route::get('/Egypt/Camping-tour/{slug?}', 'PackageController@combinedTourSlug');

// Route::get('/tour-packages', 'PackageController@all');
// Route::get('/egypt-tour-packages/{slug?}', 'PackageController@slug');

Auth::routes([
        'register' => false, // Registration Routes...
        'reset' => false, // Password Reset Routes...
        'verify' => false, // Email Verification Routes...
    ]);
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/profile', 'ProfileController@get')->name('profile')->middleware('auth');
Route::post('/profile/update', 'ProfileController@update');
Route::get('/admin/settings', 'ProfileController@getsettings')->name('settings');
Route::post('/admin/settings/update', 'ProfileController@settings');
Route::resource('/sliders', 'SliderController')->middleware('auth');
Route::resource('/socials', 'SocialController')->middleware('auth');
Route::resource('/contacts', 'ContactController')->middleware('auth');

Route::get('/galleries/{id}','GalleryController@create')->middleware('auth');
Route::post('/galleries/store','GalleryController@store')->middleware('auth');

Route::get('/galleries/destroy/{id}','GalleryController@destroy')->middleware('auth');
Route::get('/galleries/edit/{id}','GalleryController@edit')->middleware('auth');
Route::post('/galleries/edit','GalleryController@update')->middleware('auth');

Route::get('/addItineraries/{id}','ItineraryController@create')->middleware('auth');
Route::post('/addItineraries/store','ItineraryController@store')->middleware('auth');
Route::get('/addItineraries/destroy/{id}','ItineraryController@destroy')->middleware('auth');
Route::post('/addItineraries/edit','ItineraryController@up')->middleware('auth');
Route::get('/addItineraries/edit/{id}','ItineraryController@edit')->middleware('auth');

Route::resource('/destinations', 'DestinationController')->middleware('auth');

Route::resource('/packages', 'PackageController')->middleware('auth');

Route::resource('/pricing_template', 'PricingTemplatesController')->middleware('auth');
Route::get('getPricingTemplates','PricingTemplatesController@getPricingTemplates')->middleware('auth');
Route::match(['get', 'post'],'/set_values/{id}', 'PricingValueController@set_value')->middleware('auth');

Route::resource('/hotels', 'HotelsController')->middleware('auth');

Route::resource('/faqs', 'FaqController')->middleware('auth');

Route::resource('admin/users','UserController')->middleware('auth');
Route::resource('admin/reviews','ReviewController')->middleware('auth');

Route::resource('/reasons', 'ReasonsController')->middleware('auth');

Route::get('export', 'NewsletterController@export')->middleware('auth');
Route::get('/newsletter', 'NewsletterController@index')->middleware('auth');

Route::get('/tailors', 'ReasonsController@getTailor')->middleware('auth');
Route::get('/tailors/edit/{id}', 'ReasonsController@editTailor')->middleware('auth');
Route::put('/tailors/edit/{id}', 'ReasonsController@updateTailor')->middleware('auth');

Route::get('/about', 'ReasonsController@getAbout')->middleware('auth');
Route::put('/about/edit/{id}', 'ReasonsController@updateAbout')->middleware('auth');

Route::post('/review','ReviewController@send');

Route::get('/contact-us','ContactController@front');

Route::get('/faq','FaqController@front');


Route::resource('/blog', 'BlogController')->middleware('auth');
Route::resource('/wikis', 'WikiController')->middleware('auth');


Route::get('/admin/relatedPackage/{id}','RelatedController@create')->middleware('auth');
Route::post('/admin/relatedPackage/store','RelatedController@store')->middleware('auth');
Route::get('/admin/relatedPackage/destroy/{id}','RelatedController@destroy')->middleware('auth');

Route::get('/admin/relatedwikiPackage/{id}','RelatedWikiController@create')->middleware('auth');
Route::post('/admin/relatedwikiPackage/store','RelatedWikiController@store')->middleware('auth');
Route::get('/admin/relatedwikiPackage/destroy/{id}','RelatedWikiController@destroy')->middleware('auth');


Route::get('/blogItems/{id}','BlogListController@create')->middleware('auth');
Route::post('/blogItems/store','BlogListController@store')->middleware('auth');

Route::get('/blogItems/destroy/{id}','BlogListController@destroy')->middleware('auth');
Route::get('/blogItems/edit/{id}','BlogListController@edit')->middleware('auth');
Route::post('/blogItems/edit','BlogListController@update')->middleware('auth');

Route::get('/wikiItems/{id}','WikiListController@create')->middleware('auth');
Route::post('/wikiItems/store','WikiListController@store')->middleware('auth');

Route::get('/wikiItems/destroy/{id}','WikiListController@destroy')->middleware('auth');
Route::get('/wikiItems/edit/{id}','WikiListController@edit')->middleware('auth');
Route::post('/wikiItems/edit','WikiListController@update')->middleware('auth');

Route::get('/blogs', function () {
    return view('blogs2');
});

// Route::get('/blog-de-viajes','BlogController@front');
// Route::get('/blog-de-viajes/{slug}','BlogController@frontSlug');

// Route::get('/wikis','WikiController@front');
Route::get('/blogs/Blog-de-Viajes-a-Egipto','BlogController@Egipto');
// Route::get('/blog-de-viajes/blog-de-viajes-a-turquia','BlogController@Turquia');
// Route::get('/blog-de-viajes/blog-de-viajes-marruecos','BlogController@Marruecos');
// Route::get('/blog-de-viajes/blog-de-viajes-jordania','BlogController@jordania');
// Route::get('/blog-de-viajes/blog-de-viajes-a-dubai','BlogController@dubai');

// Route::get('/wikis','WikiController@front');
Route::get('/blog-de-viajes/Blog-de-Viajes-a-Egipto/{slug}','BlogController@frontSlug');
Route::get('/blog-de-viajes/blog-de-viajes-a-turquia/{slug}','BlogController@frontSlug');
Route::get('/blog-de-viajes/blog-de-viajes-marruecos/{slug}','BlogController@frontSlug');
Route::get('/blog-de-viajes/blog-de-viajes-jordania/{slug}','BlogController@frontSlug');
Route::get('/blog-de-viajes/blog-de-viajes-a-dubai/{slug}','BlogController@frontSlug');

// Route::get('/wikis','WikiController@front');
Route::get('/guia-de-viajes/egipto-guia-de-viajes','WikiController@Egipto');
Route::get('/guia-de-viajes/turquia-guia-de-viajes','WikiController@Turquia');
Route::get('/guia-de-viajes/marruecos-guia-de-viajes','WikiController@marruecos');
Route::get('/guia-de-viajes/dubai-guia-de-viajes','WikiController@dubai');


Route::get('/wiki', function () {
    return view('wikis');
});
// Route::get('/wikis','WikiController@front');

Route::get('/wiki/{slug}','WikiController@frontSlug');

Route::get('/icons/{id}','IconController@create')->middleware('auth');
Route::post('/icons/store','IconController@store')->middleware('auth');

Route::get('/icons/destroy/{id}','IconController@destroy')->middleware('auth');
Route::get('/icons/edit/{id}','IconController@edit')->middleware('auth');
Route::post('/icons/edit','IconController@update')->middleware('auth');

Route::resource('admin/generals', 'GeneralController')->middleware('auth');

Route::get('/admin/GeneralPackage/{id}','GeneralPackageController@create')->middleware('auth');
Route::post('/admin/GeneralPackage/store','GeneralPackageController@store')->middleware('auth');
Route::get('/admin/GeneralPackage/destroy/{id}','GeneralPackageController@destroy')->middleware('auth');

Route::get('/itineraries/{id}','ItineraryTypeController@create')->middleware('auth');
Route::post('/itineraries/store','ItineraryTypeController@store')->middleware('auth');

Route::get('/itineraries/destroy/{id}','ItineraryTypeController@destroy')->middleware('auth');
Route::get('/itineraries/edit/{id}','ItineraryTypeController@edit')->middleware('auth');
Route::post('/itineraries/edit','ItineraryTypeController@update')->middleware('auth');

Route::get('/{slug}', 'PackageController@destinations');
// Route::get('/{dest}/{slug}', 'PackageController@destination');
