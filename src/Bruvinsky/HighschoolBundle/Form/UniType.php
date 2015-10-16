<?php

namespace Bruvinsky\HighschoolBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UniType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',null, array('label'=>'Название ВУЗа','attr' => array('size'=>80)))
            ->add('idCityUni', null, array('label'=>'Местонахождение'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Bruvinsky\HighschoolBundle\Entity\Uni'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bruvinsky_highschoolbundle_uni';
    }
}
