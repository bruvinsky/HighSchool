<?php

namespace Bruvinsky\HighschoolBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Bruvinsky\HighschoolBundle\Entity\Shedule;
//use Bruvinsky\HighschoolBundle\Entity\Uni;
//use Bruvinsky\HighschoolBundle\Entity\StudentGroup;
//use Bruvinsky\HighschoolBundle\Form\StudentGroupType;
//
//use Doctrine\ORM\Query\ResultSetMapping;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $qb = $em->createQueryBuilder();
        $qb->select('count(u.id)')
            ->from('BruvinskyHighschoolBundle:Uni', 'u');
        $uniNumber = $qb->getQuery()->getSingleScalarResult();

        $sql = "select count(t.*) amount from (select distinct f.name, f.id_uni from faculty f) t";
        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute();
        $f = $stmt->fetch();
        $facultyNumber = $f['amount'];

        $qb = $em->createQueryBuilder();
        $qb->select('count(d.id)')
            ->from('BruvinskyHighschoolBundle:Department', 'd');
        $departmentNumber = $qb->getQuery()->getSingleScalarResult();

        $qb = $em->createQueryBuilder();
        $qb->select('count(t.id)')
            ->from('BruvinskyHighschoolBundle:Teacher', 't');

        $teacherNumber = $qb->getQuery()->getSingleScalarResult();

        $sql = "SELECT count FROM numberofstudent";
        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute();
        $s = $stmt->fetch();
        $studentNumber = $s['count'];

        $sql = "SELECT count(1) amount FROM city";
        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute();
        $city = $stmt->fetch();
        $cityNumber = $city['amount'];

        $sql = "SELECT count(1) amount FROM region";
        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute();
        $region = $stmt->fetch();
        $regionNumber = $region['amount'];

        $sql = "SELECT count FROM numberofshedule";
        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute();
        $shedule = $stmt->fetch();
        $sheduleNumber = $shedule['count'];

        $sql = "SELECT count FROM numberofmarks";
        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute();
        $marks = $stmt->fetch();
        $marksNumber = $marks['count'];

        return $this->render('BruvinskyHighschoolBundle:Default:index.html.twig', array(
            'uniNumber' => $uniNumber,
            'facultyNumber' => $facultyNumber,
            'departmentNumber' => $departmentNumber,
            'teacherNumber' => $teacherNumber,
            'studentNumber' => $studentNumber,
            'cityNumber'=>$cityNumber,
            'regionNumber'=>$regionNumber,
            'sheduleNumber'=>$sheduleNumber,
            'marksNumber'=>$marksNumber,
        ));
    }

    public function statStudentOriginAction(){
        $em = $this->getDoctrine()->getManager();

        $sql = "SELECT r.code hc, count(*) val
                FROM student s
                INNER JOIN city c ON s.id_city = c.id
                INNER JOIN region r ON c.id_region = r.id
                GROUP BY r.code";
        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute();
        $studentAmountPerRegion = $stmt->fetchAll();

        return $this->render('BruvinskyHighschoolBundle:Default:statStudentRegion.html.twig', array(
           'studentAmountPerRegion'=>$studentAmountPerRegion,
        ));
    }

    public function statUniRegionAction(){
        $em = $this->getDoctrine()->getManager();

        $sql = "SELECT r.code hc, count(*) val
                FROM uni u
                INNER JOIN city c ON u.id_city = c.id
                INNER JOIN region r ON c.id_region = r.id
                GROUP BY r.code";
        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute();
        $uniAmountPerRegion = $stmt->fetchAll();

        return $this->render('BruvinskyHighschoolBundle:Default:statUniRegion.html.twig', array(
            'uniAmountPerRegion'=>$uniAmountPerRegion,
        ));
    }

    public function statStudentUniRegionAction(){
        $em = $this->getDoctrine()->getManager();

        $sql = "SELECT r.code hc, count(*) val
                from uni u
                INNER JOIN city c ON u.id_city = c.id
                INNER JOIN region r ON c.id_region = r.id
                INNER JOIN faculty f ON f.id_uni = u.id
                INNER JOIN department d ON d.id_faculty = f.id
                INNER JOIN student_group sg ON sg.id_department = d.id
                INNER JOIN student st ON st.id_group = sg.id
                GROUP BY r.code";
        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute();
        $studentAmountUniPerRegion = $stmt->fetchAll();

        return $this->render('BruvinskyHighschoolBundle:Default:statStudentUniRegion.html.twig', array(
            'studentAmountUniPerRegion'=>$studentAmountUniPerRegion,
        ));
    }

    public function statFacultyPerUniAction(){
        $em = $this->getDoctrine()->getManager();

        $sql = "SELECT name, amount FROM function_stat_uni_faculty()";
        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute();
        $facultyPerUni = $stmt->fetchAll();

        return $this->render('BruvinskyHighschoolBundle:Default:statFacultyUni.html.twig', array(
            'stat'=>$facultyPerUni,
        ));
    }

    public function statDepartmentPerUniAction(){
        $em = $this->getDoctrine()->getManager();

        $sql = "SELECT name, amount FROM function_stat_uni_department()";
        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute();
        $departmentPerUni = $stmt->fetchAll();

        return $this->render('BruvinskyHighschoolBundle:Default:statDepartmentUni.html.twig', array(
            'stat'=>$departmentPerUni,
        ));
    }

    public function statGroupPerUniAction(){
        $em = $this->getDoctrine()->getManager();

        $sql = "SELECT name, amount FROM function_stat_uni_group()";
        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute();
        $groupPerUni = $stmt->fetchAll();

        return $this->render('BruvinskyHighschoolBundle:Default:statGroupUni.html.twig', array(
            'stat'=>$groupPerUni,
        ));
    }

    public function statAjaxUniAction(Request $request){

        $data = $request->request->get('q');

        $em = $this->getDoctrine()->getManager();
        $sql = "SELECT id, name FROM uni where name like :data";

        $stmt = $em->getConnection()->prepare($sql);
        $stmt->bindValue("data", $data.'%');
        $stmt->execute();

        $stat_ajax = $stmt->fetchAll();
        $r=array();
        $arrayKey=array();
        $arrayValue=array();
        foreach ($stat_ajax as $val){
            $arrayKey = array_merge((array)$arrayKey, (array)$val['id']);
            $arrayValue = array_merge((array)$arrayValue, (array)$val['name']);
        }
        $r = array_combine($arrayKey, $arrayValue);
        return new Response(json_encode($r));
    }

    public function statAjaxFacultyAction(Request $request){

        $data = $request->request->get('university_id');

        $em = $this->getDoctrine()->getManager();
        $sql = "SELECT id, name FROM faculty where id_uni= :data";

        $stmt = $em->getConnection()->prepare($sql);
        $stmt->bindValue("data", $data);
        $stmt->execute();

        $stat_ajax = $stmt->fetchAll();
        $r=array();
        $arrayKey=array();
        $arrayValue=array();
        foreach ($stat_ajax as $val){
            $arrayKey = array_merge((array)$arrayKey, (array)$val['id']);
            $arrayValue = array_merge((array)$arrayValue, (array)$val['name']);
        }
        $r = array_combine($arrayKey, $arrayValue);
        return new Response(json_encode($r));
    }

    public function statAjaxDepartmentSpecialtyAction(Request $request){

        $data = $request->request->get('faculty_id');

        $sql = "SELECT ds.id as id, s.name || ', ' || d.name as name
                FROM department d
                inner join faculty f on d.id_faculty = f.id
                inner join specialty s on s.id_faculty = f.id
                inner join department_specialty ds on ds.id_department = d.id and ds.id_specialty = s.id
                where f.id= :id";
        $params['id'] = $data;

        $em = $this->getDoctrine()->getManager();
        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute($params);

        $stat_ajax = $stmt->fetchAll();
        $r=array();
        $arrayKey=array();
        $arrayValue=array();
        foreach ($stat_ajax as $val){
            $arrayKey = array_merge((array)$arrayKey, (array)$val['id']);
            $arrayValue = array_merge((array)$arrayValue, (array)$val['name']);
        }
        $r = array_combine($arrayKey, $arrayValue);
        return new Response(json_encode($r));
    }

    public function statAjaxGroupAction(Request $request){

        $data = $request->request->get('departmentspecialty_id');

        $sql = "SELECT stg.id as id, stg.name as name
                FROM department_specialty ds
                INNER JOIN department d ON d.id = ds.id_department
                INNER JOIN specialty s ON s.id = ds.id_specialty
                INNER JOIN student_group stg ON d.id = stg.id_department AND s.id = stg.id_specialty
                WHERE ds.id= :id";
        $params['id'] = $data;

        $em = $this->getDoctrine()->getManager();
        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute($params);

        $stat_ajax = $stmt->fetchAll();
        $r=array();
        $arrayKey=array();
        $arrayValue=array();
        foreach ($stat_ajax as $val){
            $arrayKey = array_merge((array)$arrayKey, (array)$val['id']);
            $arrayValue = array_merge((array)$arrayValue, (array)$val['name']);
        }
        $r = array_combine($arrayKey, $arrayValue);
        return new Response(json_encode($r));
    }

    public function statAjaxStudentsAction(Request $request){

        $data = $request->request->get('group_id');

        $sql = "SELECT st.id as id, st.name as name
                FROM student st
                WHERE st.id_group= :id";
        $params['id'] = $data;

        $em = $this->getDoctrine()->getManager();
        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute($params);

        $stat_ajax = $stmt->fetchAll();
        $arrayKey=array();
        $arrayValue=array();
        foreach ($stat_ajax as $val){
            $arrayKey = array_merge((array)$arrayKey, (array)$val['id']);
            $arrayValue = array_merge((array)$arrayValue, (array)$val['name']);
        }
        $r = array_combine($arrayKey, $arrayValue);
        return new Response(json_encode($r));
    }


    public function showUniAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('BruvinskyHighschoolBundle:Uni')->findAll();

        $post = Request::createFromGlobals();

        if ($post->request->has('submit')) {
            $uni_id = $post->request->get('name');

            return $this->redirect($this->generateUrl('default_show_faculty', array('uni_id' => $uni_id)));
        }

        return $this->render('BruvinskyHighschoolBundle:Default:showUni.html.twig', array(
            'entities' => $entities,
        ));
    }

    public function showFacultyAction($uni_id)
    {
        $sql = "SELECT f.id as fid, f.name as fname FROM faculty f inner join uni u on f.id_uni = u.id where u.id= :id";
        $params['id'] = $uni_id;

        $em = $this->getDoctrine()->getManager();
        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute($params);
        $entities = $stmt->fetchAll();

        $post = Request::createFromGlobals();

        if ($post->request->has('submit')) {
            $f_id = $post->request->get('name');

            return $this->redirect($this->generateUrl('default_show_department', array('f_id' => $f_id)));
        }
        return $this->render('BruvinskyHighschoolBundle:Default:showFaculty.html.twig', array(
            'entities' => $entities,
            'uni_id' => $uni_id
        ));

    }

    public function showDepartmentAction($f_id)
    {
        $sql = "SELECT ds.id as dsid, d.name as dname, s.name as sname
                FROM department d
                inner join faculty f on d.id_faculty = f.id
                inner join specialty s on s.id_faculty = f.id
                inner join department_specialty ds on ds.id_department = d.id and ds.id_specialty = s.id
                where f.id= :id";
        $params['id'] = $f_id;

        $em = $this->getDoctrine()->getManager();
        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute($params);
        $entities = $stmt->fetchAll();

        $post = Request::createFromGlobals();

        if ($post->request->has('submit')) {
            $ds_id = $post->request->get('name');

            $sql = "SELECT ds.id_department as ds_d, ds.id_specialty as ds_s
                FROM department_specialty ds
                where ds.id= :id";
            $params['id'] = $ds_id;

            $em = $this->getDoctrine()->getManager();
            $stmt = $em->getConnection()->prepare($sql);
            $stmt->execute($params);
            $data_id = $stmt->fetch();

            $ds_d = $data_id['ds_d'];
            $ds_s = $data_id['ds_s'];

            return $this->redirect($this->generateUrl('default_show_group', array('ds_d' => $ds_d,'ds_s' => $ds_s)));
        }
        return $this->render('BruvinskyHighschoolBundle:Default:showDepartment.html.twig', array(
            'entities' => $entities,
            'f_id' => $f_id
        ));

    }

    public function showGroupAction($ds_d, $ds_s)
    {
        $sql = "SELECT stg.id, stg.name FROM student_group stg where stg.id_specialty= :id_sp and stg.id_department= :id_d";
        $params['id_sp'] = $ds_s;
        $params['id_d'] = $ds_d;

        $em = $this->getDoctrine()->getManager();
        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute($params);
        $entities = $stmt->fetchAll();

        $post = Request::createFromGlobals();
        if ($post->request->has('submit')) {
            $g_id = $post->request->get('name');

            return $this->redirect($this->generateUrl('default_show_subject', array('g_id' => $g_id)));
        }
        return $this->render('BruvinskyHighschoolBundle:Default:showGroup.html.twig', array(
            'entities' => $entities,
            'ds_d' => $ds_d,
            'ds_s' => $ds_s
        ));

    }

    public function showSubjectAction($g_id)
    {
        $em = $this->getDoctrine()->getManager();

        $query = $em->getRepository('BruvinskyHighschoolBundle:Shedule')->findSheduleById_Group($g_id);

        $post = Request::createFromGlobals();

        if ($post->request->has('submit')) {
            $subject_id = $post->request->get('name');

            return $this->redirect($this->generateUrl('default_show_lessons', array('g_id' => $g_id,'s_id'=>$subject_id)));
        }

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $this->get('request')->query->get('page', 1),
            20
        );

        return $this->render('BruvinskyHighschoolBundle:Default:showSubject.html.twig', array(
            'pagination' => $pagination,
            'g_id' => $g_id
        ));

    }

    public function showLessonsAction($g_id, $s_id)
    {
        $em = $this->getDoctrine()->getManager();

        $sql = "SELECT sh.id id, sh.lesson_date lessondate, t.name tname  FROM shedule sh, teacher t where sh.id_group= :group_id and sh.id_subject = :subject_id and sh.id_teacher = t.id";
        $params['group_id'] = $g_id;
        $params['subject_id'] = $s_id;

        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute($params);

        $lessons = $stmt->fetchAll();

        foreach($lessons as $key => $value){
            $id[]=$value['id'];
            $lessonDate[]=$value['lessondate'];
            $tname[]=$value['tname'];
        }

        $sql = "SELECT s.name FROM student s where s.id_group= :group_id ";
        $paramsSt['group_id'] = $g_id;


        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute($paramsSt);
        $students = $stmt->fetchAll();

        $data = $em->getRepository('BruvinskyHighschoolBundle:Shedule')->findSheduleById_GroupId_Subject($g_id, $s_id);
        return $this->render('BruvinskyHighschoolBundle:Default:showLessons.html.twig', array(
            'id' => $id,
            'lessonDate' => $lessonDate,
            'tname' => $tname,
            'students'=>$students,
            'g_id' => $g_id,
            's_id' => $s_id,
            'data'=>$data
        ));

    }

}
