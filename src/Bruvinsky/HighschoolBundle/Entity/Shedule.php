<?php

namespace Bruvinsky\HighschoolBundle\Entity;

/**
 * Shedule
 */
class Shedule
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $typeLesson;

    /**
     * @var string
     */
    private $oddEven;

    /**
     * @var string
     */
    private $weekday;

    /**
     * @var string
     */
    private $ntt;

    /**
     * @var \DateTime
     */
    private $lessonDate;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $marks_sh;

    /**
     * @var \Bruvinsky\HighschoolBundle\Entity\Teacher
     */
    private $idTeacherSh;

    /**
     * @var \Bruvinsky\HighschoolBundle\Entity\StudentGroup
     */
    private $idGroupSh;

    /**
     * @var \Bruvinsky\HighschoolBundle\Entity\Classroom
     */
    private $idClassroomSh;

    /**
     * @var \Bruvinsky\HighschoolBundle\Entity\Subject
     */
    private $idSubjectSh;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->marks_sh = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set typeLesson
     *
     * @param string $typeLesson
     *
     * @return Shedule
     */
    public function setTypeLesson($typeLesson)
    {
        $this->typeLesson = $typeLesson;

        return $this;
    }

    /**
     * Get typeLesson
     *
     * @return string
     */
    public function getTypeLesson()
    {
        return $this->typeLesson;
    }

    /**
     * Set oddEven
     *
     * @param string $oddEven
     *
     * @return Shedule
     */
    public function setOddEven($oddEven)
    {
        $this->oddEven = $oddEven;

        return $this;
    }

    /**
     * Get oddEven
     *
     * @return string
     */
    public function getOddEven()
    {
        return $this->oddEven;
    }

    /**
     * Set weekday
     *
     * @param string $weekday
     *
     * @return Shedule
     */
    public function setWeekday($weekday)
    {
        $this->weekday = $weekday;

        return $this;
    }

    /**
     * Get weekday
     *
     * @return string
     */
    public function getWeekday()
    {
        return $this->weekday;
    }

    /**
     * Set ntt
     *
     * @param string $ntt
     *
     * @return Shedule
     */
    public function setNtt($ntt)
    {
        $this->ntt = $ntt;

        return $this;
    }

    /**
     * Get ntt
     *
     * @return string
     */
    public function getNtt()
    {
        return $this->ntt;
    }

    /**
     * Set lessonDate
     *
     * @param \DateTime $lessonDate
     *
     * @return Shedule
     */
    public function setLessonDate($lessonDate)
    {
        $this->lessonDate = $lessonDate;

        return $this;
    }

    /**
     * Get lessonDate
     *
     * @return \DateTime
     */
    public function getLessonDate()
    {
        return $this->lessonDate;
    }

    /**
     * Add marksSh
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Marks $marksSh
     *
     * @return Shedule
     */
    public function addMarksSh(\Bruvinsky\HighschoolBundle\Entity\Marks $marksSh)
    {
        $this->marks_sh[] = $marksSh;

        return $this;
    }

    /**
     * Remove marksSh
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Marks $marksSh
     */
    public function removeMarksSh(\Bruvinsky\HighschoolBundle\Entity\Marks $marksSh)
    {
        $this->marks_sh->removeElement($marksSh);
    }

    /**
     * Get marksSh
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMarksSh()
    {
        return $this->marks_sh;
    }

    /**
     * Set idTeacherSh
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Teacher $idTeacherSh
     *
     * @return Shedule
     */
    public function setIdTeacherSh(\Bruvinsky\HighschoolBundle\Entity\Teacher $idTeacherSh = null)
    {
        $this->idTeacherSh = $idTeacherSh;

        return $this;
    }

    /**
     * Get idTeacherSh
     *
     * @return \Bruvinsky\HighschoolBundle\Entity\Teacher
     */
    public function getIdTeacherSh()
    {
        return $this->idTeacherSh;
    }

    /**
     * Set idGroupSh
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\StudentGroup $idGroupSh
     *
     * @return Shedule
     */
    public function setIdGroupSh(\Bruvinsky\HighschoolBundle\Entity\StudentGroup $idGroupSh = null)
    {
        $this->idGroupSh = $idGroupSh;

        return $this;
    }

    /**
     * Get idGroupSh
     *
     * @return \Bruvinsky\HighschoolBundle\Entity\StudentGroup
     */
    public function getIdGroupSh()
    {
        return $this->idGroupSh;
    }

    /**
     * Set idClassroomSh
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Classroom $idClassroomSh
     *
     * @return Shedule
     */
    public function setIdClassroomSh(\Bruvinsky\HighschoolBundle\Entity\Classroom $idClassroomSh = null)
    {
        $this->idClassroomSh = $idClassroomSh;

        return $this;
    }

    /**
     * Get idClassroomSh
     *
     * @return \Bruvinsky\HighschoolBundle\Entity\Classroom
     */
    public function getIdClassroomSh()
    {
        return $this->idClassroomSh;
    }

    /**
     * Set idSubjectSh
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Subject $idSubjectSh
     *
     * @return Shedule
     */
    public function setIdSubjectSh(\Bruvinsky\HighschoolBundle\Entity\Subject $idSubjectSh = null)
    {
        $this->idSubjectSh = $idSubjectSh;

        return $this;
    }

    /**
     * Get idSubjectSh
     *
     * @return \Bruvinsky\HighschoolBundle\Entity\Subject
     */
    public function getIdSubjectSh()
    {
        return $this->idSubjectSh;
    }

    public function __toString()
    {
        return $this->id;
    }
}
