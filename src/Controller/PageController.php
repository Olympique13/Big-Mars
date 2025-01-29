<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class PageController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function contact(Request $request, EntityManagerInterface $entityManager, MailerInterface $mailer): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        
        if ($form->isSubmitted() && $form->isValid()) {
            // $this->addFlash('notice','Message envoyé');
            $entityManager->persist($contact);
            $entityManager->flush();
            // $email = (new TemplatedEmail())
            //     ->from($form->get('email')->getData())
            //     ->to('neyssimodeur@gmail.com')
            //     ->subject($form->get('type')->getData())
            //     ->text($form->get('message')->getData())
            //     ->htmlTemplate('email/contact.html.twig')
            //     ->context([
            //         'firstName'=> $form->get('firstName')->getData(),
            //         'lastName'=> $form->get('lastName')->getData(),
            //         'phone'=> $form->get('phone')->getData(),
            //         'type'=> $form->get('type')->getData(),
            //         'message'=> $form->get('message')->getData()
            //     ]);
              
            //     $mailer->send($email);
            }

        return $this->render('page/homepage.html.twig', [
            'contactForm' => $form->createView()
        ]);
    }
}
