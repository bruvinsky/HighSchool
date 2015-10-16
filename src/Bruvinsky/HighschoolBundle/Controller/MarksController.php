<?php

namespace Bruvinsky\HighschoolBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Bruvinsky\HighschoolBundle\Entity\Marks;
use Bruvinsky\HighschoolBundle\Form\MarksType;

/**
 * Marks controller.
 *
 */
class MarksController extends Controller
{

    /**
     * Lists all Marks entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

//        $entities = $em->getRepository('BruvinskyHighschoolBundle:Marks')->findAll();
//        return $this->render('BruvinskyHighschoolBundle:Marks:index.html.twig', array(
//            'entities' => $entities,
//        ));
        $qb = $em->createQueryBuilder();
        $qb->select('m')
            ->from('BruvinskyHighschoolBundle:Marks', 'm')
            ->orderBy('m.id', 'ASC');;

        $query = $qb->getQuery();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $this->get('request')->query->get('page', 1),
            20
        );

        return $this->render('BruvinskyHighschoolBundle:Marks:index.html.twig', array(
            'pagination' => $pagination,
        ));

    }
    /**
     * Creates a new Marks entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Marks();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('marks_show', array('id' => $entity->getId())));
        }

        return $this->render('BruvinskyHighschoolBundle:Marks:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Marks entity.
     *
     * @param Marks $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Marks $entity)
    {
        $form = $this->createForm(new MarksType(), $entity, array(
            'action' => $this->generateUrl('marks_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Marks entity.
     *
     */
    public function newAction()
    {
        $entity = new Marks();
        $form   = $this->createCreateForm($entity);

        return $this->render('BruvinskyHighschoolBundle:Marks:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Marks entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BruvinskyHighschoolBundle:Marks')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Marks entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BruvinskyHighschoolBundle:Marks:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Marks entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BruvinskyHighschoolBundle:Marks')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Marks entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BruvinskyHighschoolBundle:Marks:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Marks entity.
    *
    * @param Marks $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Marks $entity)
    {
        $form = $this->createForm(new MarksType(), $entity, array(
            'action' => $this->generateUrl('marks_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Marks entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BruvinskyHighschoolBundle:Marks')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Marks entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('marks_edit', array('id' => $id)));
        }

        return $this->render('BruvinskyHighschoolBundle:Marks:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Marks entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BruvinskyHighschoolBundle:Marks')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Marks entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('marks'));
    }

    /**
     * Creates a form to delete a Marks entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('marks_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
