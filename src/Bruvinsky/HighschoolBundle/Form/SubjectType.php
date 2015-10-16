<?php

namespace Bruvinsky\HighschoolBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

//use Symfony\Component\Form\FormEvent;
//use Symfony\Component\Form\FormEvents;

class SubjectType extends AbstractType
{
//    private $choiceList;
//
//    public function __construct($choiceList)
//    {
//        // the constructor requires a choice list, which will be the current articles selected users
//        $this->choiceList = $choiceList;
//    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Bruvinsky\HighschoolBundle\Entity\Subject'
        ));
//        $params = [
//            'class' => 'Bruvinsky\HighschoolBundle\Entity\Subject',
//            'compound' => true,
//            'multiple' => true,
//            'expanded' => true,
//            'property' => 'name',
//        ];
//        if (!empty($this->choiceList['documentList'])) {
//            // this is used in form "show" mode
//            $params['choices'] = $this->choiceList;
//        } elseif (!empty($this->choiceList['idList'])) {
//            // this is used on the form validation
//            $idList = $this->choiceList['idList'];
//            $params['query_builder'] = function ($repo) use ($idList) {
//                return $repo->createQueryBuilder()
//                    ->field('id')->in($idList);
//            };
//        } else {
//            #$params['choices'] = [];
//        }
//        $resolver->setDefaults($params);
    }

//    public function getParent()
//    {
//        return 'entity'; // or document on doctrine mongo document or probably what you want
//    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bruvinsky_highschoolbundle_subject';
    }


}
