<?php

namespace App\PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AboutmeController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppPortfolioBundle:About_me:index.html.twig');
    }
}
