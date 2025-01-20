<?php

namespace App\Controller\Admin;

use App\Entity\Place;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PlaceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Place::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('ville', 'Ville'),
            TextField::new('adresse', 'Adresse'),
            TextField::new('lieu', 'Lieux-dit'),
            IntegerField::new('cpostal', 'Code Postal'),
            DateTimeField::new('createdAt', 'Date de création')->setFormat('dd MMM y HH:mm')->hideOnForm(),
            DateTimeField::new('updatedAt', 'Dernière modification')->setFormat('dd MMM y HH:mm')->hideOnForm(),
        ];
    }
}
