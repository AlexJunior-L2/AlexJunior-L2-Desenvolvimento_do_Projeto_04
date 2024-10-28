<?php
use App\Classes\Template;
use App\Classes\Parameters;

$template = new Template;
$twig = $template->init();

$twig->addFunction($site_url);
$twig->addFunction($file_exist);

/**
 * Chamando o controller digitado na url
 * https://localhost:8888/controller
 */
$callController = new App\Controllers\Controller;
$calledController = $callController->controller();
$controller = new $calledController();
$controller->setTwig($twig);

/**
 * Chamando o metodo digitado na url
 * https://localhost:8888/controller/method
 */
$callMethod = new App\Controllers\Method;
$method = $callMethod->method($controller);

/**
 * Chamando o controller atraves da classe controller e da classe method
 */
$parameters = new Parameters;
$parameter = $parameters->getParameterMethod($controller,$method);
$controller->$method($parameter);

