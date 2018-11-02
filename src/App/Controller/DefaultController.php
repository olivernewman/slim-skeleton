<?php
namespace App\Controller;

use Psr\Log\LoggerInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\Twig;

/**
 * Class DefaultController
 * @package App\Controller
 */
class DefaultController
{
    /** @var LoggerInterface  */
    private $logger;

    /** @var Twig */
    private $view;

    /**
     * DefaultController constructor.
     * @param LoggerInterface $logger
     * @param Twig $view
     */
    public function __construct(LoggerInterface $logger, Twig $view)
    {
        $this->logger = $logger;
        $this->view   = $view;
    }

    /**
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @param array $args
     * @return mixed
     */
    public function __invoke(RequestInterface $request, ResponseInterface $response, array $args)
    {
        // Sample log message
        $this->logger->info("Slim-Skeleton '/' route");

        // Render index view
        return $this->view->render($response, '@V1/index.html.twig');
    }
}