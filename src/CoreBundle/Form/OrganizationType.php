<?php

namespace CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OrganizationType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('name', 'text')
      ->add('creationDate', 'date')
      ->add('description', 'textarea')
      ->add('logo', 'file', [
          'required'    => false
      ])
      ->add('save', 'submit')
    ;
  }

  public function setDefaultOptions(OptionsResolverInterface $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'CoreBundle\Entity\Organization'
    ));
  }

  public function getName()
  {
    return 'corebundle_organization';
  }
}