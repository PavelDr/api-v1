<?php

namespace App\Domain\Transformers;

use League\Fractal\TransformerAbstract;

/**
 * Class Notebook
 * @package App\Domain\Transformers
 */
class Notebook extends TransformerAbstract
{
    /**
     * @param $notebook
     * @return array
     */
    public function transform($notebook)
    {
        $data  = [
            'id'          => $notebook['id'],
            //TODO use constant
            'type' => 'notebook',
            'manufacture' => $notebook[2],
            'vendor' => $notebook[3],
            'covertype' => $notebook[4],
        ];

        return $data;
    }
}