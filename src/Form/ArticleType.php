<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('artPhoto')
            ->add('artNom')
            ->add('artLibelle')
            ->add('artPrixHt')
            ->add('artMinStock')
            ->add('artStock')
            ->add('artPromo')
            ->add('cat')
            ->add('four')
            ->add('pro')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
