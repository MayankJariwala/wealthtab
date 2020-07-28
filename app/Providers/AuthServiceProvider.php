<?php

namespace App\Providers;

use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

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
        Auth::viaRequest('token-based', function ($request) {
            if (!$request->headers->has('authorization'))
                abort(401, "Token missing");
            $token = hash('sha256', substr($request->headers->get('authorization'), 7));
            return User::where('api_token', $token)->first();
        });
    }
}
