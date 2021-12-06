<?php

namespace App\Controller;

use DateTimeImmutable;
use App\Entity\Newsletter;
use App\Form\NewsletterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @Route("/newsletter/inscription", name="newsletter_inscription")
     */
    public function newsletter(Request $request, EntityManagerInterface $manager): Response
    {
        $newsletter = new Newsletter();
        $newsletterForm = $this->createForm(NewsletterType::class, $newsletter);
        $newsletterForm->handleRequest($request);
        if ($newsletterForm->isSubmitted() && $newsletterForm->isValid()) {
            $newsletter->setCreatedAt(new \DateTimeImmutable());
            $manager->persist($newsletter);
            $manager->flush();
            $this->addFlash('newsletter', $newsletter->getEmail(). 'a bien été ajouté à la newsletter');
            return $this->redirect($request->server->get('HTTP_REFERER'));
        }
        $response = $this->render('component/atoms/footer.html.twig', [
            'newsletterForm' => $newsletterForm->createView(),
        ]);
        $response->setPublic();
        $response->setMaxAge(600);
        return $response;
    }
}
