<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Usuario;
use Doctrine\ORM\EntityRepository;

class IdeaRepository extends EntityRepository
{
    public function findPorFechaDecreciente()
    {
        return $this->createQueryBuilder('i')
            ->addSelect('u')
            ->join('i.autor', 'u')
            ->orderBy('i.fechaPropuesta', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findPorFechaDecrecienteYFiltro($filtro)
    {
        $qb = $this->createQueryBuilder('i')
            ->addSelect('u')
            ->join('i.autor', 'u')
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

    public function findByUsuario(Usuario $usuario)
    {
        return $this->createQueryBuilder('i')
            ->where('i.autor = :usuario')
            ->setParameter('usuario', $usuario)
            ->orderBy('i.fechaPropuesta', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findIdeasYVotosPorPuntosDecrecientes()
    {
        return $this->getEntityManager()
            ->createQuery('SELECT i AS idea, SUM(v.puntos) AS puntos, COUNT(v.puntos) AS votos FROM AppBundle:Idea i, AppBundle:Voto v WHERE v.idea = i GROUP BY i ORDER BY puntos DESC')
            ->getResult();
    }

    public function findIdeasYVotosPorPuntosDecrecientesRangoFechas(\DateTime $desde, \DateTime $hasta)
    {
        return $this->getEntityManager()
            ->createQuery('SELECT i AS idea, SUM(v.puntos) AS puntos, COUNT(v.puntos) AS votos FROM AppBundle:Idea i, AppBundle:Voto v WHERE v.idea = i AND v.fecha >= :desde AND v.fecha <= :hasta GROUP BY i ORDER BY puntos DESC')
            ->setParameter('desde', $desde)
            ->setParameter('hasta', $hasta)
            ->getResult();
    }

    public function countIdeasConMasDePuntos($puntos)
    {
        return count($this->getEntityManager()
            ->createQuery('SELECT COUNT(v.idea) FROM AppBundle:Voto v GROUP BY v.idea HAVING SUM(v.puntos) >= :limite')
            ->setParameter('limite', $puntos)
            ->getScalarResult());
    }
}
