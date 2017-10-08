<?php

namespace App\SupportBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SupportController extends Controller
{
    public function indexAction()
    {
        $theme = $this->getDoctrine()->getMAnager()->getRepository('AppAdminBundle:Theme')->findAll();
        return $this->render('AppSupportBundle:Support:index.html.twig', array('theme' => $theme));
    }

    public function themeAction($id, Request $request)
    {
        $theme = $this->getDoctrine()->getMAnager()->getRepository('AppAdminBundle:Theme')->find(intval($id));

        $support = $this->getDoctrine()->getMAnager()->getRepository('AppAdminBundle:Support')->getSupportTheme($id);

        return $this->render('AppSupportBundle:Support:listing.html.twig', array('theme' => $theme, 'support' => $support));
    }

    public function viewgAction()
    {
        return $this->render('AppSupportBundle:Support:show.html.twig');
    }
}
