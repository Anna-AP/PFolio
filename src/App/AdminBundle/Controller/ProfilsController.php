<?php

namespace App\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\AdminBundle\Entity\Profils;
use App\AdminBundle\Form\ProfilsType;
use App\AdminBundle\Form\ProfilsEditType;

class ProfilsController extends Controller
{
    public function indexAction()
    {
    	$repository = $this->getDoctrine()->getManager()->getRepository('AppAdminBundle:Profils');
    	$profils = $repository->findAll();
        return $this->render('AppAdminBundle:Profils:index.html.twig', array('profils' => $profils));
    }

    public function addAction(Request $request)
    {
    	$profils = new Profils();
        $form = $this->get('form.factory')->create(ProfilsType::class, $profils);

    	if($request->isMethod('POST')) {
    		$form->handleRequest($request);

            /*dump($form);
            die;*/
    		if($form->isValid()) {
    			$em = $this->getDoctrine()->getManager();
    			$em->persist($profils);
    			$em->flush();
    			$request->getSession()->getFlashBag()->add('notice','Profil bien enregistré.');
    			return $this->redirectToRoute('app_admin_profils_show', array('id' => $profils->getId()));
    		}
    	}

        return $this->render('AppAdminBundle:Profils:new.html.twig',array('form' => $form->createView()));
    }

    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $profils = $em->getRepository('AppAdminBundle:Profils')->find($id);
        
        if (null === $profils) {
            throw new NotFoundHttpException("Le profil d'id ".$id." n'existe pas.");
        }

        $form = $this->get('form.factory')->create(ProfilsEditType::class, $profils);

        if($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Profil bien modifiée');

            return $this->redirectToRoute('app_admin_profils_show');
        }
        return $this->render('AppAdminBundle:Profils:edit.html.twig', array(
            'profils' => $profils,
            'form' => $form->createView(),
        ));
    }
}
