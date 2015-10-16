<?php

namespace Bruvinsky\HighschoolBundle\Entity;

class SheduleRepository extends \Doctrine\ORM\EntityRepository
{
    public function findSheduleALL()
    {
        $connection = $this->getEntityManager()->getConnection();
        $sql = "select id, id_teacher, id_subject, lesson_date from shedule";
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $lessons = $stmt->fetchAll();

        return $lessons;
    }



    public function findSheduleById_Group($id_group)
    {
        $queryBuilder = $this->getEntityManager()->createQueryBuilder();

        $queryBuilder->select('s')
            ->from('BruvinskyHighschoolBundle:Shedule', 's')
            ->where('s.idGroupSh = :identifier')
            ->setParameter('identifier', $id_group);
        $lessons = $queryBuilder->getQuery()->getResult();

        return $lessons;
    }

    public function findSheduleById_GroupId_Subject($id_group, $id_subject)
    {
        $connection = $this->getEntityManager()->getConnection();
        $sql = "SELECT sh.id id, sh.lesson_date lessondate, t.name tname, m.mark mmark, a.id_student astudent, st.name stname
                FROM shedule sh
                inner join teacher t on sh.id_teacher = t.id
                left join marks m on m.id_shedule = sh.id
                left join absent a on a.id_shedule = sh.id
                inner join student st on st.id = m.id_student or st.id = a.id_student
                WHERE sh.id_group = :id_group and sh.id_subject = :id_subject";
        $params['id_group'] = $id_group;
        $params['id_subject'] = $id_subject;

        $stmt = $connection->prepare($sql);
        $stmt->execute($params);

        $data = $stmt->fetchAll();

        return $data;
    }

    public function findMarksById($id)
    {
        $connection = $this->getEntityManager()->getConnection();
        $sql = "SELECT *
                FROM
                (SELECT * FROM marks WHERE id_shedule = :id) m
                RIGHT JOIN
                (SELECT * FROM student st WHERE id_group = (SELECT id_group FROM shedule WHERE id = :id)) st
                ON m.id_student = st.id
                ";
        $params['id'] = $id;

        $stmt = $connection->prepare($sql);
        $stmt->execute($params);

        $data = $stmt->fetchAll();

        return $data;
    }
}
