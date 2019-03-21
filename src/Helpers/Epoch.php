<?php

namespace Hola\Api\Helpers;

use Carbon\Carbon;

trait Epoch
{
    public function getCreatedAtAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value, 'UTC')->timestamp * 1000;
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value, 'UTC')->timestamp * 1000;
    }
}