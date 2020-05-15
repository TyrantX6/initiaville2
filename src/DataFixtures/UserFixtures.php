<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture



{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setFirstname("Thomas");
        $admin->setLastname('Pottier');
        $admin->setEmail("thomas.pottier60@gmail.com");
        $admin->setPassword($this->encoder->encodePassword($admin, "tpottier"));
        $admin->setRoles(["ROLE_ADMIN"]);
        $manager->persist($admin);
        $this->addReference("user-tpottier", $admin);

        $user = new User();
        $user->setFirstname("Pierre");
        $user->setLastname('Jehan');
        $user->setEmail("pierre.jehan@gmail.com");
        $user->setPassword($this->encoder->encodePassword($user, "pjehan"));
        $manager->persist($user);
        $this->addReference("user-pjehan", $user);

        $user2 = new User();
        $user2->setFirstname("Martine");
        $user2->setLastname('Chirac');
        $user2->setEmail("martine@gmail.com");
        $user2->setPassword($this->encoder->encodePassword($user2, "mchirac"));
        $manager->persist($user2);
        $this->addReference("user-mchirac", $user2);

        $user3 = new User();
        $user3->setFirstname("Isabella");
        $user3->setLastname('Martinez');
        $user3->setEmail("isabellam@gmail.com");
        $user3->setPassword($this->encoder->encodePassword($user3, "imartinez"));
        $manager->persist($user3);
        $this->addReference("user-imartinez", $user3);

        $manager->flush();
    }
}
