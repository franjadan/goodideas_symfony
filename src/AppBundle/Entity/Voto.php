<?php

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="voto")
 */
class Voto
{
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Idea")
     *
     * @var Idea
     */
    private $idea;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Usuario")
     *
     * @var Usuario
     */
    private $usuario;

    /**
     * @ORM\Column(type="integer")
     *
     * @var int
     */
    private $puntos;

    /**
     * @ORM\Column(type="date")
     *
     * @var \DateTime
     */
    private $fecha;


    /// Getters y setters

    /**
     * @return Idea
     */
    public function getIdea()
    {
        return $this->idea;
    }

    /**
     * @param Idea $idea
     * @return Voto
     */
    public function setIdea($idea)
    {
        $this->idea = $idea;
        return $this;
    }

    /**
     * @return Usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param Usuario $usuario
     * @return Voto
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
        return $this;
    }

    /**
     * @return int
     */
    public function getPuntos()
    {
        return $this->puntos;
    }

    /**
     * @param int $puntos
     * @return Voto
     */
    public function setPuntos($puntos)
    {
        $this->puntos = $puntos;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param \DateTime $fecha
     * @return Voto
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
        return $this;
    }
}
