<?php

namespace Domain\Shared\Foundation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

abstract class Model extends \Illuminate\Database\Eloquent\Model
{
    protected $guarded = ['created_at', 'updated_at'];

    use HasFactory;

    protected static function newFactory()
    {
        $parts = Str::of(get_called_class())->explode('\\');
        $domain = $parts[1];
        $model = $parts->last();

        return app("Database\\Factories\\{$domain}\\{$model}Factory");
    }
}
