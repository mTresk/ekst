<?php

namespace App\Providers;

use App\Models\Contact;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        View::composer('*', function ($view) {
            $contacts = Contact::first();

            $view->with('address', $contacts->address);
            $view->with('email', $contacts->email);
            $view->with('phone', $contacts->phone);
            $view->with('schedule', $contacts->schedule);
            $view->with('vk', $contacts->vk);
            $view->with('telegram', $contacts->telegram);
            $view->with('whatsapp', $contacts->whatsapp);
        });
    }
}
