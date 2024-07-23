<?php

namespace App\Providers;

use App\Core\Usecases\User\CreateUserUseCase;
use App\Core\Usecases\User\ICreateUserUseCase;
use App\Core\Usecases\User\IUserMapper;
use App\Core\Usecases\User\IUserPresenter;
use App\Core\Usecases\User\IUserRepository;
use App\Core\Usecases\User\IUserViewModel;
use App\Core\Usecases\User\UserMapper;
use App\Core\Usecases\User\UserViewModel;
use App\Presenter\User\UserJsonPresenter;
use App\Repositories\User\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IUserRepository::class, UserRepository::class);
        $this->app->bind(IUserViewModel::class, UserViewModel::class);
        $this->app->bind(IUserPresenter::class, UserJsonPresenter::class);
        $this->app->bind(IUserMapper::class, UserMapper::class);
        $this->app->bind(ICreateUserUseCase::class, CreateUserUseCase::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
