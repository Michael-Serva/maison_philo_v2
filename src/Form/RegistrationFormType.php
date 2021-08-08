<?php

namespace App\Form;

use App\Entity\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;

use Symfony\Component\Validator\Constraints\NotBlank;

use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       

        $builder
        ->add('pseudo', TextType::class, [
            'required' => false,
            'label' => false,
            'attr' => [
                'placeholder' => 'Votre pseudo',
                'class' => 'form-control mb-3'
            ]

        ])
        ->add('email', EmailType::class, [
            'required' => false,
            'label' => false,
            'attr' => [
                'placeholder' => 'Votre adresse mail',
                'class' => 'form-control mb-3'
            ]
        ])
        /* ->add('agreeTerms', CheckboxType::class, [
            'label' => 'Veuillez cliquer ici pour accepter nos conditions générales de vente',
            'constraints' => [
                new IsTrue([
                    'message' => 'You should agree to our terms.',
                ]),
            ],
        ]) */
        ->add('password', RepeatedType::class, [
            // instead of being set onto the object directly,
            // this is read and encoded in the controller
            'type' => PasswordType::class,
            'required' => false,
            'mapped' => false,
            'attr' => ['autocomplete' => 'new-password'],
            'constraints' => [
                new NotBlank([
                    'message' => 'Vous avez oublié de saisir votre mot de passe',
                ]),
                new Length([
                    'min' => 6,
                    'minMessage' => 'votre mot de passe doit avoir au minimum {{ limit }} caractères',
                    // max length allowed by Symfony for security reasons
                    'max' => 30,
                    'maxMessage' => 'votre mot de passe ne doit pas dépasser {{limit}} caractères'
                ]),
            ],
        ]);
        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'registration' => false,
        ]);
    }
}
