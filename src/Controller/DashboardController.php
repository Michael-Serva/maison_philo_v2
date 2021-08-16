<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class DashboardController extends AbstractController
{
    /**
     * @Route("/")
     * @Template
     */
    public function home(): array
    {
        return  [
            'controller_name' => 'DashboardController',
        ];
    }
    /**
     * This method is used to modify the language of the site
     * @Route("/changeLocale/{locale}", name="app_dashboard_changeLocale")
     * @Template
     */
    public function changeLocal($locale, Request $request)
    {
        /* we store the requested language in the session */
        $request->getSession()->set('_locale', $locale);
        //dd($_SESSION);
        /* We reload the page in the requested language */
        return $this->redirect($request->headers->get('referer'));
        /* We redirect the user to the page where he came from */
    }
}
