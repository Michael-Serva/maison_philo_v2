<?php

namespace App\Controller;

use App\Form\AccountType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * @Route("/account")
 * @Template
 */
class AccountController extends AbstractController
{
    public function __construct(TranslatorInterface $trans)
    {
        $trans->trans('your profile has been modified');
    }

    /**
     * @Route("/")
     */
    public function index()
    {
    }

    /**
     * @Route("/profile")
     */
    public function profile()
    {
    }

    /**
     * @Route("/edit")
     */
    public function edit(Request $request, EntityManagerInterface $manager, SluggerInterface $slugger)
    {
        $user = $this->getUser();
        $form = $this->createForm(AccountType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('picture')->getData();

            if ($imageFile) { // if image upload
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                //this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = date("YmdHis") . $safeFilename . "-" . uniqid() . '.' . $imageFile->guessExtension();
                // Move the file to the directory where image are stored
                try {
                    $imageFile->move(
                        $this->getParameter('image_product'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }
                // instead of its contents
                $user->setPicture($newFilename);
                $manager->persist($user);
                $manager->flush();
            }
            $this->addFlash('edit', 'your profile has been modified');
            return $this->redirectToRoute('app_account_profile');
        }
        return  [
            'form' => $form->createView()
        ];
    }
}
