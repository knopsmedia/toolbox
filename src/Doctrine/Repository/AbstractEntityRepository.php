<?php

namespace Knops\Toolbox\Doctrine\Repository;

use Doctrine\ORM\{EntityManagerInterface, EntityRepository};

abstract class AbstractEntityRepository
{
    protected ?EntityRepository $innerRepository = null;

    public function __construct(
        private EntityManagerInterface $em
    ) {}

    abstract protected function getEntityClassName(): string;

    protected function getDoctrineRepository(): EntityRepository
    {
        if (null === $this->innerRepository) {
            $this->innerRepository = $this->em->getRepository($this->getEntityClassName());
        }

        return $this->innerRepository;
    }
}