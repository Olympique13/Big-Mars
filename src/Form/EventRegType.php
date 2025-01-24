<?php

namespace App\Form;

use App\Entity\Event;
use App\Entity\EventRegistration;
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
            ->add('createdAt', HiddenType::class)
            ->add('event', EntityType::class,[
                'class' => Event::class,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
    }
}
