<?php

namespace App\Actions;

use Carbon\CarbonInterface;

class DateFormatForHumans
{

    public static function run($date, $syntax = CarbonInterface::DIFF_ABSOLUTE, $short = true)
    {
        return $date->diffForHumans(syntax: $syntax, short: $short);
    }
}
