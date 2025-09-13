<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\MediaObject;
use App\Entity\Shortcut;
use App\Entity\Software;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ShortcutFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // Software references
        /** @var Software $referenceChrome */
        $referenceChrome = $this->getReference('chrome');
        /** @var Software $referenceFirefox */
        $referenceFirefox = $this->getReference('firefox');
        /** @var Software $referencePhpStorm */
        $referencePhpStorm = $this->getReference('phpstorm');
        /** @var Software $referenceVscode */
        $referenceVscode = $this->getReference('vscode');
        /** @var Software $referenceXd */
        $referenceXd = $this->getReference('xd');

        // Category references
        /** @var Category $referenceDevelopment */
        $referenceDevelopment = $this->getReference('development');
        /** @var Category $referenceDesign */
        $referenceDesign = $this->getReference('design');
        /** @var Category $referencePhp */
        $referencePhp = $this->getReference('php');
        /** @var Category $referenceJs */
        $referenceJs = $this->getReference('js');

        $indentPhpStorm = new Shortcut();
        $indentPhpStorm->setTitle("Indentation du code dans PHPStorm");
        $indentPhpStorm->setSoftware($referencePhpStorm);
        $indentPhpStorm->addCategory($referenceDevelopment);
        $indentPhpStorm->addCategory($referencePhp);
        $indentPhpStorm->addCategory($referenceJs);
        $indentPhpStorm->setWindows('Ctrl Alt i');
        $indentPhpStorm->setMacos('Command Alt l');
        $indentPhpStorm->setLinux('Ctrl Alt l');
        $indentPhpStorm->setContext('Dans un fichier .php');
        $indentPhpStorm->setDescription('Indentation automatique du code PHP et suppression des espaces inutiles.');
        $manager->persist($indentPhpStorm);

        $duplicateLineVscode = new Shortcut();
        $duplicateLineVscode->setTitle("Dupliquer une ligne dans VSCode");
        $duplicateLineVscode->setSoftware($referenceVscode);
        $duplicateLineVscode->addCategory($referenceDevelopment);
        $duplicateLineVscode->setWindows('Ctrl Shift d');
        $duplicateLineVscode->setMacos('Command Shift d');
        $duplicateLineVscode->setLinux('Ctrl Shift d');
        $duplicateLineVscode->setContext('Dans un fichier code');
        $duplicateLineVscode->setDescription('Duplication de la ligne sur laquelle se trouve le curseur dans un fichier.');
        $duplicateLineVscode->setCreatedAt((new \DateTime())->modify("-1 day"));
        $manager->persist($duplicateLineVscode);

        $searchEverywhere = new Shortcut();
        $searchEverywhere->setTitle("Rechercher dans un projet PHPStorm");
        $searchEverywhere->setSoftware($referencePhpStorm);
        $searchEverywhere->addCategory($referenceDevelopment);
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
        $navigateTo->setSoftware($referencePhpStorm);
        $navigateTo->addCategory($referenceDevelopment);
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
        $extendSelection->setSoftware($referencePhpStorm);
        $extendSelection->addCategory($referenceDevelopment);
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
        $multipleCursors->setSoftware($referencePhpStorm);
        $multipleCursors->addCategory($referenceDevelopment);
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
        $selectionTool->setSoftware($referenceXd);
        $selectionTool->addCategory($referenceDesign);
        $selectionTool->setWindows('V');
        $selectionTool->setMacos('V');
        $selectionTool->setLinux('V');
        $selectionTool->setContext('Dans un fichier Adobe XD');
        $selectionTool->setDescription('Permet d\'ouvrir rapidement l\'outil de sélection.');
        $selectionTool->setCreatedAt((new \DateTime())->modify("-5 month"));
        $manager->persist($selectionTool);

        $commentCode = new Shortcut();
        $commentCode->setTitle("Commenter/décommenter du code dans PHPStorm");
        $commentCode->setSoftware($referencePhpStorm);
        $commentCode->addCategory($referenceDevelopment);
        $commentCode->setWindows('Ctrl /');
        $commentCode->setMacos('Command /');
        $commentCode->setLinux('Ctrl /');
        $commentCode->setContext('Dans un fichier source');
        $commentCode->setDescription('Permet de commenter ou décommenter rapidement une ligne ou un bloc de code.');
        $commentCode->setCreatedAt((new \DateTime())->modify("-3 weeks"));
        $manager->persist($commentCode);

        $duplicateLinePhpStorm = new Shortcut();
        $duplicateLinePhpStorm->setTitle("Dupliquer une ligne dans PHPStorm");
        $duplicateLinePhpStorm->setSoftware($referencePhpStorm);
        $duplicateLinePhpStorm->addCategory($referenceDevelopment);
        $duplicateLinePhpStorm->setWindows('Ctrl D');
        $duplicateLinePhpStorm->setMacos('Command D');
        $duplicateLinePhpStorm->setLinux('Ctrl D');
        $duplicateLinePhpStorm->setContext('Dans un fichier source');
        $duplicateLinePhpStorm->setDescription('Duplique la ligne courante ou les lignes sélectionnées.');
        $duplicateLinePhpStorm->setCreatedAt((new \DateTime())->modify("-2 weeks"));
        $manager->persist($duplicateLinePhpStorm);

        $deleteLinePhpStorm = new Shortcut();
        $deleteLinePhpStorm->setTitle("Supprimer une ligne dans PHPStorm");
        $deleteLinePhpStorm->setSoftware($referencePhpStorm);
        $deleteLinePhpStorm->addCategory($referenceDevelopment);
        $deleteLinePhpStorm->setWindows('Ctrl Y');
        $deleteLinePhpStorm->setMacos('Command Backspace');
        $deleteLinePhpStorm->setLinux('Ctrl Y');
        $deleteLinePhpStorm->setContext('Dans un fichier source');
        $deleteLinePhpStorm->setDescription('Supprime la ligne courante ou les lignes sélectionnées.');
        $deleteLinePhpStorm->setCreatedAt((new \DateTime())->modify("-1 week"));
        $manager->persist($deleteLinePhpStorm);

        $openFile = new Shortcut();
        $openFile->setTitle("Ouvrir un fichier rapidement dans PHPStorm");
        $openFile->setSoftware($referencePhpStorm);
        $openFile->addCategory($referenceDevelopment);
        $openFile->setWindows('Ctrl Shift N');
        $openFile->setMacos('Command Shift O');
        $openFile->setLinux('Ctrl Shift N');
        $openFile->setContext('Dans PHPStorm');
        $openFile->setDescription('Ouvre rapidement un fichier par son nom.');
        $openFile->setCreatedAt((new \DateTime())->modify("-4 days"));
        $manager->persist($openFile);

        $refactorRename = new Shortcut();
        $refactorRename->setTitle("Renommer un élément dans PHPStorm");
        $refactorRename->setSoftware($referencePhpStorm);
        $refactorRename->addCategory($referenceDevelopment);
        $refactorRename->setWindows('Shift F6');
        $refactorRename->setMacos('Shift F6');
        $refactorRename->setLinux('Shift F6');
        $refactorRename->setContext('Sur une variable, méthode ou classe');
        $refactorRename->setDescription('Renomme intelligemment une variable, méthode ou classe dans tout le projet.');
        $refactorRename->setCreatedAt((new \DateTime())->modify("-6 days"));
        $manager->persist($refactorRename);

        $newTabChrome = new Shortcut();
        $newTabChrome->setTitle("Ouvrir un nouvel onglet dans Chrome");
        $newTabChrome->setSoftware($referenceChrome);
        $newTabChrome->addCategory($referenceDevelopment);
        $newTabChrome->setWindows('Ctrl T');
        $newTabChrome->setMacos('Command T');
        $newTabChrome->setLinux('Ctrl T');
        $newTabChrome->setContext('Dans le navigateur Chrome');
        $newTabChrome->setDescription('Ouvre un nouvel onglet dans le navigateur.');
        $newTabChrome->setCreatedAt((new \DateTime())->modify("-2 days"));
        $manager->persist($newTabChrome);

        $devToolsChrome = new Shortcut();
        $devToolsChrome->setTitle("Ouvrir les outils de développement dans Chrome");
        $devToolsChrome->setSoftware($referenceChrome);
        $devToolsChrome->addCategory($referenceDevelopment);
        $devToolsChrome->setWindows('F12');
        $devToolsChrome->setMacos('Command Option I');
        $devToolsChrome->setLinux('F12');
        $devToolsChrome->setContext('Dans le navigateur Chrome');
        $devToolsChrome->setDescription('Ouvre les outils de développement pour déboguer une page web.');
        $devToolsChrome->setCreatedAt((new \DateTime())->modify("-1 day"));
        $manager->persist($devToolsChrome);

        $refreshChrome = new Shortcut();
        $refreshChrome->setTitle("Actualiser la page dans Chrome");
        $refreshChrome->setSoftware($referenceChrome);
        $refreshChrome->addCategory($referenceDevelopment);
        $refreshChrome->setWindows('F5');
        $refreshChrome->setMacos('Command R');
        $refreshChrome->setLinux('F5');
        $refreshChrome->setContext('Dans le navigateur Chrome');
        $refreshChrome->setDescription('Actualise la page web courante.');
        $refreshChrome->setCreatedAt((new \DateTime())->modify("-3 hours"));
        $manager->persist($refreshChrome);

        $commandPaletteVscode = new Shortcut();
        $commandPaletteVscode->setTitle("Ouvrir la palette de commandes dans VSCode");
        $commandPaletteVscode->setSoftware($referenceVscode);
        $commandPaletteVscode->addCategory($referenceDevelopment);
        $commandPaletteVscode->setWindows('Ctrl Shift P');
        $commandPaletteVscode->setMacos('Command Shift P');
        $commandPaletteVscode->setLinux('Ctrl Shift P');
        $commandPaletteVscode->setContext('Dans VSCode');
        $commandPaletteVscode->setDescription('Ouvre la palette de commandes pour accéder rapidement aux fonctionnalités.');
        $commandPaletteVscode->setCreatedAt((new \DateTime())->modify("-1 hour"));
        $manager->persist($commandPaletteVscode);

        $quickOpenVscode = new Shortcut();
        $quickOpenVscode->setTitle("Ouverture rapide de fichier dans VSCode");
        $quickOpenVscode->setSoftware($referenceVscode);
        $quickOpenVscode->addCategory($referenceDevelopment);
        $quickOpenVscode->setWindows('Ctrl P');
        $quickOpenVscode->setMacos('Command P');
        $quickOpenVscode->setLinux('Ctrl P');
        $quickOpenVscode->setContext('Dans VSCode');
        $quickOpenVscode->setDescription('Ouvre rapidement un fichier en tapant son nom.');
        $quickOpenVscode->setCreatedAt((new \DateTime())->modify("-30 minutes"));
        $manager->persist($quickOpenVscode);

        $multiSelectVscode = new Shortcut();
        $multiSelectVscode->setTitle("Sélection multiple dans VSCode");
        $multiSelectVscode->setSoftware($referenceVscode);
        $multiSelectVscode->addCategory($referenceDevelopment);
        $multiSelectVscode->setWindows('Ctrl D');
        $multiSelectVscode->setMacos('Command D');
        $multiSelectVscode->setLinux('Ctrl D');
        $multiSelectVscode->setContext('Dans un fichier VSCode');
        $multiSelectVscode->setDescription('Sélectionne la prochaine occurrence du texte sélectionné.');
        $multiSelectVscode->setCreatedAt((new \DateTime())->modify("-15 minutes"));
        $manager->persist($multiSelectVscode);

        $rectangleTool = new Shortcut();
        $rectangleTool->setTitle("Outil rectangle dans Adobe XD");
        $rectangleTool->setSoftware($referenceXd);
        $rectangleTool->addCategory($referenceDesign);
        $rectangleTool->setWindows('R');
        $rectangleTool->setMacos('R');
        $rectangleTool->setLinux('R');
        $rectangleTool->setContext('Dans Adobe XD');
        $rectangleTool->setDescription('Active l\'outil rectangle pour créer des formes rectangulaires.');
        $rectangleTool->setCreatedAt((new \DateTime())->modify("-10 minutes"));
        $manager->persist($rectangleTool);

        $textTool = new Shortcut();
        $textTool->setTitle("Outil texte dans Adobe XD");
        $textTool->setSoftware($referenceXd);
        $textTool->addCategory($referenceDesign);
        $textTool->setWindows('T');
        $textTool->setMacos('T');
        $textTool->setLinux('T');
        $textTool->setContext('Dans Adobe XD');
        $textTool->setDescription('Active l\'outil texte pour ajouter du texte aux designs.');
        $textTool->setCreatedAt((new \DateTime())->modify("-5 minutes"));
        $manager->persist($textTool);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            SoftwareFixtures::class,
            CategoryFixtures::class
        ];
    }
}
