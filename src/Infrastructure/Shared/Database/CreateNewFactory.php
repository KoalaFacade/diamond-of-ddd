<?php

namespace Infrastructure\Shared\Database;

use Domain\Shared\Contracts\Database\Factory;
use Illuminate\Database\Eloquent\Factories\Factory as EloquentFactory;

abstract class CreateNewFactory extends EloquentFactory implements Factory
{
    public function resolveFactory(): EloquentFactory
    {
        return static::new();
    }
}
