<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Validator;
use Excel;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $this->registerCustomValidationRule();
    }

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
     * [registerCustomValidationRule description]
     * @return [type] [description]
     */
    protected function registerCustomValidationRule()
    {
        Validator::extend('excel', function($attribute, $value, $parameters, $validator){

            

            Excel::selectSheetsByIndex(0)->load($value->getPathName(), function($reader) {

                dd($reader->sheet(0)->get());

            });



            return true;
        });
    }
}
