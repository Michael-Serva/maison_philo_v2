<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Faker\Factory;
use App\Entity\Product;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProductFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr-Fr');
        for ($i = 1; $i < 30; $i++) {
            # code...
            $product = new Product();
            $product
                ->setTitle($faker->city)
                ->setPrice($faker->randomNumber)
                ->setImage('https://randomuser.me/api/portraits/lego/' . $i . '.jpg')
                ->setDescription($faker->text)
                ->setStock($faker->randomDigit);
            $manager->persist($product);

            $manager->flush();
        }
    }
}
