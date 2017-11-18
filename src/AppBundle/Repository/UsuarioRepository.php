<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class UsuarioRepository extends EntityRepository
{
    public function findBySinIdeas()
    {
        return $this->createQueryBuilder('u')
            ->andWhere('SIZE(u.ideasPropuestas)=0')
            ->orderBy('u.apellidos')
            ->addOrderBy('u.nombre')
            ->getQuery()
            ->getResult();
    }

    public function findByConIdeas()
    {
        return $this->createQueryBuilder('u')
            ->andWhere('SIZE(u.ideasPropuestas)>0')
            ->orderBy('SIZE(u.ideasPropuestas)', 'DESC')
            ->addOrderBy('u.apellidos')
            ->addOrderBy('u.nombre')
            ->getQuery()
            ->getResult();
    }
}
