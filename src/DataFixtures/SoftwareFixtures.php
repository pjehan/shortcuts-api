<?php

namespace App\DataFixtures;

use App\Entity\Software;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SoftwareFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $softwares = [
            ['Google Chrome', 'chrome'],
            ['Firefox', 'firefox'],
            ['PHPStorm', 'phpstorm'],
            ['Visual Studio Code', 'vscode'],
            ['XD', 'xd'],
        ];

        foreach ($softwares as $software) {
            $s = new Software();
            $s->setName($software[0]);
            $s->setLogo($software[1]);
            $manager->persist($s);
            $this->addReference($software[1], $s);
        }

        $manager->flush();
    }
}
