<?php

namespace ACC\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class WorkersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array('label' => 'ПІ'))
            ->add('post', null, array('label' => 'Посада'))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ACC\AdminBundle\Entity\Workers'
        ));
    }

    public function getName()
    {
        return 'acc_adminbundle_workerstype';
    }
}
