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

        $adminRole = new Role();
        $adminRole->setTitle('ROLE_ADMIN');
        $manager->persist($adminRole);

        /* creation of an admin user */
        $adminUser = new User();
        $adminUser
            ->setFirstName('Mike')
            ->setLastName('Serva')
            ->setEmail('admin@gmail.com')
            ->setPseudo('admin')
            ->setPassword($this->encoder->hashPassword($adminUser, '95610b405A!'))
            ->setPicture('https://randomuser.me/api/portraits/lego/0.jpg')
            ->setGenre('male')
            ->addUserRole($adminRole);
        $manager->persist($adminUser);


        $users = [];
        $genres = ['male', 'female'];
        for ($i = 1; $i < 30; $i++) {
            /* creation of a new user */
            $user = new User();
            /* creation of a random genre */

            $password = $this->encoder->hashPassword($user, '95610b405A!');
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
