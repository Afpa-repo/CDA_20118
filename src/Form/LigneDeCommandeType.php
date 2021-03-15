<?php

namespace App\Form;

use App\Entity\LigneDeCommande;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LigneDeCommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lignePrix')
            ->add('ligneQuantite')
            ->add('art')
            ->add('com')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => LigneDeCommande::class,
        ]);
    }
}
