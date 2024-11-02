<?php

namespace App\Providers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Nette\Utils\Paginator;

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
        Model::preventLazyLoading();
  //      \Illuminate\Pagination\Paginator::useBootstrapFive();

        // the user is automatically the current user, if guest, it auto fails
/*        Gate::define('edit_job', function (User $user, Job $job){
            return $job->employer->user->is($user);
        });*/

    }
}
