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

class HospiType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Temperature',NumberType::class,array(
                'required'=>false,
            ))
            ->add('Poids',NumberType::class,array(
                'required'=>false,
            ))
            ->add('Tension',TextType::class,array(
                'required'=>false,
            ))
            ->add('chambre',TextType::class,array(
                'required'=>false,
            ))
            ->add('lit',TextType::class,array(
                'required'=>false,
            ))
            ->add('diagnostic',TextareaType::class,array(
                'required'=>false,
            ))
            ->add('traitement',TextareaType::class,array(
                'required'=>false,
            ))
            ->add('analyse',TextareaType::class,array(
                'required'=>false,
            ))

            ->add('sortie',DateType::class,array(
                'widget'=>'single_text',
                'html5'=>false,
                'format'=>'dd-MM-yyyy',
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
            'data_class' => 'AppBundle\Entity\Hospitalisation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_hospitalisation';
    }


}
