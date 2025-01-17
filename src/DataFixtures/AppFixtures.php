<?php

namespace App\DataFixtures;

use App\Entity\Event;
use App\Entity\Category;
use App\Entity\Place;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $count = 1;

        for ($p = 0; $p < 2; $p++) {
            $place = new Place();
            $place->setAdresse('adresse ' . $p);
            $place->setVille('ville ' . $p);
            $place->setCPostal(1234 . $p);
            $place->setCreatedAt(new \DateTimeImmutable());
            $place->setUpdatedAt(new \DateTimeImmutable());
            $manager->persist($place);

            for ($c = 0; $c < 5; $c++) {
                $category = new Category();
                $category->setName('category ' . $c);
                $category->setSlug(str_replace(' ', '-', $category->getName()));
                $category->setCreatedAt(new \DateTimeImmutable());
                $category->setUpdatedAt(new \DateTimeImmutable());
                $manager->persist($category);

                for ($a = 0; $a < 1; $a++) {
                    $event = new Event();
                    $event->setCategory($category);
                    $event->setTitle('event ' . $count);
                    $event->setSlug(str_replace(' ', '-', $event->getTitle()));
                    $event->setPlace($place);
                    $event->setCreatedAt(new \DateTimeImmutable());
                    $event->setEventDate(new \DateTimeImmutable());
                    $event->setContent('contenu de l\'évent ' . $count);
                    $event->setUpdatedAt(new \DateTimeImmutable());

                    $manager->persist($event);
                    $count++;
                }
            }
        }
        $manager->flush();
    }
}
