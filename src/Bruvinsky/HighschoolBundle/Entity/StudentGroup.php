<?php

namespace Bruvinsky\HighschoolBundle\Entity;

/**
 * StudentGroup
 */
class StudentGroup
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \Bruvinsky\HighschoolBundle\Entity\Specialty
     */
    private $idSpecialtyStGr;

    /**
     * @var \Bruvinsky\HighschoolBundle\Entity\Department
     */
    private $idDepartmentStGr;


    /**
     * Get id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return StudentGroup
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set idSpecialtyStGr
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Specialty $idSpecialtyStGr
     *
     * @return StudentGroup
     */
    public function setIdSpecialtyStGr(\Bruvinsky\HighschoolBundle\Entity\Specialty $idSpecialtyStGr = null)
    {
        $this->idSpecialtyStGr = $idSpecialtyStGr;

        return $this;
    }

    /**
     * Get idSpecialtyStGr
     *
     * @return \Bruvinsky\HighschoolBundle\Entity\Specialty
     */
    public function getIdSpecialtyStGr()
    {
        return $this->idSpecialtyStGr;
    }

    /**
     * Set idDepartmentStGr
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Department $idDepartmentStGr
     *
     * @return StudentGroup
     */
    public function setIdDepartmentStGr(\Bruvinsky\HighschoolBundle\Entity\Department $idDepartmentStGr = null)
    {
        $this->idDepartmentStGr = $idDepartmentStGr;

        return $this;
    }

    /**
     * Get idDepartmentStGr
     *
     * @return \Bruvinsky\HighschoolBundle\Entity\Department
     */
    public function getIdDepartmentStGr()
    {
        return $this->idDepartmentStGr;
    }

    public function __toString()
    {
        return $this->name;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $students_g;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->students_g = new \Doctrine\Common\Collections\ArrayCollection();
        $this->shedules_stgr = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add studentsG
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Student $studentsG
     *
     * @return StudentGroup
     */
    public function addStudentsG(\Bruvinsky\HighschoolBundle\Entity\Student $studentsG)
    {
        $this->students_g[] = $studentsG;

        return $this;
    }

    /**
     * Remove studentsG
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Student $studentsG
     */
    public function removeStudentsG(\Bruvinsky\HighschoolBundle\Entity\Student $studentsG)
    {
        $this->students_g->removeElement($studentsG);
    }

    /**
     * Get studentsG
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStudentsG()
    {
        return $this->students_g;
    }

    private $shedules_stgr;

    public function addShedulesStgr(\Bruvinsky\HighschoolBundle\Entity\Student $ShedulesStgr)
    {
        $this->shedules_stgr[] = $ShedulesStgr;

        return $this;
    }

    public function removeShedulesStgr(\Bruvinsky\HighschoolBundle\Entity\Student $ShedulesStgr)
    {
        $this->shedules_stgr->removeElement($ShedulesStgr);
    }

    public function getShedulesStgr()
    {
        return $this->shedules_stgr;
    }

}
