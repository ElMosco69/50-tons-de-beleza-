<?php

	/** O nome do banco de dados*/
	//define("DB_NAME", "wda_crud2");
	const DB_NAME = "crud_tcc";

	/** nome do host do MySQL */
	const DB_HOST = "localhost";

	/** String de conexão do PDO */
	const DB_DSN = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8";

	/** Usuário do banco de dados MySQL */
	define('DB_USER', 'root');

	/** Senha do banco de dados MySQL */
	define('DB_PASSWORD', '');


	/** caminho absoluto para a pasta do sistema **/
	if (!defined('ABSPATH'))
		define('ABSPATH', dirname(__FILE__) . '/');

	/** caminho no server para o sistema **/
	if (!defined('BASEURL'))
		define('BASEURL', '/50-tons-de-beleza-/');

	/** caminho do arquivo de banco de dados **/
	if (!defined('DBAPI'))
		define('DBAPI', ABSPATH . 'inc/database.php');

	/** caminhos dos templates de header e footer **/
	define('HEADER_TEMPLATE', ABSPATH . 'inc/header.php');
	define('FOOTER_TEMPLATE', ABSPATH . 'inc/footer.php');


	/// caminho da imagem padrão para perfis sem foto

	define('IMAGE_TEMPLATE', BASEURL . 'img/Logo_50tons.png');

?>
