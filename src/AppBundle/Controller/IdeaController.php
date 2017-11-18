<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IdeaController extends Controller
{
    /**
     * @Route("/ideas", name="idea_listar")
     */
    public function listarAction()
    {
        $ideas = $this->getDoctrine()->getRepository('AppBundle:Idea')->findAll();

        return $this->render('idea/listar.html.twig', [
            'ideas' => $ideas
        ]);
    }

    /**
     * @Route("/idea/{id}", name="idea_mostrar", requirements={"id": "\d+"})
     */
    public function mostrarAction($id)
    {
        $idea = $ideas = $this->getDoctrine()->getRepository('AppBundle:Idea')->find($id);

        if (null === $idea) {
            throw $this->createNotFoundException();
        }

        return $this->render('idea/mostrar.html.twig', [
            'idea' => $idea
        ]);
    }
}
