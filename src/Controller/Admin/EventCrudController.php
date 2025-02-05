<?php

namespace App\Controller\Admin;

use App\Entity\Event;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichFileType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

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
            TextField::new('shortDescription', 'Courte description'),
            AssociationField::new('category', 'Catégorie'),
            SlugField::new('slug', 'Slug')->setTargetFieldName('title')->hideOnIndex(),
            TextField::new('imageFile', 'Image')->setFormType(VichFileType::class)->onlyOnForms()->setRequired(true),
            ImageField::new('imageName', 'Aperçu de l\'image')->setBasePath('build/images/events')->onlyOnIndex(),
            TextField::new('bgImageFile', 'Arrière plan')->setFormType(VichFileType::class)->onlyOnForms()->setRequired(true),
            ImageField::new('bgImageName', 'Image d\'arrière plan')->setBasePath('build/images/bgEvent')->onlyOnIndex(),
            TextEditorField::new('content', 'Description'),
            IntegerField::new('maxParticipant', 'Nombre de participants max')->setRequired(true),
            CollectionField::new('eventSlots', 'Crénaux')->setRequired(true)->setEntryIsComplex()->useEntryCrudForm(EventSlotCrudController::class)->allowDelete(true),
            DateTimeField::new('createdAt', 'Date de création')->setFormat('dd MMM y HH:mm')->hideOnForm(),
            DateTimeField::new('updatedAt', 'Dernière modification')->setFormat('dd MMM y HH:mm')->hideOnForm(),
            BooleanField::new('active'),
        ];
    }
}
