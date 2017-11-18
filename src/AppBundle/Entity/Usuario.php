<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     *
     * @var integer
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $nombreUsuario;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $password;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $nombre;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $apellidos;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $correoElectronico;

    /**
     * @ORM\Column(type="boolean")
     *
     * @var boolean
     */
    private $administrador;

    /**
     * @ORM\Column(type="boolean")
     *
     * @var boolean
     */
    private $seleccionador;

    /**
     * @ORM\Column(type="boolean")
     *
     * @var boolean
     */
    private $moderador;

    /**
     * @ORM\OneToMany(targetEntity="Idea", mappedBy="autor")
     *
     * @var Collection|Idea[]
     */
    private $ideasPropuestas;



    public function __construct()
    {
        $this->ideasPropuestas = new ArrayCollection();
    }


    public function __toString()
    {
        return $this->getNombre().' '.$this->getApellidos();
    }

    /// Getters y setters

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
    public function getNombreUsuario()
    {
        return $this->nombreUsuario;
    }

    /**
     * @param string $nombreUsuario
     * @return Usuario
     */
    public function setNombreUsuario($nombreUsuario)
    {
        $this->nombreUsuario = $nombreUsuario;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return Usuario
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     * @return Usuario
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return string
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * @param string $apellidos
     * @return Usuario
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
        return $this;
    }

    /**
     * @return string
     */
    public function getCorreoElectronico()
    {
        return $this->correoElectronico;
    }

    /**
     * @param string $correoElectronico
     * @return Usuario
     */
    public function setCorreoElectronico($correoElectronico)
    {
        $this->correoElectronico = $correoElectronico;
        return $this;
    }

    /**
     * @return bool
     */
    public function isAdministrador()
    {
        return $this->administrador;
    }

    /**
     * @param bool $administrador
     * @return Usuario
     */
    public function setAdministrador($administrador)
    {
        $this->administrador = $administrador;
        return $this;
    }

    /**
     * @return bool
     */
    public function isSeleccionador()
    {
        return $this->seleccionador;
    }

    /**
     * @param bool $seleccionador
     * @return Usuario
     */
    public function setSeleccionador($seleccionador)
    {
        $this->seleccionador = $seleccionador;
        return $this;
    }

    /**
     * @return bool
     */
    public function isModerador()
    {
        return $this->moderador;
    }

    /**
     * @param bool $moderador
     * @return Usuario
     */
    public function setModerador($moderador)
    {
        $this->moderador = $moderador;
        return $this;
    }

    /**
     * @return Collection|Idea[]
     */
    public function getIdeasPropuestas()
    {
        return $this->ideasPropuestas;
    }

    /**
     * @param Idea $idea
     * @return Usuario
     */
    public function addIdeasPropuestas(Idea $idea)
    {
        if (!$this->ideasPropuestas->contains($idea)) {
            $this->ideasPropuestas->add($idea);
        }

        return $this;
    }

    /**
     * @param Idea $idea
     * @return Usuario
     */
    public function removeIdeasPropuestas(Idea $idea)
    {
        if ($this->ideasPropuestas->contains($idea)) {
            $this->ideasPropuestas->removeElement($idea);
        }

        return $this;
    }


}