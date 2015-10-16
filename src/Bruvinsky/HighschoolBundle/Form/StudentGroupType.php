<?php

namespace Bruvinsky\HighschoolBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class StudentGroupType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',null, array('label'=>'Название'))
            ->add('idDepartmentStGr',null, array('label'=>'Кафедра'))
            ->add('idSpecialtyStGr',null, array('label'=>'Специальность'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Bruvinsky\HighschoolBundle\Entity\StudentGroup'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bruvinsky_highschoolbundle_studentgroup';
    }
}
