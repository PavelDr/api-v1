<?php

namespace Core\Contracts;

/**
 * Class AbstractStorageManager
 * @package Core\Contracts
 */
abstract class AbstractStorageManager
{
    /**
     * Database credentials config file
     * @var string
     */
    protected $config_file = 'db.php';
    /**
     * Config array
     * @var array
     */
    protected $config = [];
    /**
     * @var mixed
     */
    protected $statement;
    /**
     * @var mixed
     */
    protected $connection;

    public function __construct()
    {
        $this->config = include config_path() . "/$this->config_file";
        $this->connection = $this->connect();
    }
    /**
     * Connect to storage
     * @return mixed
     */
    abstract protected function connect();
    /***
     * Perform query
     * @param string $query
     * @param array $parameters
     * @return mixed
     */
    abstract public function query(string $query, array $parameters);
    /**
     * Start transaction
     * @return mixed
     */
    abstract public function beginTransaction(): void;
    /**
     * Commit transaction
     * @return mixed
     */
    abstract public function commit(): void;
    /**
     * Get data from query
     * @return mixed
     */
    abstract public function fetch(): array;
}