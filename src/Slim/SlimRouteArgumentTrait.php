<?php

namespace Knops\Toolbox\Slim;

use Psr\Http\Message\ServerRequestInterface;

trait SlimRouteArgumentTrait
{
    use SlimRouteContextTrait;

    private function getRouteArgumentValue(ServerRequestInterface $request, string $argumentName): ?string
    {
        return $this->getCurrentRoute($request)?->getArgument($argumentName);
    }
}