<?php

namespace App\Services;

use Core\Contracts\AbstractService;
use App\Domain\Transformers\Search as SearchTransformer;

/**
 * Class Search
 * @package App\Services
 */
class Search extends AbstractService
{
    /**
     * Search by current tables
     * @param string $keys
     * @return mixed
     */
    public function search($keys)
    {
        $words = $this->clearRequest($keys);

        $query = $this->createQuery();

        $result = $this->storage->query($query,
            [
                'words' => $words
            ]
        )->fetch();


        return $result;
    }

    /**
     * TODO separate to another class
     * Create string for sql query
     * @param string $keys
     * @return string
     */
    protected function clearRequest($keys) :string
    {
        $words = explode(" ", $keys);

        $wordsArray = [];
        foreach($words as $word ) {

            $wordLength = mb_strlen($word, 'UTF-8');

            if($wordLength < 3) {
                continue;
            }

            $wordsArray[] = strtolower(strip_tags($word));
        }

        return implode(' | ', $wordsArray);
    }

    /**
     * TODO separate to another class and add types for each objects
     * Create query
     * @return string
     */
    protected function createQuery() :string
    {
        $objects = SearchTransformer::AVAILABLE_OBJECTS;

        $subQuery = [];
        foreach($objects as $object) {
            $fields = $object::AVAILABLE_FIELDS;

            $subQuery[] = "SELECT '".$object::NAME."' as table_name, 
                ".implode(',', $fields)."
                FROM ".$object::NAME."
                WHERE to_tsvector(".implode(' || \' \' || ', $fields).") @@ to_tsquery(:words)";

        }

        $query = implode(' union ', $subQuery);

        return $query;
    }
}