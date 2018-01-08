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

    /**
     * @Route("/usuarios/con-ideas", name="usuarios_con_ideas_listar")
     */
    public function listarUsuariosConIdeasAction()
    {
        $usuarios = $this->getDoctrine()->getRepository('AppBundle:Usuario')->findByConIdeas();

        return $this->render('usuario/usuario_listar.html.twig', [
            'usuarios' => $usuarios
        ]);
    }

    /**
     * @Route("/usuarios", name="usuarios_listar")
     */
    public function listarUsuariosConPuntos()
    {
        $datos = $this->getDoctrine()->getRepository('AppBundle:Usuario')->findUsuariosPorPuntosDescendentes();

        return $this->render('usuario/usuario_listar_puntos.html.twig', [
            'datos' => $datos
        ]);
    }
}
