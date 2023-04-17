<?php

namespace App\Providers;

use App\Model\Order;
use App\Model\Review;
use App\Model\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // view()->composer('*', function ($view) 
        // {
        //     if (Auth::user()) {
        //         $userReviewHome = Review::where('user_id', Auth::user()->id )->get();
        //         $view->with('userReviewHome', $userReviewHome );    
        //     }
        // });        
        
    }
}
