<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categories = [
            ['Développement', 'development'],
            ['Design', 'design'],
            ['PHP', 'php'],
            ['JavaScript', 'js'],
        ];

        foreach ($categories as $category) {
            $c = new Category();
            $c->setName($category[0]);
            $manager->persist($c);
            $this->addReference($category[1], $c);
        }

        $manager->flush();
    }
}
