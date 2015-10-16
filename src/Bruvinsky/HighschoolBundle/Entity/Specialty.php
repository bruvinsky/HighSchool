<?php

namespace Bruvinsky\HighschoolBundle\Entity;

/**
 * Specialty
 */
class Specialty
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
    private $studentsgroups_s;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $specialty_cur;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $DS_s;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->studentsgroups_s = new \Doctrine\Common\Collections\ArrayCollection();
        $this->specialty_cur = new \Doctrine\Common\Collections\ArrayCollection();
        $this->DS_s = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Specialty
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
     * Add studentsgroupsS
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\StudentGroup $studentsgroupsS
     *
     * @return Specialty
     */
    public function addStudentsgroupsS(\Bruvinsky\HighschoolBundle\Entity\StudentGroup $studentsgroupsS)
    {
        $this->studentsgroups_s[] = $studentsgroupsS;

        return $this;
    }

    /**
     * Remove studentsgroupsS
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\StudentGroup $studentsgroupsS
     */
    public function removeStudentsgroupsS(\Bruvinsky\HighschoolBundle\Entity\StudentGroup $studentsgroupsS)
    {
        $this->studentsgroups_s->removeElement($studentsgroupsS);
    }

    /**
     * Get studentsgroupsS
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStudentsgroupsS()
    {
        return $this->studentsgroups_s;
    }

    /**
     * Add specialtyCur
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Curriculum $specialtyCur
     *
     * @return Specialty
     */
    public function addSpecialtyCur(\Bruvinsky\HighschoolBundle\Entity\Curriculum $specialtyCur)
    {
        $this->specialty_cur[] = $specialtyCur;

        return $this;
    }

    /**
     * Remove specialtyCur
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Curriculum $specialtyCur
     */
    public function removeSpecialtyCur(\Bruvinsky\HighschoolBundle\Entity\Curriculum $specialtyCur)
    {
        $this->specialty_cur->removeElement($specialtyCur);
    }

    /**
     * Get specialtyCur
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSpecialtyCur()
    {
        return $this->specialty_cur;
    }

    /**
     * Add dSS
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\DepartmentSpecialty $dSS
     *
     * @return Specialty
     */
    public function addDSS(\Bruvinsky\HighschoolBundle\Entity\DepartmentSpecialty $dSS)
    {
        $this->DS_s[] = $dSS;

        return $this;
    }

    /**
     * Remove dSS
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\DepartmentSpecialty $dSS
     */
    public function removeDSS(\Bruvinsky\HighschoolBundle\Entity\DepartmentSpecialty $dSS)
    {
        $this->DS_s->removeElement($dSS);
    }

    /**
     * Get dSS
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDSS()
    {
        return $this->DS_s;
    }

    public function __toString()
    {
        return $this->name;
    }
    /**
     * @var \Bruvinsky\HighschoolBundle\Entity\Faculty
     */
    private $idFacultySpecialty;


    /**
     * Set idFacultySpecialty
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Faculty $idFacultySpecialty
     *
     * @return Specialty
     */
    public function setIdFacultySpecialty(\Bruvinsky\HighschoolBundle\Entity\Faculty $idFacultySpecialty = null)
    {
        $this->idFacultySpecialty = $idFacultySpecialty;

        return $this;
    }

    /**
     * Get idFacultySpecialty
     *
     * @return \Bruvinsky\HighschoolBundle\Entity\Faculty
     */
    public function getIdFacultySpecialty()
    {
        return $this->idFacultySpecialty;
    }
}
