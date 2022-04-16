<?php

namespace Knops\Toolbox\Slim;

use Psr\Http\Message\ServerRequestInterface;
use Slim\Interfaces\RouteInterface;
use Slim\Routing\RouteContext;

trait SlimRouteContextTrait
{
    private function getCurrentRoute(ServerRequestInterface $request): ?RouteInterface
    {
        return $this->getRouteContext($request)->getRoute();
    }

    private function getRouteContext(ServerRequestInterface $request): RouteContext
    {
        return RouteContext::fromRequest($request);
    }
}