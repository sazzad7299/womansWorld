<?php

namespace App\Providers;

use App\Models\WebInfo;
use Illuminate\Support\Facades\URL;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\JsonResource;

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
        if($this->app->environment(['production','staging'])) {
            URL::forceScheme('https');
        }
        JsonResource::withoutWrapping();
        Paginator::useBootstrap();
        $webinfo = Cache::remember('web_info', 60 * 60, function () {
            return WebInfo::find(1);
        });

        View::composer('*', function ($view) use ($webinfo) {
            $view->with('webinfo', $webinfo);
        });

    }
}
