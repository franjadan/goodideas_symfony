<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="usuario")
 */
class Usuario
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
    private $nombreUsuario;

    /**
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string")
     */
    private $nombre;

    /**
     * @ORM\Column(type="string")
     */
    private $apellidos;

    /**
     * @ORM\Column(type="string")
     */
    private $correoElectronico;

    /**
     * @ORM\Column(type="boolean")
     */
    private $administrador;

    /**
     * @ORM\Column(type="boolean")
     */
    private $seleccionador;

    /**
     * @ORM\Column(type="boolean")
     */
    private $moderador;
}