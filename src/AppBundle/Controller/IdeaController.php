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
        $ideas = $this->getIdeas();

        return $this->render('idea/listar.html.twig', [
            'ideas' => $ideas
        ]);
    }

    /**
     * @Route("/idea/{id}", name="idea_mostrar", requirements={"id": "\d+"})
     */
    public function mostrarAction($id)
    {
        $ideas = $this->getIdeas();

        if (!isset($ideas[$id])) {
            throw $this->createNotFoundException();
        }

        return $this->render('idea/mostrar.html.twig', [
            'idea' => $ideas[$id]
        ]);
    }

    private function getIdeas()
    {
        return [
            1 => ['titulo' => 'Doblar el número de horas de HLC', 'descripcion' => 'Estaría bien que HLC tuviera más horas y así poder hacer más ejercicios', 'autor' => 'Chuck Norris', 'fecha_propuesta' => new \DateTime('2017-11-11')],
            7 => ['titulo' => 'Irnos de tapas', 'descripcion' => '¿A quién no le apetece que nos echemos unas tapas un día de estos al acabar las clases?', 'autor' => 'Juan Nadie', 'fecha_propuesta' => new \DateTime('2017-11-12')],
            8 => ['titulo' => 'Aprobado general', 'descripcion' => 'Anda, apruébanos ya a todos y así no tenemos que venir más a clase', 'autor' => 'Oso Yogui', 'fecha_propuesta' => new \DateTime('2017-11-13')]
        ];
    }
}
