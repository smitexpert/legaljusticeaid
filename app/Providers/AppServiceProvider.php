<?php

namespace App\Providers;

use App\Court;
use App\Lawyer;
use App\PracticeArea;
use App\Site;
use App\Specialization;
use View;
use Illuminate\Support\ServiceProvider;

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
        // $courts = Court::limit(5)->get();
        // View::share('LawyerCourtsLink', $courts);
        // $specialization = Specialization::limit(5)->get();
        // View::share('LawyerSpecializationsLink', $specialization);
        // $practiceAreas = PracticeArea::limit(5)->get();
        // View::share('LawyerPracticeAreasLink', $practiceAreas);
    }
}
