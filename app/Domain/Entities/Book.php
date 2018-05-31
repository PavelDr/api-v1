<?php

namespace App\Domain\Entities;

/**
 * TODO add abstract entity with common field and methods
 * Class Book
 * @package App\Domain\Entities
 */
class Book
{
    const NAME = 'books';

    const AVAILABLE_FIELDS = [
        'id',
        'name',
        'author',
        'isbrn'
    ];
}