<?php

namespace App\Form;

use App\Entity\Product;
use App\Entity\Category;
use App\Form\CategoryType;
use Doctrine\DBAL\Types\FloatType;
use Doctrine\ORM\EntityRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add("title", TextType::class, [
                "required" => false,
                "label" => false,
                "attr" => [
                    "placeholder" => "Le nom du produit",
                    "class" => "form-control mb-3"
                ],
            ])
            ->add("price", NumberType::class, [
                "required" => false,
                "label" => false,
                "attr" => [
                    "placeholder" => "Prix",
                    "class" => "form-control mb-3"
                ],
            ])

            ->add("stock", IntegerType::class, [
                "required" => false,
                "label" => false,
                "attr" => [
                    "placeholder" => "Stock disponible",
                    "class" => "form-control mb-3",
                ]
            ])
            ->add("category", EntityType::class, [
                "required" => false,
                "class" => Category::class,
                "choice_label" => "title",
                "multiple" => false,
                "label" => false,
                "preferred_choices" => "title",
                "attr" => [
                    "class" => "form-control mb-3",
                ],
                "query_builder" => function (EntityRepository $er) {
                    return $er->createQueryBuilder("c")
                    ->orderBy("c.title", "DESC");
                },
                ])
                ->add("description", TextType::class, [
                    "label" => false,
                    "required" => false,
                    "attr" => [
                        "class" => "mb-3 form-control",
                        "placeholder" => "Description du produit",  "size" => 4,      
                    ]
                ]) 
                ->add(
                    "image",
                FileType::class,
                array("data_class" => null),
                [
                    "required" => false,
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
                            "mimeTypesMessage" => "Extensions autorisées : PNG - JPG ",
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
            "data_class" => Product::class,
        ]);
    }
}
