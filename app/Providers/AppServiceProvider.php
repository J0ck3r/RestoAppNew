<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

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
        Inertia::share([
            'role'   => fn () => Auth::user()?->getRoleNames()->first(),
            'layout' => fn () => match (Auth::user()?->getRoleNames()->first()) {
                'Admin'      => 'AdminLayout',
                'Owner'      => 'OwnerLayout',
                'Restaurant' => 'RestaurantLayout',
                default      => 'AuthenticatedLayout',
            },
        ]);
        Vite::prefetch(concurrency: 3);
    }
}
