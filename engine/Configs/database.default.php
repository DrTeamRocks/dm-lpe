<?php //defined('SYSPATH') OR die('No direct script access.');

return array(
	'default' => array(
		// Database type
		'type'     => 'pdo',
		// Database default PDO driver [pgsql/mysql/oci8/odbc]
		'driver'   => 'mysql',
		// Network configuration
		'hostname' => 'localhost',
		'port'     => '5432',
		// Set the database name and user credentials
		'database' => 'dm',
		'prefix'   => '',
		'username' => 'dm_user',
		'password' => 'dm_pass',
		// Client encoding
		'encoding' => 'utf8',
	),
);
