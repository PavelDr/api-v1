<?php

namespace App\Domain\Transformers;

use League\Fractal\TransformerAbstract;
//TODO add new object
use App\Domain\Entities\Book as BookEntity;
use App\Domain\Entities\Notebook as NotebookEntity;
use App\Domain\Entities\Pen as PenEntity;

/**
 * Class Search
 * @package App\Domain\Transformers
 */
class Search extends TransformerAbstract
{
    /**
     * Use this for all objects which we can use for search
     */
    const AVAILABLE_OBJECTS = [
        'books' => BookEntity::class,
        'notebooks' => NotebookEntity::class,
        'pens' => PenEntity::class,
    ];

    /**
     * @var array
     */
    protected $transformers;


    //TODO use di
    /**
     * Search constructor.
     */
    public function __construct()
    {
        $this->transformers['books'] = new Book();
        $this->transformers['notebooks'] = new Notebook();
        $this->transformers['pens'] = new Pen();
    }

    /**
     * Transform item to array with clear params
     * @param $item
     * @return mixed
     */
    public function transform($item)
    {
        /** @var TransformerAbstract $transformer */
        $transformer = $this->transformers[$item['table_name']];
        $data  = $transformer->transform($item);

        return $data;
    }
}