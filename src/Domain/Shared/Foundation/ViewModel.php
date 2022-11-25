<?php

namespace Domain\Shared\Foundation;

use Illuminate\Contracts\Support\Arrayable;

abstract class ViewModel implements Arrayable
{
    use DataTransferObject\HasResolvable,
        DataTransferObject\HasArrayable;
}
