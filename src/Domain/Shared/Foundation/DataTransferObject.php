<?php

namespace Domain\Shared\Foundation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

abstract class DataTransferObject
{
    public function resolve(array $data): static
    {
        return throw new \RuntimeException;
    }

    public function resolveFrom(mixed $abstract): static
    {
        if ($abstract instanceof FormRequest) {
            return static::resolveFromFormRequest(request: $abstract->validated());
        }

        if (Arr::accessible($abstract)) {
            return static::resolve(data: $abstract);
        }

        return throw new \RuntimeException;
    }

    public static function resolveFromFormRequest(FormRequest $request): static
    {
        return throw new \RuntimeException;
    }
}
