<?php

namespace Domain\Shared\User\ViewModels;

use Domain\Shared\Foundation\ViewModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class UserViewModel extends ViewModel
{
    final public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $email,
        public readonly Carbon $emailVerifiedAt,
        public readonly string $password,
    ) {
        //
    }

    public static function resolveFromModel(Model $model): static
    {
        return new static(
            id: $model['id'],
            name:$model['name'],
            email: $model['email'],
            emailVerifiedAt: $model['email_verified_at'],
            password: $model['password'],
        );
    }
}
