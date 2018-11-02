<?php

/** @var \Interop\Container\ContainerInterface $container */
$container = $app->getContainer();

/**
 * @param $container
 * @return \Slim\Views\Twig
 */
$container['view'] = function ($container) {
    $settings = $container->get('settings')['renderer'];

    $view = new \Slim\Views\Twig(
        $settings['template_path'],
        $settings['twig'])
    ;

    // Instantiate and add Slim specific extension
    $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $view->addExtension(new \Slim\Views\TwigExtension(
        $container->get('router'),
        $uri
    ));

    $view->addExtension(new Twig_Extension_Debug());

    // Global Variables
    $view->getEnvironment()->addGlobal('flash', $container['flash']);
    $view->getEnvironment()->addGlobal('displayErrorDetails', $container['settings']['displayErrorDetails']);

    return $view;
};

$container['twig_profile'] = function () {
    return new Twig_Profiler_Profile();
};

// Bind Flash Messages
$container['flash'] = function () {
    return new \Slim\Flash\Messages();
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};