<?php

namespace Bruvinsky\HighschoolBundle\Entity;

/**
 * Student
 */
class Student
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
     * @var string
     */
    private $male;

    /**
     * @var string
     */
    private $old;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $marks_s;

    /**
     * @var \Bruvinsky\HighschoolBundle\Entity\StudentGroup
     */
    private $idGroupStudent;

    /**
     * @var \Bruvinsky\HighschoolBundle\Entity\City
     */
    private $idCityStudent;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->marks_s = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Student
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
     * Set male
     *
     * @param string $male
     *
     * @return Student
     */
    public function setMale($male)
    {
        $this->male = $male;

        return $this;
    }

    /**
     * Get male
     *
     * @return string
     */
    public function getMale()
    {
        return $this->male;
    }

    /**
     * Set old
     *
     * @param string $old
     *
     * @return Student
     */
    public function setOld($old)
    {
        $this->old = $old;

        return $this;
    }

    /**
     * Get old
     *
     * @return string
     */
    public function getOld()
    {
        return $this->old;
    }

    /**
     * Add marksS
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Marks $marksS
     *
     * @return Student
     */
    public function addMarksS(\Bruvinsky\HighschoolBundle\Entity\Marks $marksS)
    {
        $this->marks_s[] = $marksS;

        return $this;
    }

    /**
     * Remove marksS
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Marks $marksS
     */
    public function removeMarksS(\Bruvinsky\HighschoolBundle\Entity\Marks $marksS)
    {
        $this->marks_s->removeElement($marksS);
    }

    /**
     * Get marksS
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMarksS()
    {
        return $this->marks_s;
    }

    /**
     * Set idGroupStudent
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\StudentGroup $idGroupStudent
     *
     * @return Student
     */
    public function setIdGroupStudent(\Bruvinsky\HighschoolBundle\Entity\StudentGroup $idGroupStudent = null)
    {
        $this->idGroupStudent = $idGroupStudent;

        return $this;
    }

    /**
     * Get idGroupStudent
     *
     * @return \Bruvinsky\HighschoolBundle\Entity\StudentGroup
     */
    public function getIdGroupStudent()
    {
        return $this->idGroupStudent;
    }

    /**
     * Set idCityStudent
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\City $idCityStudent
     *
     * @return Student
     */
    public function setIdCityStudent(\Bruvinsky\HighschoolBundle\Entity\City $idCityStudent = null)
    {
        $this->idCityStudent = $idCityStudent;

        return $this;
    }

    /**
     * Get idCityStudent
     *
     * @return \Bruvinsky\HighschoolBundle\Entity\City
     */
    public function getIdCityStudent()
    {
        return $this->idCityStudent;
    }

    public function __toString()
    {
        return $this->name;
    }
}
