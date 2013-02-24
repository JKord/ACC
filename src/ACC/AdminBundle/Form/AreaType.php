<?php

namespace ACC\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AreaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idWorker', null, array('label' => 'Керівник ділянки'))
            ->add('idBuildingDepartments', null, array('label' => 'Департамен'))
            ->add('idGroup', null, array('label' => 'Група'))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ACC\AdminBundle\Entity\Area'
        ));
    }

    public function getName()
    {
        return 'acc_adminbundle_areatype';
    }
}
