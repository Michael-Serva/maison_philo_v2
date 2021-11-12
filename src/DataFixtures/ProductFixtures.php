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
                'image' =>
                '20211108202918fauteuil-roulant-pliable-grandes-roues-leger-valencia-clinicalfy-6189889e96a9a.jpg',
                'description' => 'Pratique|Léger|Confortable et fiable',
                'description1' =>
                "Le fauteuil roulant Enigma LAWC001 est un des fauteuils les plus distribués dans le monde.|
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
            ],
            [
                'title' => "Fauteuil roulant Vermeiren V300 XXL Dossier Fixe",
                'price' => 363000,
                'stock' => "1",
                'image' => "Fauteuil-roulant-Vermeiren-V300-XXL-Dossier-Fixe.jpg",
                'description' => "Meilleur rapport qualité prix des fauteuils XXL|Nombreuses possibilités de réglage|Design et léger",
                'description1' => "
                    Le tout nouveau Vermeiren V300 XXL à dossier fixe est le fauteuil roulant modulable le mieux équipé du marché.|
                    En effet, le V300 XXL dispose de nombreux réglages et est équipé de série d'une 
                    multitude d'éléments comme la roulette anti-bascule 2 en 1 avec monte trottoir 
                    intégré, une assise et un dossier rembourrés réglables en tension, les freins à 
                    poignées longues rabattables pour faciliter le transfert, les accoudoirs en T 
                    amovibles, réversibles et réglables en hauteur ainsi que les poignées de poussée courtes.|
                    Design, modulable, pliable et léger le V300 XXL dossier fixe conviendra aussi 
                    bien pour un usage intérieur ou extérieur.|
                    Le fauteuil roulant Vermeiren V300 XXL s'adapte à vous et non l'inverse. C'est un 
                    fauteuil confortable et pratique grâce à ses nombreuses possibilités de réglage 
                    d'assise (hauteur, profondeur, inclinaison et tension).|
                    Le V300 XXL dispose bien sur de tous les éléments classiques d'un fauteuil roulant: 
                    grandes roues 24\" avec main courante alu, repose-pieds amovibles et il est équipé 
                    d'un double croisillon renforcé pour un design optimal et une légèreté accrue.|
                    Le Vermeiren V300 XXL est le meilleur rapport qualité/prix du marché grâce à sa 
                    vaste gamme d'accessoires de série, sa très grande qualité de finition et son 
                    confort hors du commun dans cette gamme de prix.|
                    Prescription médicale : VHP, propulsion manuelle, pliant, à dossier non inclinable,
                     VERMEIREN LPPR 9122012|
                    MonFauteuilRoulant.com est l'enseigne Internet de la Société Française 
                    Erian Company, Etablissement Spécialisé habilité à délivrer des Feuilles de Soins 
                    CERFA; vous permettant d'obtenir le remboursement LPPR, sous réserve de l'obtention 
                    d'une prescription médicale, délivrée par un Médecin.|
                    Le Personnel Technique est formé pour vous guider dans la configuration DU fauteuil 
                    roulant qui VOUS convient en tenant compte de VOS spécificités.
                ",
                'description2' => "Vermeiren",
                'description3' => "
                    Dossier fixe
                    Poids maxi utilisateur 170 kg
                    Largeur d'assise personnalisable de 53 à 60 cm
                    Hauteur d'assise réglable de 45 à 53 cm
                    Profondeur d'assise réglable de 44 à 53 cm
                    Toile d'assise réglable en tension (5 sangles)
                    Toile de dossier réglable en tension (5 sangles)
                    Roulette anti-bascule 2 en 1 avec monte trottoir
                    Poids : 21kg
                    Repose-pieds escamotables et amovibles
                    Freins avec poignées longues escamotables
                    Accoudoirs en T réversibles, amovibles, escamotables, réglables en hauteur et profondeur
                    Poignées de poussée courtes
                    Disponible en bleu ou champagne
                    Un fauteuil Roulant Vermeiren V300 XXL à Dossier fixe
                    Garantie 2 ans contre tout vice de construction résultant d’un défaut de matière ou de fabrication
                "
            ],
            [
                'title' => "Fauteuil roulant Vermeiren V300 XXL Dossier Fixe",
                'price' => 363000,
                'stock' => "1",
                'image' => "Fauteuil-roulant-Vermeiren-V300-XXL-Dossier-Fixe.jpg",
                'description' => "Meilleur rapport qualité prix des fauteuils XXL|Nombreuses possibilités de réglage|Design et léger",
                'description1' => "
                    Le tout nouveau Vermeiren V300 XXL à dossier fixe est le fauteuil roulant modulable le mieux équipé du marché.|
                    En effet, le V300 XXL dispose de nombreux réglages et est équipé de série d'une 
                    multitude d'éléments comme la roulette anti-bascule 2 en 1 avec monte trottoir 
                    intégré, une assise et un dossier rembourrés réglables en tension, les freins à 
                    poignées longues rabattables pour faciliter le transfert, les accoudoirs en T 
                    amovibles, réversibles et réglables en hauteur ainsi que les poignées de poussée courtes.|
                    Design, modulable, pliable et léger le V300 XXL dossier fixe conviendra aussi 
                    bien pour un usage intérieur ou extérieur.|
                    Le fauteuil roulant Vermeiren V300 XXL s'adapte à vous et non l'inverse. C'est un 
                    fauteuil confortable et pratique grâce à ses nombreuses possibilités de réglage 
                    d'assise (hauteur, profondeur, inclinaison et tension).|
                    Le V300 XXL dispose bien sur de tous les éléments classiques d'un fauteuil roulant: 
                    grandes roues 24\" avec main courante alu, repose-pieds amovibles et il est équipé 
                    d'un double croisillon renforcé pour un design optimal et une légèreté accrue.|
                    Le Vermeiren V300 XXL est le meilleur rapport qualité/prix du marché grâce à sa 
                    vaste gamme d'accessoires de série, sa très grande qualité de finition et son 
                    confort hors du commun dans cette gamme de prix.|
                    Prescription médicale : VHP, propulsion manuelle, pliant, à dossier non inclinable,
                     VERMEIREN LPPR 9122012|
                    MonFauteuilRoulant.com est l'enseigne Internet de la Société Française 
                    Erian Company, Etablissement Spécialisé habilité à délivrer des Feuilles de Soins 
                    CERFA; vous permettant d'obtenir le remboursement LPPR, sous réserve de l'obtention 
                    d'une prescription médicale, délivrée par un Médecin.|
                    Le Personnel Technique est formé pour vous guider dans la configuration DU fauteuil 
                    roulant qui VOUS convient en tenant compte de VOS spécificités.
                ",
                'description2' => "Vermeiren",
                'description3' => "
                    Dossier fixe
                    Poids maxi utilisateur 170 kg
                    Largeur d'assise personnalisable de 53 à 60 cm
                    Hauteur d'assise réglable de 45 à 53 cm
                    Profondeur d'assise réglable de 44 à 53 cm
                    Toile d'assise réglable en tension (5 sangles)
                    Toile de dossier réglable en tension (5 sangles)
                    Roulette anti-bascule 2 en 1 avec monte trottoir
                    Poids : 21kg
                    Repose-pieds escamotables et amovibles
                    Freins avec poignées longues escamotables
                    Accoudoirs en T réversibles, amovibles, escamotables, réglables en hauteur et profondeur
                    Poignées de poussée courtes
                    Disponible en bleu ou champagne
                    Un fauteuil Roulant Vermeiren V300 XXL à Dossier fixe
                    Garantie 2 ans contre tout vice de construction résultant d’un défaut de matière ou de fabrication
                "
            ],
            [
                'title' => "Fauteuil roulant Vermeiren V300 XXL Dossier Fixe",
                'price' => 363000,
                'stock' => "1",
                'image' => "Fauteuil-roulant-Vermeiren-V300-XXL-Dossier-Fixe.jpg",
                'description' => "Meilleur rapport qualité prix des fauteuils XXL|Nombreuses possibilités de réglage|Design et léger",
                'description1' => "
                    Le tout nouveau Vermeiren V300 XXL à dossier fixe est le fauteuil roulant modulable le mieux équipé du marché.|
                    En effet, le V300 XXL dispose de nombreux réglages et est équipé de série d'une 
                    multitude d'éléments comme la roulette anti-bascule 2 en 1 avec monte trottoir 
                    intégré, une assise et un dossier rembourrés réglables en tension, les freins à 
                    poignées longues rabattables pour faciliter le transfert, les accoudoirs en T 
                    amovibles, réversibles et réglables en hauteur ainsi que les poignées de poussée courtes.|
                    Design, modulable, pliable et léger le V300 XXL dossier fixe conviendra aussi 
                    bien pour un usage intérieur ou extérieur.|
                    Le fauteuil roulant Vermeiren V300 XXL s'adapte à vous et non l'inverse. C'est un 
                    fauteuil confortable et pratique grâce à ses nombreuses possibilités de réglage 
                    d'assise (hauteur, profondeur, inclinaison et tension).|
                    Le V300 XXL dispose bien sur de tous les éléments classiques d'un fauteuil roulant: 
                    grandes roues 24\" avec main courante alu, repose-pieds amovibles et il est équipé 
                    d'un double croisillon renforcé pour un design optimal et une légèreté accrue.|
                    Le Vermeiren V300 XXL est le meilleur rapport qualité/prix du marché grâce à sa 
                    vaste gamme d'accessoires de série, sa très grande qualité de finition et son 
                    confort hors du commun dans cette gamme de prix.|
                    Prescription médicale : VHP, propulsion manuelle, pliant, à dossier non inclinable,
                     VERMEIREN LPPR 9122012|
                    MonFauteuilRoulant.com est l'enseigne Internet de la Société Française 
                    Erian Company, Etablissement Spécialisé habilité à délivrer des Feuilles de Soins 
                    CERFA; vous permettant d'obtenir le remboursement LPPR, sous réserve de l'obtention 
                    d'une prescription médicale, délivrée par un Médecin.|
                    Le Personnel Technique est formé pour vous guider dans la configuration DU fauteuil 
                    roulant qui VOUS convient en tenant compte de VOS spécificités.
                ",
                'description2' => "Vermeiren",
                'description3' => "
                    Dossier fixe
                    Poids maxi utilisateur 170 kg
                    Largeur d'assise personnalisable de 53 à 60 cm
                    Hauteur d'assise réglable de 45 à 53 cm
                    Profondeur d'assise réglable de 44 à 53 cm
                    Toile d'assise réglable en tension (5 sangles)
                    Toile de dossier réglable en tension (5 sangles)
                    Roulette anti-bascule 2 en 1 avec monte trottoir
                    Poids : 21kg
                    Repose-pieds escamotables et amovibles
                    Freins avec poignées longues escamotables
                    Accoudoirs en T réversibles, amovibles, escamotables, réglables en hauteur et profondeur
                    Poignées de poussée courtes
                    Disponible en bleu ou champagne
                    Un fauteuil Roulant Vermeiren V300 XXL à Dossier fixe
                    Garantie 2 ans contre tout vice de construction résultant d’un défaut de matière ou de fabrication
                "
            ],
            [
                'title' => "Fauteuil roulant Vermeiren V300 XXL Dossier Fixe",
                'price' => 363000,
                'stock' => "1",
                'image' => "Fauteuil-roulant-Vermeiren-V300-XXL-Dossier-Fixe.jpg",
                'description' => "Meilleur rapport qualité prix des fauteuils XXL|Nombreuses possibilités de réglage|Design et léger",
                'description1' => "
                    Le tout nouveau Vermeiren V300 XXL à dossier fixe est le fauteuil roulant modulable le mieux équipé du marché.|
                    En effet, le V300 XXL dispose de nombreux réglages et est équipé de série d'une 
                    multitude d'éléments comme la roulette anti-bascule 2 en 1 avec monte trottoir 
                    intégré, une assise et un dossier rembourrés réglables en tension, les freins à 
                    poignées longues rabattables pour faciliter le transfert, les accoudoirs en T 
                    amovibles, réversibles et réglables en hauteur ainsi que les poignées de poussée courtes.|
                    Design, modulable, pliable et léger le V300 XXL dossier fixe conviendra aussi 
                    bien pour un usage intérieur ou extérieur.|
                    Le fauteuil roulant Vermeiren V300 XXL s'adapte à vous et non l'inverse. C'est un 
                    fauteuil confortable et pratique grâce à ses nombreuses possibilités de réglage 
                    d'assise (hauteur, profondeur, inclinaison et tension).|
                    Le V300 XXL dispose bien sur de tous les éléments classiques d'un fauteuil roulant: 
                    grandes roues 24\" avec main courante alu, repose-pieds amovibles et il est équipé 
                    d'un double croisillon renforcé pour un design optimal et une légèreté accrue.|
                    Le Vermeiren V300 XXL est le meilleur rapport qualité/prix du marché grâce à sa 
                    vaste gamme d'accessoires de série, sa très grande qualité de finition et son 
                    confort hors du commun dans cette gamme de prix.|
                    Prescription médicale : VHP, propulsion manuelle, pliant, à dossier non inclinable,
                     VERMEIREN LPPR 9122012|
                    MonFauteuilRoulant.com est l'enseigne Internet de la Société Française 
                    Erian Company, Etablissement Spécialisé habilité à délivrer des Feuilles de Soins 
                    CERFA; vous permettant d'obtenir le remboursement LPPR, sous réserve de l'obtention 
                    d'une prescription médicale, délivrée par un Médecin.|
                    Le Personnel Technique est formé pour vous guider dans la configuration DU fauteuil 
                    roulant qui VOUS convient en tenant compte de VOS spécificités.
                ",
                'description2' => "Vermeiren",
                'description3' => "
                    Dossier fixe
                    Poids maxi utilisateur 170 kg
                    Largeur d'assise personnalisable de 53 à 60 cm
                    Hauteur d'assise réglable de 45 à 53 cm
                    Profondeur d'assise réglable de 44 à 53 cm
                    Toile d'assise réglable en tension (5 sangles)
                    Toile de dossier réglable en tension (5 sangles)
                    Roulette anti-bascule 2 en 1 avec monte trottoir
                    Poids : 21kg
                    Repose-pieds escamotables et amovibles
                    Freins avec poignées longues escamotables
                    Accoudoirs en T réversibles, amovibles, escamotables, réglables en hauteur et profondeur
                    Poignées de poussée courtes
                    Disponible en bleu ou champagne
                    Un fauteuil Roulant Vermeiren V300 XXL à Dossier fixe
                    Garantie 2 ans contre tout vice de construction résultant d’un défaut de matière ou de fabrication
                "
            ], [
                'title' => "Fauteuil roulant Vermeiren V300 XXL Dossier Fixe",
                'price' => 363000,
                'stock' => "1",
                'image' => "Fauteuil-roulant-Vermeiren-V300-XXL-Dossier-Fixe.jpg",
                'description' => "Meilleur rapport qualité prix des fauteuils XXL|Nombreuses possibilités de réglage|Design et léger",
                'description1' => "
                    Le tout nouveau Vermeiren V300 XXL à dossier fixe est le fauteuil roulant modulable le mieux équipé du marché.|
                    En effet, le V300 XXL dispose de nombreux réglages et est équipé de série d'une 
                    multitude d'éléments comme la roulette anti-bascule 2 en 1 avec monte trottoir 
                    intégré, une assise et un dossier rembourrés réglables en tension, les freins à 
                    poignées longues rabattables pour faciliter le transfert, les accoudoirs en T 
                    amovibles, réversibles et réglables en hauteur ainsi que les poignées de poussée courtes.|
                    Design, modulable, pliable et léger le V300 XXL dossier fixe conviendra aussi 
                    bien pour un usage intérieur ou extérieur.|
                    Le fauteuil roulant Vermeiren V300 XXL s'adapte à vous et non l'inverse. C'est un 
                    fauteuil confortable et pratique grâce à ses nombreuses possibilités de réglage 
                    d'assise (hauteur, profondeur, inclinaison et tension).|
                    Le V300 XXL dispose bien sur de tous les éléments classiques d'un fauteuil roulant: 
                    grandes roues 24\" avec main courante alu, repose-pieds amovibles et il est équipé 
                    d'un double croisillon renforcé pour un design optimal et une légèreté accrue.|
                    Le Vermeiren V300 XXL est le meilleur rapport qualité/prix du marché grâce à sa 
                    vaste gamme d'accessoires de série, sa très grande qualité de finition et son 
                    confort hors du commun dans cette gamme de prix.|
                    Prescription médicale : VHP, propulsion manuelle, pliant, à dossier non inclinable,
                     VERMEIREN LPPR 9122012|
                    MonFauteuilRoulant.com est l'enseigne Internet de la Société Française 
                    Erian Company, Etablissement Spécialisé habilité à délivrer des Feuilles de Soins 
                    CERFA; vous permettant d'obtenir le remboursement LPPR, sous réserve de l'obtention 
                    d'une prescription médicale, délivrée par un Médecin.|
                    Le Personnel Technique est formé pour vous guider dans la configuration DU fauteuil 
                    roulant qui VOUS convient en tenant compte de VOS spécificités.
                ",
                'description2' => "Vermeiren",
                'description3' => "
                    Dossier fixe
                    Poids maxi utilisateur 170 kg
                    Largeur d'assise personnalisable de 53 à 60 cm
                    Hauteur d'assise réglable de 45 à 53 cm
                    Profondeur d'assise réglable de 44 à 53 cm
                    Toile d'assise réglable en tension (5 sangles)
                    Toile de dossier réglable en tension (5 sangles)
                    Roulette anti-bascule 2 en 1 avec monte trottoir
                    Poids : 21kg
                    Repose-pieds escamotables et amovibles
                    Freins avec poignées longues escamotables
                    Accoudoirs en T réversibles, amovibles, escamotables, réglables en hauteur et profondeur
                    Poignées de poussée courtes
                    Disponible en bleu ou champagne
                    Un fauteuil Roulant Vermeiren V300 XXL à Dossier fixe
                    Garantie 2 ans contre tout vice de construction résultant d’un défaut de matière ou de fabrication
                "
            ], [
                'title' => "Fauteuil roulant Vermeiren V300 XXL Dossier Fixe",
                'price' => 363000,
                'stock' => "1",
                'image' => "Fauteuil-roulant-Vermeiren-V300-XXL-Dossier-Fixe.jpg",
                'description' => "Meilleur rapport qualité prix des fauteuils XXL|Nombreuses possibilités de réglage|Design et léger",
                'description1' => "
                    Le tout nouveau Vermeiren V300 XXL à dossier fixe est le fauteuil roulant modulable le mieux équipé du marché.|
                    En effet, le V300 XXL dispose de nombreux réglages et est équipé de série d'une 
                    multitude d'éléments comme la roulette anti-bascule 2 en 1 avec monte trottoir 
                    intégré, une assise et un dossier rembourrés réglables en tension, les freins à 
                    poignées longues rabattables pour faciliter le transfert, les accoudoirs en T 
                    amovibles, réversibles et réglables en hauteur ainsi que les poignées de poussée courtes.|
                    Design, modulable, pliable et léger le V300 XXL dossier fixe conviendra aussi 
                    bien pour un usage intérieur ou extérieur.|
                    Le fauteuil roulant Vermeiren V300 XXL s'adapte à vous et non l'inverse. C'est un 
                    fauteuil confortable et pratique grâce à ses nombreuses possibilités de réglage 
                    d'assise (hauteur, profondeur, inclinaison et tension).|
                    Le V300 XXL dispose bien sur de tous les éléments classiques d'un fauteuil roulant: 
                    grandes roues 24\" avec main courante alu, repose-pieds amovibles et il est équipé 
                    d'un double croisillon renforcé pour un design optimal et une légèreté accrue.|
                    Le Vermeiren V300 XXL est le meilleur rapport qualité/prix du marché grâce à sa 
                    vaste gamme d'accessoires de série, sa très grande qualité de finition et son 
                    confort hors du commun dans cette gamme de prix.|
                    Prescription médicale : VHP, propulsion manuelle, pliant, à dossier non inclinable,
                     VERMEIREN LPPR 9122012|
                    MonFauteuilRoulant.com est l'enseigne Internet de la Société Française 
                    Erian Company, Etablissement Spécialisé habilité à délivrer des Feuilles de Soins 
                    CERFA; vous permettant d'obtenir le remboursement LPPR, sous réserve de l'obtention 
                    d'une prescription médicale, délivrée par un Médecin.|
                    Le Personnel Technique est formé pour vous guider dans la configuration DU fauteuil 
                    roulant qui VOUS convient en tenant compte de VOS spécificités.
                ",
                'description2' => "Vermeiren",
                'description3' => "
                    Dossier fixe
                    Poids maxi utilisateur 170 kg
                    Largeur d'assise personnalisable de 53 à 60 cm
                    Hauteur d'assise réglable de 45 à 53 cm
                    Profondeur d'assise réglable de 44 à 53 cm
                    Toile d'assise réglable en tension (5 sangles)
                    Toile de dossier réglable en tension (5 sangles)
                    Roulette anti-bascule 2 en 1 avec monte trottoir
                    Poids : 21kg
                    Repose-pieds escamotables et amovibles
                    Freins avec poignées longues escamotables
                    Accoudoirs en T réversibles, amovibles, escamotables, réglables en hauteur et profondeur
                    Poignées de poussée courtes
                    Disponible en bleu ou champagne
                    Un fauteuil Roulant Vermeiren V300 XXL à Dossier fixe
                    Garantie 2 ans contre tout vice de construction résultant d’un défaut de matière ou de fabrication
                "
            ], [
                'title' => "Fauteuil roulant Vermeiren V300 XXL Dossier Fixe",
                'price' => 363000,
                'stock' => "1",
                'image' => "Fauteuil-roulant-Vermeiren-V300-XXL-Dossier-Fixe.jpg",
                'description' => "Meilleur rapport qualité prix des fauteuils XXL|Nombreuses possibilités de réglage|Design et léger",
                'description1' => "
                    Le tout nouveau Vermeiren V300 XXL à dossier fixe est le fauteuil roulant modulable le mieux équipé du marché.|
                    En effet, le V300 XXL dispose de nombreux réglages et est équipé de série d'une 
                    multitude d'éléments comme la roulette anti-bascule 2 en 1 avec monte trottoir 
                    intégré, une assise et un dossier rembourrés réglables en tension, les freins à 
                    poignées longues rabattables pour faciliter le transfert, les accoudoirs en T 
                    amovibles, réversibles et réglables en hauteur ainsi que les poignées de poussée courtes.|
                    Design, modulable, pliable et léger le V300 XXL dossier fixe conviendra aussi 
                    bien pour un usage intérieur ou extérieur.|
                    Le fauteuil roulant Vermeiren V300 XXL s'adapte à vous et non l'inverse. C'est un 
                    fauteuil confortable et pratique grâce à ses nombreuses possibilités de réglage 
                    d'assise (hauteur, profondeur, inclinaison et tension).|
                    Le V300 XXL dispose bien sur de tous les éléments classiques d'un fauteuil roulant: 
                    grandes roues 24\" avec main courante alu, repose-pieds amovibles et il est équipé 
                    d'un double croisillon renforcé pour un design optimal et une légèreté accrue.|
                    Le Vermeiren V300 XXL est le meilleur rapport qualité/prix du marché grâce à sa 
                    vaste gamme d'accessoires de série, sa très grande qualité de finition et son 
                    confort hors du commun dans cette gamme de prix.|
                    Prescription médicale : VHP, propulsion manuelle, pliant, à dossier non inclinable,
                     VERMEIREN LPPR 9122012|
                    MonFauteuilRoulant.com est l'enseigne Internet de la Société Française 
                    Erian Company, Etablissement Spécialisé habilité à délivrer des Feuilles de Soins 
                    CERFA; vous permettant d'obtenir le remboursement LPPR, sous réserve de l'obtention 
                    d'une prescription médicale, délivrée par un Médecin.|
                    Le Personnel Technique est formé pour vous guider dans la configuration DU fauteuil 
                    roulant qui VOUS convient en tenant compte de VOS spécificités.
                ",
                'description2' => "Vermeiren",
                'description3' => "
                    Dossier fixe
                    Poids maxi utilisateur 170 kg
                    Largeur d'assise personnalisable de 53 à 60 cm
                    Hauteur d'assise réglable de 45 à 53 cm
                    Profondeur d'assise réglable de 44 à 53 cm
                    Toile d'assise réglable en tension (5 sangles)
                    Toile de dossier réglable en tension (5 sangles)
                    Roulette anti-bascule 2 en 1 avec monte trottoir
                    Poids : 21kg
                    Repose-pieds escamotables et amovibles
                    Freins avec poignées longues escamotables
                    Accoudoirs en T réversibles, amovibles, escamotables, réglables en hauteur et profondeur
                    Poignées de poussée courtes
                    Disponible en bleu ou champagne
                    Un fauteuil Roulant Vermeiren V300 XXL à Dossier fixe
                    Garantie 2 ans contre tout vice de construction résultant d’un défaut de matière ou de fabrication
                "
            ], [
                'title' => "Fauteuil roulant Vermeiren V300 XXL Dossier Fixe",
                'price' => 363000,
                'stock' => "1",
                'image' => "Fauteuil-roulant-Vermeiren-V300-XXL-Dossier-Fixe.jpg",
                'description' => "Meilleur rapport qualité prix des fauteuils XXL|Nombreuses possibilités de réglage|Design et léger",
                'description1' => "
                    Le tout nouveau Vermeiren V300 XXL à dossier fixe est le fauteuil roulant modulable le mieux équipé du marché.|
                    En effet, le V300 XXL dispose de nombreux réglages et est équipé de série d'une 
                    multitude d'éléments comme la roulette anti-bascule 2 en 1 avec monte trottoir 
                    intégré, une assise et un dossier rembourrés réglables en tension, les freins à 
                    poignées longues rabattables pour faciliter le transfert, les accoudoirs en T 
                    amovibles, réversibles et réglables en hauteur ainsi que les poignées de poussée courtes.|
                    Design, modulable, pliable et léger le V300 XXL dossier fixe conviendra aussi 
                    bien pour un usage intérieur ou extérieur.|
                    Le fauteuil roulant Vermeiren V300 XXL s'adapte à vous et non l'inverse. C'est un 
                    fauteuil confortable et pratique grâce à ses nombreuses possibilités de réglage 
                    d'assise (hauteur, profondeur, inclinaison et tension).|
                    Le V300 XXL dispose bien sur de tous les éléments classiques d'un fauteuil roulant: 
                    grandes roues 24\" avec main courante alu, repose-pieds amovibles et il est équipé 
                    d'un double croisillon renforcé pour un design optimal et une légèreté accrue.|
                    Le Vermeiren V300 XXL est le meilleur rapport qualité/prix du marché grâce à sa 
                    vaste gamme d'accessoires de série, sa très grande qualité de finition et son 
                    confort hors du commun dans cette gamme de prix.|
                    Prescription médicale : VHP, propulsion manuelle, pliant, à dossier non inclinable,
                     VERMEIREN LPPR 9122012|
                    MonFauteuilRoulant.com est l'enseigne Internet de la Société Française 
                    Erian Company, Etablissement Spécialisé habilité à délivrer des Feuilles de Soins 
                    CERFA; vous permettant d'obtenir le remboursement LPPR, sous réserve de l'obtention 
                    d'une prescription médicale, délivrée par un Médecin.|
                    Le Personnel Technique est formé pour vous guider dans la configuration DU fauteuil 
                    roulant qui VOUS convient en tenant compte de VOS spécificités.
                ",
                'description2' => "Vermeiren",
                'description3' => "
                    Dossier fixe
                    Poids maxi utilisateur 170 kg
                    Largeur d'assise personnalisable de 53 à 60 cm
                    Hauteur d'assise réglable de 45 à 53 cm
                    Profondeur d'assise réglable de 44 à 53 cm
                    Toile d'assise réglable en tension (5 sangles)
                    Toile de dossier réglable en tension (5 sangles)
                    Roulette anti-bascule 2 en 1 avec monte trottoir
                    Poids : 21kg
                    Repose-pieds escamotables et amovibles
                    Freins avec poignées longues escamotables
                    Accoudoirs en T réversibles, amovibles, escamotables, réglables en hauteur et profondeur
                    Poignées de poussée courtes
                    Disponible en bleu ou champagne
                    Un fauteuil Roulant Vermeiren V300 XXL à Dossier fixe
                    Garantie 2 ans contre tout vice de construction résultant d’un défaut de matière ou de fabrication
                "
            ],
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
