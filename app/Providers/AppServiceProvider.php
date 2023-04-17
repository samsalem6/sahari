<?php

namespace App\Providers;

use App\Currency;
use App\Model\Faq;
use App\Model\Blog;
use App\Model\Wiki;
use App\Model\Review;
use App\Model\Slider;
use App\Model\Social;
use App\Model\Contact;
use App\Model\Package;
use App\Model\Destination;
use App\Model\Reasons;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $sliderss = Slider::orderBy('order')->get();
        view::share('sliderss', $sliderss);

        $Reviewss = Review::latest()->take(4)->get();
        view::share('Reviewss', $Reviewss);

        $currencies = Currency::orderBy('id')->get();
        view::share('currencies', $currencies);

        $socialss = Social::orderBy('created_at', 'desc')->get();
        view::share('socialss', $socialss);

        $blogss = Blog::where('viewInSite',true)->get();
        view::share('blogss', $blogss);

        $blogsss = Blog::where('viewInSite',true)->take(4)->get();
        view::share('blogsss', $blogsss);

        $wikiss = Wiki::where('viewInSite',true)->get();
        view::share('wikiss', $wikiss);


        $destinations = Destination::orderBy('created_at', 'asc')->get();
        view::share('destinations', $destinations);

        $destinationss = Destination::get();
        view::share('destinationss', $destinationss);

        $packagesss = Package::where('landing',false)->where('viewInSite',true)->where('inHome',true)->with('icons')->take(6)->get();
        view::share('packagesss', $packagesss);

        $faqsss = Faq::latest()->where('viewInHome', true)->get();
        view::share('faqsss', $faqsss);

        $reasonsss = Reasons::take(4)->get();
        view::share('reasonsss', $reasonsss);

        $contactss = Contact::find(1);
        view::share('contactss' , $contactss);

        $tailors = Reasons::find(5);
        view::share('tailors', $tailors);

        $about = Reasons::find(6);
        view::share('about', $about);

    }
}
