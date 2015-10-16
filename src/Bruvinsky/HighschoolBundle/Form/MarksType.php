<?php

namespace Bruvinsky\HighschoolBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MarksType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idStudentM', 'student_issue_selector', array('label'=>'Студент'))
            ->add('idSheduleM', 'shedule_issue_selector', array('label'=>'Занятие'))
            ->add('mark',null, array('label'=>'Оценка'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Bruvinsky\HighschoolBundle\Entity\Marks'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bruvinsky_highschoolbundle_marks';
    }
}
