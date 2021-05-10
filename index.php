<?php

require_once("vendor/autoload.php");

//require_once("hcodebr/php-classes/src/DB/Sql.php");
use \Slim\Slim;
use \Hcode\Page;
//use Hcode\DB\Sql;
$app = new Slim();

$app->config('debug', true);

$app->get('/', function() {

	$page = new Page(); //Ao criar o objeto o construct cria o header.
	$page->setTpl("index"); //Aqui o arquivo index é incluido. Ele contém o corpo do template.
// Por fim o destruct limpa a memória do processador e insere o footer.

});

$app->run();

 ?>