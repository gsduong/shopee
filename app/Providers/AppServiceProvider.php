<?php

namespace App\Providers;

use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $root_catalogs = \App\Catalog::whereNull('parent_id')->get();

        $pending = \App\Order::where('status', '=', 0)->count();
        $shipping = \App\Order::where('status', '=', 1)->count();
        $shipped = \App\Order::where('status', '=', 2)->count();

        view()->share(['root_catalogs' => $root_catalogs, 'pending' => $pending, 'shipping' => $shipping, 'shipped' => $shipped]);

        Validator::extend('greater_than_field', function($attribute, $value, $parameters, $validator) {
            $min_field = $parameters[0];
            $data = $validator->getData();
            $min_value = $data[$min_field];
            return ($value >= $min_value);
        });

        Validator::replacer('greater_than_field', function($message, $attribute, $rule, $parameters) {
            return str_replace(':field', $parameters[0], "Regular price must be higher than sale price");
        });
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
}
