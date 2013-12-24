<?php
function bootstrap($debug){
	// Define paths ============================

	defined("PROJECT_ROOT") or define("PROJECT_ROOT", realpath(dirname(__FILE__)) . '/..');
	defined("TEMP_PATH") or define("TEMP_PATH", PROJECT_ROOT . '/app/temp');
	defined("SRC_PATH") or define("SRC_PATH", PROJECT_ROOT . '/src');
	defined("VENDOR_PATH") or define("VENDOR_PATH", PROJECT_ROOT . '/vendor');

	// Require configuration and autoloader ====

	require_once PROJECT_ROOT . '/app/config.php';
	require_once VENDOR_PATH . '/autoload.php';

	$app = new Silex\Application();
	$app['debug'] = $debug;

	// Register services =======================

	// Twig templating
	$app->register(new Silex\Provider\TwigServiceProvider(), array(
		'twig.path' => SRC_PATH . '/App/View',
		'twig.options' => array(
			'debug' => $debug,
			'cache' => TEMP_PATH . '/cache/twig'
		)
	));

	// Route controllers =======================
	$app->mount('/', new App\Router\DefaultControllerProvider());

	return $app;
}
?>