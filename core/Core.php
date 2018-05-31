<?php

namespace Core;

use Core\Contracts\AbstractRouting;
use Core\Factories\ControllerFactory;
use Illuminate\Http\Request;
use Core\Services\Respondent;
use Core\Contracts\AbstractStorageManager;
use Core\Services\PostgreStorage;

/**
 * Class Core
 * @package Core
 */
class Core
{
    protected $routing;

    protected $request;

    protected $response;

    /**
     * @var AbstractStorageManager
     */
    protected $storageManager;

    /**
     * Core constructor.
     * @param AbstractRouting $routing
     * @param Request $request
     */
    public function __construct(
        AbstractRouting $routing,
        Request $request
    ) {
        $this->routing = $routing;
        $this->request = $request;
        $this->storageManager = new PostgreStorage();

        ini_set('display_errors', false);
    }

    /**
     * Initial core method
     * @return Core
     */
    public function init(): Core
    {
        //set this into request!
        $path = trim(parse_url($this->request->getUri(), PHP_URL_PATH), '/');
        $path = explode('/', $path);

        $controller = $path[0] ?: '/';
        $method = isset($path[1]) ? $path[1] : '';

        $controller = $this->routing->getControllerByUri($controller);
        $method = $method ?: 'index'; # Get method, instead of get default

        //Use DI for respondent
        $respondent = new Respondent();

        ControllerFactory::createController($controller, $this->request, $this->storageManager, $respondent)->{$method}();
        return $this;
    }
}