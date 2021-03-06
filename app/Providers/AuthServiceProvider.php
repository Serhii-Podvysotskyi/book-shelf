<?php

namespace App\Providers;

use App\Models\Book;
use App\Models\Role;
use App\Models\User;
use App\Policies\BookPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Book::class => BookPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Check if user has admin role
        Gate::define('admin', function (User $user) {
            return $user->role?->name === Role::$ADMIN_ROLE;
        });
    }
}
