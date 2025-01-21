<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
    public function show(EventRepository $EventRepository, string $slug): Response
    {
        $events = $EventRepository->findOneBy(['slug' => $slug]);
        return $this->render('event/show_event.html.twig', [
            'events' => $events
        ]);
    }
}
