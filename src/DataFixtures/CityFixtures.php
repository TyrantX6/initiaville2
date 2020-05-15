<?php

namespace App\DataFixtures;

use App\Entity\City;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CityFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $laval = new City();
        $laval->setPicture('laval.jpg');
        $laval->setName('Laval');
        $manager->persist($laval);
        $this->addReference('city-laval', $laval);

        $rennes = new City();
        $rennes->setPicture('rennes.jpg');
        $rennes->setName('Rennes');
        $manager->persist($rennes);
        $this->addReference('city-rennes', $rennes);

        $vannes = new City();
        $vannes->setPicture('vannes.jpg');
        $vannes->setName('Vannes');
        $manager->persist($vannes);
        $this->addReference('city-vannes', $vannes);

        $stmalo = new City();
        $stmalo->setPicture('st-malo.jpg');
        $stmalo->setName('St-Malo');
        $manager->persist($stmalo);
        $this->addReference('city-stmalo', $stmalo);

        $lemans = new City();
        $lemans->setPicture('lemans.jpg');
        $lemans->setName('Le Mans');
        $manager->persist($lemans);
        $this->addReference('city-lemans', $lemans);

        $manager->flush();
    }
}
