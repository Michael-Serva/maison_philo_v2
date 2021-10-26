<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**
 * @Route("/security")
 * @Template
 */
class SecurityController extends AbstractController
{
    /**
        *
        * @Route("/register", name="app_security_register")
        * @Template
        */
    public function register(Request $request, EntityManagerInterface $manager, UserPasswordHasherInterface $encoder)
    {
        // UserPasswordEncoderInterface
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user, array("registration" => true));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /* password encode */
            $hash = $encoder->hashPassword($user, $user->getPassword());
            $user->setPassword($hash);
            $manager->persist($user);
            $manager->flush();

            $this->addFlash("notice", $user->getPseudo() . ", votre inscription a bien été enregistrée");
            return $this->redirectToRoute("app_security_login");
        }
        return $this->render('security\register.html.twig', [
            "registrationForm" => $form->createView(),
        ]);
    }
    /**
     * @Route("/login", name="app_security_login")
     * @Template
     */
    public function login(AuthenticationUtils $authenticationUtils, Request $request): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        $this->addFlash(
            'dashboard',
            'You are well connected'
        );
        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername, 'error' => $error
        ]);
    }
    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException(
            'This method can be blank - it will be intercepted by the logout key on your firewall.'
        );
    }
}
