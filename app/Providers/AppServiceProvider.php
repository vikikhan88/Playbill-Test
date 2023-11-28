<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\IContacts\ICommentsService;
use App\Services\IContacts\IUsersService;
use App\Services\CommentsServiceImpl;
use App\Services\UsersServiceImpl;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ICommentsService::class, CommentsServiceImpl::class);
        $this->app->bind(IUsersService::class, UsersServiceImpl::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
