<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('email')
            ->add('phone')
            ->add('type', ChoiceType::class, [
                'data' => 'Talent',
                'choices' => [
                    'Un talent' => 'Talent',
                    'Une entreprise' => 'Entreprise',
                ],
                'expanded' => true,
                'multiple' => false
            ])
            ->add('company', TextType::class, [
                'required' => false,
            ])
            ->add('status', ChoiceType::class, [
                'required' => false,
                'choices' => [
                    'Employé' => 'employé',
                    'Etudiant' => 'étudiant',
                    'Chomage' => 'chomage'
                    ]
                    ])
            ->add('ageGroup', ChoiceType::class, [
                'required' => false,
                'choices' => [
                    '15 - 17 ans' => '15 - 17 ans',
                    '18 - 22 ans' => '18 - 22 ans',
                    '23 ans et +' => '23 ans et +'
                ]
            ])
            ->add('message')
            ->add('agreeContact', CheckboxType::class, [
                'mapped' => false,
                'required' => true,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez acceptez d\être recontacté par BigMars',
                    ]),
                ],
            ])
            ->add('createdAt', HiddenType::class)
            ->add('updatedAt', HiddenType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
            'validation_groups' => function (FormInterface $form): array {
                $entity = $form->getData();
                return $entity->getType() === 'Entreprise' ? ['company'] : ['talent'];
            },
        ]);
    }
}
