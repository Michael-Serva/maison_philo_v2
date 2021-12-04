<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Role;
use App\Entity\User;
use App\Entity\Product;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class ProductFixtures extends Fixture
{
    private $encoder;
    /*allows to use $this->encoder in the whole fixture */
    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager)
    {

        $wheelchairs = [
            [
                'promo' => true,
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
                'promo' => true,
                'title' => "Fauteuil roulant Vermeiren V300 XXL Dossier Fixe",
                'price' => 363000,
                'stock' => "1",
                'image' => "Fauteuil-roulant-Vermeiren-V300-XXL-Dossier-Fixe.jpg",
                'description' => "Meilleur rapport qualité prix des fauteuils XXL|
                Nombreuses possibilités de réglage|Design et léger",
                'description1' => "
                    Le tout nouveau Vermeiren V300 XXL à dossier fixe est le fauteuil 
                    roulant modulable le mieux équipé du marché.|
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
                'promo' => false,
                'title' => "Scooter Invacare 3 roues Colibrie",
                'price' => 586453,
                'stock' => 57,
                'image' => "Scooter-electrique-Invacare-3-roues-Colibri-outdoor.jpg",
                'description' => "
                    Démontage ultra facile (moins d'une minute!) et sans outil|
                    Carénages personnalisables|
                    Très facile à manœuvrer|
                    Plus faible encombrement du marché|
                    Poids plume (42kg!)
                ",
                'description1' => "
                    Le nouveau scooter électrique Invacare Colibri 3 roues est très
                     facile à monter et à démonter sans outil : 
                    moins d'une minute c'est le temps qu'il vous faut ! Grâce à 
                    l'unique et ingénieux système breveté Invacare 
                    LiteLock(tm).|
                    Changez de look selon votre goût ! En effet, les nouveaux 
                    scooters électriques Invacare Colibri 3 roues 
                    vous permettent de choisir facilement et rapidement les 
                    éléments colorés de la carrosserie en les clipsant
                     sans outil.|
                    La nouvelle gamme de scooter Invacare Colibri est facilement
                     manœuvrable grâce au faible encombrement 
                    de ses 3 roues. Sécurisant et confortable grâce à son guidon 
                    ergonomique, sa colonne de direction ajustable
                     en inclinaison et son élégant siège rembourré à surpiqures
                      blanches pivotant sur 360°.|
                    Le scooter colibri dans cette version indoor plus légère pourra
                     être emmené partout y compris sur votre
                     lieu de vacances avec son poids plûme de 42 kg.|
                    Le nouveau scooter Colibri pour personne à mobilité réduite 
                    d'Invacare se désassemble en 5 parties 
                    (siège, batteries, panier, moteur et la colonne de direction 
                    avec son plateau repose pieds), ce 
                    qui en fera votre compagnon favori pour voyager, aller au
                     marché ou tout simplement pour aller 
                    se balader en famille puisqu'il rentre même dans de très
                     petites voitures.U fauteuil 
                    roulant qui VOUS convient en tenant compte de VOS spécificités.
                ",
                'description2' => "Invacare",
                'description3' => "
                    Démontage facile et rapide en 5 parties grâce au système breveté LiteLock|
                    Siège amovible pivotant à 360° facilement démontable réglable 
                    en hauteur avec dossier rabattable|
                    Insertion ergonomique de la batterie avec poignée incluse|
                    Accoudoirs rabattables réglables en hauteur et largeur|
                    Guidon ergonomique antidérapant rabattable sur le plateau repose pied|
                    Variateur de vitesse|
                    Vitesse maximale 8 km/h|
                    Autonomie de la batterie 11kms (Batt. 12Ah)|
                    Système de freinage aéromagnétique|
                    3 roues|
                    Roulettes anti-bascule|
                    Marche arrière|
                    Design ultra moderne avec carénages personnalisables|
                    Panier amovible|
                    Réglage de l'angle de la colonne de direction|
                    Capacité de franchissement 40mm (roues 200x50mm)
                "
            ],
            [
                'promo' => true,
                'title' => "Vermeiren INOVYS II Electrique",
                'price' => 720780,
                'stock' => "38",
                'image' => "Vermeiren-INOVYS-II-Electrique.jpg",
                'description' => "    
                    Dossier et assise inclinables électriquement|
                    Compact : Facile à transporter|
                    Très confortable|
                    Transferts Faciles
                ",
                'description1' => "
                    Le fauteuil de confort Vermeiren Inovys II Electrique est très confortable et 
                    dispose d'un dossier inclinable proclive/déclive, il est pliant et facilement
                     démontable pour le transport.|
                    Le Vermeiren Inovys II Electrique est équipé d'une assise et d'un dossier en
                     mousse soft post-formés pour un meilleur confort et un maintien optimum avec un
                      nouveau système permettant un réglage en profondeur, en hauteur et en inclinaison.|
                    Le nouveau fauteuil Inovys II Electrique est unique grâce à son système 
                    d'inclinaison électrique du dossier et de l'assise géré par une télécommande 
                    très simple d'utilisation.|
                    L'assise de ce fauteuil confort Vermeiren est réglable en profondeur et
                     est maintenue par des sangles élastiques pour plus de souplesse et de 
                     confort permettant d'éviter tout point de compression. Le dossier est réglable 
                     en hauteur et en profondeur.|
                    L'Inovys II Electrique est équipé d'un nouveau système de fixation de repose-jambes 
                    très solide pour une utilisation longue durée à domicile comme en collectivité.
                ",
                'description2' => "Vermeiren",
                'description3' => "
                    Inclinaison du dossier et de l'assise électrique|
                    Dossier inclinable à 35°|
                    Poids maximum de l'utilisateur : 135 kg
                "
            ],
            [
                'promo' => false,
                'title' => "Fauteuil roulant actif SAGITTA",
                'price' => 798100,
                'stock' => 41,
                'image' => "Fauteuil-roulant-Actif-Sagitta-blanc.JPG",
                'description' => "    
                    Pratique, confortable et fiable|
                    Étroit|
                    Équipements de série importants
                ",
                'description1' => "
                    Le fauteuil roulant SAGITTA VERMEIREN est un des fauteuils roulants actifs légers 
                    à châssis rigide proposant le meilleur rapport qualité / prix sur le marché.|
                    Le Sagitta est un vrai fauteuil roulant actif configurable proposé à un prix très 
                    inférieur aux autres fauteuils roulants de la catégorie.|
                    Le design et la conception du SAGITTA en font un véritable fauteuil actif avec un 
                    très bon rendement lors des déplacements et très compact pour faciliter le passage
                     dans les endroits exigus.|
                    L'agilité du Sagitta, le choix des angles de carrossage et les freins ciseaux permettent
                     la pratique du multisport en fauteuil roulant.
                    Le réglage en continu de la position de l'assise par rapport à l'axe des roues arrière
                     permet à chacun de trouver le point d'équilibre qui lui convient et de le faire évoluer
                      en fonction de sa maîtrise grandissante du fauteuil actif.|
                    Le réglage de l'angle du dossier de -7° à +7° permet d'améliorer le confort ou de faciliter 
                    le maintien du buste quand les muscles abdominaux ou dorsaux sont limités.`|
                    Le dossier rabattable sur l'assise et les roues à démontage rapide facilitent le chargement
                     du Sagitta dans la voiture par l'utilisateur en le faisant passer entre son buste et le
                      volant. Il est très peu encombrant dans cette configuration et trouvera facilement
                       sa place dans le coffre d'une voiture dans le cas d'un accompagnant.
                ",
                'description2' => "Vermeiren",
                'description3' => "
                    Dossier rabattable|
                    Dossier Réglable en inclinaison de -7° à +7° et en hauteur|
                    Roues arrières 24\" avec axes à démontage rapide|
                    Accoudoirs crantés|
                    Carrossage personnalisable à 0°,2°,4°,6° ou 8° (à la commande)
                "
            ],
            [
                'promo' => false,
                'title' => "Eco Buggy Poussette canne pliante à dossier inclinable",
                'price' => 376116,
                'stock' => 150,
                'image' => "poussettecanneplianteEcobuggy.JPG",
                'description' => "    
                    Facilite le quotidien|
                    Pliage facile|
                    Dossier inclinable
                ",
                'description1' => "
                    La poussette canne pliante Eco-Buggy est légère, compacte, conçue pour un 
                    transport facile et rapide des enfants handicapés. Grâce à son châssis en 
                    aluminium, la poussette canne Eco Buggy est ultra-légère et en même temps extrêmement solide.|
                    Pouvant supporter une charge maximale de 50 kg, l'Eco-Buggy convient également
                     aux enfants assez grands. Une toile d'assise et de dossier renforcé ainsi que 
                     des repose-pieds solides et réglables en hauteur et une ceinture de sécurité 
                     contribuent au bon maintien de l'enfant.|
                    L'inclinaison du dossier permet de régler la position d'assise de l'enfant.|
                    Grâce aux quatre roues avant jumelée et à suspension, et au blocage directionnel 
                    intégré des roues avant, la poussette canne Eco-Buggy passe partout 
                    et reste aisément manœuvrable sur des terrains accidentés.|
                    Son mécanisme de pliage facile, sa faible largeur et le sac de rangement 
                    pliant sont des détails pratiques qui font leurs preuves au quotidien. 
                ",
                'description2' => "Otto Bock",
                'description3' => "
                    Poussette pliante|
                    Construction en aluminium|
                    Ultra-légère et stable|
                    Toiles d'assise et de dossier renforcés|
                    Repose-pieds réglables en hauteur|
                    Palette repose-pieds séparée et pivotante|
                    Roues avant jumelées avec blocage directionnel|
                    Freins au pied aux roues arrières|
                    Ceinture de sécurité|
                    Sac de rangement pliant|
                    Encombrement réduit après pliage
                "
            ], [
                'promo' => false,
                'title' => "Poussette pliable Jazz Easys",
                'price' => 1736426,
                'stock' => "2",
                'image' => "Poussette-jazz-easys.jpg",
                'description' => "Assise réversible|Évolutive",
                'description1' => "
                    La poussette pliable Jazz Easys est la poussette évolutive par excellence.|
                    La poussette Jazz Easys est composée d’un châssis et d’une assise dissociables.
                     Sa suspension en matière d'assise offre à votre enfant un grand confort, 
                     grâce ses ressorts d'arrêt qui absorbent les aspérités du sol. L'assise 
                     réversible vous permet de positionner votre enfant face à vous ou vers le paysage.
                ",
                'description2' => "Rupiani",
                'description3' => "
                    Poussette pliante|
                    Assise réversible et dissociable|
                    Multi réglable évolutive|
                    Roues avant pivotantes|
                    Inclinaison du dossier de 90 à 180 degrés|
                    Largeur et profondeur d'assise réglables sans outil|
                    Barre de poussée réglable en hauteur|
                    Facile à plier|
                    Poussette taille 1|
                    Taille maxi de l'enfant 110 cm|
                    Largeur assise réglable de 19 à 31 cm|
                    Profondeur assise réglable de 19 à 30 cm|
                    Poids : 15,9 kg|
                    Dimensions : 100 x 60 x 92 à 114 cm|
                    Dimensions plié : 88 x 60 x 50 cm|
                    Poussette taille 2|
                    Taille maxi de l'enfant 130 cm|
                    Largeur assise réglable de 25 à 36 cm|
                    Profondeur assise réglable de 27 à 38 cm|
                    Poids : 18,6 kg|
                    Dimensions : 111 x 68 x 92 à 120 cm|
                    Dimensions plié : 99 x 68 x 62 cm
                "
            ],
            [
                'promo' => 1,
                'title' => "Fauteuil Roulant AvantGarde CS Otto Bock",
                'price' => 1441561,
                'stock' => "9",
                'image' => "Fauteuil-roulant-Ottobock-AvantGarde-CS.jpg",
                'description' => "   
                    Robuste et Pliant|
                    Amortisseurs en options|
                    Facile à Transporter
                ",
                'description1' => "
                    Le fauteuil roulant Avantgarde CS convient aux profils les plus audacieux, à 
                    ceux qui ne veulent en aucun cas être ralentis par la vie. Grâce à son agilité 
                    et sa véritable manœuvrabilité, le fauteuil roulant AvantGarde CS s'adapte avec
                     la même facilité aux intérieurs exigus ou aux longues distances.|
                    Le fauteuil AvantGarde CS est un fauteuil actif, avec des dimensions compactes 
                    (largeur totale = largeur assise + 17cm), disposant d'une extrême stabilité grâce
                     à son châssis ultra rigide et de ses potences fixes. Ses angles de potence 
                     disponibles en 70 ou 80° permettent de positionner les jambes dans les positions désirées.|
                    Le fauteuil AvantGarde CS permet une infinité de réglage différents afin de
                     s'adapter au mieux à la morphologie de son utilisateur, n'hésitez pas à nous
                      consulter afin que nous vous aidions dans la configuration de celui-ci.
                ",
                'description2' => "Otto Bock",
                'description3' => "
                    Fabrication sur mesure|
                    Châssis aluminium de haute qualité|
                    Châssis avec double croisillon|
                    Châssis avant standard ou avec abduction|
                    Potences fixes 70° ou 80°
                "
            ],
            [
                'promo' => false,
                'title' => "Invacare Rea Dahlia 45 degrés",
                'price' => 1323615,
                'stock' => 37,
                'image' => "Scooter-electrique-Invacare-3-roues-Colibri-outdoor.jpg",
                'description' => "    
                    Qualité de positionnement|
                    Fauteuil de confort|
                    Poids Maxi utilisateur 125 Kg
                ",
                'description1' => "
                    Le fauteuil de confort Invacare Rea Dahlia 45 degrés est spécialement conçu pour
                     les utilisateurs à la recherche de mobilité et de maniabilité tout en ayant
                      un niveau de confort optimal.|
                    Le fauteuil de confort Invacare Rea Dahlia dispose d'un angle d'inclinaison
                     d’assise de 45 degrés et d’une inclinaison de dossier de 45° ce qui améliore
                      les capacités de positionnement et permet de faire varier les points de pression.|
                    Le fauteuil de confort Invacare Rea Dahlia 45° partage de nombreux éléments
                     avec les autres fauteuils de la famille Rea ce qui facilite sa personnalisation.|
                    Toute une famille de produits a été développée à partir de ce châssis, afin
                     de s’adapter aux besoins de tous les utilisateurs en leur garantissant
                      confort, sécurité et qualité de positionnement
                ",
                'description2' => "Invacare",
                'description3' => "
                    Châssis pliant|
                    Assise inclinable jusqu'à 45 degrés|
                    Dossier réglable en angle par vis de série ou inclinable de 0 à 30 degrés|
                    Accoudoirs et repose-jambes réglables en largeur|
                    Anti-bascules escamotables de série|
                    Poids : à partir de 16.5 kg|
                    Poids maximum de l'utilisateur : 125 kg|
                    Largeur hors tout réduite :|
                    Largeur d‘assise +18 cm avec roues de 20\",22\",24\"|
                    Largeur d‘assise +16 cm avec roues 16\"
                "
            ],
        ];
        $wheelchairCategory = new Category();
        $wheelchairCategory->setTitle("fauteuil roulant");
        $manager->persist($wheelchairCategory);
        $manager->flush();

        foreach ($wheelchairs as $wheelchair) {
            $product = new Product();
            $product
                ->setPromo($wheelchair['promo'])
                ->setTitle($wheelchair['title'])
                ->setPrice($wheelchair['price'])
                ->setImage($wheelchair['image'])
                ->setStock($wheelchair['stock'])
                ->setCategory($wheelchairCategory)
                ->setDescription($wheelchair['description'])
                ->setDescription1($wheelchair['description1'])
                ->setDescription2($wheelchair['description2'])
                ->setDescription3($wheelchair['description3']);

            $manager->persist($product);
            $manager->flush();
        }
        /* Add health and care product */
        $categories = [
            [
                'promo' => false,
                'title' => 'Strapontin de douche Bornéo',
                'price' => 64923,
                'stock' => 220,
                'image' =>
                'Strapontin-de-douche-Borneo.jpg',
                'description' => '
                    Siège de douche mural strapontin|
                    Découpe anatomique|
                    Poids Maxi 110 kg
                ',
                'description1' => "
                    d'équilibre.|
                    L'ensemble est repliable contre le mur pour faciliter l'accès et permettre 
                    aux autres personnes du foyer de prendre une douche debout.|
                    Les pieds se règlent en hauteur pour positionner l'assise à la hauteur désirée.|
                    Un réglage fin est possible sur chaque pied pour compenser la pente du receveur de douche.|
                    L'assise anatomique est construite en matériau plastifié.|
                    La structure est en acier traité epoxy blanc avec fixations en inox.
                ",
                'description2' => 'Identité',
                'description3' => "
                    Assise réglable en hauteur de 450 à 560 mm|
                    Assise avec découpe anatomique|
                    Assise: Larg. 438 mm Prof. 378 mm|
                    Ajustage précis de chaque pied|
                    Relevable, profondeur plié : 130 mm|
                    Dimensions Hors Tout Larg. x Prof. 450x455 mm",
            ],
        ];


        $healthAndCareCategory = new Category();
        $healthAndCareCategory->setTitle("hygiene");
        $manager->persist($healthAndCareCategory);
        $manager->flush();

        foreach ($categories as $category) {
            $product = new Product();
            $product
             ->setPromo($category['promo'])
             ->setTitle($category['title'])
             ->setPrice($category['price'])
             ->setImage($category['image'])
             ->setStock($category['stock'])
             ->setCategory($healthAndCareCategory)
             ->setDescription($category['description'])
             ->setDescription1($category['description1'])
             ->setDescription2($category['description2'])
             ->setDescription3($category['description3']);

            $manager->persist($product);
            $manager->flush();
        }

        $adminRole = new Role();
        $adminRole->setTitle('ROLE_ADMIN');
        $manager->persist($adminRole);
        $manager->flush();
        $userAdmin = new User();
        $password = $this->encoder->hashPassword($userAdmin, 'AAAAA');
        $userAdmin
            ->setEmail("Servam95@gmail.com")
            ->setPseudo("Admin")
            ->setPicture("https://randomuser.me/api/portraits/women")
            ->addUserRole($adminRole)
            ->setPassword($password);

        $manager->persist($userAdmin);
        $manager->flush();

        $faker = Factory::create('fr-Fr');
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
                ->setPicture($picture);
                //->setGenreType($genre);
            $manager->persist($user);
            $users[] = $user;
        }
        $manager->flush();
    }
}
