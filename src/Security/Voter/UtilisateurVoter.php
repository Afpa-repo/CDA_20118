<?php

namespace App\Security\Voter;

use App\Entity\Utilisateur;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;


// On creer une class qui est extends de Voter
class UtilisateurVoter extends Voter
{

    // on creer une constante qui prend en valeur l'appel a controler
    const EDIT = 'utilisateur_edit';
    const DEL = 'utilisateur_delete';

    protected function supports($attribute, $subject)
    {
        // l'attribut n'est pas dans la liste
        if (!in_array($attribute, [self::EDIT, self::DEL])) {
            return false;
        }
        // si $user n'est pas une instance de User => pas dans la liste des utilisateur
        if (!$subject instanceof Utilisateur) {
            return false;
        }
        // si retourne true, appel de voteOnAttribute()
        return true;
    }


    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();

        if (!$user instanceof Utilisateur) {
            // l'utilisateur doit être connecté, sinon accès refusé
            return false;
        }
        $utilisateur = $subject;
        // ... (check conditions and return true to grant permission) ...
        switch ($attribute) {
            case self::EDIT:
            case self::DEL:
                return $user->getUtiId() == $utilisateur->getUtiId();
        }
        throw new \LogicException('This code should not be reached!');


    }

}
