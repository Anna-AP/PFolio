<?php

namespace App\PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomepageController extends Controller
{
    public function indexAction()
    {
    	$realisations = $this->getDoctrine()->getManager()->getRepository('AppAdminBundle:Realisations')->getRealLimit();

    	$actualite = $this->getDoctrine()->getManager()->getRepository('AppAdminBundle:Actualite')->getActuLimit();
    	//dump($actualite);die;

        return $this->render('AppPortfolioBundle:Homepage:index.html.twig', array(
        		'realisations' => $realisations,
        		'actualite' => $actualite
        	));
    }
}
