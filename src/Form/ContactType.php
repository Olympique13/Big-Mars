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
            ->add('message')
            ->add('type', ChoiceType::class, [
                'data' => 'Joueur',
                'choices' => [
                    'Un joueur' => 'Joueur',
                    'Une entreprise' => 'Entreprise',
                ],
                'expanded' => true,
                'multiple' => false,
                'empty_data' => 'Joueur',
            ])
            ->add('zipCode')
            ->add('company', TextType::class, [
                'required' => false,
                'empty_data' => '',
            ])
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
                return $entity->getType() === 'Entreprise' ? ['company'] : ['Default'];
            },
        ]);
    }
}
