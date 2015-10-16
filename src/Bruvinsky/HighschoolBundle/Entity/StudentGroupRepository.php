<?php

namespace Bruvinsky\HighschoolBundle\Entity;

class StudentGroupRepository extends \Doctrine\ORM\EntityRepository
{
    public function findSheduleListingById($id_group)
    {
        $queryBuilder = $this->getEntityManager()->createQueryBuilder();
        $queryBuilder->select('s')
            ->from('BruvinskyHighschoolBundle:Shedule', 's')
            ->where('s.idGroupSh = :identifier')
            ->setParameter('identifier', $id_group);
        $lessons = $queryBuilder->getQuery()->getResult();
        return $lessons;
    }
}
