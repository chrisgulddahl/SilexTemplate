<?php

namespace App\Router;

use Silex\Application;
use Silex\ControllerProviderInterface;

class DefaultControllerProvider implements ControllerProviderInterface {

	public function connect(Application $app) {
		$controllers = $app['controllers_factory'];

		$controllers->get('/', 'App\\Controller\\DefaultController::indexAction');

		return $controllers;
	}

}

?>
