<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $category1 = new Category();
        $category1->setLabel('Ecologie');
        $manager->persist($category1);
        $this->addReference("cat-ecologie", $category1);

        $category2 = new Category();
        $category2->setLabel('Loisir');
        $manager->persist($category2);
        $this->addReference("cat-loisir", $category2);

        $category3 = new Category();
        $category3->setLabel('Santé');
        $manager->persist($category3);
        $this->addReference("cat-sante", $category3);

        $category4 = new Category();
        $category4->setLabel('Culture');
        $manager->persist($category4);
        $this->addReference("cat-culture", $category4);

        $manager->flush();
    }
}
