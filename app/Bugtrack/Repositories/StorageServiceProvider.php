<?php namespace Bugtrack\Repositories;

use Illuminate\Support\ServiceProvider;

class StorageServiceProvider extends ServiceProvider
{
    /**
    *
    * * Register the service provider.
    *
    * @return void
    */
    public function register()
    {
        // Register the bug repository
        $this->app->bind(
            'Bugtrack\Repositories\Bug\BugRepository',
            'Bugtrack\Repositories\Bug\EloquentBugRepository'
        );

        // Register the state repository
        $this->app->bind(
            'Bugtrack\Repositories\State\StateRepository',
            'Bugtrack\Repositories\State\EloquentStateRepository'
        );
    }

}