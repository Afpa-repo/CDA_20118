<?php

namespace App\Form;

use App\Entity\ArticleSearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('minprice',integerType::class,[
                'required'=>false,
                'label'=>false,
                'attr'=>[
                    'placeholder'=>'Prix minimum'
                ]
            ])
            ->add('maxprice',integerType::class,[
                'required'=>false,
                'label'=>false,
                'attr'=>[
                    'placeholder'=>'Prix maximum'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ArticleSearch::class,
            'method'=>'get',
            'csrf_protection'=>false
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}
