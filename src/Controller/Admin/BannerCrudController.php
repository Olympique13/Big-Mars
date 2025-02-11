<?php

namespace App\Controller\Admin;

use App\Entity\Banner;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BannerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Banner::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
        ->setPageTitle('index', 'Nos catégories')
        ->setPageTitle('new', 'Ajouter une nouvelle bannière')
        ->setPageTitle('edit', 'Modifier la bannière');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title', 'Titre'),
            TextEditorField::new('content', 'Message')->setNumOfRows(2),
            BooleanField::new('isActive', 'est actif'),
            DateTimeField::new('createdAt', 'Date de création')->setFormat('dd MMMM y HH:mm')->hideOnForm(),
            DateTimeField::new('updatedAt', 'Dernière modification')->setFormat('dd MMMM y HH:mm')->hideOnForm(),
        ];
    }
}
