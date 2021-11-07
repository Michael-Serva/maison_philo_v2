<?php

namespace App\Controller;

use App\Service\CallApiService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/")
 */

class DashboardController extends AbstractController
{

    /**
     * @Route("/")
     * @Template
     */
    public function home(CallApiService $callApiService): array
    {
        $dataCovid = $callApiService->getCoteIvoireData();
        $datas = $dataCovid["Cote_d'Ivoire"];
        json_encode($datas);

        $presentationContents = [
            [
                'title' => 'Monde',
                'header' => 'D’ici 2030, le nombre de personnes âgées de 60 ans
                 et plus aura augmenté de 34% passant de 1 milliard en 2019
                  à 1,4 milliard.',
                'body' => "D’ici à 2050, la population mondiale de personnes
                 âgées aura plus que doublé pour atteindre 2,1 milliards.",
                'footer' => "Extrait du rapport de l’Organisation Mondiale
                 de la Santé (OMS) « Décennie pour le vieillissement en bonne santé 2020-2030"
            ],
            [
                'title' => 'Afrique',
                'header' => 'L’Afrique n’échappe pas au phénomène de
                 vieillissement de population.',
                'body' => "Les projections d’ici 2050 indiquent que
                 la progression des effectifs de personnes âgées y
                  sera considérable. Suivant les contextes nationaux, le nombre
                   de personnes âgées de 60 ans et plus devrait aller
                    jusqu’à quadrupler en 35 ans.",
                'footer' => " (Sajoux, Golaz et Lefèvre, 2015)"
            ]
        ];
        return  [
            'presentationContents' => $presentationContents,
            'datas' => $datas
        ];
    }

    /**
     * @Route("/index")
     * @Template
     */
    public function index(): array
    {
        return [];
    }

    /**
     * @Route("/history")
     * @Template
     */
    public function history(): array
    {
        return [];
    }

    /**
     * @Route("/vision")
     * @Template
     */
    public function vision(): array
    {
        return[];
    }

    /**
     * @Route("/objective")
     * @Template
     */
    public function objective(): array
    {
        return [];
    }

    /**
     * This method is used to modify the language of the site
     * @Route("/changeLocale/{locale}", name="change_locale")
     * @Template
     */
    public function changeLocal($locale, Request $request)
    {

        $request->setLocale($locale);

        return $this->redirect($request->headers->get('referer'));
        /* We redirect the user to the page where he came from */
    }

}
