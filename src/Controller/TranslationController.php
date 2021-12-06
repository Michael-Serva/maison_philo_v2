<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TranslationController extends AbstractController
{

    public function __construct(TranslatorInterface $trans)
    {
        $trans->trans('your profile has been modified');
        $trans->trans('The old password is incorrect');
        $trans->trans('Your password has been changed successfully');
    }
    
    /**
     * @Route("/translation", name="translation")
     */
    public function index(): Response
    {
        return $this->render('translation/index.html.twig', [
            'controller_name' => 'TranslationController',
        ]);
    }
}
