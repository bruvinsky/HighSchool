<?php

namespace Bruvinsky\HighschoolBundle\Entity;

/**
 * Teacher
 */
class Teacher
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
    private $shedules_t;

    /**
     * @var \Bruvinsky\HighschoolBundle\Entity\Department
     */
    private $idDepartment;

    /**
     * @var \Bruvinsky\HighschoolBundle\Entity\Subject
     */
    private $idSubject;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->shedules_t = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Teacher
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
     * Add shedulesT
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Shedule $shedulesT
     *
     * @return Teacher
     */
    public function addShedulesT(\Bruvinsky\HighschoolBundle\Entity\Shedule $shedulesT)
    {
        $this->shedules_t[] = $shedulesT;

        return $this;
    }

    /**
     * Remove shedulesT
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Shedule $shedulesT
     */
    public function removeShedulesT(\Bruvinsky\HighschoolBundle\Entity\Shedule $shedulesT)
    {
        $this->shedules_t->removeElement($shedulesT);
    }

    /**
     * Get shedulesT
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getShedulesT()
    {
        return $this->shedules_t;
    }

    /**
     * Set idDepartment
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Department $idDepartment
     *
     * @return Teacher
     */
    public function setIdDepartment(\Bruvinsky\HighschoolBundle\Entity\Department $idDepartment = null)
    {
        $this->idDepartment = $idDepartment;

        return $this;
    }

    /**
     * Get idDepartment
     *
     * @return \Bruvinsky\HighschoolBundle\Entity\Department
     */
    public function getIdDepartment()
    {
        return $this->idDepartment;
    }

    /**
     * Set idSubject
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Subject $idSubject
     *
     * @return Teacher
     */
    public function setIdSubject(\Bruvinsky\HighschoolBundle\Entity\Subject $idSubject = null)
    {
        $this->idSubject = $idSubject;

        return $this;
    }

    /**
     * Get idSubject
     *
     * @return \Bruvinsky\HighschoolBundle\Entity\Subject
     */
    public function getIdSubject()
    {
        return $this->idSubject;
    }

    public function __toString()
    {
        return $this->name;
    }
}
