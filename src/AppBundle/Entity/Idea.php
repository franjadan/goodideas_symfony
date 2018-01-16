<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\IdeaRepository")
 * @ORM\Table(name="idea")
 */
class Idea
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
     * @ORM\Column(type="string")
     * @Assert\Length(min=5)
     *
     * @var string
     */
    private $titulo;

    /**
     * @ORM\Column(type="text")
     * @Assert\Length(min=10)
     *
     * @var string
     */
    private $descripcion;

    /**
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="ideasPropuestas")
     * @ORM\JoinColumn(nullable=false)
     *
     * @var Usuario
     */
    private $autor;

    /**
     * @ORM\Column(type="date")
     *
     * @var \DateTime
     */
    private $fechaPropuesta;

    /**
     * @ORM\Column(type="date", nullable=true)
     *
     * @var \DateTime
     */
    private $fechaAprobacion;

    /**
     * @ORM\Column(type="date", nullable=true)
     *
     * @var \DateTime
     */
    private $fechaRechazo;

    /**
     * @ORM\OneToMany(targetEntity="Voto", mappedBy="idea")
     *
     * @var Collection|Voto[]
     */
    private $votos;

    /**
     * @ORM\ManyToOne(targetEntity="Prioridad")
     *
     * @var Prioridad
     */
    private $prioridad;

    /**
     * @ORM\ManyToMany(targetEntity="Categoria")
     *
     * @var Collection|Categoria[]
     */
    private $categorias;

    /**
     * @ORM\OneToMany(targetEntity="Comentario", mappedBy="idea")
     *
     * @var Collection|Comentario[]
     */
    private $comentarios;


    public function __construct()
    {
        $this->votos = new ArrayCollection();
        $this->categorias = new ArrayCollection();
        $this->comentarios = new ArrayCollection();
    }

    /// Getters y Setters

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param string $titulo
     * @return Idea
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
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
     * @param string $descripcion
     * @return Idea
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
        return $this;
    }

    /**
     * @return Usuario
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * @param Usuario $autor
     * @return Idea
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getFechaPropuesta()
    {
        return $this->fechaPropuesta;
    }

    /**
     * @param \DateTime $fechaPropuesta
     * @return Idea
     */
    public function setFechaPropuesta($fechaPropuesta)
    {
        $this->fechaPropuesta = $fechaPropuesta;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getFechaAprobacion()
    {
        return $this->fechaAprobacion;
    }

    /**
     * @param \DateTime $fechaAprobacion
     * @return Idea
     */
    public function setFechaAprobacion($fechaAprobacion)
    {
        $this->fechaAprobacion = $fechaAprobacion;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getFechaRechazo()
    {
        return $this->fechaRechazo;
    }

    /**
     * @param \DateTime $fechaRechazo
     * @return Idea
     */
    public function setFechaRechazo($fechaRechazo)
    {
        $this->fechaRechazo = $fechaRechazo;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getVotos()
    {
        return $this->votos;
    }

    /**
     * @param Voto $voto
     * @return Idea
     */
    public function addVoto(Voto $voto)
    {
        if (!$this->votos->contains($voto)) {
            $this->votos->add($voto);
        }

        return $this;
    }

    /**
     * @param Voto $voto
     * @return Idea
     */
    public function removeVoto(Voto $voto)
    {
        if ($this->votos->contains($voto)) {
            $this->votos->removeElement($voto);
        }

        return $this;
    }

    /**
     * @return Prioridad
     */
    public function getPrioridad()
    {
        return $this->prioridad;
    }

    /**
     * @param Prioridad $prioridad
     * @return Idea
     */
    public function setPrioridad($prioridad)
    {
        $this->prioridad = $prioridad;
        return $this;
    }

    /**
     * @param Categoria $categoria
     * @return Idea
     */
    public function addCategoria(Categoria $categoria)
    {
        if (!$this->categorias->contains($categoria)) {
            $this->categorias->add($categoria);
        }

        return $this;
    }

    /**
     * @param Categoria $categoria
     * @return Idea
     */
    public function removeCategoria(Categoria $categoria)
    {
        $this->categorias->removeElement($categoria);

        return $this;
    }

    /**
     * @return Collection
     */
    public function getCategorias()
    {
        return $this->categorias;
    }

    /**
     * @param Comentario $comentario
     * @return Idea
     */
    public function addComentario(Comentario $comentario)
    {
        if (!$this->comentarios->contains($comentario)) {
            $this->comentarios->add($comentario);
        }

        return $this;
    }

    /**
     * @param Comentario $comentario
     * @return Idea
     */
    public function removeComentario(Comentario $comentario)
    {
        $this->comentarios->removeElement($comentario);
        return $this;
    }

    /**
     * Get comentarios
     *
     * @return Collection
     */
    public function getComentarios()
    {
        return $this->comentarios;
    }
}
