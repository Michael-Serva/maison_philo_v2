<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Contracts\Translation\TranslatorInterface;

class TranslationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        function __construct(TranslatorInterface $translatorInterface)
        {
            $button = [
                $translatorInterface->trans('Save'),

            ];
            $placeholder = [
                $translatorInterface->trans('Firstname'),
                $translatorInterface->trans('Lastname'),
                $translatorInterface->trans('Search'),
                $translatorInterface->trans('Min price'),
                $translatorInterface->trans('Max price'),
                $translatorInterface->trans('Your comment'),
                $translatorInterface->trans('Old password'),
                $translatorInterface->trans('Confirm password'),
                $translatorInterface->trans('New password'),
            ];
            $message = [
                $translatorInterface->trans('Your comment are empty'),
            ];
            $label = [
                $translatorInterface->trans('Send'),
                $translatorInterface->trans('Rating'),
            ];
        }
        $builder
            ->add('field_name');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
