<?php

namespace App\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use App\AdminBundle\Entity\Support;
use App\AdminBundle\Form\SupportType;
use App\AdminBundle\Form\SupportEditType;

class SupportController extends Controller
{
    public function indexAction()
    {
        $support = $this->getDoctrine()->getManager()->getRepository('AppAdminBundle:Support')->findAll();
        return $this->render('AppAdminBundle:Support:index.html.twig', array('support' => $support));
    }

    public function listingAction()
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('AppAdminBundle:Realisations');
        $realisations = $repository->findAll();
        return $this->render('AppAdminBundle:Support:index.html.twig', array('realisations' => $realisations));
    }

    public function addAction(Request $request)
    {
    	$support = new Support();
        $form = $this->get('form.factory')->create(SupportType::class, $support);

        if($request->isMethod('POST')) {
            $form->handleRequest($request);

            if($form->isValid()) {
                $em = $this->getDoctrine()->getManager();

                $em->persist($support);
                $em->flush();
                $request->getSession()->getFlashBag()->add('notice','Support bien enregistrée.');
                return $this->redirectToRoute('app_admin_support_listing', array('id' => $support->getId()));
            }
        }
        return $this->render('AppAdminBundle:Support:new.html.twig',array('form' => $form->createView()));
    }

    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $support = $em->getRepository('AppAdminBundle:Support')->find($id);

        if (null === $support) {
            throw new NotFoundHttpException("Le support d'id ".$id." n'existe pas.");
        }

        $form = $this->get('form.factory')->create(SupportEditType::class, $support);

        if($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Support bien modifié');

            return $this->redirectToRoute('app_admin_support_show');
        }
        return $this->render('AppAdminBundle:Support:edit.html.twig', array(
            'support' => $support,
            'form' => $form->createView(),
        ));
        return $this->render('AppAdminBundle:Support:edit.html.twig');
    }
}
