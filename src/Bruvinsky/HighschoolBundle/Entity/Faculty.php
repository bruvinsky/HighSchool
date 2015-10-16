<?php

namespace Bruvinsky\HighschoolBundle\Entity;

/**
 * Faculty
 */
class Faculty
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
    private $departments;

    /**
     * @var \Bruvinsky\HighschoolBundle\Entity\Uni
     */
    private $idUni;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->departments = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Faculty
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
     * Add department
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Department $department
     *
     * @return Faculty
     */
    public function addDepartment(\Bruvinsky\HighschoolBundle\Entity\Department $department)
    {
        $this->departments[] = $department;

        return $this;
    }

    /**
     * Remove department
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Department $department
     */
    public function removeDepartment(\Bruvinsky\HighschoolBundle\Entity\Department $department)
    {
        $this->departments->removeElement($department);
    }

    /**
     * Get departments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDepartments()
    {
        return $this->departments;
    }

    /**
     * Set idUni
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Uni $idUni
     *
     * @return Faculty
     */
    public function setIdUni(\Bruvinsky\HighschoolBundle\Entity\Uni $idUni = null)
    {
        $this->idUni = $idUni;

        return $this;
    }

    /**
     * Get idUni
     *
     * @return \Bruvinsky\HighschoolBundle\Entity\Uni
     */
    public function getIdUni()
    {
        return $this->idUni;
    }

    public function __toString()
    {
        return $this->name . ", " . $this->idUni;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $specialties_f;


    /**
     * Add specialtiesF
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Specialty $specialtiesF
     *
     * @return Faculty
     */
    public function addSpecialtiesF(\Bruvinsky\HighschoolBundle\Entity\Specialty $specialtiesF)
    {
        $this->specialties_f[] = $specialtiesF;

        return $this;
    }

    /**
     * Remove specialtiesF
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Specialty $specialtiesF
     */
    public function removeSpecialtiesF(\Bruvinsky\HighschoolBundle\Entity\Specialty $specialtiesF)
    {
        $this->specialties_f->removeElement($specialtiesF);
    }

    /**
     * Get specialtiesF
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSpecialtiesF()
    {
        return $this->specialties_f;
    }
}
