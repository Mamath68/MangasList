<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'attr' => ['class' => 'form-control form-label']
            ])
            ->add('pseudo', TextType::class, [
                'attr' => ['class' => 'form-control form-label']
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'label'    => 'J\'accepte les conditions d\'utilisation',
                'mapped' => false,
                'attr' => ['class' => 'form-check-input form-check-label'],
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devriez accepter les conditions d\'utilisation.'
                    ]),
                ]
            ])
            ->add('plainPassword', RepeatedType::class, [
                'mapped' => false,
                'type' => PasswordType::class,
                'invalid_message' => 'Les mot de passe ne sont pas identiques',
                'options' => ['attr' => ['class' => 'password-field']],
                'required' => true,
                'first_options' => ['label' => 'Mot de Passe', 'attr' => ['class' => 'form-control form-label']],
                'second_options' => ['label' => 'Confirmer le mot de passe', 'attr' => ['class' => 'form-control form-label']],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
