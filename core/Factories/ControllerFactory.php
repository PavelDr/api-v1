<?php

namespace Core\Factories;

use Core\Contracts\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Core\Services\Respondent;
use Core\Contracts\AbstractStorageManager;

/**
 * Class ControllerFactory
 * @package Core\Factories
 */
class ControllerFactory
{
    /**
     * @param string $controller
     * @param Request $request
     * @param AbstractStorageManager $storageManager
     * @param Respondent $respondent
     * @return AbstractController
     */
    public static function createController(
        string $controller,
        Request $request,
        AbstractStorageManager $storageManager,
        Respondent $respondent
    ): AbstractController {

        $object = new $controller();
        $object->request = $request;
        $object->storageManager = $storageManager;
        $object->respondent = $respondent;
        return $object;
    }
}