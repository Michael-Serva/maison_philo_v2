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
                'title' => 'World',
                'header' => 'By 2030, the number of people aged 60 and over will have increased by 34%, from 1 billion in 2019 to 1.4 billion.',
                'body' => "By 2050, the world's elderly population will more than double to 2.1 billion.",
                'footer' => "Extract from the World Health Organization (WHO) report' Decade for Healthy Aging 2020-2030"
            ],
            [
                'title' => 'Africa',
                'header' => 'Often presented as a young continent, Africa is no exception to the phenomenon of population aging.',
                'body' => "Projections by 2050 indicate that the increase in the number of elderly people will be considerable: depending on national contexts, the number of people aged 60 and over should quadruple in 35 years and the number of people aged 60 and over. 80 years and over is also expected to increase sharply",
                'footer' => "Extract from the report of the World Health Organization (WHO) “Decade for Healthy Aging 2020-2030"
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
