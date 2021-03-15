<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UtilisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
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
            ->add('utiIdentifiant')
            ->add('roles')
            ->add('password')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
