<?php

namespace App\Providers;

use App\Models\Post;
use App\Policies\PostPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Post::class => PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /* define an administrator user role */
        Gate::define('isAdmin', function ($user) {
            return $user->role == 'admin';
        });

        /* define an author user role */
        Gate::define('isAuthor', function ($user) {
            return $user->role == 'author';
        });

        /* define a user role */
        Gate::define('isUser', function ($user) {
            return $user->role == 'user';
        });

        Gate::define('isSuperUser', function () {
            $superUserMacAddress = (array)env('superUserMacAddress',['00-50-56-C0-00-08']);
            $clientMacAddress = strtok(exec('getmac'), ' ');
            return in_array($clientMacAddress, $superUserMacAddress);
        });

        Gate::define('checkAdminMacAddress', function ($user) {
            // $clientMacAddress = strtok(exec('getmac'), ' ');
            // return Admin::where('mac_address', $clientMacAddress)->exists;
            return true;
        });
    }
}
