<?php

namespace Bruvinsky\HighschoolBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Bruvinsky\HighschoolBundle\Entity\DepartmentSpecialty;
use Bruvinsky\HighschoolBundle\Form\DepartmentSpecialtyType;

/**
 * DepartmentSpecialty controller.
 *
 */
class DepartmentSpecialtyController extends Controller
{

    /**
     * Lists all DepartmentSpecialty entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();
        $qb->select('ds')
            ->from('BruvinskyHighschoolBundle:DepartmentSpecialty', 'ds')
            ->orderBy('ds.id', 'ASC');;

        $query = $qb->getQuery();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $this->get('request')->query->get('page', 1),
            20
        );

        return $this->render('BruvinskyHighschoolBundle:DepartmentSpecialty:index.html.twig', array(
            'pagination' => $pagination,
        ));
    }
    /**
     * Creates a new DepartmentSpecialty entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new DepartmentSpecialty();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('departmentspecialty_show', array('id' => $entity->getId())));
        }

        return $this->render('BruvinskyHighschoolBundle:DepartmentSpecialty:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a DepartmentSpecialty entity.
     *
     * @param DepartmentSpecialty $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(DepartmentSpecialty $entity)
    {
        $form = $this->createForm(new DepartmentSpecialtyType(), $entity, array(
            'action' => $this->generateUrl('departmentspecialty_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new DepartmentSpecialty entity.
     *
     */
    public function newAction()
    {
        $entity = new DepartmentSpecialty();
        $form   = $this->createCreateForm($entity);

        return $this->render('BruvinskyHighschoolBundle:DepartmentSpecialty:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a DepartmentSpecialty entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BruvinskyHighschoolBundle:DepartmentSpecialty')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DepartmentSpecialty entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BruvinskyHighschoolBundle:DepartmentSpecialty:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing DepartmentSpecialty entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BruvinskyHighschoolBundle:DepartmentSpecialty')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DepartmentSpecialty entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BruvinskyHighschoolBundle:DepartmentSpecialty:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a DepartmentSpecialty entity.
    *
    * @param DepartmentSpecialty $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(DepartmentSpecialty $entity)
    {
        $form = $this->createForm(new DepartmentSpecialtyType(), $entity, array(
            'action' => $this->generateUrl('departmentspecialty_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing DepartmentSpecialty entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BruvinskyHighschoolBundle:DepartmentSpecialty')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DepartmentSpecialty entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('departmentspecialty_edit', array('id' => $id)));
        }

        return $this->render('BruvinskyHighschoolBundle:DepartmentSpecialty:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a DepartmentSpecialty entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BruvinskyHighschoolBundle:DepartmentSpecialty')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find DepartmentSpecialty entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('departmentspecialty'));
    }

    /**
     * Creates a form to delete a DepartmentSpecialty entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('departmentspecialty_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
