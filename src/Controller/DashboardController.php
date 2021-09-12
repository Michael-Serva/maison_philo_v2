<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class DashboardController extends AbstractController
{
    /**
     * @Route("/")
     * @Template
     */
    public function home(): array
    {
        $presentationContents = [
            [
                'title' => 'Monde',
                'header' => 'D’ici 2030, le nombre de personnes âgées de 60 ans et plus aura augmenté de 34% passant de 1 milliard en 2019 à 1,4 milliard.',
                'body' => "D’ici à 2050, la population mondiale de personnes âgées aura plus que doublé pour atteindre 2,1 milliards.",
                'footer' => "Extrait du rapport de l’Organisation Mondiale de la Santé (OMS) « Décennie pour le vieillissement en bonne santé 2020-2030"
            ],
            [
                'title' => 'Afrique',
                'header' => 'Souvent présenté comme un continent jeune, l’Afrique n’échappe pas au phénomène de vieillissement de population.',
                'body' => "Les projections d’ici 2050 indiquent que la progression des effectifs de personnes âgées y sera considérable : suivant les contextes nationaux, le nombre de personnes âgées de 60 ans et plus devrait aller jusqu’à quadrupler en 35 ans et le nombre de personnes âgées de 80 ans et plus devrait lui aussi très fortement augmenter",
                'footer' => " (Sajoux, Golaz et Lefèvre, 2015)"
            ]
        ];
        return  [
            'presentationContents' => $presentationContents,
        ];
    }
    // /**
    //  * This method is used to modify the language of the site
    //  * @Route("/changeLocale/{locale}", name="app_dashboard_changeLocale")
    //  * @Template
    //  */
    // public function changeLocal($locale, Request $request)
    // {
    //     dump($request);

    //     /* we store the requested language in the session */
    //     //$request->getSession()->set('_locale', $locale);
    //     //dd($_SESSION);
    //     $request->setDefaultLocale($locale);
    //     //dd($request);

    //     //dd($request->getDefaultLocale());
    //     //dd($_SESSION);
    //     /* We reload the page in the requested language */
    //     return $this->redirect($request->headers->get('referer'));
    //     /* We redirect the user to the page where he came from */
    // }

    /**
     * This method is used to modify the language of the site
     * @Route("/changeLocale/{locale}", name="app_dashboard_changeLocale")
     * @Template
     */
    public function changeLocal($locale, Request $request, SessionInterface $session)
    {
        $session->set('locale', $locale);
        //dd($session->get('locale'));
        return $this->redirect($request->headers->get('referer'));
        /* We redirect the user to the page where he came from */
    }
}
