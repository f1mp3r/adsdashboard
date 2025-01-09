<?php

namespace App\Providers;

use App\Models\Ad;
use App\Models\AdTemplate;
use App\Policies\AdPolicy;
use App\Policies\AdTemplatePolicy;
use App\Policies\PermissionPolicy;
use App\Policies\RolePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::before(function ($user, $ability) {
            return $user->hasRole('Super Admin') ? true : null;
        });

        //region Policies
        Gate::policy(Role::class, RolePolicy::class);
        Gate::policy(Permission::class, PermissionPolicy::class);
        Gate::policy(Ad::class, AdPolicy::class);
        Gate::policy(AdTemplate::class, AdTemplatePolicy::class);
        //endregion
    }
}
