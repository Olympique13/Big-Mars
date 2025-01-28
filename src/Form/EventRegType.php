<?php

namespace App\Form;

use App\Entity\Event;
use App\Entity\EventSlot;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class EventRegType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('email')
            ->add('phone')
            ->add('eventSlot', EntityType::class,[
                'class' => EventSlot::class,
                'choice_label' => function (EventSlot $eventSlot){
                    return $eventSlot->__toString();
                }
            ])
            ->add('createdAt', HiddenType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
    }
}
