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
        Form::component('bsMultipleSelect', 'components.form.multiple-select', ['name', 'title' => null, 'selected' => [], 'options' => [], 'attributes' => []]);
        Form::component('bsSelect', 'components.form.select', ['name', 'title' => null, 'selected' => null, 'options' => [], 'attributes' => []]);
        Form::component('bsSave', 'components.form.save', ['title' => null, 'attributes' => []]);
        Form::component('bsCheckbox', 'components.form.checkbox', ['name', 'title' => null, 'value' => null, 'checked' => null, 'attributes' => []]);
    }
}
