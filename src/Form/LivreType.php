<?php

namespace App\Form;

use App\Entity\Livre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LivreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom du Livre',
                'attr' => ['class' => 'form-control']
            ])
            ->add('img', TextType::class, [
                'label' => 'Image',
                'attr' => ['class' => 'form-control']
            ])
            ->add('description', TextType::class, [
                'label' => 'Histoire',
                'attr' => ['class' => 'form-control']
            ])
            ->add('auteurOriginal', TextType::class, [
                'label' => 'Auteur Original',
                'required' => false,
                'attr' => ['class' => 'form-control']
            ])
            ->add('scenariste', TextType::class, [
                'label' => 'Scénariste',
                'required' => false,
                'attr' => ['class' => 'form-control']
            ])
            ->add('dessinateur', TextType::class, [
                'label' => 'Dessinateur',
                'required' => false,
                'attr' => ['class' => 'form-control']
            ])
            ->add('Traducteur', TextType::class, [
                'label' => 'Traducteur',
                'required' => false,
                'attr' => ['class' => 'form-control']
            ])
            ->add('editeur', TextType::class, [
                'label' => 'Edition',
                'attr' => ['class' => 'form-control']
            ])
            ->add('auteur', TextType::class, [
                'label' => 'Auteur',
                'required' => false,
                'attr' => ['class' => 'form-control']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Livre::class,
        ]);
    }
}