<?php

namespace App\Providers;

use App\Models\User;
use App\Repositories\ApplicationRepository;
use App\Repositories\BaseRepositoryInterface;
use App\Repositories\JobAdRepository;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(BaseRepositoryInterface::class, ApplicationRepository::class);
        $this->app->bind(BaseRepositoryInterface::class, JobAdRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('statistics',function(User $user){
            return $user->role === 'recruiter';
        });
    }
}
