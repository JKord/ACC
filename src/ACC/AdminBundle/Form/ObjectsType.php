<?php

namespace ACC\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ObjectsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('floors', null, array('label' => 'Поверхів'))
            ->add('buildingMaterial', null, array('label' => 'Матеріали'))
            ->add('addresses', null, array('label' => 'Адреса'))
            ->add('idCategory', null, array('label' => 'Категорія'))          
            ->add('entrances', null, array('label' => 'Під\'їздів'))
            ->add('size', null, array('label' => 'Розмір'))
            ->add('idArea', null, array('label' => 'Ділянка'))
            ->add('typeApartments', null, array('label' => 'Тип апартаментів'))
            ->add('description', null, array('label' => 'Опис'))            
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ACC\AdminBundle\Entity\Objects'
        ));
    }

    public function getName()
    {
        return 'acc_adminbundle_objectstype';
    }
}
