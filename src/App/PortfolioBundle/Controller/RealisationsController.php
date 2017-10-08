<?php

namespace App\PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RealisationsController extends Controller
{
   /* public function indexAction()
    {
        return $this->render('AppPortfolioBundle:Realisations:index.html.twig');
    }*/

    public function indexAction()
    {
        $realisations = $this->getDoctrine()->getManager()->getRepository('AppAdminBundle:Realisations')->getRealDesc();
        return $this->render('AppPortfolioBundle:Realisations:index.html.twig', array('realisations' => $realisations));
    }

}
