<?php

namespace Core\Contracts;

/**
 * Class AbstractRouting
 * @package Core\Contracts
 */
abstract class AbstractRouting
{
    /**
     * Routes config fle
     * @var string
     */
    protected $config_file = 'routes.php';
    /**
     * Array of uri and controllers
     * @var array
     */
    protected $routes = [];

    /**
     * AbstractRouting constructor.
     */
    public function __construct()
    {
        $this->routes = require_once config_path() . "/$this->config_file";
    }

    /**
     * Get routes array
     * @return array
     */
    abstract public function getRoutes(): array;
    
    /**
     * Get controller by URI
     * @param string $uri
     * @return string
     */
    abstract public function getControllerByUri(string $uri): string;
}