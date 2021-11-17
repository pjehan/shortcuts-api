<?php

namespace App\DataFixtures;

use App\Entity\MediaObject;
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
        $indentPhpStorm->setMacos('Command Alt l');
        $indentPhpStorm->setLinux('Ctrl Alt l');
        $indentPhpStorm->setContext('Dans un fichier .php');
        $indentPhpStorm->setDescription('Indentation automatique du code PHP et suppression des espaces inutiles.');
        $manager->persist($indentPhpStorm);

        $duplicateLineVscode = new Shortcut();
        $duplicateLineVscode->setTitle("Dupliquer une ligne dans VSCode");
        $duplicateLineVscode->setSoftware($this->getReference('vscode'));
        $duplicateLineVscode->addCategory($this->getReference('development'));
        $duplicateLineVscode->setWindows('Ctrl Shift d');
        $duplicateLineVscode->setMacos('Command Shift d');
        $duplicateLineVscode->setLinux('Ctrl Shift d');
        $duplicateLineVscode->setContext('Dans un fichier code');
        $duplicateLineVscode->setDescription('Duplication de la ligne sur laquelle se trouve le curseur dans un fichier.');
        $duplicateLineVscode->setCreatedAt((new \DateTime())->modify("-1 day"));
        $manager->persist($duplicateLineVscode);

        $searchEverywhere = new Shortcut();
        $searchEverywhere->setTitle("Rechercher dans un projet PHPStorm");
        $searchEverywhere->setSoftware($this->getReference('phpstorm'));
        $searchEverywhere->addCategory($this->getReference('development'));
        $searchEverywhere->setWindows('Shift Shift');
        $searchEverywhere->setMacos('Shift Shift');
        $searchEverywhere->setLinux('Shift Shift');
        $searchEverywhere->setContext('Dans le logiciel PHPStorm');
        $searchEverywhere->setDescription('Permet de rechercher n\'importe quoi (fichier, fonction, variable...) dans un projet.');
        $searchEverywhereImage = new MediaObject();
        $searchEverywhereImage->filePath = 'search-everywhere.png';
        $searchEverywhere->setImage($searchEverywhereImage);
        $searchEverywhere->setCreatedAt((new \DateTime())->modify("-5 day"));
        $manager->persist($searchEverywhere);

        $navigateTo = new Shortcut();
        $navigateTo->setTitle("Naviguer vers dans PHPStorm");
        $navigateTo->setSoftware($this->getReference('phpstorm'));
        $navigateTo->addCategory($this->getReference('development'));
        $navigateTo->setWindows('Ctrl Click');
        $navigateTo->setMacos('Ctrl Click');
        $navigateTo->setLinux('Ctrl Click');
        $navigateTo->setContext('Dans un fichier source dans le logiciel PHPStorm');
        $navigateTo->setDescription('Permet de naviguer rapidement vers la déclaration d\'une fonction, d\'une méthode, d\'une variable...');
        $navigateToImage = new MediaObject();
        $navigateToImage->filePath = 'gotodeclaration.gif';
        $navigateTo->setImage($navigateToImage);
        $navigateTo->setCreatedAt((new \DateTime())->modify("-3 day"));
        $manager->persist($navigateTo);

        $extendSelection = new Shortcut();
        $extendSelection->setTitle("Etendre la sélection dans PHPStorm");
        $extendSelection->setSoftware($this->getReference('phpstorm'));
        $extendSelection->addCategory($this->getReference('development'));
        $extendSelection->setWindows('Ctrl W');
        $extendSelection->setMacos('Command ⬆️');
        $extendSelection->setLinux('Ctrl W');
        $extendSelection->setContext('Dans un fichier source dans le logiciel PHPStorm');
        $extendSelection->setDescription('Permet de sélectionner rapidement un bloc de code.');
        $extendSelectionImage = new MediaObject();
        $extendSelectionImage->filePath = 'extendselection.gif';
        $extendSelection->setImage($extendSelectionImage);
        $extendSelection->setCreatedAt((new \DateTime())->modify("-1 month"));
        $manager->persist($extendSelection);

        $multipleCursors = new Shortcut();
        $multipleCursors->setTitle("Avoir plusieurs curseurs dans PHPStorm");
        $multipleCursors->setSoftware($this->getReference('phpstorm'));
        $multipleCursors->addCategory($this->getReference('development'));
        $multipleCursors->setWindows('Alt Click');
        $multipleCursors->setMacos('Alt Click️');
        $multipleCursors->setLinux('Alt Click');
        $multipleCursors->setContext('Dans un fichier source dans le logiciel PHPStorm');
        $multipleCursors->setDescription('Permet de créer plusieurs curseurs.');
        $multipleCursorsImage = new MediaObject();
        $multipleCursorsImage->filePath = 'multiplecursors.gif';
        $multipleCursors->setImage($multipleCursorsImage);
        $multipleCursors->setCreatedAt((new \DateTime())->modify("-2 month"));
        $manager->persist($multipleCursors);

        $selectionTool = new Shortcut();
        $selectionTool->setTitle("Outil de sélection dans Adobe XD");
        $selectionTool->setSoftware($this->getReference('xd'));
        $selectionTool->addCategory($this->getReference('design'));
        $selectionTool->setWindows('V');
        $selectionTool->setMacos('V');
        $selectionTool->setLinux('V');
        $selectionTool->setContext('Dans un fichier Adobe XD');
        $selectionTool->setDescription('Permet d\'ouvrir rapidement l\'outil de sélection.');
        $selectionTool->setCreatedAt((new \DateTime())->modify("-5 month"));
        $manager->persist($selectionTool);

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
