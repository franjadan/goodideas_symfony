<?php

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Idea;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadIdeasData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // creamos una nueva idea simplemente creando una instancia de la entidad y diciéndole al
        // EntityManager que la supervise
        $idea = new Idea();
        $manager->persist($idea);

        // rellenamos sus datos usando los setters (al ser fluent, se pueden poner en cascada)
        $idea
            ->setTitulo('Esta idea nueva mola un montón')
            ->setDescripcion('Se pueden crear ideas desde el código PHP de forma muy sencilla')
            ->setAutor('Chuck Norris')
            ->setFechaPropuesta(new \DateTime());

        // decimos al EntityManager que queremos guardar todos los cambios hechos en las entidades
        $manager->flush();
    }
}
