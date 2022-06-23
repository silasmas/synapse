<?php

namespace App\Providers;

use App\Models\User;
use App\Models\bande;
use App\Models\contact;
use App\Models\session;
use App\Models\newsletter;
use App\Models\partenaire;
use App\Models\service;
use App\Models\temoignage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\View\Composers\ProfileComposer;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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

        View::composer('admin.pages.*', function ($view) {
            $branches = bande::get();
            $service = service::get();
            // dd($service);
            $news = newsletter::get();
            $messages = contact::get();
            $users = User::get();
            $view->with('branches', $branches);
            $view->with('nbrnews', $news);
            $view->with('services', $service);
            $view->with('nbrmessage', $messages);
            $view->with('nbruser', $users);
        });

        View::composer('site.pages.index', function ($view) {
            $branches = bande::get();
            $temoignages = temoignage::get();
            $partenaires = partenaire::get();
            $view->with('branches', $branches);
            $view->with('temoignages', $temoignages);
            $view->with('partenaires', $partenaires);
        });
    }
}
