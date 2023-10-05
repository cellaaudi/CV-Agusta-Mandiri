<?php

namespace App\Providers;

use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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

        Gate::define('customer',function($user){
            if ($user->role=='Customer') {
                return Response::allow();
            } else {
                return Response::deny('Hanya Customer');
            }
        });

        Gate::define('admin',function($user){
            if ($user->role=='Admin') {
                return Response::allow();
            } else {
                return Response::deny('Hanya Admin');
            }
        });

        // Gate::define('staff',function($user){
        //     if ($user->role=='Owner' || $user->role=='Staff') {
        //         return Response::allow();
        //     } else {
        //         return Response::deny('Hanya Staff');
        //     }
        // });

        // Gate::define('owner',function($user){
        //     if ($user->role=='Owner') {
        //         return Response::allow();
        //     } else {
        //         return Response::deny('Hanya Owner');
        //     }
        // });
    }
}
