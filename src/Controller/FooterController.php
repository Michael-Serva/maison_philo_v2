<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/footer")
 * @Template
 */
class FooterController extends AbstractController
{
    /**
     * @Route("/map")
     */
    public function map()
    {
    }

    /**
     * @Route("/cgv")
     */
    public function cgv()
    {
    }
}
