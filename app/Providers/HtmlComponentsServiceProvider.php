<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Html, Form;

class HtmlComponentsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Form::component('ResourceActions', 'components.html.actions', ['model', 'resource']);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
