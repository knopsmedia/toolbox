<?php

namespace Knops\Toolbox\Doctrine\Collection;

use Doctrine\Common\Collections\Collection;

interface CollectionInterface extends Collection
{
    /**
     * @param callable $callable
     *
     * @return mixed
     */
    public function find(callable $callable): mixed;

    /**
     * @param callable $callable
     *
     * @return mixed
     */
    public function findIndex(callable $callable): mixed;

    /**
     * @param callable $callable
     *
     * @return CollectionInterface
     */
    public function findAll(callable $callable): self;

    /**
     * @param callable   $callable
     * @param mixed|null $initial
     *
     * @return mixed
     */
    public function reduce(callable $callable, mixed $initial = null): mixed;

    /**
     * @param callable $callable
     *
     * @return CollectionInterface
     */
    public function sort(callable $callable): self;

    /**
     * @param string        $separator
     * @param callable|null $callable
     *
     * @return string
     */
    public function join(string $separator, ?callable $callable = null): string;
}