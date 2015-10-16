<?php

namespace Bruvinsky\HighschoolBundle\Entity;

/**
 * Marks
 */
class Marks
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $mark;

    /**
     * @var \Bruvinsky\HighschoolBundle\Entity\Student
     */
    private $idStudentM;

    /**
     * @var \Bruvinsky\HighschoolBundle\Entity\Shedule
     */
    private $idSheduleM;


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
     * Set mark
     *
     * @param string $mark
     *
     * @return Marks
     */
    public function setMark($mark)
    {
        $this->mark = $mark;

        return $this;
    }

    /**
     * Get mark
     *
     * @return string
     */
    public function getMark()
    {
        return $this->mark;
    }

    /**
     * Set idStudentM
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Student $idStudentM
     *
     * @return Marks
     */
    public function setIdStudentM(\Bruvinsky\HighschoolBundle\Entity\Student $idStudentM = null)
    {
        $this->idStudentM = $idStudentM;

        return $this;
    }

    /**
     * Get idStudentM
     *
     * @return \Bruvinsky\HighschoolBundle\Entity\Student
     */
    public function getIdStudentM()
    {
        return $this->idStudentM;
    }

    /**
     * Set idSheduleM
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Shedule $idSheduleM
     *
     * @return Marks
     */
    public function setIdSheduleM(\Bruvinsky\HighschoolBundle\Entity\Shedule $idSheduleM = null)
    {
        $this->idSheduleM = $idSheduleM;

        return $this;
    }

    /**
     * Get idSheduleM
     *
     * @return \Bruvinsky\HighschoolBundle\Entity\Shedule
     */
    public function getIdSheduleM()
    {
        return $this->idSheduleM;
    }

    public function __toString()
    {
        return $this->mark;
    }
}
