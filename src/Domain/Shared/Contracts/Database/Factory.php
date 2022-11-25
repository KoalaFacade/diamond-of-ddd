<?php

namespace Domain\Shared\Contracts\Database;

use Illuminate\Database\Eloquent\Factories\Factory as EloquentFactory;

interface Factory
{
    public function resolveFactory(): EloquentFactory;
}
