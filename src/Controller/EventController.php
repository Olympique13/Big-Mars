<?php

namespace App\Controller;

use App\Form\EventRegType;
use App\Entity\EventRegistration;
use App\Repository\EventRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class EventController extends AbstractController
{
    #[Route('/event', name: 'app_event')]
    public function index(EventRepository $EventRepository): Response
    {
        $events = $EventRepository->findBy(['active' => true]);

        return $this->render('event/index.html.twig', [
            'events' => $events
        ]);
    }


    #[Route('/event/{slug}', name: 'show_event')]
    public function show(Request $request, EntityManagerInterface $entityManager, EventRepository $EventRepository, string $slug, MailerInterface $mailer): Response
    {
        $eventReg = new EventRegistration();
        $form = $this->createForm(EventRegType::class, $eventReg);
        $form->handleRequest($request);
        
        $event = $EventRepository->findOneBy(['slug' => $slug]);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($eventReg);
            $entityManager->flush();
            $email = (new TemplatedEmail())
                ->from($form->get('email')->getData())
                ->to('neyssimodeur@gmail.com')
                ->subject($form->get('event')->getData())
                ->text($form->get('phone')->getData())
                ->htmlTemplate('email/eventRegistration.html.twig')
                ->context([
                    'firstName'=> $form->get('firstName')->getData(),
                    'lastName'=> $form->get('lastName')->getData(),
                    'phone'=> $form->get('phone')->getData(),
                    'eventTitle' => $event->getTitle(),
                    'eventDate' => $event->getEventDate()->format('d/m/Y à H:i'),
                    'place' => $event->getPlace(),
                ]);
              
            $mailer->send($email);
        }

        return $this->render('event/show_event.html.twig', [
            'events' => $event,
            'eventReg' => $form->createView()
        ]);
    }
}
