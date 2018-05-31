<?php

namespace App\Domain\Transformers;

use League\Fractal\TransformerAbstract;

/**
 * Class Book
 * @package App\Domain\Transformers
 */
class Book extends TransformerAbstract
{
    /**
     * @param $book
     * @return array
     */
    public function transform($book)
    {
        $data  = [
            'id'          => $book['id'],
            'type' => 'book',
            'name' => $book[2],
            'author' => $book[3],
            'isbrn' => $book[4],
        ];

        return $data;
    }
}