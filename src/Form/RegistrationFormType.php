<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

class RegistrationFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /*        @UniqueEntity(
 * fields={"email"},
 * message="Cet email est déjà associé à un compte"
 * fields={"pseudo"},
 * message
 * ) */



        $builder
            ->add("pseudo", TextType::class, [
                "required" => false,
                "label" => false,
                "trim" => false,
                "attr" => [
                    "placeholder" => "Votre pseudo",
                    "class" => "form-control mb-3"
                ],
                "constraints" => [
                    new NotBlank([
                        "message" => "Vous avez oublié de saisir votre pseudo"
                    ]),
                    new Length([
                        "min" => 3,
                        "max" => 30,
                        "minMessage" => "Votre pseudo doit avoir 3 caractères minimum",
                        "maxMessage" => "Votre pseudo doit avoir au maximum 30 caractères"
                    ]),
                    new Regex([
                        "pattern" => "^[A-Za-z0-9]+$^",
                        "message" => "Veuillez ne pas utiliser de caractères spéciaux pour votre pseudo"
                    ]),

                ]
            ])
            ->add("email", EmailType::class, [
                "required" => false,
                "label" => false,
                "trim" => false,
                "attr" => [
                    "placeholder" => "Votre adresse mail",
                    "class" => "form-control mb-3"
                ],
                "constraints" => [
                    new Regex([
                        "pattern" => "^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$^",
                        "message" => "Veuillez entrer une adresse mail valide"
                    ]),
                    new NotBlank([
                        "message" => "Veuillez indiquer votre adresse mail"
                    ])
                ]
            ])
            /* ->add("agreeTerms", CheckboxType::class, [
            "label" => "Veuillez cliquer ici pour accepter nos conditions générales de vente",
            "constraints" => [
                new IsTrue([
                    "message" => "You should agree to our terms.",
                ]),
            ],
        ]) */
            ->add("password", RepeatedType::class, [
                "required" => false,
                "type" => PasswordType::class,
                "first_name" => "first",
                "second_name" => "second",
                "invalid_message" => "Les mots de passe ne sont pas identiques",
                "attr" => [
                    "class" => "form-control mt-3"
                ],
                "first_options" => [
                    "label" => false,
                    "attr" => [
                        "placeholder" => "Votre mot de passe",
                        "class" => "form-control mt-3 ",
                    ]
                ],
                "second_options" => [
                    "label" => false,
                    "attr" => [
                        "placeholder" => "Confirmez votre mot de passe",
                        "class" => "form-control mt-3"
                    ]
                ],
                "constraints" => [
                    new NotBlank([
                        "message" => "Veuillez saisir un mot de passe",
                    ]),
                    new Regex([
                        "pattern" => "/^(?=.*[A-Z]).{5,}$/",
                        "message" => "Votre mot de passe doit contenir au moins 5 caractères et une lettre majuscule"
                    ]),
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            "data_class" => User::class,
            "registration" => false,
        ]);
    }
}
