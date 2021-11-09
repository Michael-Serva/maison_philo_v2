<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProductFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $wheelchairs = [
            [
                'title' => 'Fauteuil Roulant Pliant Enigma LAWC001',
                'price' => 177000,
                'stock' => 6,
                'image' => '20211108202918fauteuil-roulant-pliable-grandes-roues-leger-valencia-clinicalfy-6189889e96a9a.jpg',
                'description' => 'Pratique|léger|confortable et fiable',
                'description1' => "Le fauteuil roulant Enigma LAWC001 est un des fauteuils les plus distribués dans le monde.|
                La légèreté de son cadre en aluminium à croisillons permet d'obtenir un poids
                de transport de 11 kg sans les roues.|
                Le fauteuil roulant manuel Enigma LAWC001 Drive Medical offre un large éventail de fonctionnalités
                qui en font un des fauteuils les plus pratiques, confortables et fiables",
                'description2' => 'Drive',
                'description3' =>
                "Fauteuil pliant par croisillons à blocage rapide|
                Roues à démontage rapide par boutons poussoirs|
                Dossier rabattable pour faciliter le transport et le rangement|
                Poignées Tierce Personne|
                Leviers de basculement pour faciliter le franchissement de petits obstacles|
                Protège vêtements|
                Accoudoirs rembourrés très confortables|
                Roues de 24 Pouces avec pneus gonflés|
                Potences repose-pieds amovibles et réglables 5 positions|
                Freins d'immobilisation crantés pour une meilleure sécurité|
                Sacoche de rangement derrière le dossier à fermeture velcro|
                Ceinture de sécurité|
                Languette porte clés|
                Cadre en aluminium avec finition argent|
                Siège profond en nylon|
                11,5 Kg sans les roues",
            ]
        ];

        foreach ($wheelchairs as $wheelchair) {

            $product = new Product();
            $product
                ->setTitle($wheelchair['title'])
                ->setPrice($wheelchair['price'])
                ->setImage($wheelchair['image'])
                ->setStock($wheelchair['stock'])
                ->setDescription($wheelchair['description'])
                ->setDescription1($wheelchair['description1'])
                ->setDescription2($wheelchair['description2'])
                ->setDescription3($wheelchair['description3']);

            $manager->persist($product);
            $manager->flush();
        }
    }
}
