<?php

namespace App\Controller\Admin;

use App\Entity\Place;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class PlaceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Place::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
        ->setPageTitle('index', 'Lieux')
        ->setPageTitle('new', 'Ajouter un nouvel emplacement')
        ->setPageTitle('edit', 'Modifier cet emplacement');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('city', 'Ville'),
            TextField::new('address', 'Adresse'),
            TextField::new('place', 'Lieu'),
            TextField::new('zipCode', 'Code Postal'),
            DateTimeField::new('createdAt', 'Date de création')->setFormat('dd MMM y HH:mm')->hideOnForm(),
            DateTimeField::new('updatedAt', 'Dernière modification')->setFormat('dd MMM y HH:mm')->hideOnForm(),
        ];
    }
}
