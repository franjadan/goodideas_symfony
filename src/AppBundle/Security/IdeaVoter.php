<?php

namespace AppBundle\Security;


use AppBundle\Entity\Idea;
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\AccessDecisionManagerInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class IdeaVoter extends Voter
{
    const VER = 'IDEA_VER';
    const MODIFICAR = 'IDEA_MODIFICAR';
    const APROBAR = 'IDEA_APROBAR';
    const RECHAZAR = 'IDEA_RECHAZAR';
    const ELIMINAR = 'IDEA_ELIMINAR';

    private $decisionManager;

    public function __construct(AccessDecisionManagerInterface $decisionManager)
    {
        $this->decisionManager = $decisionManager;
    }

    /**
     * {@inheritdoc}
     */
    protected function supports($attribute, $subject)
    {
        // indicar si el Voter soporta el atributo y el sujeto indicados

        // si el sujeto no es una idea, devolver false
        if (!$subject instanceof Idea) {
            return false;
        }

        // si no es uno de los atributos definidos arriba, devolver false
        if (!in_array($attribute, [self::VER, self::MODIFICAR, self::APROBAR, self::RECHAZAR, self::ELIMINAR], true)) {
            return false;
        }

        return true;
    }

    /**
     * {@inheritdoc}
     */
    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        // si estamos aquí, es seguro que el sujeto es una idea y el atributo uno de los definidos arriba

        $user = $token->getUser();

        if (!$user instanceof Usuario) {
            // debería haber un usuario activo en la aplicación, denegar si no es así
            return false;
        }

        // si el usuario tiene ROLE_ADMIN, siempre tiene permiso
        if ($this->decisionManager->decide($token, ['ROLE_ADMIN'])) {
            return true;
        }

        switch ($attribute) {
            case self::VER:
                return $this->puedeVer($subject, $token, $user);
            case self::MODIFICAR:
                return $this->puedeModificar($subject, $token, $user);
            case self::APROBAR:
                return $this->puedeAprobar($subject, $token, $user);
            case self::RECHAZAR:
                return $this->puedeRechazar($subject, $token, $user);
            case self::ELIMINAR:
                return $this->puedeEliminar($subject, $token, $user);
        }

        // por defecto, denegar el permiso
        return false;
    }

    private function puedeVer(Idea $idea, TokenInterface $token, Usuario $user)
    {
        // todos pueden ver las ideas publicadas
        return true;
    }

    private function puedeAprobar(Idea $idea, TokenInterface $token, Usuario $user)
    {
        // solo los seleccionadores pueden aprobar o denegar una idea
        return $this->decisionManager->decide($token, ['ROLE_SELECCIONADOR']);
    }

    private function puedeRechazar(Idea $idea, TokenInterface $token, Usuario $user)
    {
        // solo los seleccionadores pueden aprobar o denegar una idea
        return $this->puedeAprobar($idea, $token, $user);
    }

    private function puedeModificar(Idea $idea, TokenInterface $token, Usuario $user)
    {
        // solo el propietario y un administrador pueden modificar una idea

        if ($idea->getAutor() === $user) {
            // es el autor
            return true;
        }

        return $this->decisionManager->decide($token, ['ROLE_ADMIN']);
    }

    private function puedeEliminar(Idea $idea, TokenInterface $token, Usuario $user)
    {
        // solo el propietario y un moderador pueden eliminar una idea

        if ($idea->getAutor() === $user) {
            // es el autor
            return true;
        }

        return $this->decisionManager->decide($token, ['ROLE_MODERADOR']);
    }
}
