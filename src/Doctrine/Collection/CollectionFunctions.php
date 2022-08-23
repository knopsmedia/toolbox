<?php

namespace Knops\Toolbox\Doctrine\Collection;

use Doctrine\Common\Collections\Collection;

trait CollectionFunctions
{
    private function find(Collection $collection, callable $callable): mixed
    {
        foreach ($collection as $i => $item) {
            if ($callable($item, $i, $collection)) {
                return $item;
            }
        }

        return null;
    }

    private function findIndex(Collection $collection, callable $callable): mixed
    {
        foreach ($collection as $i => $item) {
            if ($callable($item, $i, $collection)) {
                return $i;
            }
        }

        return null;
    }

    private function findAll(Collection $collection, callable $callable): Collection
    {
        return $collection->filter(fn($item) => $callable($item, $collection));
    }

    private function reduce(Collection $collection, callable $callable, mixed $initial = null): mixed
    {
        $carry = $initial;

        foreach ($collection as $i => $item) {
            $carry = $callable($carry, $item, $i, $collection);
        }

        return $carry;
    }

    private function join(Collection $collection, string $separator, ?callable $callable = null): string
    {
        $collection = ($callable) ? $collection->map($callable) : $collection;

        return implode($separator, $collection->toArray());
    }

    private function sort(Collection $collection, callable $callable): void
    {
        $array = $collection->toArray();
        usort($array, $callable);

        $collection->clear();
        foreach ($array as $i => $item) {
            $collection->set($i, $item);
        }
    }
}