<?php

namespace Bruvinsky\HighschoolBundle\Entity;

/**
 * Department
 */
class Department
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $teachers_d;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $studentsgroups_d;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $DS_d;

    /**
     * @var \Bruvinsky\HighschoolBundle\Entity\Faculty
     */
    private $idFacultyD;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->teachers_d = new \Doctrine\Common\Collections\ArrayCollection();
        $this->studentsgroups_d = new \Doctrine\Common\Collections\ArrayCollection();
        $this->DS_d = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * @return Department
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
     * Add teachersD
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Teacher $teachersD
     *
     * @return Department
     */
    public function addTeachersD(\Bruvinsky\HighschoolBundle\Entity\Teacher $teachersD)
    {
        $this->teachers_d[] = $teachersD;

        return $this;
    }

    /**
     * Remove teachersD
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Teacher $teachersD
     */
    public function removeTeachersD(\Bruvinsky\HighschoolBundle\Entity\Teacher $teachersD)
    {
        $this->teachers_d->removeElement($teachersD);
    }

    /**
     * Get teachersD
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTeachersD()
    {
        return $this->teachers_d;
    }

    /**
     * Add studentsgroupsD
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\StudentGroup $studentsgroupsD
     *
     * @return Department
     */
    public function addStudentsgroupsD(\Bruvinsky\HighschoolBundle\Entity\StudentGroup $studentsgroupsD)
    {
        $this->studentsgroups_d[] = $studentsgroupsD;

        return $this;
    }

    /**
     * Remove studentsgroupsD
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\StudentGroup $studentsgroupsD
     */
    public function removeStudentsgroupsD(\Bruvinsky\HighschoolBundle\Entity\StudentGroup $studentsgroupsD)
    {
        $this->studentsgroups_d->removeElement($studentsgroupsD);
    }

    /**
     * Get studentsgroupsD
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStudentsgroupsD()
    {
        return $this->studentsgroups_d;
    }

    /**
     * Add dSD
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\DepartmentSpecialty $dSD
     *
     * @return Department
     */
    public function addDSD(\Bruvinsky\HighschoolBundle\Entity\DepartmentSpecialty $dSD)
    {
        $this->DS_d[] = $dSD;

        return $this;
    }

    /**
     * Remove dSD
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\DepartmentSpecialty $dSD
     */
    public function removeDSD(\Bruvinsky\HighschoolBundle\Entity\DepartmentSpecialty $dSD)
    {
        $this->DS_d->removeElement($dSD);
    }

    /**
     * Get dSD
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDSD()
    {
        return $this->DS_d;
    }

    /**
     * Set idFacultyD
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Faculty $idFacultyD
     *
     * @return Department
     */
    public function setIdFacultyD(\Bruvinsky\HighschoolBundle\Entity\Faculty $idFacultyD = null)
    {
        $this->idFacultyD = $idFacultyD;

        return $this;
    }

    /**
     * Get idFacultyD
     *
     * @return \Bruvinsky\HighschoolBundle\Entity\Faculty
     */
    public function getIdFacultyD()
    {
        return $this->idFacultyD;
    }

    public function __toString()
    {
        return $this->name;
    }
}
