<?php

namespace App\DataFixtures;

use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProjectFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $project1 = new Project();
        $project1->setTitle('Boite à lire');
        $project1->setPicture('boite-a-lire.jpg');
        $project1->setExcerpt('Permettre l\'échange de livre entre particuliers.');
        $project1->setDescription('Un système de boites communautaires où le dépôt et la récupération des ouvrages est gratuit, anonyme et ouvert toute l\'année, tous les jours. Le but est d\'encourager la lecture et la solidarité. Très peu d\'entretien, un seul volontaire peut passer de temps en temps voir si la boite est bien entretenue et propre.');
        $project1->setCost(3000);
        $project1->setUser($this->getReference('user-mchirac'));
        $project1->addCategory($this->getReference('cat-culture'));
        $project1->addCategory($this->getReference('cat-loisir'));
        $project1->setCity($this->getReference('city-laval'));
        $manager->persist($project1);
        $this->addReference("p-boite", $project1);

        $project2 = new Project();
        $project2->setTitle('Potager sur les toits');
        $project2->setPicture('potager-toit.jpg');
        $project2->setExcerpt('Aménager des potagers sur les toits de la ville.');
        $project2->setDescription('Un project orienté autour de l\'agriculture urbaine, assez couteux mais rentabilisable sur le long terme avec une équipe de volontaires motivés et formés. Ce projet favorisera l\'auto-suffisance sur le long-terme et la ré-appropriation de l\' espace urbain. En outre, il éduque les plus jeunes à la nature et au cycle des saisons');
        $project2->setCost(75000);
        $project2->setUser($this->getReference('user-mchirac'));
        $project2->addCategory($this->getReference('cat-ecologie'));
        $project2->addCategory($this->getReference('cat-sante'));
        $project2->setCity($this->getReference('city-lemans'));
        $manager->persist($project2);
        $this->addReference("p-potager", $project2);

        $project3 = new Project();
        $project3->setTitle('Cinéma en plein air');
        $project3->setPicture('cinema-plein-air.jpg');
        $project3->setExcerpt('Proposer des séances de cinéma en plein 2 soirs par semaine.');
        $project3->setDescription('Beaucoup d\'entre nous ont des souvenirs de séances cinéma plein-air où l\'on jouait avec les copains dans le parc avant le début du film, nous aimerions avec ce projet reproduire ceci et rassembler les gens de la ville, du quartier, autour du partage et de la culture!');
        $project3->setCost(25000);
        $project3->setUser($this->getReference('user-pjehan'));
        $project3->addCategory($this->getReference('cat-culture'));
        $project3->addCategory($this->getReference('cat-loisir'));
        $project3->setCity($this->getReference('city-lemans'));
        $manager->persist($project3);
        $this->addReference("p-cinema", $project3);


        $manager->flush();
    }

    /**
     * @inheritDoc
     */
    public function getDependencies()
    {
        return [
            UserFixtures::class,
            CategoryFixtures::class,
            CityFixtures::class
        ];
    }
}
