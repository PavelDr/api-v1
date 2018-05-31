<?php

namespace App\Controllers;

use Core\Contracts\AbstractController;

/**
 * Class ApiController
 * @package App\Controllers
 */
class ApiController extends AbstractController
{
    /**
     * Just for check api work or not
     */
    public function index()
    {
        echo "API WORK!";
    }
}