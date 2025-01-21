<?php

namespace App\Controller;

use App\Entity\EventRegistration;
use App\Form\EventRegType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\EventRepository;

final class EventController extends AbstractController
{
    #[Route('/event', name: 'app_event')]
    public function index(EventRepository $EventRepository): Response
    {
        $events = $EventRepository->findAll();
        return $this->render('event/index.html.twig', [
            'events' => $events
        ]);
    }


    #[Route('/event/{slug}', name: 'show_event')]
    public function show(Request $request, EntityManagerInterface $entityManager,  EventRepository $EventRepository, string $slug): Response
    {
        $eventReg = new EventRegistration();
        $form = $this->createForm(EventRegType::class, $eventReg);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($eventReg);
            $entityManager->flush();
        }

        $events = $EventRepository->findOneBy(['slug' => $slug]);
        return $this->render('event/show_event.html.twig', [
            'events' => $events,
            'eventReg' => $form->createView()
        ]);
    }
}
