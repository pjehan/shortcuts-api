<?php

namespace App\DataFixtures;

use App\Entity\Shortcut;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ShortcutFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $indentPhpStorm = new Shortcut();
        $indentPhpStorm->setTitle("Indentation du code dans PHPStorm");
        $indentPhpStorm->setSoftware($this->getReference('phpstorm'));
        $indentPhpStorm->addCategory($this->getReference('development'));
        $indentPhpStorm->addCategory($this->getReference('php'));
        $indentPhpStorm->addCategory($this->getReference('js'));
        $indentPhpStorm->setWindows('Ctrl Alt i');
        $indentPhpStorm->setMacos('Ctrl Alt l');
        $indentPhpStorm->setLinux('Ctrl Alt l');
        $indentPhpStorm->setContext('Dans un fichier .php');
        $indentPhpStorm->setDescription('Indentation automatique du code PHP et suppression des espaces inutiles.');
        $manager->persist($indentPhpStorm);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            SoftwareFixtures::class,
            CategoryFixtures::class
        ];
    }
}
