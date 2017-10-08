<?php

namespace App\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\AdminBundle\Entity\Theme;
use App\AdminBundle\Form\ThemeType;
use App\AdminBundle\Form\ThemeEditType;


class ThemeController extends Controller
{
    public function indexAction()
    {
    	$repository = $this->getDoctrine()->getManager()->getRepository('AppAdminBundle:Theme');
    	$theme = $repository->findAll();
        return $this->render('AppAdminBundle:Theme:index.html.twig', array('theme' => $theme));
    }

    public function addAction(Request $request)
    {
    	$theme = new Theme();
        $form = $this->get('form.factory')->create(ThemeType::class, $theme);

        if($request->isMethod('POST')) {
            $form->handleRequest($request);

            /*dump($form); die;*/
            if($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($theme);
                $em->flush();
                $request->getSession()->getFlashBag()->add('notice','Thème bien enregistré.');
                return $this->redirectToRoute('app_admin_theme_show', array('id' => $theme->getId()));
            }
        }

        return $this->render('AppAdminBundle:Theme:new.html.twig',array('form' => $form->createView()));
    }

    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $theme = $em->getRepository('AppAdminBundle:Theme')->find($id);
        
        if (null === $theme) {
            throw new NotFoundHttpException("Le thème d'id " . $id . " n'existe pas.");
        }

        $form = $this->get('form.factory')->create(ThemeEditType::class, $theme);

        if($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Thème bien modifiée');

            return $this->redirectToRoute('app_admin_theme_show');
        }
        return $this->render('AppAdminBundle:Theme:edit.html.twig', array(
            'theme' => $theme,
            'form' => $form->createView(),
        ));
    }
}
