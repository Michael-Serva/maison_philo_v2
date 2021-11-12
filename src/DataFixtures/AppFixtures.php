<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Role;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $encoder;
    /*allows to use $this->encoder in the whole fixture */
    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
        //dd(get_class_methods(($encoder)));
    }
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr-Fr');

        $userAdmin = new User();
        $password = $this->encoder->hashPassword($userAdmin, 'AAAAA');
        $userAdmin
            ->setEmail("Servam95@gmail.com")
            ->setPseudo("Admin")
            ->setPicture("https://randomuser.me/api/portraits/women")
            ->setPassword($password);
        $manager->persist($userAdmin);
        $manager->flush();

        $faker = Factory::create('fr-Fr');
        $users = [];
        $genres = ['male', 'female'];
        for ($i = 1; $i < 30; $i++) {
            /* creation of a new user */
            $user = new User();
            /* creation of a random genre */

            $password = $this->encoder->hashPassword($user, 'hyJKK!p5246');
            //dd($password);
            $genre = $faker->randomElement($genres);
            $pictureId = $faker->numberBetween(1, 99) . '.jpg';
            $picture = "https://randomuser.me/api/portraits/" . ($genre == 'male' ? 'men/' : 'women/') . $pictureId;
            if ($genre == 'male') {
                $user->setfirstName($faker->firstNameMale);
            } elseif ($genre == 'female') {
                $user->setfirstName($faker->firstNameFemale);
            }
            $user
                ->setEmail($faker->email)
                ->setPseudo($faker->city)
                ->setLastName($faker->lastName)
                ->setPassword($password)
                ->setPicture($picture)
                ->setGenre($genre);
            $manager->persist($user);
            $users[] = $user;
        }
        $manager->flush();
    }
}
