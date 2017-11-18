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
}
