<?php

namespace App\Controllers;

use Core\Contracts\AbstractController;
use App\Services\Search as SearchService;
use App\Domain\Transformers\Search as SearchTransformer;

/**
 * Class SearchController
 * @package App\Controllers
 */
class SearchController extends AbstractController
{
    /**
     * @return $this
     * @throws \Exception
     */
    public function index()
    {
        //TODO use routing validation for this
        if(!$this->request->isMethod('post')) {
            throw new \Exception('Unknown url', 404);
        }

        //TODO use url validation
        $data = $this->request->all();

        //TODO use DI container
        $searchService = new SearchService($this->storageManager);

        $results = $searchService->search($data['search']);

        //TODO add pagination and filters
        $response = $this->respondent->respondCollection($results, new SearchTransformer());

        return $response->send();
    }
}