<?php

namespace App\Form;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
            'attr' => [
                'placeholder' => 'saisir votre email'
                ]
            ])
            // ->add('roles')
            ->add('password', PasswordType::class, [
                'attr' => [
                    'placeholder' => 'saisir votre mot de passe'
                    ]
            ])
            ->add('nom',  TextType::class, [
                'attr' => [
                    'placeholder' => 'saisir votre nom'
                    ]
            ])
            ->add('prenom',  TextType::class, [
                'attr' => [
                    'placeholder' => 'saisir votre prenom'
                    ]
            ])
            ->add('telephone',  NumberType::class, [
                'attr' => [
                    'placeholder' => 'saisir votre telephone'
                    ]
            ])
            ->add('dateDeNaissance', DateType::class)
            ->add('submit', SubmitType::class, [
                'label' => "s'inscrire"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
