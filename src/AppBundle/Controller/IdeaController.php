<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Idea;
use AppBundle\Entity\Usuario;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IdeaController extends Controller
{
    /**
     * @Route("/ideas/{filtro}", name="idea_listar", defaults={"filtro": "todas"}, requirements={"filtro": "todas|aprobadas|rechazadas"})
     */
    public function listarAction($filtro)
    {
        $ideas = $this->getDoctrine()->getRepository('AppBundle:Idea')->findPorFechaDecrecienteYFiltro($filtro);

        return $this->render('idea/listar.html.twig', [
            'ideas' => $ideas
        ]);
    }

    /**
     * @Route("/idea/usuario/{id}", name="idea_usuario_mostrar")
     */
    public function mostrarUsuarioAction(Usuario $usuario)
    {
        return $this->render('idea/usuario_listar.html.twig', [
            'usuario' => $usuario,
            'ideas' => $usuario->getIdeasPropuestas()
        ]);
    }

    /**
     * @Route("/idea/{id}", name="idea_mostrar")
     */
    public function mostrarAction(Idea $idea)
    {
        return $this->render('idea/mostrar.html.twig', [
            'idea' => $idea
        ]);
    }
}
