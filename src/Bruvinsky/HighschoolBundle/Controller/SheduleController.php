<?php

namespace Bruvinsky\HighschoolBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Bruvinsky\HighschoolBundle\Entity\Shedule;
use Bruvinsky\HighschoolBundle\Form\SheduleType;

/**
 * Shedule controller.
 *
 */
class SheduleController extends Controller
{

    /**
     * Lists all Shedule entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        //$query = $em->getRepository('BruvinskyHighschoolBundle:Shedule')->findSheduleById_Group(1);
        $query = $em->getRepository('BruvinskyHighschoolBundle:Shedule')->findSheduleALL();
//        return $this->render('BruvinskyHighschoolBundle:Specialty:index.html.twig', array(
//            'entities' => $entities,
//        ));

//        $sql = "select * from shedule where id_group=1";
//        $stmt = $em->getConnection()->prepare($sql);
//        $stmt->execute();
//        $query = $stmt->fetchAll();

//        $qb = $em->createQueryBuilder();
//        $qb->select('s')
//            ->from('BruvinskyHighschoolBundle:Shedule', 's')
//            ->orderBy('s.id', 'ASC');;
//
//        $query = $qb->getQuery();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $this->get('request')->query->get('page', 1),
            20
        );

        return $this->render('BruvinskyHighschoolBundle:Shedule:index.html.twig', array(
            'pagination' => $pagination,
        ));


    }

    public function marksAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BruvinskyHighschoolBundle:Shedule')->findMarksById($id);

        return $this->render('BruvinskyHighschoolBundle:Shedule:marks.html.twig', array(
            'entities' => $entities,
            'id' => $id,
        ));
    }


    /**
     * Creates a new Shedule entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Shedule();

        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);

//            $teacher = $request->request->get('idTeacherSh');
//            $group = $request->request->get('idGroupSh');
//            $subject = $request->request->get('idSubjectSh');
//            $classroom = $request->request->get('idClassroomSh');
//
//            $entity->setIdTeacherSh($em->getReference('Bruvinsky\HighschoolBundle\Entity\Teacher', $teacher) );
//            $entity->setIdGroupSh($em->getReference('Bruvinsky\HighschoolBundle\Entity\StudentGroup', $group) );
//            $entity->setIdSubjectSh($em->getReference('Bruvinsky\HighschoolBundle\Entity\Subject', $subject) );
//            $entity->setIdClassroomSh($em->getReference('Bruvinsky\HighschoolBundle\Entity\Classroom', $classroom) );

            $em->flush();

            return $this->redirect($this->generateUrl('shedule_show', array('id' => $entity->getId())));
        }

        return $this->render('BruvinskyHighschoolBundle:Shedule:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Shedule entity.
     *
     * @param Shedule $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Shedule $entity)
    {
        $manager = $this->getDoctrine()->getManager();
        $form = $this->createForm(new SheduleType($manager), $entity, array(
            'action' => $this->generateUrl('shedule_create'),
            'method' => 'POST',
        ));

//        $form = $this->createForm(new SheduleType(), $entity, array(
//            'action' => $this->generateUrl('shedule_create'),
//            'method' => 'POST',
//        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Shedule entity.
     *
     */
    public function newAction()
    {
        $entity = new Shedule();
        $form   = $this->createCreateForm($entity);

        return $this->render('BruvinskyHighschoolBundle:Shedule:new.html.twig', array(
            'entity' => $entity,
//            'teacher'=>1,
//            'group'=>1,
//            //'subject'=>1,
//            'classroom'=>1,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Shedule entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BruvinskyHighschoolBundle:Shedule')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Shedule entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BruvinskyHighschoolBundle:Shedule:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Shedule entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BruvinskyHighschoolBundle:Shedule')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Shedule entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BruvinskyHighschoolBundle:Shedule:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Shedule entity.
    *
    * @param Shedule $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Shedule $entity)
    {
        $manager = $this->getDoctrine()->getManager();

        $form = $this->createForm(new SheduleType($manager), $entity, array(
            'action' => $this->generateUrl('shedule_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Shedule entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BruvinskyHighschoolBundle:Shedule')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Shedule entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('shedule_edit', array('id' => $id)));
        }

        return $this->render('BruvinskyHighschoolBundle:Shedule:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Shedule entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BruvinskyHighschoolBundle:Shedule')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Shedule entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('shedule'));
    }

    /**
     * Creates a form to delete a Shedule entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('shedule_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
