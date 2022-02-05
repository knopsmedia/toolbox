<?php

namespace Knops\Toolbox\Slim;

use Psr\Http\Message\ServerRequestInterface;
use Slim\Routing\RouteContext;

trait SlimRouteArgumentTrait
{
    private function getRouteArgumentValue(ServerRequestInterface $request, string $argumentName): ?string
    {
        $context = RouteContext::fromRequest($request);

        return $context->getRoute()->getArgument($argumentName);
    }
}