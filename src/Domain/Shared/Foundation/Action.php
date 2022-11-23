<?php

namespace Domain\Shared\Foundation;

abstract class Action
{
    public static function resolve(): static
    {
        return resolve(name: static::class);
    }
}
