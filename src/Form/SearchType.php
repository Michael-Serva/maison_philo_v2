<?php

namespace App\Form;

use App\Data\SearchData;
use App\Entity\Category;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Contracts\Translation\TranslatorInterface;

class SearchType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        function __construct(TranslatorInterface $translatorInterface)
        {
            $placeholder = [
                $translatorInterface->trans('Search'),
                $translatorInterface->trans('Min price'),
                $translatorInterface->trans('Max price'),
            ];
        }

        $builder
            ->add('q', TextType::class, [
                'label' => 'Search',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Search',
                    "class" => "form-control"
                ],
                "row_attr" => [
                    "class" => "form-floating mb-3"
                ]
            ])

            ->add('min', NumberType::class, [
                'label' => 'Min price',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Min price',
                    'class' => "form-control"
                ],
                "row_attr" => [
                    "class" => "form-floating mb-3 col"
                ]
            ])
            ->add('max', NumberType::class, [
                'label' => 'Max price',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Max price',
                    'class' => "form-control"
                ],
                "row_attr" => [
                    "class" => "form-floating mb-3 col"
                ]
            ])
            ->add('category', EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => Category::class,
                'expanded' => true,
                'multiple' => true
            ])
            ->add('promo', CheckboxType::class, [
                'label' => 'En promotion',
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SearchData::class,
            'method' => 'GET',
            'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}
