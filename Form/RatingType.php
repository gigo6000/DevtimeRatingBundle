<?php

namespace Devtime\RatingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class RatingType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {   
        $builder->add('rating');
        $builder->add('message', 'textarea');
    }   
}


