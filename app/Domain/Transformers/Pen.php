<?php

namespace App\Domain\Transformers;

use League\Fractal\TransformerAbstract;

/**
 * Class Pen
 * @package App\Domain\Transformers
 */
class Pen extends TransformerAbstract
{
    /**
     * @param $pen
     * @return array
     */
    public function transform($pen)
    {
        $data  = [
            'id'          => $pen['id'],
            'type' => 'pen',
            'manufacture' => $pen[2],
            'vendor' => $pen[3],
            'color' => $pen[4],
        ];

        return $data;
    }
}