<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PasswordUpdateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('oldPassword', PasswordType::class, [
                "required" => false,
                "label" => "Old password",
                "attr" => [
                    "placeholder" => "Old password",
                    "class" => "form-control mb-3"
                ],
                "row_attr" => [
                    "class" => "form-floating"
                ]
            ])
            ->add('newPassword', PasswordType::class, [
                "required" => false,
                "label" => "New password",
                "attr" => [
                    "placeholder" => "New password",
                    "class" => "form-control mb-3"
                ],
                "row_attr" => [
                    "class" => "form-floating"
                ]
            ])
            ->add('confirmPassword', PasswordType::class, [
                "required" => false,
                "label" => "Confirm password",
                "attr" => [
                    "placeholder" => "Confirm password",
                    "class" => "form-control mb-3"
                ],
                "row_attr" => [
                    "class" => "form-floating"
                ]
                ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([]);
    }
}
