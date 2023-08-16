<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Models\Category;
use Illuminate\Pagination\Paginator;

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
        $data['catagories'] = Category::all();
        view()->share($data);

        Paginator::useBootstrapFive();
    }

}
