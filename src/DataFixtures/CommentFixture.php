<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CommentFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $comment1 = new Comment();
        $comment1->setTitle("C'est une super idée!");
        $comment1->setContent("Je vous soutiens et j'aimerais participer une fois mis en place.");
        $comment1->setProject($this->getReference('p-potager'));
        $comment1->setUser($this->getReference('user-tpottier'));
        $manager->persist($comment1);

        $comment2 = new Comment();
        $comment2->setTitle("Avec des ruches!");
        $comment2->setContent("On pourrait également installer des ruches sur le toit. Cela permettrait d'améliorer la bio-diversité et contribuerait au bon développement du potager. Il faudrait peut-être d'autres insectes nécessaires permettant de combattre les nuisibles (pucerons, limaces...).");
        $comment2->setProject($this->getReference('p-potager'));
        $comment2->setUser($this->getReference('user-pjehan'));
        $manager->persist($comment2);

        $comment3 = new Comment();
        $comment3->setTitle("Programmation");
        $comment3->setContent("Je propose qu'un film sur 2 soit en VOSTFR pour développer la lecture et profiter de la beauté des langues étrangères.");
        $comment3->setProject($this->getReference('p-cinema'));
        $comment3->setUser($this->getReference('user-imartinez'));
        $manager->persist($comment3);

        $comment4 = new Comment();
        $comment4->setTitle("Post-it");
        $comment4->setContent("Ca serait super cool si les gens mettaient un petit post-it sur les livres déposés pour donner envie de les lire, même les emprunteurs qui le remettent!");
        $comment4->setProject($this->getReference('p-boite'));
        $comment4->setUser($this->getReference('user-mchirac'));
        $manager->persist($comment4);



        $manager->flush();
    }

    /**
     * @inheritDoc
     */
    public function getDependencies()
    {
        return [
            ProjectFixtures::class,
            UserFixtures::class
        ];
    }
}
