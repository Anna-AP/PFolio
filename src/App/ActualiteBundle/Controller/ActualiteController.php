<?php

namespace App\ActualiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ActualiteController extends Controller
{
    public function indexAction()
    {
    	$actualite = $this->getDoctrine()->getManager()->getRepository('AppAdminBundle:Actualite')->getActuDesc();

        return $this->render('AppActualiteBundle:Actualite:index.html.twig', array('actualite' => $actualite));
    }

    public function viewAction($id)
    {
    	$actualite = $this->getDoctrine()->getManager()->getRepository('AppAdminBundle:Actualite')->find($id);
        return $this->render('AppActualiteBundle:Actualite:show.html.twig', array('actualite' => $actualite));
    }
}
