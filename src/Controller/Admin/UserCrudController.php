<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
        ->setPageTitle('index', 'Liste des utilisateurs')
        ->setPageTitle('new', 'Ajouter un nouvel utilisateur')
        ->setPageTitle('edit', 'Modifier cet utilisateur');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            EmailField::new('email', '@Mail'),
            TextField::new('firstname', 'Prénom'),
            TextField::new('lastname', 'Nom'),
            ChoiceField::new('roles', 'Role')->setChoices([
                'Utilisateur' => 'ROLE_USER',
                'Administrateur' => 'ROLE_ADMIN',
                'Super-Administrateur' => 'ROLE_ADMIN_SUPER',
            ])->allowMultipleChoices()->autocomplete(),
            TextField::new('password', 'Mot de passe')->hideOnIndex()->hideOnForm(),
            DateTimeField::new('createdAt', 'Date de création')->setFormat('dd MMM y HH:mm')->hideOnForm()->setRequired(true),
            DateTimeField::new('updatedAt', 'Modifié le')->setFormat('dd MMM y HH:mm')->hideOnForm()->setRequired(true),
        ];
    }
}
