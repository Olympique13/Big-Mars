<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\BannerRepository;
use App\Repository\EventRepository;
use App\Service\BrevoService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



final class PageController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function contact(Request $request, EntityManagerInterface $entityManager, MailerInterface $mailer, EventRepository $eventRepository, BannerRepository $bannerRepository): Response
    {
        $banner = $bannerRepository->findOneBy(['isActive' => true]);

        $events = $eventRepository->findBy(['active' => true]);

        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if($form->isSubmitted()) {
            if($form->isValid()) {
                $entityManager->persist($contact);
                $entityManager->flush();
                $email = (new TemplatedEmail())
                    ->from($this->getParameter('EMAIL_FROM'))
                    ->to($form->get('email')->getData())
                    ->subject('Confirmation de contact')
                    ->htmlTemplate('email/contact.html.twig')
                    ->context([
                        'firstName' => $form->get('firstName')->getData(),
                        'lastName' => $form->get('lastName')->getData(),
                        'phone' => $form->get('phone')->getData(),
                        'type' => $form->get('type')->getData(),
                        'message' => $form->get('message')->getData()
                    ]);

                    $mailer->send($email);

                    
                    return new JsonResponse([
                        'code' => 200,
                        'message' => 'Merci ! Le formulaire est valide',
                    ]);

            } else {
                $errors = [];
                foreach ($form->getErrors(true) as $error) {
                    $errors[$error->getOrigin()->getName()] = $error->getMessage();
                }
    
                return new JsonResponse([
                    'code' => 400,
                    'errors' => $errors,
                ]);
            }
        }

        return $this->render('page/homepage.html.twig', [
            'contactForm' => $form->createView(),
            'event' => $events,
            'banner' => $banner
        ]);
    }

    #[Route('/about', name: 'app_about')]
    public function about(): Response
    {
        return $this->render('page/about.html.twig');
    }

    #[Route('/addList', name: 'add_list')]
    public function addList(Request $request, BrevoService $brevoService) : JsonResponse {

        $email = json_decode($request->getContent())->email;

        return $brevoService->addContact($email);

    }



}
