<?php

namespace Devtime\RatingBundle\Form\Extension\Type;
 
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
 
 
class RatingType extends IntegerType 
{

    /** 
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form)
    {   
        $view
            ->set('number', $form->getAttribute('number'))
            ->set('readonly', $form->getAttribute('readonly'))
            ->set('path', $form->getAttribute('path'))
            ->set('hintList', $form->getAttribute('hintList'))
            ->set('targetKeep', $form->getAttribute('targetKeep'))
            ->set('targetType', $form->getAttribute('targetType'))


        ;   
    } 


    /** 
     * {@inheritdoc}
     */
 
    public function buildForm(FormBuilder $builder, array $options) {

        $number = $options['number'];
        $readonly = $options['readonly'];
        $path = $options['path'];
        $hintList= json_encode($options['hintList']);
        $targetKeep = $options['targetKeep'];
        $targetType = $options['targetType'];


        $builder->setAttribute('number', $number);
        $builder->setAttribute('readonly', $readonly);
        $builder->setAttribute('path', $path);
        $builder->setAttribute('hintList', $hintList);
        $builder->setAttribute('targetKeep', $targetKeep);
        $builder->setAttribute('targetType', $targetType);



        parent::buildForm($builder, $options);
    }

    /**
     * {@inheritdoc}
     */

    public function getDefaultOptions(array $options) {
        $options = parent::getDefaultOptions($options);

        $options['number'] = '5';
        $options['readonly'] = 'false';
        $options['path'] = '/img';
        $options['hintList'] = array();
        $options['starOff'] = 'star-off.png';
        $options['starOn'] = 'star-on.png';
        $options['cancelOff'] = 'cancel-off.png';
        $options['cancelOn'] = 'cancel-on.png';
        $options['cancelPlace'] = 'left';
        $options['cancel'] = 'false';
        $options['click'] = null; 
        $options['halfShow'] = 'true';
        $options['half'] = 'false';
        $options['targetKeep'] = 'true';
        $options['targetType'] = 'number';


        return $options;
    }


    public function getParent(array $options)
    {
        return 'text';
    }

    public function getName()
    {
        return 'rating';
    }
 
}
