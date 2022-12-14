<?php

namespace Domain\Shared\Foundation;

abstract class ValueObject
{
    abstract public static function make(mixed $data): static;
}
