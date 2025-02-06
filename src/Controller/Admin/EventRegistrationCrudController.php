<?php

namespace App\Controller\Admin;

use App\Filter\EventNameFilter;
use App\Entity\EventRegistration;
use App\Service\CsvExporter;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Factory\FilterFactory;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FieldCollection;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EventRegistrationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return EventRegistration::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        $csvExportAction = Action::new('export', 'Export CSV', 'fa fa-download')
            ->linkToCrudAction('export')
            ->createAsGlobalAction();

        return parent::configureActions($actions)
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->add(Crud::PAGE_INDEX, $csvExportAction)
            ->disable(Action::NEW)
            ->disable(Action::EDIT)
            ->disable(Action::DELETE);
    }

    public function export(AdminContext $context, CsvExporter $csvExporter)
    {
        $fields = FieldCollection::new($this->configureFields(Crud::PAGE_INDEX));
        $filters = $this->container->get(FilterFactory::class)->create($context->getCrud()->getFiltersConfig(), $fields, $context->getEntity());
        $queryBuilder = $this->createIndexQueryBuilder($context->getSearch(), $context->getEntity(), $fields, $filters);

        $filters = $context->getRequest()->query->all('filters');
        $filterValue = $filters['event']['value'] ?? 'Global';
        // dd($filterValue);

        // $filterValue retourne l'id de l'événement selectionné dans le filtre sinon retourne Global
        return $csvExporter->createResponseFromQueryBuilder($queryBuilder, $fields, 'inscriptionEvenement_' . $filterValue. '.csv');
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('eventSlot')
            ->add(EventNameFilter::new('event', 'Evénement'));
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
        ->setPageTitle('index', 'Participants aux événements')
        ->setPaginatorPageSize(15)
        ->setPaginatorRangeSize(3);
    }


    public function configureFields(string $pageName): iterable
    {
        return [
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
