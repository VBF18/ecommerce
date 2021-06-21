<?php

session_start();
require_once("vendor/autoload.php");

//require_once("hcodebr/php-classes/src/DB/Sql.php");
use \Slim\Slim;
use \Hcode\Page;
use \Hcode\PageAdmin;
use \Hcode\Model\User;

$app = new Slim();

$app->config('debug', true);

$app->get('/', function() { //Rota 1

	$page = new Page(); //Ao criar o objeto o construct cria o header.
	$page->setTpl("index"); //Aqui o arquivo index é incluido. Ele contém o corpo do template.
// Por fim o destruct limpa a memória do processador e insere o footer.

});

$app->get('/admin', function() { //Rota 2

	User::verifyLogin(); //Método estático que verifica se o usuário está logado.
	$page = new PageAdmin(); //Ao criar o objeto o construct cria o header.
	$page->setTpl("index"); //Aqui o arquivo index é incluido. Ele contém o corpo do template.
// Por fim o destruct limpa a memória do processador e insere o footer.

});

$app->get('/admin/login', function() { //Rota 3. Essa página não uytiliza o header e o footer comum para as outras páginas. Então será necessário desabilitar a chamada automática desse conteúdo. Mas isso precisa ser configurado no PageAdmin.
	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);
	$page->setTpl("login");
});

$app->post('/admin/login', function(){ //Rota 4. Essa rota utiliza o mesmo programa Admin que está na pasta res e que tabém é invocado na rota acima, porem com o método post. Lembrando que a pasta res é acessada pelo conteúdo do arquivo login.html
 	User::login($_POST["login"], $_POST["password"]); // Aqui chamamos o método estático da classe User.
 	header("Location: ./../admin");
 	exit;
});

$app->get('/admin/login', function() {
	User::logout();
	header("Location: ./../admin");
	exit;
});


$app->run();

 ?>