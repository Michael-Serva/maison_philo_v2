<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{

public function __construct(UserPasswordHasherInterface $encoder)
{
}
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr-Fr');
        $users = [];
        $genres = ['male', 'female'];
        for ($i=1; $i < 30; $i++) { 
            /* creation of a new user */
            $user = new User();
            /* creation of a random genre */
            $genre = $faker->randomElement($genres);
            $picture = 'https://randomuser.me/api/portraits/men/1.jpg';
            $pictureId = $faker->numberBetween(1,99).'.jpg';
            $picture .= ($genre == 'male' ? 'men/' : 'female/'); //$picture = $picture.($genre == 'male' ? 'men/' : 'female/');
            $user->setEmail($faker->email)
            ->setfirstName($faker->firstName)
            ->setLastName($faker->lastName)
            ->setHash("95610b405A!")
            ->setPicture($picture)
            ->setGenre($genre);
            $manager->persist($user);
            $users[] = $user;
        }
        $manager->flush();
    }
}
