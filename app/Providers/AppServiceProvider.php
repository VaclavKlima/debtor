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
        Form::component('bsText', 'components.form._old.text', ['name', 'title' => null, 'value' => null, 'attributes' => []]);
        Form::component('bsEmail', 'components.form._old.email', ['name', 'title' => null, 'value' => null, 'attributes' => []]);
        Form::component('bsPassword', 'components.form._old.password', ['name', 'title' => null, 'attributes' => []]);
        Form::component('bsMultipleSelect', 'components.form._old.multiple-select', ['name', 'title' => null, 'selected' => [], 'options' => [], 'attributes' => []]);
        Form::component('bsSelect', 'components.form._old.select', ['name', 'title' => null, 'selected' => null, 'options' => [], 'attributes' => []]);
        Form::component('bsSave', 'components.form._old.save', ['title' => null, 'attributes' => []]);
        Form::component('bsCheckbox', 'components.form._old.checkbox', ['name', 'title' => null, 'value' => null, 'checked' => null, 'attributes' => []]);
        Form::component('bsFile', 'components.form._old.file', ['name', 'title' => null, 'attributes' => []]);
    }
}
