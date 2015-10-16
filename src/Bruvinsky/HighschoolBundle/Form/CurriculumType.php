<?php

namespace Bruvinsky\HighschoolBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CurriculumType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lecture',null, array('label'=>'Лекции, ч.'))
            ->add('practical',null, array('label'=>'Практические, ч.'))
            ->add('lab',null, array('label'=>'Лабораторные, ч.'))
            ->add('exam',null, array('label'=>'Экзамены, ед.'))
            ->add('semester',null, array('label'=>'Семестры, ед.'))
            ->add('test',null, array('label'=>'Контрольные, ед.'))
            ->add('quiz',null, array('label'=>'Колоквиумы, ед.'))
            ->add('idSpecialtyCur',null, array('label'=>'Специальность'))
            ->add('idSubjectCur',null, array('label'=>'Предмет'))

        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Bruvinsky\HighschoolBundle\Entity\Curriculum'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bruvinsky_highschoolbundle_curriculum';
    }
}
