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


class ControleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('patient',EntityType::class,array(
                'class'=>'AppBundle\Entity\Patient',
                'choice_label'=>'NomPrenom',
                'placeholder'=>'-Selectionner-',
                'expanded'=>false,
                'multiple'=>false,
                'attr'=> ['class'=>'chosen-select','multiple'=>false],
            ))
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

        ->add('diagnostic',TextareaType::class,array(
            'required'=>false,
        ))
        ->add('prescription',TextareaType::class,array(
            'required'=>false,
        ))

        ->add('analyses',TextareaType::class,array(
            'required'=>false,
        ))
            ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Controle'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_Controle';
    }


}
