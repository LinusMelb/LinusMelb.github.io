<?php

namespace Linus\Forum;

use Illuminate\Support\ServiceProvider;

class ForumServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        /* Include package assets */

        /* Use vendor:publish to copy original path to public_path */
        /* We use public_path instead, in this case, it's: packages/linus/forum/assets */
        $this->publishes([
            __DIR__.'/../public/assets' => public_path('packages/linus/forum/assets'),
        ], 'forum_assets');

        /* Include config files */
        // $this->publishes([
        //     __DIR__.'/../config/chatter.php' => config_path('chatter.php'),
        // ], 'chatter_config');

        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations'),
        ], 'forum_migrations');

        /* Include package's seeds to laravel */
        $this->publishes([
            __DIR__.'/../database/seeds/' => database_path('seeds'),
        ], 'forum_seeds');

        /* Register own pagination template */
        \Illuminate\Pagination\LengthAwarePaginator::defaultView('forum::widgets.paginator');

        include __DIR__.'/Routes/routes.php';
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //

        /* Register views in to laravel functionality, so that we can access to our package view files */
        /* forum as a name to indicate the location views belong to. e.g: forum::index */
        $this->loadViewsFrom(__DIR__.'/Views', 'forum');

    }
}
