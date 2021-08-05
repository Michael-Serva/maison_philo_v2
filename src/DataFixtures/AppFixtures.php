<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr-Fr');
        for ($i=1; $i < 30; $i++) { 
            $user = new User();
            $user->setEmail($faker->email)
            ->setfirstName($faker->firstName)
            ->setLastName($faker->lastName)
            ->setHash("95610b405A!");
            $manager->persist($user);
        }
        $manager->flush();
    }
}
