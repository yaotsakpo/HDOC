<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ConsulType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           ->add('Temperature',TextType::class,array(
                'required'=>false,
            ))
            ->add('Poids',TextType::class,array(
                'required'=>false,
            ))
            ->add('Tension',TextType::class,array(
                'required'=>false,
            ))

             ->add('observation',TextareaType::class,array(
            'required'=>false,
        ))
             ->add('analyses',TextareaType::class,array(
                'required'=>false,
            ))

            ->add('diagnostic',TextareaType::class,array(
                'required'=>false,
            ))

            ->add('prescription',TextareaType::class,array(
                'required'=>false,
            ))

            

            ->add('controle',DateType::class,array(
                'widget'=>'single_text',
                'html5'=>false,
                'required'=>false,
                'format'=>'dd-MM-yyyy'
            ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Consultation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_consultation';
    }


}
