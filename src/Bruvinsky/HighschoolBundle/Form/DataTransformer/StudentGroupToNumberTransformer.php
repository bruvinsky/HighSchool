<?php

namespace Bruvinsky\HighschoolBundle\Form\DataTransformer;

use Bruvinsky\HighschoolBundle\Entity\StudentGroup;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class StudentGroupToNumberTransformer implements DataTransformerInterface
{
    private $manager;

    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * Transforms an object (issue) to a string (number).
     *
     * @param  Issue|null $issue
     * @return string
     */
    public function transform($issue)
    {
        if (null === $issue) {
            return '';
        }

        return $issue->getId();
    }

    /**
     * Transforms a string (number) to an object (issue).
     *
     * @param  string $issueNumber
     * @return Issue|null
     * @throws TransformationFailedException if object (issue) is not found.
     */
    public function reverseTransform($issueNumber)
    {
        if (!$issueNumber) {
            return;
        }

        $issue = $this->manager
            ->getRepository('BruvinskyHighschoolBundle:StudentGroup')
            ->find($issueNumber);

        if (null === $issue) {
            throw new TransformationFailedException(sprintf(
                'A student group with number "%s" does not exist!',
                $issueNumber
            ));
        }

        return $issue;
    }
}