<?php

namespace App\Form;

use App\Entity\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
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
            ->add('isVerified')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
