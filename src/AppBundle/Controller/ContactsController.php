<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class ContactsController extends FOSRestController
{
    public function getContactsAction(){
        $em = $this->getDoctrine()->getManager();

        return $em->getRepository('AppBundle:Contact')->findAll();
    }

    public function getContactAction($id){
        $em = $this->getDoctrine()->getManager();
        $resource = $em->getRepository('AppBundle:Contact')->find($id);

        if (null === $resource) {
            throw new NotFoundHttpException("Resource not found");
        }

        return $resource;
    }

    public function postContactsAction(Request $request){
        $contact = new Contact();
        $form = $this->createForm('AppBundle\Form\ContactType', $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            return $contact;
        }

        return $form;
    }

    public function patchContactsAction(Request $request, $id){
        $contact = $this->getContactAction($id);
        $form = $this->createForm('AppBundle\Form\ContactType', $contact,array('method' => $request->getMethod()));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            return $contact;
        }

        return $form;
    }

    public function deleteContactAction($id){
        $contact = $this->getContactAction($id);

        $em = $this->getDoctrine()->getManager();
        $em->remove($contact);
        $em->flush();

        return $contact;
    }
}
