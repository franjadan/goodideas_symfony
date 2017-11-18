<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Idea;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

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
     * @Route("/idea/nueva", name="idea_nueva")
     */
    public function nuevaAction()
    {
        // obtenemos el EntityManager, que supervisa las entidades
        $em = $this->getDoctrine()->getManager();

        // creamos una nueva idea simplemente creando una instancia de la entidad y diciéndole al
        // EntityManager que la supervise
        $idea = new Idea();

        $em->persist($idea);

        // rellenamos sus datos usando los setters (al ser fluent, se pueden poner en cascada)
        $idea
            ->setTitulo('Esta idea nueva mola un montón')
            ->setDescripcion('Se pueden crear ideas desde el código PHP de forma muy sencilla')
            ->setAutor('Chuck Norris')
            ->setFechaPropuesta(new \DateTime());

        // decimos al EntityManager que queremos guardar todos los cambios hechos en las entidades
        $em->flush();

        return new Response('<html><body>Nueva idea registrada</body>');
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
