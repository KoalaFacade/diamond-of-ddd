<?php

use Domain\Shared\User\Models\User;
use Domain\Shared\User\ViewModels\UserViewModel;
use Illuminate\Support\Carbon;

it('view model can render an array')
    ->tap(function () {
        $user = User::factory()->createOne();

        $viewModel = UserViewModel::resolveFrom($user);

        expect($viewModel)
            ->id->toBe(expected: $user->id)
            ->name->toBe(expected: $user->name)
            ->email->toBe(expected: $user->email)
            ->emailVerifiedAt->toBeInstanceOf(Carbon::class)
            ->password->toBe(expected: $user->password)
            ->and($viewModel->toArray())
            ->toBeArray();
    });
