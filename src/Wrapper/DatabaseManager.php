<?php

namespace CapsuleManager\Wrapper;

use Illuminate\Database\DatabaseManager as EloquentDatabaseManager;

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
		$config['driver'] = $pdo->getAttribute(constant("PDO::ATTR_DRIVER_NAME"));
		$connector = $this->factory->createConnector($config);
		$this->connections['default'] = new $connector($pdo);
	}
}