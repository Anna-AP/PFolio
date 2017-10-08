<?php

namespace App\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\AdminBundle\Entity\Actualite;
use App\AdminBundle\Form\ActualiteType;
use App\AdminBundle\Form\ActualiteEditType;

class ActualiteController extends Controller
{
    public function indexAction()
    {
    	$actualite = $this->getDoctrine()->getManager()->getRepository('AppAdminBundle:Actualite')->getActuDesc();

        return $this->render('AppAdminBundle:Actualite:index.html.twig', array('actualite' => $actualite));
    }

    public function addAction(Request $request)
    {
    	$actualite = new Actualite();
        $form = $this->get('form.factory')->create(ActualiteType::class, $actualite);

        if($request->isMethod('POST')) {
            $form->handleRequest($request);

            /*dump($form);
            die;*/
            if($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($actualite);
                $em->flush();
                $request->getSession()->getFlashBag()->add('notice','Actualité bien enregistrée.');
                return $this->redirectToRoute('app_admin_actualite_show', array('id' => $actualite->getId()));
            }
        }

        return $this->render('AppAdminBundle:Actualite:new.html.twig',array('form' => $form->createView()));
    }

    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $actualite = $em->getRepository('AppAdminBundle:Actualite')->find($id);
        
        if (null === $actualite) {
            throw new NotFoundHttpException("L'actualité d'id ".$id." n'existe pas.");
        }

        $form = $this->get('form.factory')->create(ActualiteEditType::class, $actualite);

        if($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Actualité bien modifiée');

            return $this->redirectToRoute('app_admin_actualite_show');
        }
        return $this->render('AppAdminBundle:Actualite:edit.html.twig', array(
            'actualite' => $actualite,
            'form' => $form->createView(),
        ));
    }
}
