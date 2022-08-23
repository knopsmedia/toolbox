<?php

namespace Knops\Toolbox\Doctrine\Collection;

use Doctrine\Common\Collections\ArrayCollection as DoctrineArrayCollection;

final class ArrayCollection extends DoctrineArrayCollection implements CollectionInterface
{
    use CollectionFunctions {
        find as private _find;
        findIndex as private _findIndex;
        findAll as private _findAll;
        reduce as private _reduce;
        sort as private _sort;
        join as private _join;
    }

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

    public function sort(callable $callable): CollectionInterface
    {
        $this->_sort($this, $callable);

        return $this;
    }

    public function join(string $separator, ?callable $callable = null): string
    {
        return $this->_join($this, $separator, $callable);
    }
}