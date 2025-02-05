<?php

namespace App\Form;

use App\Entity\Event;
use App\Entity\EventSlot;
use App\Entity\EventRegistration;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class EventRegType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->setAttribute('attr', ['name' => 'event_registration'])
            ->add('firstName')
            ->add('lastName')
            ->add('email')
            ->add('phone')
            ->add('zipCode')
            ->add('birthDate', DateType::class, [
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'html5' => false,
                'attr' => ['class' => 'input-birthDate'],
            ])
            ->add('status', ChoiceType::class, [
                'choices' => [
                    'Demandeur d\'emploi' => 'Demandeur d\'emploi',
                    'Etudiant' => 'Etudiant',
                    'Salarié' => 'Salarié',
                    'Apprenti' => 'Apprenti',
                    'Service Civique' => 'Service Civique',
                    'Parent/Tuteur' => 'Parent/Tuteur' 
                ]
            ])
            ->add('eventSlot', EntityType::class,[
                'class' => EventSlot::class,
                'choice_label' => function (EventSlot $eventSlot){
                    return $eventSlot->getCompleteDate();
                },
                'query_builder' => function (EntityRepository $er) use ($options) {
                    return $er->createQueryBuilder('es')
                        ->where('es.event = :event')
                        ->andWhere('es.active = :active')
                        ->setParameter('event', $options['event'])
                        ->setParameter('active', true)
                        ->orderBy('es.dateBegin', 'ASC');
                },
            ])
            ->add('createdAt', HiddenType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
        'data_class' => EventRegistration::class,
        'event' => null,
    ]);
    }
}
