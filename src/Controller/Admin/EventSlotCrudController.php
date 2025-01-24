<?php

namespace App\Controller\Admin;

use App\Entity\EventSlot;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EventSlotCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return EventSlot::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            DateTimeField::new('dateBegin' , 'Date de départ'),
            DateTimeField::new('dateEnd' , 'Date de fin'),
            DateTimeField::new('createdAt' , 'Date de création')->onlyOnIndex(),
            DateTimeField::new('updatedAt' , 'Date de modification')->onlyOnIndex(),
            AssociationField::new('event' , 'Événement')->onlyOnIndex(),
            AssociationField::new('place' , 'Lieu'),
        ];
    }

}
