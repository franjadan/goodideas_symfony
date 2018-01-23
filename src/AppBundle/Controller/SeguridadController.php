<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SeguridadController extends Controller
{
    /**
     * @Route("/entrar", name="usuario_entrar")
     */
    public function entrarAction()
    {
        return $this->render('seguridad/entrar.html.twig');
    }

   /**
     * @Route("/salir", name="usuario_salir")
     */
    public function salirAction()
    {
        // no contiene nada porque Symfony interceptará la petición y la acción
        // nunca se ejecutará
    }
}
