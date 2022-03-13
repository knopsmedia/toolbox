<?php

namespace Knops\Toolbox;

use Carbon\{CarbonImmutable, CarbonInterface};
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

function datetime(?string $time = null, ?string $timezone = null): CarbonInterface
{
    return new CarbonImmutable($time, $timezone);
}

function collect(array $elements = []): Collection
{
    return new ArrayCollection($elements);
}