<?php

namespace Bruvinsky\HighschoolBundle\Entity;

/**
 * Curriculum
 */
class Curriculum
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $lecture;

    /**
     * @var string
     */
    private $practical;

    /**
     * @var string
     */
    private $lab;

    /**
     * @var string
     */
    private $exam;

    /**
     * @var string
     */
    private $semester;

    /**
     * @var string
     */
    private $test;

    /**
     * @var string
     */
    private $quiz;

    /**
     * @var \Bruvinsky\HighschoolBundle\Entity\Subject
     */
    private $idSubjectCur;

    /**
     * @var \Bruvinsky\HighschoolBundle\Entity\Specialty
     */
    private $idSpecialtyCur;


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
     * Set lecture
     *
     * @param string $lecture
     *
     * @return Curriculum
     */
    public function setLecture($lecture)
    {
        $this->lecture = $lecture;

        return $this;
    }

    /**
     * Get lecture
     *
     * @return string
     */
    public function getLecture()
    {
        return $this->lecture;
    }

    /**
     * Set practical
     *
     * @param string $practical
     *
     * @return Curriculum
     */
    public function setPractical($practical)
    {
        $this->practical = $practical;

        return $this;
    }

    /**
     * Get practical
     *
     * @return string
     */
    public function getPractical()
    {
        return $this->practical;
    }

    /**
     * Set lab
     *
     * @param string $lab
     *
     * @return Curriculum
     */
    public function setLab($lab)
    {
        $this->lab = $lab;

        return $this;
    }

    /**
     * Get lab
     *
     * @return string
     */
    public function getLab()
    {
        return $this->lab;
    }

    /**
     * Set exam
     *
     * @param string $exam
     *
     * @return Curriculum
     */
    public function setExam($exam)
    {
        $this->exam = $exam;

        return $this;
    }

    /**
     * Get exam
     *
     * @return string
     */
    public function getExam()
    {
        return $this->exam;
    }

    /**
     * Set semester
     *
     * @param string $semester
     *
     * @return Curriculum
     */
    public function setSemester($semester)
    {
        $this->semester = $semester;

        return $this;
    }

    /**
     * Get semester
     *
     * @return string
     */
    public function getSemester()
    {
        return $this->semester;
    }

    /**
     * Set test
     *
     * @param string $test
     *
     * @return Curriculum
     */
    public function setTest($test)
    {
        $this->test = $test;

        return $this;
    }

    /**
     * Get test
     *
     * @return string
     */
    public function getTest()
    {
        return $this->test;
    }

    /**
     * Set quiz
     *
     * @param string $quiz
     *
     * @return Curriculum
     */
    public function setQuiz($quiz)
    {
        $this->quiz = $quiz;

        return $this;
    }

    /**
     * Get quiz
     *
     * @return string
     */
    public function getQuiz()
    {
        return $this->quiz;
    }

    /**
     * Set idSubjectCur
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Subject $idSubjectCur
     *
     * @return Curriculum
     */
    public function setIdSubjectCur(\Bruvinsky\HighschoolBundle\Entity\Subject $idSubjectCur = null)
    {
        $this->idSubjectCur = $idSubjectCur;

        return $this;
    }

    /**
     * Get idSubjectCur
     *
     * @return \Bruvinsky\HighschoolBundle\Entity\Subject
     */
    public function getIdSubjectCur()
    {
        return $this->idSubjectCur;
    }

    /**
     * Set idSpecialtyCur
     *
     * @param \Bruvinsky\HighschoolBundle\Entity\Specialty $idSpecialtyCur
     *
     * @return Curriculum
     */
    public function setIdSpecialtyCur(\Bruvinsky\HighschoolBundle\Entity\Specialty $idSpecialtyCur = null)
    {
        $this->idSpecialtyCur = $idSpecialtyCur;

        return $this;
    }

    /**
     * Get idSpecialtyCur
     *
     * @return \Bruvinsky\HighschoolBundle\Entity\Specialty
     */
    public function getIdSpecialtyCur()
    {
        return $this->idSpecialtyCur;
    }

    public function __toString()
    {
        return $this->id;
    }
}
