<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Utilisateur1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('uti_identifiant')
            ->add('roles')
            ->add('password')
            ->add('utiAdresse')
            ->add('utiAdresse2')
            ->add('utiVille')
            ->add('utiCodepostal')
            ->add('utiNom')
            ->add('utiRole')
            ->add('utiPrenom')
            ->add('utiSexe')
            ->add('utiDateDeNaissance')
            ->add('utiMail')
            ->add('utiTel')
            ->add('utiId1')
            ->add('payId')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
