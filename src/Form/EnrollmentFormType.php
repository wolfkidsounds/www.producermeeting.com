<?php // src/Form/EnrollmentFormType.php

namespace App\Form;

use App\Entity\Enrollment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Zemasterkrom\CloudflareTurnstileBundle\Form\Type\CloudflareTurnstileType;

class EnrollmentFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Name', TextType::class, [
                'label' => false,
                'row_attr' => [
                    'class' => 'mb-0',
                ],
                'attr' => [
                    'placeholder' => 'Name...',
                ]
            ])

            ->add('Mail', EmailType::class, [
                'label' => false,
                'row_attr' => [
                    'class' => 'mb-0',
                ],
                'attr' => [
                    'placeholder' => 'E-Mail...',
                ]
            ])

            ->add('Submit', SubmitType::class, [
                'label' => 'Anmelden',
                'row_attr' => [
                    'class' => 'mb-0',
                ],
                'attr' => [
                    'class' => 'btn btn-primary text-white form-control w-100 h-100 rounded',
                ]
            ])

            ->add('cf_turnstile_response', CloudflareTurnstileType::class, [
                'row_attr' => [
                    'class' => '',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Enrollment::class,
        ]);
    }
}
