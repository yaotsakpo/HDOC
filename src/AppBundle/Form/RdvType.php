<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RdvType extends AbstractType
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
        ->add('date',DateType::class,array(
            'widget'=>'single_text',
            'html5'=>false,
            'format'=>'dd-MM-yyyy'
        ))
            ->add('heure',TimeType::class,array(
                'widget'=>'single_text',
                'html5'=>false,
                'required'=>false,

            ))
            ->add('motif',TextType::class,array(
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
            'data_class' => 'AppBundle\Entity\Rdv'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_rdv';
    }


}
