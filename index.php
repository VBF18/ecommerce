<?php

require_once("vendor/autoload.php");

//require_once("hcodebr/php-classes/src/DB/Sql.php");
use Hcode\DB\Sql;
//$app = new \Slim\Slim();

//$app->config('debug', true);

//$app->get('/', function() {

	$sql = new Sql();
	$results = $sql->select("SELECT * FROM tb_users");
	echo json_encode($results);

//});

//$app->run();

 ?>