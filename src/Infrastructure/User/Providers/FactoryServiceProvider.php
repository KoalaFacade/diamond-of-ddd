<?php

namespace Infrastructure\User\Providers;

use Domain\Shared\Contracts\Database\Factories\User;
use Illuminate\Support\ServiceProvider;
use Infrastructure\User\Database\Factories\UserFactory;

class FactoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        if ($this->app->runningInConsole() || $this->app->runningUnitTests()) {
            $this->app->singleton(
                abstract: User::class,
                concrete: UserFactory::class
            );
        }
    }
}
