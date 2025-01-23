<?php

namespace App\Controller\Admin;

use App\Entity\Contact;
use App\Entity\User;
use App\Entity\Category;
use App\Entity\Event;
use App\Entity\EventRegistration;
use App\Entity\Place;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

#[IsGranted('ROLE_ADMIN', message: 'Vous n\'êtes pas autorisé à consulter cette page')]
class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            // ->setTitle('<img src="https://www.synergiefamily.com/build/images/compressed/year-logo-02.png"> BigMars');
            ->setTitle('Big Mars - Administration');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('DashboPage d\'accueil', 'fa fa-home');
        yield MenuItem::linkToCrud('Catégories', 'fas fa-layer-group', Category::class);
        yield MenuItem::linkToCrud('Emplacements', 'fas fa-location-dot', Place::class);
        yield MenuItem::linkToCrud('Evènements', 'fas fa-calendar-days', Event::class);
        yield MenuItem::linkToCrud('Inscriptions', 'fas fa-address-card', EventRegistration::class);
        yield MenuItem::linkToCrud('Contact', 'fas fa-circle-question', Contact::class);
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-user', User::class)->setPermission('ROLE_ADMIN_SUPER');
    }
}
