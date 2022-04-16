<?php

namespace Knops\Toolbox\Slim\Controller;

use Knops\Toolbox\Slim\{SlimRouteArgumentTrait, SlimRouteContextTrait};

abstract class AbstractController
{
    use SlimRouteContextTrait;
    use SlimRouteArgumentTrait;
}