<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="historial_puntos")
 */
class HistorialPuntos
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     *
     * @var int
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="historial")
     *
     * @var Usuario
     */
    private $usuario;

    /**
     * @ORM\Column(type="string")
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

    /**
     * @ORM\Column(type="text")
     *
     * @var string
     */
    private $descripcion;

    /// Getters y setters

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $puntos
     * @return HistorialPuntos
     */
    public function setPuntos($puntos)
    {
        $this->puntos = $puntos;

        return $this;
    }

    /**
     * @return string
     */
    public function getPuntos()
    {
        return $this->puntos;
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
     * @return HistorialPuntos
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
        return $this;
    }

    /**
     * @param string $descripcion
     * @return HistorialPuntos
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param Usuario $usuario
     * @return HistorialPuntos
     */
    public function setUsuario(Usuario $usuario = null)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * @return Usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
}
