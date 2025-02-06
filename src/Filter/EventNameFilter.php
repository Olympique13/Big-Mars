<?php

namespace App\Filter;

use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Contracts\Filter\FilterInterface;
use EasyCorp\Bundle\EasyAdminBundle\Dto\FilterDataDto;
use EasyCorp\Bundle\EasyAdminBundle\Filter\FilterTrait;
use EasyCorp\Bundle\EasyAdminBundle\Form\Filter\Type\EntityFilterType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Event;

final class EventNameFilter implements FilterInterface
{
    use FilterTrait;

    public static function new(string $propertyName, $label = null): self
    {
        return (new self())
            ->setFilterFqcn(__CLASS__)
            ->setProperty($propertyName)
            ->setLabel($label)
            ->setFormType(EntityFilterType::class)
            ->setFormTypeOption('value_type', EntityType::class)
            ->setFormTypeOption('value_type_options', [
                'class' => Event::class,
                'choice_label' => 'title',
                'multiple' => false,
            ])
            ->setFormTypeOption('translation_domain', 'EasyAdminBundle');
    }

    public function apply(QueryBuilder $queryBuilder, FilterDataDto $filterDataDto, $fieldDto, $entityDto): void
    {
        $alias = $filterDataDto->getEntityAlias();
        $value = $filterDataDto->getValue();

        if ($value) {
            $queryBuilder->leftJoin(sprintf('%s.eventSlot', $alias), 'es')
                         ->leftJoin('es.event', 'e')
                         ->andWhere('e.id = :eventId')
                         ->setParameter('eventId', $value);
        }
    }
}
