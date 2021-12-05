<?php

namespace App\Form;

use App\Entity\Comments;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CommentsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('content', TextareaType::class, [
                "label" => "Your comment",
                "required" => false,
                "constraints" => [
                    new NotBlank([
                        "message" => "Your comment are empty"
                    ])
                ],
                "attr" => [
                    "class" => "form-control",
                    "placeholder" => "Your comment",
                    "style" => "height:100px"
                ],
                "row_attr" => [
                    "class" => "form-floating"
                ]
            ])
            ->add('rating', IntegerType::class, [
                "label" => "Rating",
                "attr" => [
                    "placeholder" => "Rating",
                    "class" => "form-control",
                    "min" => 0,
                    "max" => 5,
                ],
                "row_attr" => [
                    'class' => "form-floating my-1"
                ]
            ])
            ->add('send', SubmitType::class, [
                "label" => "Send",
                "attr" => [
                    "class" => "btn button-philo mb-3 mt-1 btn-success"
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Comments::class,
        ]);
    }
}
