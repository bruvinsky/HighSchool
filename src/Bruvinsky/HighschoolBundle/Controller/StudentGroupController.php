<?php

namespace Bruvinsky\HighschoolBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Bruvinsky\HighschoolBundle\Entity\StudentGroup;
use Bruvinsky\HighschoolBundle\Form\StudentGroupType;

/**
 * StudentGroup controller.
 *
 */
class StudentGroupController extends Controller
{

    /**
     * Lists all StudentGroup entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

//        $entities = $em->getRepository('BruvinskyHighschoolBundle:StudentGroup')->findAll();
//        return $this->render('BruvinskyHighschoolBundle:StudentGroup:index.html.twig', array(
//            'entities' => $entities,
//        ));

        $qb = $em->createQueryBuilder();
        $qb->select('sg')
            ->from('BruvinskyHighschoolBundle:StudentGroup', 'sg')
            ->orderBy('sg.id', 'ASC');;

        $query = $qb->getQuery();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $this->get('request')->query->get('page', 1),
            20
        );

        return $this->render('BruvinskyHighschoolBundle:StudentGroup:index.html.twig', array(
            'pagination' => $pagination,
        ));

    }
    /**
     * Creates a new StudentGroup entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new StudentGroup();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('studentgroup_show', array('id' => $entity->getId())));
        }

        return $this->render('BruvinskyHighschoolBundle:StudentGroup:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a StudentGroup entity.
     *
     * @param StudentGroup $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(StudentGroup $entity)
    {
        $form = $this->createForm(new StudentGroupType(), $entity, array(
            'action' => $this->generateUrl('studentgroup_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new StudentGroup entity.
     *
     */
    public function newAction()
    {
        $entity = new StudentGroup();
        $form   = $this->createCreateForm($entity);

        return $this->render('BruvinskyHighschoolBundle:StudentGroup:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a StudentGroup entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BruvinskyHighschoolBundle:StudentGroup')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find StudentGroup entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BruvinskyHighschoolBundle:StudentGroup:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing StudentGroup entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BruvinskyHighschoolBundle:StudentGroup')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find StudentGroup entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BruvinskyHighschoolBundle:StudentGroup:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a StudentGroup entity.
    *
    * @param StudentGroup $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(StudentGroup $entity)
    {
        $form = $this->createForm(new StudentGroupType(), $entity, array(
            'action' => $this->generateUrl('studentgroup_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing StudentGroup entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BruvinskyHighschoolBundle:StudentGroup')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find StudentGroup entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('studentgroup_edit', array('id' => $id)));
        }

        return $this->render('BruvinskyHighschoolBundle:StudentGroup:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a StudentGroup entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BruvinskyHighschoolBundle:StudentGroup')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find StudentGroup entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('studentgroup'));
    }

    /**
     * Creates a form to delete a StudentGroup entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('studentgroup_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
