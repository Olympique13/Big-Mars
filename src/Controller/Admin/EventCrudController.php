<?php

namespace App\Controller\Admin;

use App\Entity\Event;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EventCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Event::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('category', 'Catégorie'),
            AssociationField::new('place', 'Lieux-dit'),
            TextField::new('title', 'Titre'),
            SlugField::new('slug', 'Slug')->setTargetFieldName('title')->hideOnIndex(),
            DateTimeField::new('eventDate', 'date de l\'évènement')->setFormat('dd MMM y HH:mm'),
            TextEditorField::new('content', 'Description'),
            DateTimeField::new('createdAt', 'Date de création')->setFormat('dd MMM y HH:mm')->hideOnForm(),
            DateTimeField::new('updatedAt', 'Dernière modification')->setFormat('dd MMM y HH:mm')->hideOnForm(),
        ];
    }
}
