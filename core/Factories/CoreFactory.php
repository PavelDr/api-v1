<?php

namespace Core\Factories;

use Core\Core;
use Core\Routing;
use Illuminate\Http\Request;

/**
 * Class CoreFactory
 * @package Core\Factories
 */
class CoreFactory
{
    /**
     * Core class factory
     * @return Core
     */
    public static function create(): Core
    {
        $request = Request::createFromGlobals();

        return new Core(new Routing, $request);
    }
}