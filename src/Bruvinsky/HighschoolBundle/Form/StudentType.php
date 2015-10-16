<?php

namespace Bruvinsky\HighschoolBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class StudentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',null, array('label'=>'Имя'))
            ->add('male',null, array('label'=>'Пол: 1 - мужской, 2 - женский'))
            ->add('old',null, array('label'=>'Возраст'))
            //->add('idGroupStudent',null, array('label'=>'Группа'))
            ->add('idGroupStudent', 'studentgroup_issue_selector', array('label'=>'Группа'))
            ->add('idCityStudent',null, array('label'=>'Город'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Bruvinsky\HighschoolBundle\Entity\Student'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bruvinsky_highschoolbundle_student';
    }
}
