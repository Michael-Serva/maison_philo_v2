<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Genre;
use App\Form\GenreType;
use App\Entity\Category;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Contracts\Translation\TranslatorInterface;

class AccountType extends AbstractType
{
    public function __construct(TranslatorInterface $trans)
    {
        $trans->trans('Firstname');
        $trans->trans('Lastname');
        $trans->trans('Save');
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('genreType', EntityType::class, [
                "required" => false,
                "class" => Genre::class,
                "choice_label" => "title",
                "multiple" => false,
                "label" => "Genre",
                "attr" => [
                    "class" => "form-control",
                ],
                "row_attr" => [
                    "class" => "form-floating mb-3"
                ],
                "query_builder" => function (EntityRepository $er) {
                    return $er->createQueryBuilder("c")
                        ->orderBy("c.title", "DESC");
                },
            ])
            ->add('pseudo', TextType::class, [
                'label' => 'Pseudo',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Lastname',
                    "class" => "form-control"
                ],
                "row_attr" => [
                    "class" => "form-floating mb-3"
                ]
            ])
            ->add("email", EmailType::class, [
                "required" => false,
                "label" => "Email",
                "trim" => false,
                "attr" => [
                    "placeholder" => "Email",
                    "class" => "form-control mb-3"
                ],
                "row_attr" => [
                    "class" => "form-floating mb-3 col"
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
            ->add('firstName', TextType::class, [
                'label' => 'Firstname',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Firstname',
                    "class" => "form-control"
                ],
                "row_attr" => [
                    "class" => "form-floating mb-3"
                ]
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Lastname',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Lastname',
                    "class" => "form-control"
                ],
                "row_attr" => [
                    "class" => "form-floating mb-3"
                ]
            ])
            ->add(
                "picture",
                FileType::class,
                [
                    "required" => false,
                    "data_class" => null,
                    "empty_data" => null
                ],
                [
                    "constraints" => [
                        new File([
                            "mimeTypes" => [
                                "maxSize" => "1024k",
                                "image/png",
                                "image/jpg",
                                "image/jpeg",
                                "application/pdf",
                                "application/x-pdf",
                            ],
                            "mimeTypesMessage" => "Extensions autorisées : PNG - JPG - JPEG - PDF ",
                        ]),
                        "attr" => [
                            "class" => "mb-3",
                        ],
                    ]
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
