<?php
/**
 * @var array $db_config_self
 */
$db_config  = array(
	'connectionString' => 'mysql:host=127.0.0.1;port=3306;dbname=blog',
	'emulatePrepare' => true,
	'username' => 'root',
	'password' => 'root',
	'charset' => 'utf8',
    //////////////////////////////////////////////////////增加
    'enableProfiling'=>YII_DEBUG,
    'enableParamLogging'=>YII_DEBUG,
/////////////////////////////////////////////////////
);

return $db_config;