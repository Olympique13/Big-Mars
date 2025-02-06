<?php

namespace App\Controller\Admin;

use App\Entity\Contact;
use App\Service\CsvExporter;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Factory\FilterFactory;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FieldCollection;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Filter\ChoiceFilter;

class ContactCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Contact::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        
        return $crud
        ->setDefaultSort(['createdAt' => 'DESC'])
        ->setPaginatorPageSize(15)
        ->setPaginatorRangeSize(3)
        ->setPageTitle('index', 'Message de contact');
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(ChoiceFilter::new('type')->setChoices([
                'Joueur' => 'joueur',
                'Entreprise' => 'entreprise',
            ]));
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

        $filterValue = $filters['type']['value'] ?? 'Global';
        // dd($filterValue);

        // $filterValue correspond au nom de la valeur de recherche mise dans le filtre (joueur ou entreprise)
        return $csvExporter->createResponseFromQueryBuilder($queryBuilder, $fields, 'contactExport_' . $filterValue . '.csv');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('lastName', 'Nom'),
            TextField::new('firstName', 'Prénom'),
            EmailField::new('email', '@Mail'),
            TextField::new('phone', 'N° Téléphone'),
            TextField::new('type', 'Type'),
            TextField::new('company', 'Entreprise'),
            TextField::new('zipCode', 'Code postal'),
            TextEditorField::new('message', 'Message'),
            DateTimeField::new('createdAt', 'Envoyé le')->setFormat('dd/MM/y à HH:mm'),
            DateTimeField::new('updatedAt', 'Modifié le')->setFormat('dd/MM/y à HH:mm')->hideOnIndex(),
        ];
    }
}
