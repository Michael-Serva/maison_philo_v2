<?php

namespace App\Form;

use App\Entity\Role;
use App\Entity\User;
use App\Repository\RoleRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      /*  $builder
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
        ; */
      /*       ->add('userRoles', EntityType::class, [
                'class' => Role::class,
                'query_builder' => function (RoleRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.userRoles', 'ASC');
                },
                'choice_label' => 'userRoles',
            ]); */


 /*    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);*/
    }
}
