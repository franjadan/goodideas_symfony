<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IdeaController extends Controller
{
    /**
     * @Route("/ideas", name="ideas_listar")
     */
    public function listarAction()
    {
        $ideas = [
            ['titulo' => 'Doblar el número de horas de HLC', 'descripcion' => 'Estaría bien que HLC tuviera más horas y así poder hacer más ejercicios', 'autor' => 'Chuck Norris', 'fecha_propuesta' => new \DateTime('2017-11-11')],
            ['titulo' => 'Irnos de tapas', 'descripcion' => '¿A quién no le apetece que nos echemos unas tapas un día de estos al acabar las clases?', 'autor' => 'Juan Nadie', 'fecha_propuesta' => new \DateTime('2017-11-12')],
            ['titulo' => 'Aprobado general', 'descripcion' => 'Anda, apruébanos ya a todos y así no tenemos que venir más a clase', 'autor' => 'Oso Yogui', 'fecha_propuesta' => new \DateTime('2017-11-13')]
        ];

        return $this->render('idea/listar.html.twig', [
            'ideas' => $ideas
        ]);
    }
}
