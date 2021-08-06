<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\CompanyProfile;
use App\Models\CourseType;
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
        view()->composer('*', function ($view) {
            $profile = CompanyProfile::get()->first();
            $view->with('profile',$profile);
        });

        view()->composer('*', function ($view) {
            $course_type = CourseType::where([['status','1']])->get();
            $view->with('course_type',$course_type);
        });
    }
}
