<?php

namespace App;

use App\Loader\ServiceLoader;
use Symfony\Component\Finder\Finder;

/**
 * Class Application
 * @package App
 */
class Application extends \Slim\App
{
    private $dir = null;

    public function __construct($container = [])
    {
        parent::__construct($container);
        $this->loadServices();
    }

    public function loadServices()
    {
        $serviceLoader = new ServiceLoader(new Finder);
        $serviceLoader->loadServices(
            $this,
            $this->getContainer()->get("settings")["service_directories"]
        );
    }
}