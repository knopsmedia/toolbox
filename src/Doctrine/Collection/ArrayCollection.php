<?php

namespace Knops\Toolbox\Doctrine\Collection;

use Doctrine\Common\Collections\ArrayCollection as BaseArrayCollection;

class ArrayCollection extends BaseArrayCollection implements CollectionInterface
{
    use CollectionTrait;

    public function find(callable $callable): mixed
    {
        return $this->_find($this, $callable);
    }

    public function findIndex(callable $callable): mixed
    {
        return $this->_findIndex($this, $callable);
    }

    public function findAll(callable $callable): CollectionInterface
    {
        return $this->_findAll($this, $callable);
    }

    public function reduce(callable $callable, mixed $initial = null): mixed
    {
        return $this->_reduce($this, $callable, $initial);
    }

    public function join(string $separator, ?callable $callable = null): string
    {
        return $this->_join($this, $separator, $callable);
    }

    public function sort(callable $callable): CollectionInterface
    {
        $this->_sort($this, $callable);

        return $this;
    }
}