<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class IdeaRepository extends EntityRepository
{
    public function findPorFechaDecreciente()
    {
        return $this->createQueryBuilder('i')
            ->orderBy('i.fechaPropuesta', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
