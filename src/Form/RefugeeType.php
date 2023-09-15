<?php

namespace App\Form;

use App\Entity\Refugee;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RefugeeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nationalCardID')
            ->add('Name')
            ->add('lastName')
            ->add('age')
            ->add('nationality')
            ->add('tentNum')
            ->add('CampID')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Refugee::class,
        ]);
    }
}
