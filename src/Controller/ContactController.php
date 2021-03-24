<?php

namespace App\Controller;

use App\Service\Cart\CartService;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\DependencyInjection\Container;


class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(CartService $cartService, Request $request, MailerInterface $mailer)
    {

        $size = $cartService->getSize();

        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();

            // Ici nous enverrons l'e-mail
            $message = (new Email())

            // On attribue l'expéditeur
            ->From($contact['email'])

            // On attribue le destinataire
            ->To('adressebidon@hotmail.fr')

            // On crée le texte avec la vue

            ->subject('Welcome to the Space Bar!')
            ->text("Nice to meet you ! ❤️");
            ;

            // On envoie le message
            $mailer->send($message);

            $this->addFlash('success', 'Votre message a été transmis, nous vous répondrons dans les meilleurs délais.'); // Permet un message flash de renvoi
        }
        
        return $this->render('contact/index.html.twig',[
            'contactForm' => $form->createView(),
            'size' => $size

            ]);
    }

}