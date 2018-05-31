<?php

namespace Core\Services;

use League\Fractal\Resource\Item as FractalItem;
use League\Fractal\TransformerAbstract;
use Symfony\Component\HttpFoundation\JsonResponse;
use League\Fractal\Manager as FractalManager;
use League\Fractal\Resource\Collection as FractalCollection;
use League\Fractal\Serializer\SerializerAbstract;

/**
 * Class Respondent
 * @package Core\Services
 */
class Respondent
{
    /**
     * @var FractalManager
     */
    protected $fractalManager;

    /**
     * TODO use DI
     * Respondent constructor.
     */
    public function __construct()
    {
        $this->fractalManager = new FractalManager();
    }

    /**
     * @param array $responseData
     * @param int $code
     * @param array $responseHeaders
     * @return JsonResponse
     */
    public function respondJson(array $responseData = [], $code = 200, array $responseHeaders = [] )
    {
        //TODO use this for check env and auth
        return new JsonResponse($responseData, $code, $responseHeaders);
    }

    /**
     * Return response for one item
     * @param $item
     * @param TransformerAbstract $transformer
     * @param int $code
     * @return JsonResponse
     */
    public function respondItem($item, TransformerAbstract $transformer, $code = 200)
    {
        $resource = new FractalItem($item, $transformer);
        return $this->respondJson( $this->fractalManager->createData($resource)->toArray(), $code);
    }

    /**
     * TODO add pagination and filters
     * Return response for collection with pagination
     * @param $arrayCollection
     * @param TransformerAbstract $transformer
     * @param null $paginationData
     * @return JsonResponse
     */
    public function respondCollection(
        $arrayCollection,
        TransformerAbstract $transformer,
        $paginationData = null
    )
    {
        $resource = new FractalCollection($arrayCollection, $transformer);
        $responseData = $this->fractalManager->createData($resource)->toArray();
        if(is_array($paginationData)){
            $responseData['pagination'] = $paginationData;
        }

        return $this->respondJson($responseData);
    }
}