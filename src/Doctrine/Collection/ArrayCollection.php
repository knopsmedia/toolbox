<?php

namespace Knops\Toolbox\Doctrine\Collection;

use Doctrine\Common\Collections\ArrayCollection as BaseArrayCollection;

final class ArrayCollection extends BaseArrayCollection implements CollectionInterface
{
    public function find(callable $callable): mixed
    {
        foreach ($this as $i => $item) {
            if ($callable($item, $i, $this)) {
                return $item;
            }
        }

        return null;
    }

    public function findIndex(callable $callable): mixed
    {
        foreach ($this as $i => $item) {
            if ($callable($item, $i, $this)) {
                return $i;
            }
        }

        return null;
    }

    public function findAll(callable $callable): CollectionInterface
    {
        return $this->filter(fn($item, $i) => $callable($item, $i, $this));
    }

    public function reduce(callable $callable, mixed $initial = null): mixed
    {
        $carry = $initial;

        foreach ($this as $i => $item) {
            $carry = $callable($carry, $item, $i, $this);
        }

        return $carry;
    }

    public function join(string $separator, ?callable $callable = null): string
    {
        $collection = ($callable) ? $this->map($callable) : $this;

        return implode($separator, $collection->toArray());
    }

    public function sort(callable $callable): CollectionInterface
    {
        $collection = $this->toArray();
        usort($collection, $callable);

        $this->clear();
        foreach ($collection as $i => $item) {
            $this->set($i, $item);
        }

        return $this;
    }
}