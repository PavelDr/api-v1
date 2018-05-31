<?php

namespace Core\Contracts;

/**
 * Class AbstractService
 * @package Core\Contracts
 */
abstract class AbstractService
{
    /**
     * Storage instance
     * @var AbstractStorageManager
     */
    public $storage;

    /**
     * AbstractService constructor.
     * @param AbstractStorageManager $storage
     */
    public function __construct(AbstractStorageManager $storage)
    {
        $this->storage = $storage;
    }
}