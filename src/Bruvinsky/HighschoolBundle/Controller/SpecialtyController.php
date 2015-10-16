<?php

namespace Bruvinsky\HighschoolBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Bruvinsky\HighschoolBundle\Entity\Specialty;
use Bruvinsky\HighschoolBundle\Form\SpecialtyType;

/**
 * Specialty controller.
 *
 */
class SpecialtyController extends Controller
{

    /**
     * Lists all Specialty entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

//        $entities = $em->getRepository('BruvinskyHighschoolBundle:Specialty')->findAll();
//        return $this->render('BruvinskyHighschoolBundle:Specialty:index.html.twig', array(
//            'entities' => $entities,
//        ));
        $qb = $em->createQueryBuilder();
        $qb->select('sp')
            ->from('BruvinskyHighschoolBundle:Specialty', 'sp')
            ->orderBy('sp.id', 'ASC');;

        $query = $qb->getQuery();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $this->get('request')->query->get('page', 1),
            20
        );

        return $this->render('BruvinskyHighschoolBundle:Specialty:index.html.twig', array(
            'pagination' => $pagination,
        ));
    }
    /**
     * Creates a new Specialty entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Specialty();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('specialty_show', array('id' => $entity->getId())));
        }

        return $this->render('BruvinskyHighschoolBundle:Specialty:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Specialty entity.
     *
     * @param Specialty $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Specialty $entity)
    {
        $form = $this->createForm(new SpecialtyType(), $entity, array(
            'action' => $this->generateUrl('specialty_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Specialty entity.
     *
     */
    public function newAction()
    {
        $entity = new Specialty();
        $form   = $this->createCreateForm($entity);

        return $this->render('BruvinskyHighschoolBundle:Specialty:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Specialty entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BruvinskyHighschoolBundle:Specialty')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Specialty entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BruvinskyHighschoolBundle:Specialty:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Specialty entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BruvinskyHighschoolBundle:Specialty')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Specialty entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BruvinskyHighschoolBundle:Specialty:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Specialty entity.
    *
    * @param Specialty $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Specialty $entity)
    {
        $form = $this->createForm(new SpecialtyType(), $entity, array(
            'action' => $this->generateUrl('specialty_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Specialty entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BruvinskyHighschoolBundle:Specialty')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Specialty entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('specialty_edit', array('id' => $id)));
        }

        return $this->render('BruvinskyHighschoolBundle:Specialty:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Specialty entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BruvinskyHighschoolBundle:Specialty')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Specialty entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('specialty'));
    }

    /**
     * Creates a form to delete a Specialty entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('specialty_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
