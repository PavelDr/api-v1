<?php

namespace App\Domain\Entities;

/**
 * Class Notebook
 * @package App\Domain\Entities
 */
class Notebook
{
    const NAME = 'notebooks';

    //TODO not use cast
    const AVAILABLE_FIELDS = [
        'id',
        'manufacture',
        'vendor',
        'CAST(covertype as varchar)'
    ];
}