<?php

namespace App\Providers;

use Form;
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
    public function boot(): void
    {
        Form::component('bsText', 'components.form.text', ['name', 'title' => null, 'value' => null, 'attributes' => []]);
        Form::component('bsEmail', 'components.form.email', ['name', 'title' => null, 'value' => null, 'attributes' => []]);
        Form::component('bsPassword', 'components.form.password', ['name', 'title' => null, 'attributes' => []]);
    }
}
