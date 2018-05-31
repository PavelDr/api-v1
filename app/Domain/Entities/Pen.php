<?php

namespace App\Domain\Entities;

/**
 * Class Pen
 * @package App\Domain\Entities
 */
class Pen
{
    const NAME = 'pens';

    const AVAILABLE_FIELDS = [
        'id',
        'manufacture',
        'vendor',
        'color'
    ];
}