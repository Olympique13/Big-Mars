<?php

namespace App\Controller\Admin;

use App\Entity\Event;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichFileType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class EventCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Event::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Nos événements')
            ->setPageTitle('new', 'Ajouter un nouvel événement')
            ->setPageTitle('edit', 'Modifier cet événement');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title', 'Nom de l\'événement'),
            AssociationField::new('category', 'Catégorie'),

            SlugField::new('slug', 'Slug')->setTargetFieldName('title')->hideOnIndex(),
            TextField::new('imageFile', 'Image')->setFormType(VichFileType::class)->onlyOnForms(),
            ImageField::new('imageName', 'Aperçu de l\'image')->setBasePath('images/events')->onlyOnIndex(),
            TextEditorField::new('content', 'Description'),
            CollectionField::new('eventSlots', 'Crénaux')->setRequired(true)->renderExpanded()->setEntryIsComplex()->useEntryCrudForm(EventSlotCrudController::class)->allowDelete(true),
            DateTimeField::new('createdAt', 'Date de création')->setFormat('dd MMM y HH:mm')->hideOnForm(),
            DateTimeField::new('updatedAt', 'Dernière modification')->setFormat('dd MMM y HH:mm')->hideOnForm(),
            BooleanField::new('active'),
        ];
    }
}
