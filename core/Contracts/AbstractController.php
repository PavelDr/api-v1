<?php

namespace Core\Contracts;

use Illuminate\Http\Request;
use Core\Services\Respondent;

/**
 * Class AbstractController
 * @package Core\Contracts
 */
abstract class AbstractController
{
    /**
     * @var Request
     */
    public $request;

    /**
     * @var AbstractStorageManager
     */
    public $storageManager;

    /**
     * @var Respondent
     */
    public $respondent;
}