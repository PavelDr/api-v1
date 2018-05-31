<?php

namespace Core\Services;

use Core\Contracts\AbstractStorageManager;

/**
 * Class PostgreStorage
 * @package Core\Services
 */
class PostgreStorage extends AbstractStorageManager
{
    /**
     * @param string $query
     * @param array $parameters
     * @return PostgreStorage
     */
    public function query(string $query, array $parameters): PostgreStorage
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($this->prepareParameters($parameters));
        return $this;
    }
    /**
     * @param array $parameters
     * @return array
     */
    private function prepareParameters(array $parameters): array
    {
        $result_params = [];
        foreach ($parameters as $key => $value) {
            $result_params[":$key"] = $value;
        }
        return $result_params;
    }
    /**
     * @return array
     */
    public function fetch(): array
    {
        $this->forUpdate = false;
        return $this->statement->fetchAll();
    }
    /**
     * Start transaction
     * @return void
     */
    public function beginTransaction(): void
    {
        $this->connection->beginTransaction();
    }
    /**
     * Commit transaction
     * @return void
     */
    public function commit(): void
    {
        $this->connection->commit();
    }
    /**
     * Rollback transaction
     */
    public function rollback(): void
    {
        $this->connection->rollBack();
    }
    /**
     * @return \PDO
     */
    protected function connect(): \PDO
    {
        return new \PDO(
            "pgsql:host={$this->config['host']};dbname={$this->config['dbname']};port={$this->config['port']}",
            $this->config['user'],
            $this->config['password'],
            [
                \PDO::ATTR_PERSISTENT => true
            ]
        );
    }
}