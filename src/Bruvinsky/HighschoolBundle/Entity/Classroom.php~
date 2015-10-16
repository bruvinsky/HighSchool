<?php

namespace Bruvinsky\HighschoolBundle\Entity;

/**
 * Classroom
 */
class Classroom
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $nameNumber;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $shedules_class;

    /**
     * @var \Bruvinsky\HighschoolBundle\Entity\Uni
     */
    private $idUniClass;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->shedules_class = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set type
     *
     * @param string $type
     *
     * @return Classroom
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set nameNumber
     *
     * @param string $nameNumber
     *
     * @return Classroom
     */
    public function setNameNumber($nameNumber)
    {
        $this->nameNumber = $nameNumber;

        return $this;
    }

    /**
     * Get nameNumber
     *
     * @return string
     */
    public function getNameNumber()
    {
        return $this->nameNumber;
    }

    /**
     * Add shedulesClass
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Shedule $shedulesClass
     *
     * @return Classroom
     */
    public function addShedulesClass(\Bruvinsky\HighschoolBundle\Entity\Shedule $shedulesClass)
    {
        $this->shedules_class[] = $shedulesClass;

        return $this;
    }

    /**
     * Remove shedulesClass
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Shedule $shedulesClass
     */
    public function removeShedulesClass(\Bruvinsky\HighschoolBundle\Entity\Shedule $shedulesClass)
    {
        $this->shedules_class->removeElement($shedulesClass);
    }

    /**
     * Get shedulesClass
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getShedulesClass()
    {
        return $this->shedules_class;
    }

    /**
     * Set idUniClass
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Uni $idUniClass
     *
     * @return Classroom
     */
    public function setIdUniClass(\Bruvinsky\HighschoolBundle\Entity\Uni $idUniClass = null)
    {
        $this->idUniClass = $idUniClass;

        return $this;
    }

    /**
     * Get idUniClass
     *
     * @return \Bruvinsky\HighschoolBundle\Entity\Uni
     */
    public function getIdUniClass()
    {
        return $this->idUniClass;
    }

    public function __toString()
    {
        return $this->nameNumber;
    }
}
