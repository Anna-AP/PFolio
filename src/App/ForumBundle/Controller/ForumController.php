<?php

namespace App\ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ForumController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppForumBundle:Forum:index.html.twig');
    }

    public function listingAction()
    {
        return $this->render('AppForumBundle:Forum:listing.html.twig');
    }

    public function viewAction()
    {
        return $this->render('AppForumBundle:Forum:show.html.twig');
    }

    public function addtAction()
    {
        return $this->render('AppForumBundle:Forum:newt.html.twig');
    }

    public function edittAction()
    {
        return $this->render('AppForumBundle:Forum:editt.html.twig');
    }

    public function addpAction()
    {
        return $this->render('AppForumBundle:Forum:newp.html.twig');
    }

    public function editpAction()
    {
        return $this->render('AppForumBundle:Forum:editp.html.twig');
    }
}
