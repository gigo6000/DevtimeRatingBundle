<?php

namespace Devtime\RatingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ReviewType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('rating', 'rating')
            ->add('comment')
        ;
    }

    public function getName()
    {
        return 'devtime_ratingbundle_reviewtype';
    }
}
