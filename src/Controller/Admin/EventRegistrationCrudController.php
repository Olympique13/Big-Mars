<?php

namespace App\Controller\Admin;

use App\Entity\EventRegistration;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EventRegistrationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return EventRegistration::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return parent::configureActions($actions)
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->disable(Action::NEW)
            ->disable(Action::EDIT)
            ->disable(Action::DELETE);
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
        ->setPageTitle('index', 'Participants aux événements');
    }
    

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm()->hideOnIndex(),
            AssociationField::new('eventSlot', 'Créneaux'),
            TextField::new('eventSlot.event.title', 'Evénement'),
            TextField::new('firstName', 'Nom'),
            TextField::new('lastName', 'Prénom'),
            EmailField::new('email', '@Mail'),
            TextField::new('phone', 'N° Téléphone'),
            TextField::new('zipCode', 'Code postal'),
            DateField::new('birthDate', 'Date de naissance')->setFormat('dd MMM y'),
            TextField::new('status', 'Statut'),
            DateTimeField::new('createdAt', 'Inscrit le')->setFormat('dd MMM y HH:mm')->hideOnForm(),
        ];
    }
}
