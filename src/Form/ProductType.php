<?php

namespace App\Form;

use App\Entity\Product;
use Doctrine\DBAL\Types\FloatType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("title", TextType::class, [
                "required" => false,
                "label" => false
            ])
            ->add("price", MoneyType::class, [
                "required" => false
            ])
            ->add("description", TextareaType::class, [
                "required" => false
            ])
            ->add('image', FileType::class,
            array('data_class' => null), [
                "required" => false,
                "constraints" => [
                    new File([
                        'mimeTypes' => [
                            "image/png",
                            "image/jpg",
                            "image/jpeg"
                        ],
                        "mimeTypesMessage" => "Extensions autorisées : PNG - JPG "
                    ])
                ]
            ]);
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            "data_class" => Product::class,
        ]);
    }
}
