<?php

namespace Bruvinsky\HighschoolBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DepartmentSpecialtyType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idDepartmentDS',null, array('label'=>'Кафедра'))
            ->add('idSpecialtyDS',null, array('label'=>'Специальность'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Bruvinsky\HighschoolBundle\Entity\DepartmentSpecialty'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bruvinsky_highschoolbundle_departmentspecialty';
    }
}
