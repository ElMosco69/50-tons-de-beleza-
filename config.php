<?php

	/** O nome do banco de dados*/
	//define("DB_NAME", "wda_crud2");
	const DB_NAME = "crud_tcc";

	/** nome do host do MySQL */
	const DB_HOST = "localhost";

	/** String de conexão do PDO */
	const DB_DSN = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8";

	/** Usuário do banco de dados MySQL */
	// define('DB_USER', 'root');
	const DB_USER = 'root';

	/** Senha do banco de dados MySQL */
	// define('DB_PASSWORD', '');
	const DB_PASSWORD = '';


	/** caminho absoluto para a pasta do sistema **/
	const ABSPATH =  __DIR__ . '/';
	// if (!defined('ABSPATH'))
	// 	define('ABSPATH', dirname(__FILE__) . '/');

	/** caminho no server para o sistema **/
	const BASEURL = '/50-tons-de-beleza-/';
	// if (!defined('BASEURL'))
	// 	define('BASEURL', '/50-tons-de-beleza-/');

	/** caminho do arquivo de banco de dados **/
	const DBAPI = ABSPATH . 'inc/database.php';
	// if (!defined('DBAPI'))
	// 	define('DBAPI', ABSPATH . 'inc/database.php');

	/** caminhos dos templates de header e footer **/
	const HEADER_TEMPLATE = ABSPATH . 'inc/header.php';
	const FOOTER_TEMPLATE = ABSPATH . 'inc/footer.php';
	// define('HEADER_TEMPLATE', ABSPATH . 'inc/header.php');
	// define('FOOTER_TEMPLATE', ABSPATH . 'inc/footer.php');


	/// caminho da imagem padrão para perfis sem foto
	const IMAGE_TEMPLATE = BASEURL .'img/Logo_50tons.png';
	// define('IMAGE_TEMPLATE', BASEURL . 'img/Logo_50tons.png');

	const Link_Misterioso = BASEURL .'inc/rickRoolIndex/rickroll.php';

?>
