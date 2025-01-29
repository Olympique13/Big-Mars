<?php

namespace App\Repository;

use App\Entity\EventSlot;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EventSlot>
 */
class EventSlotRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EventSlot::class);
    }

    public function findSlotsByEvent($eventId)
    {
        return $this->createQueryBuilder('es')
            ->where('es.event = :event')
            ->setParameter('event', $eventId)
            ->getQuery()
            ->getResult();
    }
}
