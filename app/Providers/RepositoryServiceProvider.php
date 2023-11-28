<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\IContacts\IUsersRepository;
use App\Repository\IContacts\ICommentsRepository;
use App\Repository\CommentsRepositoryImpl;
use App\Repository\UsersRepositoryImpl;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ICommentsRepository::class, CommentsRepositoryImpl::class);
        $this->app->bind(IUsersRepository::class, UsersRepositoryImpl::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
