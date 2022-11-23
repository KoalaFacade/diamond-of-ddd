<?php

namespace Domain\Shared\Foundation;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

abstract class DataTransferObjects
{
    protected Collection $collection;

    protected array $excludedPropertiesOnCreation = [];

    protected array $excludedPropertiesOnUpdate = [];

    abstract public static function resolve(array $data);

    /**
     * a method that will resolve the inheritance properties
     * naming to snake case that can fit with database column naming
     *
     * @return Collection
     */
    public function toCollection(): Collection
    {
        $excludedPropertyKeys = [
            "\x00*\x00excludedPropertiesOnCreation",
            "\x00*\x00excludedPropertiesOnUpdate",
        ];

        $this->collection = Collection::wrap((array) $this)
            ->except(keys: $excludedPropertyKeys)
            ->mapWithKeys(fn ($value, $key): array => [Str::snake($key) => $value]);

        return $this->collection;
    }

    public function toArray(): array
    {
        return $this
            ->toCollection()
            ->toArray();
    }

    public function resolveForExcludedPropertiesOnCreation(): array
    {
        return $this->excludedPropertiesOnCreation;
    }

    public function resolveForExcludedPropertiesOnUpdate(): array
    {
        return $this->excludedPropertiesOnUpdate;
    }
}
