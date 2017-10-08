<?php

namespace App\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\AdminBundle\Entity\Realisations;
use App\AdminBundle\Form\RealisationsType;
use App\AdminBundle\Form\RealisationsEditType;

class UserController extends Controller
{
    public function indexAction()
    {
    	$repository = $this->getDoctrine()->getManager()->getRepository('AppAdminBundle:Realisations');
    	$realisations = $repository->findAll();
        return $this->render('AppAdminBundle:User:index.html.twig', array('realisations' => $realisations));
    }

    public function addAction(Request $request)
    {
    	$realisation = new Realisations();
        $form = $this->get('form.factory')->create(RealisationsType::class, $realisation);

    	if($request->isMethod('POST')) {
    		$form->handleRequest($request);

            /*dump($form);
            die;*/
    		if($form->isValid()) {
    			$em = $this->getDoctrine()->getManager();
    			$em->persist($realisation);
    			$em->flush();
    			$request->getSession()->getFlashBag()->add('notice','Réalisation bien enregistrée.');
    			return $this->redirectToRoute('app_admin_realisations_show', array('id' => $realisation->getId()));
    		}
    	}

        return $this->render('AppAdminBundle:Realisations:new.html.twig',array('form' => $form->createView()));
    }

    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $realisation = $em->getRepository('AppAdminBundle:Realisations')->find($id);
        
        if (null === $realisation) {
            throw new NotFoundHttpException("L'annonce d'id ".$id." n'existe pas.");
        }

        $form = $this->get('form.factory')->create(RealisationsEditType::class, $realisation);

        if($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien modifiée');

            return $this->redirectToRoute('app_admin_realisations_show');
        }
        return $this->render('AppAdminBundle:Realisations:edit.html.twig', array(
            'realisation' => $realisation,
            'form' => $form->createView(),
        ));
    }
}
