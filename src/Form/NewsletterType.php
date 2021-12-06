<?php

namespace App\Form;

use App\Entity\Newsletter;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class NewsletterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                "required" =>true,
                "label" => "Abonnez-vous à notre newsletter",
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
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'btn button-philo'
                ],
                'label' => 'S\'inscrire'
            ]);

        ;
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Newsletter::class,
        ]);
    }
}
