<?php

namespace App\Form;

use App\Entity\Utilisateur;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Regex;



class UtilisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('utiAdresse', TextType::class, [
                'label'=> 'Votre adresse : ',
                'attr'=> ['placeholder'=> 'Votre Adresse ....']
            ])

            ->add('utiAdresse2', TextType::class, [
                'label'=> 'Complement d\'adresse : ',
                'attr'=> ['placeholder'=> 'Complement d\'adresse ....']
            ])

            ->add('utiVille', TextType::class, [
                'label'=> 'Ville : ',
                 'attr'=> ['placeholder'=> 'Votre Ville ....']
            ])

            ->add('utiCodepostal', NumberType::class, [
                'label'=> 'Votre code postal : ',
                'attr'=> ['placeholder'=> 'Votre Code postal ....'],
            ])

            ->add('utiNom', TextType::class, [
                'label'=> 'Nom d\'utilisateur : ',
                 'attr' => ['placeholder'=> 'Nom d\'utilisateur ....']
            ])

            ->add('utiPrenom', TextType::class, [
                'label'=> 'Prenom d\'utilisateur : ',
                'attr'=> ['placeholder'=> 'Votre Prenom ....']
            ])

            ->add('utiIdentifiant',TextType::class, [
                'label' => 'Votre Identifiant : ',
                'attr' => ['placeholder' => 'Votre Identifiant ....']
            ])

            ->add('utiMdp', PasswordType::class,[
                'label'=> 'Votre mot de passe :',
                'attr'=> ['placeholder'=> 'mot de passe ....'],
                'constraints' => [
                    new regex([
                        'pattern' => '/^ # Début de chaîne
                                        (?=(.*[0-9])) # Au moins 1 chiffre
                                        (?=.*[a-z]) # Au moins 1 minuscule
                                        (?=(.*[A-Z])) # Au moins 1 majuscule
                                        (?=.*[\!@#$%^&*()\\\\[\]{}\-_+=~`|:;"\'<>,.\/?]) # Au moins 1 caractère spéciale
                                        (?=(.*)).{8,} # Au moins 8 caractères
                                        $ # Fin de chaîne/mx',
                        'message' => 'Exemple : Au moins 8 caractères donc 1 chiffre, 1 minuscule, 1 majuscule, 1 caractère spéciale     '
                    ])
                    ]
            ])



            ->add('confirm_utiMdp', PasswordType::class, [
                'label'=> 'Confirmation Mot de passe : ',
                'attr'=> ['placeholder'=> 'Confirmer mot de passe']
            ])

            ->add('utiSexe', TextType::class, [
                'label'=> 'Votre sexe : ',
                'attr'=> ['placeholder'=> 'H/F ....']
            ])

            ->add('utiDateDeNaissance', BirthdayType::class, [
                'label'=> 'Date de naissance : ',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
            ])

            ->add('utiMail', EmailType::class,[
                'label'=> 'Votre email : ',
                'attr'=> ['placeholder'=> 'Votre email ....'],
            ])


            ->add('utiTel', NumberType::class, [
                'label'=> 'Numero de telephone : ',
                'attr'=> ['placeholder'=> 'Numero de telephone ....'],
            ])
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
