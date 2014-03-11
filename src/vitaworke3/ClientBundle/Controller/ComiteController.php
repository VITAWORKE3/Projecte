<?php

namespace vitaworke3\ClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use vitaworke3\ClientBundle\Entity\Client;
use vitaworke3\ClientBundle\Form\ComiteType;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Security\Core\SecurityContext;

class ComiteController extends Controller
{
public function ComiteAction()
    {
       	$em = $this->getDoctrine()->getEntityManager();
       	$tipusclient = $em->getRepository('ClientBundle:TipusClient')->findOneBy(array('slug' => 'Comite'));
		
        $paginador = $this->get('ideup.simple_paginator');
		$paginador->setItemsPerPage(20);
		$paginador->setMaxPagerItems(5);

		$comite = $paginador->paginate($em->getRepository('ClientBundle:Client')->queryclients($tipusclient))->getResult();
		return $this->render('ClientBundle:Comite:comite.html.twig', array(
		'comites' => $comite,'paginador' => $paginador)); 
		
		
    }
    public function ComiteNouAction()
    {
        $peticion = $this->getRequest();
        $comite = new Client();
        $formulario = $this->createForm(new ComiteType(), $comite);
        $em = $this->getDoctrine()->getEntityManager();
        if ($peticion->getMethod() == 'POST') {
				$formulario->bind($peticion);
				if ($formulario->isValid()) {
					$tipusclient = $em->getRepository('ClientBundle:TipusClient')->findOneBy(array('slug' => 'Comite'));
					$comite->setTipusClient($tipusclient);
					$em->persist($comite);
					$em->flush();
					$this->get('session')->setFlash('info',
						'Los datos de tu perfil se han actualizado correctamente'
					);
					$id=$comite->getId();
					return $this->redirect($this->generateUrl('extranet_comite_editar',  array( 'id'=> $id)));
		
					
				}
			}
        
        return $this->render('ClientBundle:Comite:comitenou.html.twig', array( 'accion' =>'crear','formulario' => $formulario->createView()));
    }
	public function ComiteEditarAction($id)
	{
		$em = $this->getDoctrine()->getEntityManager();
		$comite = $em->getRepository('ClientBundle:Client')->find($id);
		if (!$comite) {
			throw $this->createNotFoundException('comite inexistent');
			}
		$formulario = $this->createForm(new ComiteType(), $comite);
		$peticion = $this->getRequest();
		if ($peticion->getMethod() == 'POST') {
			$formulario->bind($peticion);
			if ($formulario->isValid()) {
				$em->persist($comite);
				$em->flush();
				return $this->redirect($this->generateUrl('extranet_comite_editar',  array( 'id'=> $id)));
		
			}
		}
		return $this->render('ClientBundle:Comite:comitenou.html.twig',
		array(
		'accion' =>'editar',
		'comite' => $comite,
		'formulario' => $formulario->createView()
		)
		);
	}
        

   	


}