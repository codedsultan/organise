<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const USER_HOME = '/dashboard';
    public const ADMIN_HOME = '/dashboard';
    public const ORGANISER_HOME = '/dashboard';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        // $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            // Route::middleware('web')
            //     ->group(base_path('routes/auth.php'));

            //User Route File
            Route::middleware('web')
                ->group(base_path('routes/customer.php'));

            Route::middleware('web')
                ->group(base_path('routes/organiser.php'));

            Route::middleware('web')
                ->group(base_path('routes/vendor.php'));

            // $this->loadApiRoutes();


            Route::middleware(['web', 'auth:sanctum'])
                ->name('admin.')
                ->group(base_path('routes/admin.php'));

        });
    }

    /**
     * Configure the rate limiters for the application.
     */
    // protected function configureRateLimiting(): void
    // {
    //     RateLimiter::for('api', function (Request $request) {
    //         return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
    //     });
    // }

    // private function loadApiRoutes(): void
    // {

    // }

}
