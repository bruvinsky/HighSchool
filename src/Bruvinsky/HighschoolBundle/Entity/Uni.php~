<?php

namespace Bruvinsky\HighschoolBundle\Entity;

/**
 * Uni
 */
class Uni
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
    private $classrooms;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $faculties_u;

    /**
     * @var \Bruvinsky\HighschoolBundle\Entity\City
     */
    private $idCityUni;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->classrooms = new \Doctrine\Common\Collections\ArrayCollection();
        $this->faculties_u = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Uni
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
     * Add classroom
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Classroom $classroom
     *
     * @return Uni
     */
    public function addClassroom(\Bruvinsky\HighschoolBundle\Entity\Classroom $classroom)
    {
        $this->classrooms[] = $classroom;

        return $this;
    }

    /**
     * Remove classroom
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Classroom $classroom
     */
    public function removeClassroom(\Bruvinsky\HighschoolBundle\Entity\Classroom $classroom)
    {
        $this->classrooms->removeElement($classroom);
    }

    /**
     * Get classrooms
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClassrooms()
    {
        return $this->classrooms;
    }

    /**
     * Add facultiesU
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Faculty $facultiesU
     *
     * @return Uni
     */
    public function addFacultiesU(\Bruvinsky\HighschoolBundle\Entity\Faculty $facultiesU)
    {
        $this->faculties_u[] = $facultiesU;

        return $this;
    }

    /**
     * Remove facultiesU
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Faculty $facultiesU
     */
    public function removeFacultiesU(\Bruvinsky\HighschoolBundle\Entity\Faculty $facultiesU)
    {
        $this->faculties_u->removeElement($facultiesU);
    }

    /**
     * Get facultiesU
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFacultiesU()
    {
        return $this->faculties_u;
    }

    /**
     * Set idCityUni
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\City $idCityUni
     *
     * @return Uni
     */
    public function setIdCityUni(\Bruvinsky\HighschoolBundle\Entity\City $idCityUni = null)
    {
        $this->idCityUni = $idCityUni;

        return $this;
    }

    /**
     * Get idCityUni
     *
     * @return \Bruvinsky\HighschoolBundle\Entity\City
     */
    public function getIdCityUni()
    {
        return $this->idCityUni;
    }

    public function __toString()
    {
        return $this->name;
    }
}
