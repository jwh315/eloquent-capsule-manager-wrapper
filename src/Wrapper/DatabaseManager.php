<?php

namespace CapsuleManager\Wrapper;

use Illuminate\Database\DatabaseManager as EloquentDatabaseManager;
use Illuminate\Database\MySqlConnection;
use Illuminate\Database\SQLiteConnection;
use Illuminate\Database\PostgresConnection;
use Illuminate\Database\SqlServerConnection;

/**
 * Class DatabaseManager
 * @package CapsuleManager\Wrapper
 */
class DatabaseManager extends EloquentDatabaseManager
{

	/**
	 * @param \PDO $pdo
	 */
	public function addDefaultConnection(\PDO $pdo)
	{
		$driver = $pdo->getAttribute(constant("PDO::ATTR_DRIVER_NAME"));
		$this->connections['default'] = $this->createConnection($driver, $pdo);
	}

	/**
	 * Creates a new connection based on the driver PDO was configured to use.
	 *
	 * @param string $driver
	 * @param \PDO $pdo
	 * @return Illuminate\Database\Connection
	 * @throws \InvalidArgumentException
	 */
	public function createConnection(string $driver, \PDO $pdo) {

        switch ($driver) {
            case 'mysql':
                return new MySqlConnection($pdo);
            case 'pgsql':
                return new PostgresConnection($pdo);
            case 'sqlite':
                return new SQLiteConnection($pdo);
            case 'sqlsrv':
                return new SqlServerConnection($pdo);
        }

        throw new InvalidArgumentException("Unsupported driver [$driver]");
	}
	
}