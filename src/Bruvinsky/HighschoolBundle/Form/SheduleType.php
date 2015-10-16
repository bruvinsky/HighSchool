<?php

namespace Bruvinsky\HighschoolBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

//use Symfony\Component\Form\FormEvent;
//use Symfony\Component\Form\FormEvents;

use Bruvinsky\HighschoolBundle\Form\DataTransformer\SubjectToNumberTransformer;
use Doctrine\Common\Persistence\ObjectManager;

class SheduleType extends AbstractType
{

    private $manager;

    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idSubjectSh', 'subject_issue_selector', array('label'=>'Предмет'))
            ->add('idTeacherSh', 'teacher_issue_selector', array('label'=>'Преподаватель'))
            ->add('idGroupSh', 'studentgroup_issue_selector', array('label'=>'Группа'))
            ->add('idClassroomSh', 'classroom_issue_selector', array('label'=>'Аудитория'))
//            ->add('typeLesson')
//            ->add('oddEven')
//            ->add('weekday')
//            ->add('ntt')
            ->add('lessonDate')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Bruvinsky\HighschoolBundle\Entity\Shedule'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bruvinsky_highschoolbundle_shedule';
    }
}
