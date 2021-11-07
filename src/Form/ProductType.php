<?php

namespace App\Form;

use App\Entity\Product;
use App\Entity\Category;
use Doctrine\Common\Collections\Expr\Value;
use Doctrine\ORM\EntityRepository;
use PhpParser\Node\Stmt\Label;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $option)
    {
        function __construct(Product $product)
        {
        }

        $builder

            ->add("title", TextType::class, [
                "required" => false,
                "label" => "Title",
                "attr" => [
                    "placeholder" => "Product name",
                    "class" => "form-control mb-3"
                ],
                "row_attr" => [
                    "class" => "form-floating"
                ]
            ])
            ->add("price", MoneyType::class, [
                "currency" => "CFA",
                "required" => false,
                "label" => " ",
                "attr" => [
                    "class" => "form-control",
                    "placeholder" => "Prix",
                ],
                "row_attr" => [
                    "class" => "form-floating mb-3"
                ]
            ])
            ->add("stock", IntegerType::class, [
                "required" => false,
                "label" => false,
                "attr" => [
                    "placeholder" => "Stock disponible",
                    "class" => "form-control",
                ],
                "row_attr" => [
                    '"class' => "form-floating mb-3"
                ]
            ])
            ->add("category", EntityType::class, [
                "required" => false,
                "class" => Category::class,
                "choice_label" => "title",
                "multiple" => false,
                "label" => "Catégorie",
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
            ->add("description", TextareaType::class, [
                "label" => "Description courte",
                "required" => false,
                "attr" => [
                    "class" => "mb-3 form-control text-area-height",
                    "placeholder" => "Description du produit",
                    "style" => "height:100px"
                ],
                "row_attr" => [
                    "class" => "form-floating "
                ]
            ])
            ->add("description1", TextareaType::class, [
                "label" => "Description complète",
                "required" => false,
                "attr" => [
                    "class" => "mb-3 form-control",
                    "placeholder" => "Description du produit",
                    "style" => "height:100px"
                ],
                "row_attr" => [
                    "class" => "form-floating"
                ]
            ])
            ->add("description2", TextareaType::class, [
                "label" => "Marque",
                "required" => false,
                "attr" => [
                    "class" => "mb-3 form-control",
                    "placeholder" => "Description du produit",
                    "style" => "height:100px"
                ],
                "row_attr" => [
                    "class" => "form-floating"
                ]
            ])
            ->add("description3", TextareaType::class, [
                "label" => "Description longue",
                "required" => false,
                "attr" => [
                    "class" => "mb-3 form-control",
                    "placeholder" => "Description du produit",
                    "style" => "height:100px"
                ],
                "row_attr" => [
                    "class" => "form-floating"
                ]
            ])
            ->add("description4", TextareaType::class, [
                "label" => "Description4",
                "required" => false,
                "attr" => [
                    "class" => "mb-3 form-control",
                    "placeholder" => "Description du produit",
                    "style" => "height:100px"
                ],
                "row_attr" => [
                    "class" => "form-floating"
                ]
            ])
            ->add(
                "image",
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
            "data_class" => Product::class,
        ]);
    }
}
