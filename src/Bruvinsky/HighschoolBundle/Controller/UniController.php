<?php

namespace Bruvinsky\HighschoolBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Bruvinsky\HighschoolBundle\Entity\Uni;
use Bruvinsky\HighschoolBundle\Form\UniType;

/**
 * Uni controller.
 *
 */
class UniController extends Controller
{

    /**
     * Lists all Uni entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

//        $entities = $em->getRepository('BruvinskyHighschoolBundle:Uni')->findAll();
//        return $this->render('BruvinskyHighschoolBundle:Uni:index.html.twig', array(
//            'pagination' => $entities,
//        ));

        $qb = $em->createQueryBuilder();
        $qb->select('u')
            ->from('BruvinskyHighschoolBundle:Uni', 'u')
            ->orderBy('u.id', 'ASC');;

        $query = $qb->getQuery();

        $request = Request::createFromGlobals();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $request->query->get('page', 1),
            20
        );

        return $this->render('BruvinskyHighschoolBundle:Uni:index.html.twig', array(
            'pagination' => $pagination,
        ));
    }
    /**
     * Creates a new Uni entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Uni();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('uni_show', array('id' => $entity->getId())));
        }

        return $this->render('BruvinskyHighschoolBundle:Uni:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Uni entity.
     *
     * @param Uni $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Uni $entity)
    {
        $form = $this->createForm(new UniType(), $entity, array(
            'action' => $this->generateUrl('uni_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Uni entity.
     *
     */
    public function newAction()
    {
        $entity = new Uni();
        $form   = $this->createCreateForm($entity);

        return $this->render('BruvinskyHighschoolBundle:Uni:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Uni entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BruvinskyHighschoolBundle:Uni')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Uni entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BruvinskyHighschoolBundle:Uni:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Uni entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BruvinskyHighschoolBundle:Uni')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Uni entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BruvinskyHighschoolBundle:Uni:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Uni entity.
    *
    * @param Uni $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Uni $entity)
    {
        $form = $this->createForm(new UniType(), $entity, array(
            'action' => $this->generateUrl('uni_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Uni entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BruvinskyHighschoolBundle:Uni')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Uni entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('uni_edit', array('id' => $id)));
        }

        return $this->render('BruvinskyHighschoolBundle:Uni:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Uni entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BruvinskyHighschoolBundle:Uni')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Uni entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('uni'));
    }

    /**
     * Creates a form to delete a Uni entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('uni_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
