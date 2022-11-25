<?php

use Domain\Shared\User\Models\User;
use Tests\Feature\Internal\Concerns\DataTransferObject\ExampleData;

it('example without implementation of resolveFrom() method will throw an error')
    ->tap(fn () => ExampleData::resolveFrom([]))
    ->throws(exception: RuntimeException::class);

it('example without implementation of resolveFromModel() method will throw an error')
    ->tap(fn () => ExampleData::resolveFromModel(User::factory()->createOne()))
    ->throws(exception: RuntimeException::class);

it('example without implementation of resolveFromFormRequest() method will throw an error')
    ->tap(function () {
    })
    ->skip()
    ->throws(exception: RuntimeException::class);
