<?php
namespace Bruvinsky\HighschoolBundle\Form;

use Bruvinsky\HighschoolBundle\Form\DataTransformer\ClassroomToNumberTransformer;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClassroomSelectorType extends AbstractType
{
    private $manager;

    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $transformer = new ClassroomToNumberTransformer($this->manager);
        $builder->addModelTransformer($transformer);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'invalid_message' => 'The selected issue does not exist',
        ));
    }

    public function getParent()
    {
        return 'text';
    }

    public function getName()
    {
        return 'classroom_issue_selector';
    }
}