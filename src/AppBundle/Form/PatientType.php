<?php

namespace AppBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PatientType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom',TextType::class)
            ->add('prenom',TextType::class)
            ->add('adresse',TextType::class,array('required'=>false))
            ->add('telephone',IntegerType::class,array('required'=>false))
            ->add('Age',TextType::class,array('required'=>false))
            ->add('sexe',ChoiceType::class,array(
                'choices'=>[
                    'Masculin' =>'M',
                    'Feminin'=>'F'],
                'placeholder'=>'selectionner le sexe'
            ))
            ->add('groupeSanguin',ChoiceType::class,array(
                'choices'=>[
                    'A+' =>'A+',
                    'A-' =>'A-',
                    'B+'=>'B+',
                    'B-'=>'B-',
                    'O+'=>'O+',
                    'O-'=>'O-',
                    'AB+'=>'AB+',
                    'AB-'=>'AB-'],
                'placeholder'=>'selectionner le Groupe sanguin',
                'required'=>false,
            ))
            ->add('antecedant',TextareaType::class,array(
                'required'=>false,
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Patient'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_patient';
    }


}
