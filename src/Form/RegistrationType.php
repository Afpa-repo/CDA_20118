<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('utiAdresse')
            ->add('utiAdresse2')
            ->add('utiVille')
            ->add('utiCodepostal')
            ->add('utiNom')
            ->add('utiPrenom')
            ->add('utiIdentifiant')
            ->add('utiMdp', PasswordType::class)
            ->add('confirm_utiMdp', PasswordType::class)
            ->add('utiSexe')
            ->add('utiDateDeNaissance')
            ->add('utiMail')
            ->add('utiTel')
            ->add('pay')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
