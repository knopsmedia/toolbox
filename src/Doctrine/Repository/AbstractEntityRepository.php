<?php

namespace Knops\Toolbox\Doctrine\Repository;

use Doctrine\ORM\{EntityManagerInterface, EntityRepository};

abstract class AbstractEntityRepository
{
    private ?EntityRepository $innerRepository = null;

    public function __construct(
        private EntityManagerInterface $em
    ) {}

    /**
     * @return string
     * @psalm-return class-string
     */
    abstract protected function getEntityClassName(): string;

    protected function getDoctrineManager(): EntityManagerInterface
    {
        return $this->em;
    }

    protected function getDoctrineRepository(): EntityRepository
    {
        if (null === $this->innerRepository) {
            $this->innerRepository = $this->em->getRepository($this->getEntityClassName());
        }

        return $this->innerRepository;
    }
}