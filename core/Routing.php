<?php

namespace Core;

use Core\Contracts\AbstractRouting;

/**
 * Class Routing
 * @package Core
 */
class Routing extends AbstractRouting
{
    /**
     * @return array
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }
    /**
     * @param string $uri
     * @return string
     */
    public function getControllerByUri(string $uri): string
    {
        return $this->routes[$uri];
    }
}