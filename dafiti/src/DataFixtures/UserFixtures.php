<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail('123@123.com.br')
        ->setPassword('$2y$13$HnTNtNpsRvsH8FUJyuVqouqPB32koVC8Uk4BnMB5evRcj/qgYICbK');
        $manager->persist($user);
        $manager->flush();
    }
}
