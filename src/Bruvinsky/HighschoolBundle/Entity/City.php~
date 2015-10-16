<?php

namespace Bruvinsky\HighschoolBundle\Entity;

/**
 * City
 */
class City
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
    private $phoneCode;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $uniescities;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $studentscities;

    /**
     * @var \Bruvinsky\HighschoolBundle\Entity\Region
     */
    private $idRegion;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->uniescities = new \Doctrine\Common\Collections\ArrayCollection();
        $this->studentscities = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return City
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
     * Set phoneCode
     *
     * @param string $phoneCode
     *
     * @return City
     */
    public function setPhoneCode($phoneCode)
    {
        $this->phoneCode = $phoneCode;

        return $this;
    }

    /**
     * Get phoneCode
     *
     * @return string
     */
    public function getPhoneCode()
    {
        return $this->phoneCode;
    }

    /**
     * Add uniescity
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Uni $uniescity
     *
     * @return City
     */
    public function addUniescity(\Bruvinsky\HighschoolBundle\Entity\Uni $uniescity)
    {
        $this->uniescities[] = $uniescity;

        return $this;
    }

    /**
     * Remove uniescity
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Uni $uniescity
     */
    public function removeUniescity(\Bruvinsky\HighschoolBundle\Entity\Uni $uniescity)
    {
        $this->uniescities->removeElement($uniescity);
    }

    /**
     * Get uniescities
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUniescities()
    {
        return $this->uniescities;
    }

    /**
     * Add studentscity
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Student $studentscity
     *
     * @return City
     */
    public function addStudentscity(\Bruvinsky\HighschoolBundle\Entity\Student $studentscity)
    {
        $this->studentscities[] = $studentscity;

        return $this;
    }

    /**
     * Remove studentscity
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Student $studentscity
     */
    public function removeStudentscity(\Bruvinsky\HighschoolBundle\Entity\Student $studentscity)
    {
        $this->studentscities->removeElement($studentscity);
    }

    /**
     * Get studentscities
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStudentscities()
    {
        return $this->studentscities;
    }

    /**
     * Set idRegion
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Region $idRegion
     *
     * @return City
     */
    public function setIdRegion(\Bruvinsky\HighschoolBundle\Entity\Region $idRegion = null)
    {
        $this->idRegion = $idRegion;

        return $this;
    }

    /**
     * Get idRegion
     *
     * @return \Bruvinsky\HighschoolBundle\Entity\Region
     */
    public function getIdRegion()
    {
        return $this->idRegion;
    }

    public function __toString()
    {
        return $this->name . ", " . $this->idRegion;
    }
}
