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

    public function findPorFechaDecrecienteYFiltro($filtro)
    {
        $qb = $this->createQueryBuilder('i')
            ->orderBy('i.fechaPropuesta', 'DESC');

        if ($filtro === 'aprobadas') {
            $qb = $qb
                ->andWhere('i.fechaAprobacion IS NOT NULL')
                ->andWhere('i.fechaRechazo IS NULL');
        }

        if ($filtro === 'rechazadas') {
            $qb = $qb
                ->andWhere('i.fechaRechazo IS NOT NULL');
        }

        return $qb
            ->getQuery()
            ->getResult();
    }
}
