<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="idea")
 */
class Idea
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $titulo;

    /**
     * @ORM\Column(type="string")
     */
    private $descripcion;

    /**
     * @ORM\Column(type="string")
     */
    private $autor;

    /**
     * @ORM\Column(type="date")
     */
    private $fechaPropuesta;
}