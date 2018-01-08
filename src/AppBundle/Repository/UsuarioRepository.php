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
}
