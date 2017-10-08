<?php

namespace App\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CommentairesController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppAdminBundle:Commentaires:index.html.twig');
    }
}
