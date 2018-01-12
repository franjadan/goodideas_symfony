<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Idea;
use AppBundle\Entity\Usuario;
use AppBundle\Form\Type\IdeaType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class IdeaController extends Controller
{

    /**
     * @Route("/ideas/votos", name="idea_votos_listar")
     */
    public function listarVotosAction()
    {
        $datos = $this->getDoctrine()->getRepository('AppBundle:Idea')->findIdeasYVotosPorPuntosDecrecientes();

        $limitePuntos = 5;
        $ideasConPuntos = $this->getDoctrine()->getRepository('AppBundle:Idea')->countIdeasConMasDePuntos($limitePuntos);

        return $this->render('idea/listar_votos.html.twig', [
            'datos' => $datos,
            'ultima_semana' => false,
            'top_ideas' => $ideasConPuntos,
            'limite_puntos' => $limitePuntos

        ]);
    }

    /**
     * @Route("/ideas/votos/semana", name="idea_votos_listar_semana")
     */
    public function listarVotosSemanaAction()
    {
        $desde = new \DateTime("-1 week");
        $hasta = new \DateTime();

        $datos = $this->getDoctrine()->getRepository('AppBundle:Idea')->findIdeasYVotosPorPuntosDecrecientesRangoFechas($desde, $hasta);

        return $this->render('idea/listar_votos.html.twig', [
            'datos' => $datos,
            'ultima_semana' => true
        ]);
    }

    /**
     * @Route("/ideas/{filtro}", name="idea_listar", defaults={"filtro": "todas"}, requirements={"filtro": "todas|aprobadas|rechazadas"})
     */
    public function listarAction($filtro)
    {
        $ideas = $this->getDoctrine()->getRepository('AppBundle:Idea')->findPorFechaDecrecienteYFiltro($filtro);

        return $this->render('idea/listar.html.twig', [
            'ideas' => $ideas,
            'filtro' => $filtro
        ]);
    }

    /**
     * @Route("/idea/usuario/{id}", name="idea_usuario_mostrar")
     */
    public function mostrarUsuarioAction(Usuario $usuario)
    {
        $ideas = $this->getDoctrine()->getRepository('AppBundle:Idea')->findByUsuario($usuario);

        return $this->render('idea/usuario_listar.html.twig', [
            'usuario' => $usuario,
            'ideas' => $ideas
        ]);
    }

    /**
     * @Route("/idea/{id}", name="idea_mostrar")
     */
    public function mostrarAction(Request $request, Idea $idea)
    {
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(IdeaType::class, $idea);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $em->flush();
                return $this->redirectToRoute('idea_listar');
            }
            catch (\Exception $e) {
                $this->addFlash('error', 'No se han podido guardar los cambios');
            }
        }

        return $this->render('idea/form.html.twig', [
            'idea' => $idea,
            'formulario' => $form->createView()
        ]);
    }
}