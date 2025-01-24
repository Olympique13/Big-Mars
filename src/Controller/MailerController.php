<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class MailerController extends AbstractController
{
    #[Route('/mailer', name: 'app_mailer')]
    public function sendEmail(MailerInterface $mailer, Request $request)
    {
        
        
        $email = (new Email())
            ->from($this->getParameter('EMAIL_FROM'))
            ->to($this->getParameter('EMAIL_TO'))
            ->subject($this->getParameter('EMAIL_SUBJECT'))
            ->text($this->getParameter('EMAIL_CONTENT'))
            ->html($this->getParameter('EMAIL_CONTENT'));

        $mailer->send($email);

        return new Response('Mail correctement envoyé');
    }
}