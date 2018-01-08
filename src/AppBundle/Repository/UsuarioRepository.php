<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class UsuarioRepository extends EntityRepository
{
    private function findByQueryBuilder()
    {
        return $this->createQueryBuilder('u')
            ->addSelect('i')
            ->leftJoin('u.ideasPropuestas', 'i')
            ->orderBy('SIZE(u.ideasPropuestas)', 'DESC')
            ->addOrderBy('u.apellidos')
            ->addOrderBy('u.nombre');
    }

    public function findBySinIdeas()
    {
        return $this->findByQueryBuilder()
            ->andWhere('SIZE(u.ideasPropuestas)=0')
            ->getQuery()
            ->getResult();
    }

    public function findByConIdeas()
    {
        return $this->findByQueryBuilder()
            ->andWhere('SIZE(u.ideasPropuestas)>0')
            ->getQuery()
            ->getResult();
    }

    public function findUsuariosPorPuntosDescendentes()
    {
        return $this->getEntityManager()
            ->createQuery('SELECT u AS usuario, SUM(h.puntos) AS puntos FROM AppBundle:HistorialPuntos h, AppBundle:Usuario u WHERE h.usuario = u GROUP BY u ORDER BY puntos DESC')
            ->getResult();
    }
}
