<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DashboardController extends AbstractController
{
    /**
     * @Route("/dashboard")
     * @Template
     */
    public function index(): Response
    {
        return  [
            'controller_name' => 'DashboardController',
        ];
    }
}
