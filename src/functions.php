<?php

namespace Knops\Toolbox;

use Carbon\{CarbonImmutable, CarbonInterface};
use Knops\Toolbox\Doctrine\Collection\ArrayCollection;
use Knops\Toolbox\Doctrine\Collection\CollectionInterface;

function datetime(?string $time = null, ?string $timezone = null): CarbonInterface
{
    return new CarbonImmutable($time, $timezone);
}

function collect(array $elements = []): CollectionInterface
{
    return new ArrayCollection($elements);
}