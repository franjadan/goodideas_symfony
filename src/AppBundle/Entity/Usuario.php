<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UsuarioRepository")
 * @ORM\Table(name="usuario")
 */
class Usuario implements UserInterface
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

    /**
     * @ORM\OneToMany(targetEntity="Voto", mappedBy="usuario")
     *
     * @var Collection|Voto[]
     */
    private $votos;

    /**
     * @ORM\OneToMany(targetEntity="HistorialPuntos", mappedBy="usuario")
     *
     * @var Collection|HistorialPuntos[]
     */
    private $historial;


    public function __construct()
    {
        $this->ideasPropuestas = new ArrayCollection();
        $this->votos = new ArrayCollection();
        $this->historial = new ArrayCollection();
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

    /**
     * @return Collection
     */
    public function getVotos()
    {
        return $this->votos;
    }

    /**
     * @param Voto $voto
     * @return Usuario
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
     * @return Usuario
     */
    public function removeVoto(Voto $voto)
    {
        if ($this->votos->contains($voto)) {
            $this->votos->removeElement($voto);
        }

        return $this;
    }

    /**
     * @param HistorialPuntos $historial
     * @return Usuario
     */
    public function addHistorial(HistorialPuntos $historial)
    {
        if (!$this->historial->contains($historial)) {
            $this->historial->add($historial);
        }

        return $this;
    }

    /**
     * @param HistorialPuntos $historial
     * @return Usuario
     */
    public function removeHistorial(HistorialPuntos $historial)
    {
        $this->historial->removeElement($historial);

        return $this;
    }

    /**
     * @return Collection
     */
    public function getHistorial()
    {
        return $this->historial;
    }

    /**
     * Returns the roles granted to the user.
     *
     * <code>
     * public function getRoles()
     * {
     *     return array('ROLE_USER');
     * }
     * </code>
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return (Role|string)[] The user roles
     */
    public function getRoles()
    {
        // inicialmente todos los usuarios tienen el rol ROLE_USER
        $roles = ['ROLE_USER'];

        // si es administrador, añadir el rol ROLE_ADMIN
        if ($this->isAdministrador()) {
            $roles[] = 'ROLE_ADMIN';
        }

        // si es moderador, añadir el rol ROLE_MODERADOR
        if ($this->isModerador()) {
            $roles[] = 'ROLE_MODERADOR';
        }

        // si es seleccionador, añadir el rol ROLE_SELECCIONADOR
        if ($this->isSeleccionador()) {
            $roles[] = 'ROLE_SELECCIONADOR';
        }

        return $roles;
    }

    /** getPassword() estaba ya definido, así que no hace falta tocarlo */

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        // no usamos sal para codificar las contraseñas
        return null;
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        return $this->getNombreUsuario();
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // no hacer nada
    }
}
