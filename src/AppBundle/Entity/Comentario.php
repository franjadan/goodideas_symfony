<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="comentario")
 */
class Comentario
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
     * @ORM\ManyToOne(targetEntity="Idea", inversedBy="comentarios")
     * @ORM\JoinColumn(nullable=false)
     *
     * @var Idea
     */
    private $idea;

    /**
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumn(nullable=false)
     *
     * @var Usuario
     */
    private $usuario;

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
    private $texto;


    /// Getters y setters

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $fecha
     * @return Comentario
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * @return string
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param string $texto
     * @return Comentario
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;

        return $this;
    }

    /**
     * @return string
     */
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * @param Idea $idea
     * @return Comentario
     */
    public function setIdea(Idea $idea)
    {
        $this->idea = $idea;

        return $this;
    }

    /**
     * @return Idea
     */
    public function getIdea()
    {
        return $this->idea;
    }

    /**
     * @param Usuario $usuario
     * @return Comentario
     */
    public function setUsuario(Usuario $usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return Usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
}
