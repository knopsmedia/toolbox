<?php

namespace Knops\Toolbox\Doctrine\Collection;

use Closure;
use Doctrine\Common\Collections\{AbstractLazyCollection, Collection};

class DoctrineCollectionDecorator extends AbstractLazyCollection implements CollectionInterface
{
    use CollectionTrait;

    public function __construct(Collection $collection)
    {
        $this->collection = $collection;
    }

    protected function doInitialize()
    {
    }

    protected function decorate(Collection $collection): self
    {
        return new static($collection);
    }

    public function filter(Closure $p)
    {
        return $this->decorate(parent::filter($p));
    }

    public function map(Closure $func)
    {
        return $this->decorate(parent::map($func));
    }

    public function partition(Closure $p)
    {
        $partitions = parent::partition($p);

        return [$this->decorate($partitions[0]), $this->decorate($partitions[1])];
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