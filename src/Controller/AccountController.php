<?php

namespace App\Controller;

use App\Form\AccountType;
use App\Entity\PasswordUpdate;
use App\Form\PasswordUpdateType;
use Symfony\Component\Form\FormError;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**
 * @Route("/account")
 * @Template
 */
class AccountController extends AbstractController
{

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
    /**
     * La fonction password_modification() permet de modifier le mot de passe de l'utilisateur Connecté
     *
     * @Route("/passwordUpdate")
     */
    public function passwordUpdate(
        Request $request,
        EntityManagerInterface $manager,
        UserPasswordHasherInterface $encoder
    ) {
        $user = $this->getUser();

        $passwordUpdate = new PasswordUpdate();

        $form = $this->createForm(PasswordUpdateType::class, $passwordUpdate);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if (!password_verify($passwordUpdate->getOldPassword(), $user->getPassword())) {
                //dd($passwordUpdate->getOldPassword());
                $form->get('oldPassword')->addError(new FormError("The old password is incorrect"));
            } else // true
            {
                $hash = $encoder->hashPassword($user, $passwordUpdate->getNewPassword());

                $user->setPassword($hash);
                $manager->persist($user);
                $manager->flush();
                $this->addFlash("passwordUpdate", $user->getPseudo() . ",Your password has been changed successfully");
                return $this->redirectToRoute("app_account_profile");
            }
        }
        return [
            "formPassword" => $form->createView()
        ];
    }
}
