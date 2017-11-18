<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UsuarioController extends Controller
{
    /**
     * @Route("/usuarios/sin-ideas", name="usuarios_sin_ideas_listar")
     */
    public function listarUsuariosSinIdeasAction()
    {
        $usuarios = $this->getDoctrine()->getRepository('AppBundle:Usuario')->findBySinIdeas();

        return $this->render('usuario/sin_ideas_listar.html.twig', [
            'usuarios' => $usuarios
        ]);
    }
}
