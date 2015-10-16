<?php

namespace Bruvinsky\HighschoolBundle\Entity;

/**
 * Subject
 */
class Subject
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
    private $teacher_s;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $shedules_sub;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $subject_cur;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->teacher_s = new \Doctrine\Common\Collections\ArrayCollection();
        $this->shedules_sub = new \Doctrine\Common\Collections\ArrayCollection();
        $this->subject_cur = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Subject
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
     * Add teacher
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Teacher $teacher
     *
     * @return Subject
     */
    public function addTeacher(\Bruvinsky\HighschoolBundle\Entity\Teacher $teacher)
    {
        $this->teacher_s[] = $teacher;

        return $this;
    }

    /**
     * Remove teacher
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Teacher $teacher
     */
    public function removeTeacher(\Bruvinsky\HighschoolBundle\Entity\Teacher $teacher)
    {
        $this->teacher_s->removeElement($teacher);
    }

    /**
     * Get teacherS
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTeacherS()
    {
        return $this->teacher_s;
    }

    /**
     * Add shedulesSub
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Shedule $shedulesSub
     *
     * @return Subject
     */
    public function addShedulesSub(\Bruvinsky\HighschoolBundle\Entity\Shedule $shedulesSub)
    {
        $this->shedules_sub[] = $shedulesSub;

        return $this;
    }

    /**
     * Remove shedulesSub
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Shedule $shedulesSub
     */
    public function removeShedulesSub(\Bruvinsky\HighschoolBundle\Entity\Shedule $shedulesSub)
    {
        $this->shedules_sub->removeElement($shedulesSub);
    }

    /**
     * Get shedulesSub
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getShedulesSub()
    {
        return $this->shedules_sub;
    }

    /**
     * Add subjectCur
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Curriculum $subjectCur
     *
     * @return Subject
     */
    public function addSubjectCur(\Bruvinsky\HighschoolBundle\Entity\Curriculum $subjectCur)
    {
        $this->subject_cur[] = $subjectCur;

        return $this;
    }

    /**
     * Remove subjectCur
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Curriculum $subjectCur
     */
    public function removeSubjectCur(\Bruvinsky\HighschoolBundle\Entity\Curriculum $subjectCur)
    {
        $this->subject_cur->removeElement($subjectCur);
    }

    /**
     * Get subjectCur
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSubjectCur()
    {
        return $this->subject_cur;
    }

    public function __toString()
    {
        return $this->name;
    }
}
